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

  if($_SESSION['exceptionFlag'] == 1)
  {
    
    echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>'. $_SESSION['exceptionHeader'] .'</h4>
            '. $_SESSION['exceptionMsg'] .'
          </div>';
  }
  else
  {
      
  echo '
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
    
</script>