<?php 
    require_once("controller/dbOperations.php");
    $accessDB = new DBOperations();
?>
<style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }

    .pointer {
        cursor: pointer;
        }

    .color-palette {
      height: 35px;
      line-height: 35px;
      text-align: center;
    }

    .color-palette-set {
      margin-bottom: 15px;
    }

    .color-palette span {
      display: none;
      font-size: 12px;
    }

    .color-palette-box h4 {
      position: absolute;
      top: 100%;
      left: 25px;
      margin-top: -40px;
      color: rgba(255, 255, 255, 0.8);
      font-size: 12px;
      display: block;
      z-index: 7;
    }
</style>
<script>
    function reload()
    {
        location.reload();
    }

    function get_level_details(zoneId, lineId, levelId)
    {
        $.ajax({
            url   : "partial_views/model_levelwise_details.php", 
            type  : "GET",
            data  : {
                zoneId : zoneId,
                lineId : lineId,
                levelId : levelId
            },
            success: function(output) {
                $("#modal-default").clear;
                $("#modal-default").html(output);
                $("#launch_model").click();
            }
        });
    }
</script>
<section class="content">

<div class="modal fade" id="modal-default">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Pallet Information</h4>
        </div>
        <div class="modal-body">
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Collapsible Group Item #1
                        </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body">
                        Anim pariatur cliche reprehenderit
                        </div>
                    </div>
                </div>
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Collapsible Group Item #1
                        </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body">
                        Anim pariatur cliche reprehenderit
                        </div>
                    </div>
                </div>
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

<div class="row" style="margin-bottom:20px;">
    <div class="col-md-6">
        <button type="button" onclick="reload();" class="btn btn-primary btn-sm">Refresh</button>
        <button type="button" id="launch_model" style="display:none;" class="btn btn-default" data-toggle="modal" data-target="#modal-default">Launch Default Modal</button>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Warehouse 1</h3>

            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            
            <div class="row">

                <?php 
                    $zones = $accessDB->getAllZones();
                    $lines = $accessDB->getAllLines();

                    foreach($zones as $val_zone)
                    {
                        echo '
                        
                        <div class="col-md-6">
                            <div class="box box-primary" style="border: 1px solid">
                            <div class="box-header with-border" style="background-color:#7ab4ff">
                                <h3 class="box-title">'.$val_zone["zone_name"].'</h3>

                                <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                            
                            <div class="row">
                            ';
                                
                                
                            foreach($lines as $val_line)
                            {
                                echo'
                                    <div class="col-sm-6 col-md-6">
                                        <h4 class="text-center">'.$val_line["line_name"].'</h4>';

                                        $levels = $accessDB->getLevelWiseData($val_zone["id"],$val_line["id"]);
                                        foreach($levels as $val_level)
                                        {
                                            echo'
                                                <!-- Progress bars -->
                                                <div class="clearfix pointer" onclick="get_level_details('.$val_zone["id"].','.$val_line["id"].','.$val_level["lvl_id"].');">
                                                    <span class="pull-left">'.$val_level["level_name"].'</span>
                                                    <small class="pull-right">'.$val_level["percentage"].'</small>
                                                </div>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: '.$val_level["percentage"].';"></div>
                                                </div>
                                            ';
                                        }
                                echo '
                                </div>';
                            }

                        echo '
                            </div>
                            </div>
                            <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        ';
                    }
                ?>

            </div>
                
            </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>



</section>