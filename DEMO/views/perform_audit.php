<?php 
require_once ('controller/constants.php');  
?>
<style>
.glow_green {
	 -moz-box-shadow:    inset 0 0 10px #269c19;
   -webkit-box-shadow: inset 0 0 10px #269c19;
   box-shadow:         inset 0 0 10px #269c19;
}
</style>
<script type="text/javascript" src="Scripts/BrowserPrint/BrowserPrint-2.0.0.75.min.js"></script>
<!-- Main Content -->
<section class="content">

<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="model_tit">Default Modal</h4>
              </div>
              <div class="modal-body" id="load_details_table">
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <button type="button" id="launch_model" style="display:none;" class="btn btn-default" data-toggle="modal" data-target="#modal-default">Launch Modal</button>

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
        $started_loc = $accessDB->getStartedAuditLocation();
        if($started_loc[0]["started_flag"] > 0)
        {
            //location audit is incomplete
            $audit_counts = $accessDB->get_audit_counts();

            echo '<div class="alert alert-default alert-dismissible">
                <h4><i class="icon fa fa-circle"></i>Current Location : '.$started_loc[0]["location"].'</h4>
                Total Assets : <b>'.$audit_counts[0]["TOT_COUNT"].'</b>

                <div class="row">
                    <div class="col-md-12" style="padding-top:15px;">
                        <button type="button" onclick="complete_audit()" id="end_audit" class="btn btn-primary btn-sm">Complete Location</button>
                    </div>
                </div>

            </div>';

            echo '
            
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Scan Barcode</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <input id="barcode" type="text" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" id="search" class="btn btn-block btn-primary btn-sm">Search</button>
                        </div>
                    </div>
                    
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            
            ';

            echo '
            
            <div class="row" id="refresh_values">
                    
                <div class="col-lg-4 col-xs-12 col-md-4">
                <!-- small box -->
                    <div class="small-box bg-green" onclick="getAssetTable(1)">
                        <div class="inner">
                        <h3 id="found_assets">'.$audit_counts[0]["BL_COUNT"].'</h3>
                        <p>Found Assets</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-cube"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-12 col-md-4">
                <!-- small box -->
                    <div class="small-box bg-aqua" onclick="getAssetTable(2)">
                        <div class="inner">
                        <h3 id="non_belongings">'.$audit_counts[0]["NBL_COUNT"].'</h3>
                        <p>Non - Belonging Assets</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-cube"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-12 col-md-4">
                <!-- small box -->
                    <div class="small-box bg-red" onclick="getAssetTable(3)">
                        <div class="inner">
                        <h3 id="not_found">'.$audit_counts[0]["NTI_COUNT"].'</h3>
                        <p>Not Found Assets</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-cube"></i>
                        </div>
                    </div>
                </div>

            </div>

            ';
        }
        else
        {
            //location audit is not started
            $unfinished_audit_locs = $accessDB->getUnfinishedAuditLocation();
            
            echo '
            
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Location</h3>
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
                                <label>Location</label>
                                <select id="Location" onchange="getTotalAssetCount()" class="form-control select2" style="width: 100%;">
                                    <option selected="selected" value="-1">Please Select a Location</option>';
                                        for ($x = 0; $x < count($unfinished_audit_locs); $x++) {
                                            echo "<option value=".$unfinished_audit_locs[$x]["id"].">".$unfinished_audit_locs[$x]["val"]."</option>";
                                        }
                                echo '</select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h4 style="display:none;" class="text" id="lbl_tot_asset_count">Total Assets : <small class="label label-success" id="tot_asset_count">0</small></h4>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button" id="start_audit" onclick="confirm_audit_start()" class="btn btn-primary btn-sm">Start Audit</button>
                            <!-- <button type="button" onclick="test_excel()" class="btn btn-primary btn-sm">Excel</button> -->
                        </div>
                    </div>
                    
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            ';

            echo '
            
            <div class="row">
                    
                <div class="col-lg-4 col-xs-12 col-md-4">
                <!-- small box -->
                    <div class="small-box bg-green" onclick="getAssetTable(1)">
                        <div class="inner">
                        <h3 id="found_assets">0</h3>
                        <p>Found Assets</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-cube"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-12 col-md-4">
                <!-- small box -->
                    <div class="small-box bg-aqua" onclick="getAssetTable(2)">
                        <div class="inner">
                        <h3 id="non_belongings">0</h3>
                        <p>Non - Belonging Assets</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-cube"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-12 col-md-4">
                <!-- small box -->
                    <div class="small-box bg-red" onclick="getAssetTable(3)">
                        <div class="inner">
                        <h3 id="not_found">0</h3>
                        <p>Not Found Assets</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-cube"></i>
                        </div>
                    </div>
                </div>

            </div>

            ';

        }
    
  }
  else
  {
    echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i>No Audit Available</h4>
        Please create a new audit and start performing.
    </div>';
  }
?>       

</section>

