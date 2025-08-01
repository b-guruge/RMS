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
    <div class="col-md-12">
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Products - <i id="grnid"><?php $assets = $accessDB->getUniqueGRNID(); echo $assets[0]["uni_grn"]; ?></i></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Product Code</th>
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
                        echo '<td>'.$value["product_code"].'</td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Product Code</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>
</div>

<div class="row">
    <div class="col-md-6">
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
                            <label>Batch No.</label>
                            <input id="batchNo" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            <label>UOM</label>
                            <input id="uom" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            <label>Carton Qty</label>
                            <input id="CartonQty" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            <label>Price</label>
                            <input id="price" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Expiry Date</label>
                            <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input id="ExpDate" type="text" class="form-control pull-right" id="datepicker">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <!-- text input -->
                        <div class="form-group">
                            <label>Master Carton Pack Size</label>
                            <input id="MCPackSize" type="text" class="form-control" placeholder="Enter ...">
                        </div>
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
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-6">
        <!-- Default box -->
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Enter Quantities</h3>
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
                            <label>Loose Qty</label>
                            <input id="looseQty" type="text" class="form-control" placeholder="0">
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            <label>Damage Qty</label>
                            <input id="damageQty" type="text" class="form-control" placeholder="0">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Short Qty</label>
                            <input id="shortQty" type="text" class="form-control" placeholder="0">
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            <label>Total Qty</label>
                            <input id="totalQty" type="text" class="form-control" placeholder="0">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="button" onclick="validateForm();" class="btn btn-block btn-primary btn-sm">Save</button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" onclick="location.reload();" class="btn btn-block btn-warning btn-sm">Clear</button>
                    </div>
                </div>
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

    var GLOBAL_SEL_TR = "";

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
        $('#example1').DataTable();

        //Date picker
        $('#ExpDate').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        }).datepicker("setDate", new Date());
    });

    $(document).ready(function() {

        $('#example1 tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
                GLOBAL_SEL_TR = "";
            }
            else {
                $('#example1').DataTable().$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                GLOBAL_SEL_TR = $(this).attr('data-id');
            }
        });

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

        if(GLOBAL_SEL_TR == ""){
            Lobibox.notify("warning", { 
                    pauseDelayOnHover: true, 
                    continueDelayOnInactiveTab: false, 
                    title: "Product", 
                    msg: "Please select a product first",
                });
            return;
        }
        if(Date.parse($('#ExpDate').val()) < Date.parse(getCurrentDate())){
            $("#ExpDate").closest(".form-group").addClass("has-error");
            Lobibox.notify("warning", { 
                    pauseDelayOnHover: true, 
                    continueDelayOnInactiveTab: false, 
                    title: "Expiry Date", 
                    msg: "Please check the expiry date",
                });
            return;
        }
        if($.trim($('#batchNo').val()) == ""){
            errorList.push("#batchNo");
        }
        if($.trim($('#uom').val()) == ""){
            errorList.push("#uom");
        }
        if($.trim($('#CartonQty').val()) == ""){
            errorList.push("#CartonQty");
        }
        if($.trim($('#price').val()) == ""){
            errorList.push("#price");
        }
        if($.trim($('#MCPackSize').val()) == ""){
            errorList.push("#MCPackSize");
        }
        if($('#Location').val() == "-1"){
            errorList.push("#Location");
        }
        if($('#currency').val() == "-1"){
            errorList.push("#currency");
        }
        if($.trim($('#totalQty').val()) == ""){
            errorList.push("#totalQty");
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
            method:"save_grn_sunshine",
            asset_id:GLOBAL_SEL_TR,
            bno:$.trim($('#batchNo').val()),
            exp_date:$('#ExpDate').val(),
            uomem:$('#uom').val(),
            car_p_size:$.trim($('#MCPackSize').val()),
            car_qty:$.trim($('#CartonQty').val()),
            l_qty:$('#looseQty').val(),
            s_qty:$('#shortQty').val(),
            d_qty:$('#damageQty').val(),
            tot_qty:$('#totalQty').val(),
            loc:$('#Location').val(),
            price_in:$.trim($('#price').val()),
            curr:$('#currency').val()
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