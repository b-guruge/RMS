<?php 
require_once ('controller/constants.php'); 
?>

<!-- bootstrap datepicker -->
<link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<style>
    .selected{
        background-color: lightblue !important;
    }
</style>
<!-- Main Content -->
<section class="content">
<?php 

  $resData = $accessDB->checkIfAuditStarted();

  if($_SESSION['exceptionFlag'] == 1)
  {
    
    echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>'. $_SESSION['exceptionHeader'] .'</h4>
            '. $_SESSION['exceptionMsg'] .'
          </div>';
  }
  else if($resData[0]["audit_id"] > 0)
  {
    echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>Audit in Progress</h4>
            An "'.$resData[0]["audit_name"].'" is already started. Please complete it and create a new audit.
          </div>';
  }
  else
  {
      echo '
      <div class="row">
      <div class="col-md-12">
          <!-- Default box -->
          <div class="box box-info">
              <div class="box-header with-border">
                  <h3 class="box-title">Enter Details</h3>
                  <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                              title="Collapse">
                          <i class="fa fa-minus"></i>
                      </button>
                  </div>
              </div>
              <div class="box-body">
                  <div class="row">
                      <div class="col-md-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label>Audit Name</label>
                              <input id="audit_name" type="text" class="form-control" placeholder="Enter ...">
                          </div>
                          <div class="form-group">
                              <label>Users</label>
                              <select id="users" onchange="" multiple="multiple" data-placeholder="Select Users" class="form-control select2" style="width: 100%;">';
                                      $resData = $accessDB->getAuditUsers();
                                      for ($x = 0; $x < count($resData); $x++) {
                                          echo "<option value=".$resData[$x]["id"].">".$resData[$x]["val"]."</option>";
                                      }
                             echo '</select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label>Initiated By</label>
                              <input id="init_by" type="text" class="form-control" placeholder="Enter ...">
                          </div>
                          <div class="form-group">
                              <label>Locations</label>
                              <select id="Locations" multiple="multiple" data-placeholder="Select Locations" onchange="" class="form-control select2" style="width: 100%;">';
                                      $resData = $accessDB->getAllLocations();
                                      for ($x = 0; $x < count($resData); $x++) {
                                          echo "<option value=".$resData[$x]["id"].">".$resData[$x]["val"]."</option>";
                                      }
                              echo '</select>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-3">
                          <button type="button" onclick="validateForm();" class="btn btn-block btn-primary btn-sm">Save</button>
                      </div>
                      <div class="col-md-3">
                          <button type="button" onclick="location.reload();" class="btn btn-block btn-warning btn-sm">Clear</button>
                      </div>
                  </div>
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
  </div>
  
  <div class="row">
      <div class="col-md-12">
      <div class="box">
              <div class="box-header">
                <h3 class="box-title">Location wise Assets</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                    <div class=col-md-6>
                          <div class="form-group">
                              <label>Location</label>
                              <select id="assets_for_loc" onchange="getAssetTable();" class="form-control select2" style="width: 100%;">
                                  <option selected="selected" value="-1">Please Select a Location</option>';
                                      $resData = $accessDB->getAllLocations();
                                      for ($x = 0; $x < count($resData); $x++) {
                                          echo "<option value=".$resData[$x]["id"].">".$resData[$x]["val"]."</option>";
                                      }
                              echo '</select>
                          </div>
                    </div>
                </div>
                <div class="col-md-12" id="load_data">
                      
                </div>
                    
                
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
      </div>
  </div>

      ';
  }
?>         

</section>

<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
        $('#example1').DataTable();

        //Date picker
        /*
        $('#ExpDate').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        }).datepicker("setDate", new Date());
        */
    });

    $(document).ready(function() {

        $(":text").focus(function () {
            if ($(this).closest(".form-group").hasClass("has-error"))
                $(this).closest(".form-group").removeClass("has-error");
        });

        $(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
            if ($(this).closest(".form-group").hasClass("has-error"))
                $(this).closest(".form-group").removeClass("has-error");
        });

    });

    function validateForm()
    {
        var errorList = []; //for storing each error

        if($.trim($('#audit_name').val()) == ""){
            errorList.push("#audit_name");
        }
        if($.trim($('#init_by').val()) == ""){
            errorList.push("#init_by");
        }
        if($('#Locations').val() == ""){
            errorList.push("#Locations");
        }
        if($('#users').val() == ""){
            errorList.push("#users");
        }

        if (errorList.length > 0) {
            $.each(errorList, function (index, value) {
                $(value).closest(".form-group").addClass("has-error");
            });
            Lobibox.notify("warning", { title: "Details Required", msg: "Please insert all details!" });
        }
        else
        {
            saveAudit();
        }
    }

    function getAssetTable()
    {
        var loc_id = $('#assets_for_loc').val();
        var company = "<?php echo $_SESSION["company"];?>";
        if(loc_id == "-1")
        {
            $("#load_data").empty();
        }
        else
        {
            $("#load_data").load("partial_views/location_wise_assets.php?company="+company+"&location_id=" + loc_id);
        }
        
    }

    function saveAudit()
    {
        $.post("controller/getDB.php",{
            method:"save_audit_ey",
            auditName:$.trim($('#audit_name').val()),
            initBy:$('#init_by').val(),
            locations:$('#Locations').val(),
            users:$('#users').val()
        },
        function(ret){
            var data = $.parseJSON(ret);
            if(ret == "1")
            {
                setTimeout(
                function() 
                {
                    location.reload();
                }, 5000);

                Lobibox.notify("success", { 
                    title: "Successful", 
                    msg: "Audit has been created successfully.",
                    onClick: function(){
                        location.reload();
                    }
                });
            }
            else
            {
                if(data[0]["RET"] == "0")
                {
                    Lobibox.notify("warning", { 
                        pauseDelayOnHover: true, 
                        continueDelayOnInactiveTab: false, 
                        title: "Exception", 
                        msg: "Error occured while creating the audit. Please try again.",
                    });
                }
                else if(data[0]["RET"] == "-1")
                {
                    Lobibox.notify("warning", { 
                        pauseDelayOnHover: true, 
                        continueDelayOnInactiveTab: false, 
                        title: "Exception", 
                        msg: "Error occured while inserting locations and users. Please try again.",
                    });
                }
            }
        });
    }

    
</script>