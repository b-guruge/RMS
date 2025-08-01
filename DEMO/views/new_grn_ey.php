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
      
      ';
  }
?>         

<div class="row">
<div class="col-md-6">
        <!-- Default box -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Enter Main Details</h3>
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
                            <label>Asset Name</label>
                            <input id="asset_name" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" id="asset_desc" rows="5" placeholder="Enter ..."></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!--
                        <div class="form-group">
                            <label>Expiry Date</label>
                            <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input id="ExpDate" type="text" class="form-control pull-right" id="datepicker">
                            </div>
                        </div> -->
                        <!-- /.form group -->
                        <!-- text input -->
                        <div class="form-group">
                            <label>Asset No.</label>
                            <input id="asset_no" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            <label>Serial No.</label>
                            <input id="serial_no" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            <label>Capture Barcode</label>
                            <input id="barcode_id" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-6">
        <!-- Default box -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Enter Other Details</h3>
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
                            <label>PO No.</label>
                            <input id="POnumber" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            <label>Price</label>
                            <input id="price" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <!-- input -->
                        <div class="form-group">
                            <label>UOM</label>
                            <select id="uom" onchange="" class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="-1">Please Select a Unit</option>
                                <?php 
                                    $resData = $accessDB->getAllUnits();
                                    for ($x = 0; $x < count($resData); $x++) {
                                        echo "<option value=".$resData[$x]["id"].">".$resData[$x]["val"]."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!--
                        <div class="form-group">
                            <label>Expiry Date</label>
                            <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input id="ExpDate" type="text" class="form-control pull-right" id="datepicker">
                            </div>
                        </div> -->
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Location</label>
                            <select id="Location" onchange="" class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="-1">Please Select a Location</option>
                                <?php 
                                    $resData = $accessDB->getAllLocations();
                                    for ($x = 0; $x < count($resData); $x++) {
                                        echo "<option value=".$resData[$x]["id"].">".$resData[$x]["val"]."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Currency</label>
                            <select id="currency" onchange="" class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="-1">Please Select a Currency</option>
                                <?php 
                                    $resData = $accessDB->getAllCurrency();
                                    for ($x = 0; $x < count($resData); $x++) {
                                        echo "<option value=".$resData[$x]["id"].">".$resData[$x]["val"]."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <!-- text input -->
                        <!--
                        <div class="form-group">
                            <label>Total Qty</label>
                            <input id="totalQty" type="text" class="form-control" placeholder="0">
                        </div>
                        -->
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-12">
        <!-- Default box -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Enter Asset Details</h3>
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
                            <label>Acquisition Date</label>
                            <input id="ac_date" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            <label>Acquisition Cost</label>
                            <input id="ac_cost" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Depreciation Method</label>
                            <select id="dep_method" class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="-1">Please Select a Method</option>
                                <?php 
                                    $resData = $accessDB->getDepreciationMethods();
                                    for ($x = 0; $x < count($resData); $x++) {
                                        echo "<option value=".$resData[$x]["id"].">".$resData[$x]["val"]."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            <label>Useful Life (Years)</label>
                            <input id="use_life" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="button" onclick="validateForm();" class="btn btn-primary btn-sm">Save</button>
                        <button type="button" onclick="location.reload();" class="btn btn-warning btn-sm">Clear</button>
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
              <h3 class="box-title">Products</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" style="width:100%" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Asset No.</th>
                    <th>Serial No.</th>
                    <th>Location</th>
                </tr>
                </thead>
                <tbody>

                <?php 
                    $assets = $accessDB->getProducts();
                    foreach($assets as $value)
                    {
                        echo '<tr data-id="'.$value["asset_id"].'">';
                        echo '<td>'.$value["asset_name"].'</td>';
                        echo '<td>'.$value["description"].'</td>';
                        echo '<td>'.$value["asset_no"].'</td>';
                        echo '<td>'.$value["serial_no"].'</td>';
                        echo '<td>'.$value["location_name"].'</td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Asset No.</th>
                    <th>Serial No.</th>
                    <th>Location</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>
</div>

</section>

<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
        $('#example1').DataTable({
            "scrollX": true
        });

        $('#ac_date').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        }).datepicker("setDate", new Date());
    });

    $(document).ready(function() {

        $('#example1 tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                $('#example1').DataTable().$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
        $(":text").focus(function () {
            if ($(this).closest(".form-group").hasClass("has-error"))
                $(this).closest(".form-group").removeClass("has-error");
        });

        $("#asset_desc").focus(function () {
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

        if($.trim($('#asset_name').val()) == ""){
            errorList.push("#asset_name");
        }
        if($.trim($('#asset_desc').val()) == ""){
            errorList.push("#asset_desc");
        }
        if($.trim($('#asset_no').val()) == ""){
            errorList.push("#asset_no");
        }
        if($.trim($('#serial_no').val()) == ""){
            errorList.push("#serial_no");
        }
        if($.trim($('#barcode_id').val()) == ""){
            errorList.push("#barcode_id");
        }


        if($.trim($('#POnumber').val()) == ""){
            errorList.push("#POnumber");
        }
        if($.trim($('#price').val()) == ""){
            errorList.push("#price");
        }
        if($('#uom').val() == "-1"){
            errorList.push("#uom");
        }
        if($('#Location').val() == "-1"){
            errorList.push("#Location");
        }
        if($('#currency').val() == "-1"){
            errorList.push("#currency");
        }


        if($.trim($('#ac_date').val()) == ""){
            errorList.push("#ac_date");
        }
        if($('#dep_method').val() == "-1"){
            errorList.push("#dep_method");
        }
        if($.trim($('#ac_cost').val()) == ""){
            errorList.push("#ac_cost");
        }
        if($.trim($('#use_life').val()) == ""){
            errorList.push("#use_life");
        }

        if (errorList.length > 0) {
            $.each(errorList, function (index, value) {
                $(value).closest(".form-group").addClass("has-error");
            });
            Lobibox.notify("warning", { title: "Details Required", msg: "Please insert all details!" });
        }
        else
        {
            saveGRN();
        }
    }

    function saveGRN()
    {
        $.post("controller/getDB.php",{
            method:"save_new_grn_ey",
            asset_name:$.trim($('#asset_name').val()),
            asset_desc:$.trim($('#asset_desc').val()),
            asset_no:$.trim($('#asset_no').val()),
            serial_no:$.trim($('#serial_no').val()),
            barcode_id:$.trim($('#barcode_id').val()),

            POnumber:$.trim($('#POnumber').val()),
            price:$.trim($('#price').val()),
            uom:$('#uom').val(),
            Location:$('#Location').val(),
            curr:$('#currency').val(),

            ac_date:$.trim($('#ac_date').val()),
            dep_method:$('#dep_method').val(),
            ac_cost:$.trim($('#ac_cost').val()),
            use_life:$.trim($('#use_life').val())
        },
        function(ret){
            var data = $.parseJSON(ret);
            if(data[0]["RET"] == "1")
            {
                setTimeout(
                function() 
                {
                    location.reload();
                }, 5000);

                Lobibox.notify("success", { 
                    title: "Successful", 
                    msg: "GRN details have been saved successfully.",
                    onClick: function(){
                        location.reload();
                    }
                });
            }
            else if(data[0]["RET"] == "-10")
            {
                $('#barcode_id').closest(".form-group").addClass("has-error");
                $('#barcode_id').val('');
                $('#barcode_id').focus();

                Lobibox.notify("warning", { 
                    pauseDelayOnHover: true, 
                    continueDelayOnInactiveTab: false, 
                    title: "Barcode ID", 
                    msg: "Scanned Barcode ID is already available in the database.",
                });
            }
            else
            {
                Lobibox.notify("warning", { 
                    pauseDelayOnHover: true, 
                    continueDelayOnInactiveTab: false, 
                    title: "Exception", 
                    msg: "Error while inserting data to database. Please try again.",
                });
            }
        });
    }

    
</script>