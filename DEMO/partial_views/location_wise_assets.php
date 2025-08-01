<?php

ini_set('error_log', 'errors.log');

require_once("../controller/dbOperations.php");
require_once("../controller/config.php");
$accessDB = new DBOperations();

if(isset($_GET["location_id"]))
{
    
    echo '<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Product Name</th>
        <th>Description</th>
        <th>Asset No.</th>
        <th>Serial No.</th>
    </tr>
    </thead>
    <tbody>';

        $assets = $accessDB->getProductsForLoc($_GET["company"],$_GET["location_id"]);
        foreach($assets as $value)
        {
            echo '<tr data-id="'.$value["asset_id"].'">';
            echo '<td>'.$value["asset_name"].'</td>';
            echo '<td>'.$value["description"].'</td>';
            echo '<td>'.$value["asset_no"].'</td>';
            echo '<td>'.$value["serial_no"].'</td>';
            echo '</tr>';
        }

    echo '</tbody>
    <tfoot>
    <tr>
        <th>Product Name</th>
        <th>Description</th>
        <th>Asset No.</th>
        <th>Serial No.</th>
    </tr>
    </tfoot>
    </table>';
}

?>
<script>
    $(function () {
        $('#example1').DataTable();
    });
</script>