<script>

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();

        $("#barcode").on('keyup', function (e) {
            if (e.key === 'Enter' || e.keyCode === 13) {
                getBarcodeDetails($("#barcode").val());
            }
        });

        $("#search").on('click', function (e) {
            getBarcodeDetails($("#barcode").val());
        });

    });

    function getAssetTable(value)
    {
        $("#launch_model")[0].click();
        setTimeout(
                function() 
                {
                    //value : 1 - BL, 2 - NBL, 3 - NTI
        var company = "<?php echo $_SESSION["company"];?>";
        if(value == "")
        {
            $("#load_details_table").empty();
        }
        else
        {
            $("#load_details_table").load("partial_views/model_found_assets.php?company="+company+"&value=" + value);
        }

        if(value == 1)
        {
            $("#model_tit").html("<?php echo $found_assets_title;?>")
        }
        else if(value == 2)
        {
            $("#model_tit").html("<?php echo $nbl_assets_title;?>")
        }
        else if(value == 3)
        {
            $("#model_tit").html("<?php echo $nti_assets_title;?>")
        }
                }, 100);
        
        
        
    }

    function light_bulb()
    {
        $('body').addClass('glow_green');
        setTimeout(function() { 
            $('body').removeClass('glow_green');
        }, 250);
    }

    function confirm_audit_start()
    {
        //$("#Location option:selected").text();
        if($("#Location").val() == "-1")
        {
            Lobibox.notify("warning", { 
                    pauseDelayOnHover: true, 
                    continueDelayOnInactiveTab: false, 
                    title: "Exception", 
                    msg: "Please select a location to start the audit.",
                });
        }
        else
        {
            Lobibox.confirm({
                title: "Confirmation",
                className: 'info',
                showClass: 'zoomIn',
                hideClass: 'zoomOut',
                msg: "Are you sure you wish to start the audit in " + $("#Location option:selected").text() + "?",
                callback: function ($this, type, ev) {
                    if (type == "yes") {
                        updateAuditStart();
                    }
                    else {
                        return;
                    }
                }
            });

        }
    }

    function updateAuditStart()
    {
        var loc_id = $("#Location").val();

        $.get("controller/getDB.php",{
            method:"update_audit_start",
            loc_id:loc_id
        },
        function(ret){
            var data = $.parseJSON(ret);
            if(data[0]["RET"] == "1")
            {
                location.reload();
            }
            else
            {
                Lobibox.notify("warning", { 
                    pauseDelayOnHover: true, 
                    continueDelayOnInactiveTab: false, 
                    title: "Exception", 
                    msg: "Error occured while starting the audit. Please try again.",
                });
            }
        });
    }

    function complete_audit()
    {
        $.get("controller/getDB.php",{
            method:"get_last_audit_location_flag",
        },
        function(ret){
            var data = $.parseJSON(ret);

            if(data[0]["LAST_LOCATION_FLAG"] == "1")
            {
                //comlpete entire audit with current location
                Lobibox.confirm({
                    title: "Confirmation",
                    className: 'info',
                    showClass: 'zoomIn',
                    hideClass: 'zoomOut',
                    msg: "Audit will be completed with this location. Are you sure you wish to end the Audit?",
                    callback: function ($this, type, ev) {
                        if (type == "yes") {
                            //end the audit
                            endAudit("2");
                        }
                        else {
                            return;
                        }
                    }
                });
            }
            else
            {
                //comlpete current audit location
                Lobibox.confirm({
                    title: "Confirmation",
                    className: 'info',
                    showClass: 'zoomIn',
                    hideClass: 'zoomOut',
                    msg: "Are you sure you wish to end the current audit location ?",
                    callback: function ($this, type, ev) {
                        if (type == "yes") {
                            //end the current location
                            endAudit("1");
                        }
                        else {
                            return;
                        }
                    }
                });
            }

        });
    }

    function endAudit(value)
    {
        //value : 1 = only location, 2 = audit_completion
        var method = "";
        if(value == "1")
            method = "end_current_location";
        else
            method = "complete_audit";
        
        $.get("controller/getDB.php",{
            method:method,
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
                    msg: "Audit is ended successfully.",
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
                    msg: "Error occured while ending the audit. Please try again.",
                });
            }
        });
    }

    function getTotalAssetCount()
    {
        var loc_id = $("#Location").val();

        if(loc_id == "-1")
        {
            $("#tot_asset_count").html("0");
            $("#lbl_tot_asset_count").css("display","none");
        }
        else
        {
            $.get("controller/getDB.php",{
                method:"get_total_asset_count_for_location",
                loc_id:loc_id
            },
            function(ret){
                var data = $.parseJSON(ret);
                $("#tot_asset_count").html(data[0]["asset_count"]);
                $("#lbl_tot_asset_count").css("display","");
            });
        }

        
    }

    function test_excel()
    {
        $.get("controller/getDB.php",{
            method:"create_audit_summary_excel",
        },
        function(ret){
            var data = $.parseJSON(ret);
            return;
        });
    }

    function getBarcodeDetails(barcode)
    {
        $("#barcode").val('');
        var barcode = barcode;
        var company = "<?php echo $_SESSION["company"];?>";

        $.get("controller/getDB.php",{
            method:"update_audit_barcode_read",
            barcode:barcode
        },
        function(ret){
            var data = $.parseJSON(ret);
            if(data[0]["RET"] == "1")
            {
                //success
                $("#refresh_values").load("partial_views/audit_count_details.php?company="+company);
                $("#barcode").focus();
                return;
            }
            else
            {
                //barcode not in database
                return;
            }
        });
    }
    
</script>