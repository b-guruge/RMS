<?php 

echo '
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Barcode Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="barTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Barcode</th>
                    <th>Date</th>
                    <th>Read Count</th>
                  </tr>
                </thead>
                <tbody id="">';
                require_once("../controller/dbOperations.php");
                $oper = new DBOperations();
                $resData = $oper->getReadBarcodes();
                for ($x = 0; $x < count($resData); $x++) {
                    echo "<tr><td>".($resData[$x]['barcode'])."</td><td>".($resData[$x]['date'])."</td><td>".($resData[$x]['count'])."</td></tr>";
                }
                echo '</tbody>
                <tfoot>
                  <tr>
                    <th>Barcode</th>
                    <th>Date</th>
                    <th>Read Count</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>';

?>

<script>
    $(function () {
      $('#barTable').DataTable();
    });
</script>