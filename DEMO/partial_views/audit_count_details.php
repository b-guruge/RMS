<?php

ini_set('error_log', 'errors.log');

require_once("../controller/dbOperations.php");
require_once("../controller/config.php");
$accessDB = new DBOperations();

if(isset($_GET["company"]))
{
    $audit_counts = $accessDB->get_audit_counts_partial($_GET["company"]);

    echo '<div class="col-lg-4 col-xs-12 col-md-4">
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
    </div>';
}

?>