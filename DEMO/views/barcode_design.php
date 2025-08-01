<script type="text/javascript" src="Scripts/BrowserPrint/BrowserPrint-2.0.0.75.min.js"></script>
<!-- Main Content -->
<section class="content">
<?php 
  require_once ('controller/constants.php');
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

<!-- Default box -->
<div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Printers</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select id="selected_device" onchange=onDeviceSelected(this); class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="-1">Please Select a Printer</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


        <div class="box box-primary">
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
                        <div class="form-group">
                            <label>Product</label>
                            <select id="assetid" onchange="getProductDetails()" onchange="" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="-1">Please Select a Product</option>';
                                <?php
                                $operations = new DBOperations();
                                $resData = $operations->getProducts();
                                for ($x = 0; $x < count($resData); $x++) {
                                    echo "<option value=".$resData[$x]["asset_id"].">".$resData[$x]["asset_name"]."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input id="Price" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Qty</label>
                            <input id="qty" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>GRN Details</label>
                            <select id="grnDetails" onchange="getAssetAndGrnDetails();" onchange="" class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="-1">Please Select a GRN Number</option>';
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Product Code</label>
                            <input id="PCode" type="text" readonly="true" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Batch No.</label>
                            <input id="BatchNo" type="text" readonly="true" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Sequence</label>
                            <input id="Ssequence" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button type="button" onclick="writeToSelectedPrinter()" class="btn btn-primary btn-sm">Print Label</button>
                    </div>
                </div>

            </div>
        </div>

</section>

<script>

    var unique_id = -1;
    var barcode_fixed_letter = "NA";
    var saved_flag = false;
    var selected_device;
    var devices = [];
    var autoflag = 1; //auto print

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
        getUniquePrintID();
    });

    function getUniquePrintID()
    {
        $.get("controller/getDB.php",{
            method:"get_unique_print_id",
            AutoFlag:1, //auto print
        },
        function(ret){
            var data = $.parseJSON(ret);
            if(data[0]["unique_id"] > 0)
            {
                unique_id = data[0]["unique_id"];
                barcode_fixed_letter = data[0]["fixed_letter"];
            }
            else
            {
                Lobibox.notify("warning", { 
                    pauseDelayOnHover: true, 
                    continueDelayOnInactiveTab: false, 
                    title: "DB connection error", 
                    msg: "could not connect to database"
                });
            }
        });
    }

    function setup()
    {
        //Get the default device from the application as a first step. Discovery takes longer to complete.
        BrowserPrint.getDefaultDevice("printer", function(device)
                {
            
                    //Add device to list of devices and to html select element
                    selected_device = device;
                    devices.push(device);
                    var html_select = document.getElementById("selected_device");
                    var option = document.createElement("option");
                    option.text = device.name;
                    html_select.add(option);
                    
                    //Discover any other devices available to the application
                    BrowserPrint.getLocalDevices(function(device_list){
                        for(var i = 0; i < device_list.length; i++)
                        {
                            //Add device to list of devices and to html select element
                            var device = device_list[i];
                            if(!selected_device || device.uid != selected_device.uid)
                            {
                                devices.push(device);
                                var option = document.createElement("option");
                                option.text = device.name;
                                option.value = device.uid;
                                html_select.add(option);
                            }
                        }
                        
                    }, function(){
                        Lobibox.notify("error",
                            {
                                msg: "Error getting local devices"
                            });	
                    },"printer");
                    
                }, function(error){
                    if(error == "")
                    {
                        Lobibox.notify("error",
                        {
                            msg: "No printers are configured"
                        });	
                    }
                    else
                    {
                        Lobibox.notify("error",
                        {
                            msg: error
                        });	
                    }
                    
                })
    }
    function getConfig(){
        BrowserPrint.getApplicationConfiguration(function(config){
            Lobibox.notify("success",
            {
                msg: JSON.stringify(config)
            });
        }, function(error){

            Lobibox.notify("error",
            {
                msg: JSON.stringify(new BrowserPrint.ApplicationConfiguration())
            });	
        })
    }
    function writeToSelectedPrinter()
    {
        if(selected_device === undefined || $("#selected_device").val() == "-1")
        {
            Lobibox.notify("error",
            {
                msg: "No Device Found."
            });	
            return;
        }
        if($('#PCode').val().length > "<?php echo $sun_pcode; ?>")
        {
            Lobibox.notify("warning",
            {
                msg: "<?php echo $sun_pcode_length_msg; ?>"
            });	
            return;
        }
        if($('#BatchNo').val().length < "<?php echo $sun_batch_min_char; ?>")
        {
            Lobibox.notify("warning",
            {
                msg: "<?php echo $sun_batch_min_char_length_msg; ?>"
            });	
            return;
        }
        if($('#Price').val().length > "<?php echo $sun_price; ?>")
        {
            Lobibox.notify("warning",
            {
                msg: "<?php echo $sun_price_length_msg; ?>"
            });
            return;
        }
        if($('#Ssequence').val().length > "<?php echo $sun_start_sequence; ?>")
        {
            Lobibox.notify("warning",
            {
                msg: "<?php echo $sun_start_sequence_msg; ?>"
            });
            return;
        }
        if(!$.isNumeric($('#Ssequence').val()))
        {
            Lobibox.notify("warning",
            {
                msg: "Start Sequence should be a numaric value."
            });
            return;
        }
        if(!$.isNumeric($('#qty').val()))
        {
            Lobibox.notify("warning",
            {
                msg: "Quantity has to be a numaric value."
            });
            return;
        }
        if($('#qty').val() <= 0)
        {
            Lobibox.notify("warning",
            {
                msg: "Quantity has to be a positive value"
            });
            return;
        }

        //var pcodeLast = $('#PCode').val().substr($('#PCode').val().length - 2);
        //var batchLast = $('#BatchNo').val().substr($('#BatchNo').val().length - 2);
        //var maxBarcodeValue = parseInt($('#Ssequence').val()) + parseInt($('#qty').val());

        var barcode = [];
        //barcode.push(pcodeLast);
        //barcode.push(batchLast);
        //barcode.push("<?php //echo $barcode_fixletter_manual; ?>");
        //barcode.push(pad(parseInt($('#Ssequence').val()), 6));

        barcode.push(barcode_fixed_letter);
        barcode.push(pad(unique_id, 4));
        barcode.push(pad(parseInt($('#Ssequence').val()), 6));
        var created_code = barcode.join("");

        var data = [];
        data.push("^XA");
        data.push("^FO0,17^APN,10,5^FB190,1,0,C^FD","<?php echo $barcode_title; ?>","^FS");
        data.push("^FO10,38^BY1^BCN,40,N,N,N^FD",created_code,"^FS");
        data.push("^FO5,82^APN,15,14^FB205,1,0,L^FD",created_code,"^FS");
        data.push("^FO110,82^GB0,18,3^FS");
        data.push("^FO10,82^APN,10,5^FB190,1,0,R^FD",$('#PCode').val(),"^FS");
        data.push("^FO0,102^AQN,10,5^FB250,1,0,C^FD",$('#Price').val(),"^FS");
        data.push("^PQ",$('#qty').val());
        data.push("^XZ");
        var dataToWrite = data.join("");

        savePrintDetails(); //need to get the return and then print
        selected_device.send(dataToWrite, undefined, errorCallback);
        
        //reload page
        setTimeout(
        function() 
        {
            location.reload();
        }, 5000);
        Lobibox.notify("success", {
            title: "Successful", 
            msg: "Data has been sent to the printer",
            onClick: function(){
                location.reload();
            }
        });
        
    }
    var readCallback = function(readData) {
        if(readData === undefined || readData === null || readData === "")
        {
            Lobibox.notify("warning",
            {
                msg: "No Response from Device"
            });	
        }
        else
        {
            Lobibox.notify("success",
            {
                msg: readData
            });	
        }
        
    }
    var errorCallback = function(errorMessage){
        Lobibox.notify("error",
            {
                msg: errorMessage
            });	
    }
    function readFromSelectedPrinter()
    {

        selected_device.read(readCallback, errorCallback);
        
    }
    function getDeviceCallback(deviceList)
    {
        Lobibox.notify("info",
            {
                msg: "Devices: \n" + JSON.stringify(deviceList, null, 4)
            });	
    }

    function sendImage(imageUrl)
    {
        url = window.location.href.substring(0, window.location.href.lastIndexOf("/"));
        url = url + "/" + imageUrl;
        selected_device.sendUrl(url, undefined, errorCallback)
    }
    function sendImageHttp(imageUrl)
    {
        url = window.location.href.substring(0, window.location.href.lastIndexOf("/"));
        url = url + "/" + imageUrl;
        url = url.replace("https", "http");
        selected_device.sendUrl(url, undefined, errorCallback)
    }
    function onDeviceSelected(selected)
    {
        for(var i = 0; i < devices.length; ++i){
            if(selected.value == devices[i].uid)
            {
                selected_device = devices[i];
                return;
            }
        }
    }
    window.onload = setup;
    

    function savePrintDetails()
    {
        $.post("controller/getDB.php",{
            method:"save_print_details",
            asset_id:$('#assetid').val(),
            grn_id:$('#grnDetails').val(),
            unique_id:unique_id,
            pcode:$('#PCode').val(),
            autoflag:autoflag,
            bno:$('#BatchNo').val(),
            price:$('#Price').val(),
            sseq:$('#Ssequence').val(),
            qty:$('#qty').val()
        },
        function(ret){
            var data = $.parseJSON(ret);
            if(data[0]["RET"] == "1")
            {
                saved_flag = true;
            }
            else
                saved_flag = false;
        });
    }

    function getProductDetails()
    {
        clearFields();
        if($("#assetid").val() == "-1")
        {
            $("#grnDetails >option").remove();
            $("#grnDetails").append(new Option("Please Select a GRN Number", "-1"));
            $("#grnDetails").trigger("updateResults");
            clearFields();
        }
        else
        {
            $.get("controller/getDB.php",{
                method:"get_grn_details_for_asset",
                asset_id:$("#assetid").val()
            },
            function(ret){
                var data = $.parseJSON(ret);
                $("#grnDetails >option").remove();
                $("#grnDetails").append(new Option("Please Select a GRN Number", "-1"));
                for(var a in data)
                {
                    $("#grnDetails").append(new Option(data[a]['val'], data[a]['id']));
                }
                $("#grnDetails").trigger("updateResults");
                
            });
        }
    }

    function clearFields()
    {
        $("#Price").val('');
        $("#PCode").val('');
        $("#qty").val('');
        $("#BatchNo").val('');
    }

    function getAssetAndGrnDetails()
    {
        if($("#grnDetails").val() == "-1")
        {
            clearFields();
            return;
        }
        if($("#assetid").val() == "-1")
        {
            Lobibox.notify("warning", { 
                    pauseDelayOnHover: true, 
                    continueDelayOnInactiveTab: false, 
                    title: "Asset", 
                    msg: "Please select an asset"
                });
                return;
        }
        else
        {
            $.get("controller/getDB.php",{
                method:"get_asset_and_grn_details",
                asset_id:$("#assetid").val(),
                grn_id:$("#grnDetails").val()
            },
            function(ret){
                var data = $.parseJSON(ret);
                $("#PCode").val(data[0]["product_code"]);
                $("#BatchNo").val(data[0]["batch_no"]);
                $("#Price").val(data[0]["price"] + " " + data[0]["currency"]);
                $("#qty").val(Math.trunc(data[0]["total_qty"]));
            });
        }
    }

</script>