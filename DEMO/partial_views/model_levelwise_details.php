<?php

ini_set('error_log', 'errors.log');

require_once("../controller/dbOperations.php");
require_once("../controller/config.php");
$accessDB = new DBOperations();


if(isset($_GET["zoneId"]) && isset($_GET["lineId"]) && isset($_GET["levelId"]))
{
    $res = $accessDB->getLevelDetails($_GET["zoneId"],$_GET["lineId"],$_GET["levelId"]);
    $html = '';
    if(count($res) > 1 && count($res[1]) > 0)
    {
        $html = '
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pallet Information</h4>
                <small><b>'.$res[0][0]["zone_name"].' -> '.$res[0][0]["line_name"].' -> '.$res[0][0]["level_name"].'</b></small>
                </div>
                <div class="modal-body">';

                $i = 1;

        foreach($res[1] as $val)
        {
        $html = $html . '
        <div class="panel box box-primary">
            <div class="box-header with-border">
                <h4 class="box-title">
                <a data-toggle="collapse" class="collapsed" aria-expanded="false" data-parent="#accordion" href="#'.$i.'">
                    '.$val["asset_name"].'
                </a>
                </h4>
            </div>
            <div id="'.$i.'" class="panel-collapse collapse">
                <div class="box-body">
                    <p><b>Pallet Chit No : </b> '.$val["pallet_chit_no"].'</p>
                    <p><b>Model : </b> '.$val["model_name"].'</p>
                    <p><b>Caliper : </b> '.$val["caliper"].'</p>
                    <p><b>Shade : </b> '.$val["color_name"].'</p>
                    <p><b>Boxes for Pallet : </b> '.$val["boxes"].'</p>
                    <p><b>Lot No. : </b> '.$val["lot_no"].'</p>
                    <p><b>Tag ID : </b> '.$val["tag_id"].'</p>
                </div>
            </div>
        </div>
        ';

        $i = $i + 1;

        }

        $html = $html . '
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        ';

        echo $html;
    }
    else
    {
        echo '
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Pallet Information</h4>
            <small><b>'.$res[0][0]["zone_name"].' -> '.$res[0][0]["line_name"].' -> '.$res[0][0]["level_name"].'</b></small>
            </div>
            <div class="modal-body">
            <p>No Data Found</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        ';
    }

}
else
{
    echo '
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Pallet Information</h4>
        </div>
        <div class="modal-body">
        <p>No Data Found</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    ';
}


?>