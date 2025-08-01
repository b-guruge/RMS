<?php
error_reporting(0);
ini_set('error_log', 'errors.log');
require_once("../controller/dbOperations.php");
require_once("../controller/config.php");
$accessDB = new DBOperations();

if(isset($_GET["value"]))
{
    $html = "";
    if($_GET["value"] == "1" || $_GET["value"] == "3") //bl or nti
    {
        $html = $html . '<table id="example1" style="width:100%" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Asset No.</th>
            <th>Serial No.</th>
        </tr>
        </thead>
        <tbody>';

        $assets = $accessDB->getBlandNTIAssets($_GET["company"],$_GET["value"]);
        foreach($assets as $value)
        {
            $html = $html . '<tr data-id="'.$value["asset_id"].'">';
            $html = $html . '<td>'.$value["asset_name"].'</td>';
            $html = $html . '<td>'.$value["description"].'</td>';
            $html = $html . '<td>'.$value["asset_no"].'</td>';
            $html = $html . '<td>'.$value["serial_no"].'</td>';
            $html = $html . '</tr>';
            /*
            echo '<tr data-id="'.$value["asset_id"].'">';
            echo '<td>'.$value["asset_name"].'</td>';
            echo '<td>'.$value["description"].'</td>';
            echo '<td>'.$value["asset_no"].'</td>';
            echo '<td>'.$value["serial_no"].'</td>';
            echo '</tr>';
            */
        }

        $html = $html . '</tbody>
        <tfoot>
        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Asset No.</th>
            <th>Serial No.</th>
        </tr>
        </tfoot>
        </table>';

        echo $html;
    }
    else
    {
        echo '<table id="example1" style="width:100%" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Asset No.</th>
            <th>Serial No.</th>
            <th>Original Location</th>
        </tr>
        </thead>
        <tbody>';

        $assets = $accessDB->getBlandNTIAssets($_GET["company"],$_GET["value"]);
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

        echo '</tbody>
        <tfoot>
        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Asset No.</th>
            <th>Serial No.</th>
            <th>Original Location</th>
        </tr>
        </tfoot>
        </table>';
    }   

}

?>
<script>
    $(function () {
        $('#example1').DataTable({
            "scrollX": true
        });
    });
</script>