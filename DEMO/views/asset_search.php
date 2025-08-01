<?php 
    require_once("controller/dbOperations.php");
    $accessDB = new DBOperations();
?>
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<style>
  @media screen and (max-width: 500px)
  {
    .table_scroll {
      overflow-x: auto;
    }

    table {
      width: 100%;
    }
  }
</style>

<section class="content">

    <div class="row">
        <div class="col-xs-12">
          
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Asset Store Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table_scroll">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Asset Name</th>
                  <th>EPC</th>
                  <th>Zone</th>
                  <th>Line</th>
                  <th>Level</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  
                    $assets = $accessDB->getStoredAssets();

                    foreach($assets as $value)
                    {
                        echo '
                        <tr>
                            <td>'.$value["asset_name"].'</td>
                            <td>'.$value["tag_id"].'</td>
                            <td>'.$value["zone_name"].'</td>
                            <td>'.$value["line_name"].'</td>
                            <td>'.$value["level_name"].'</td>
                        </tr>
                        ';
                    }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Asset Name</th>
                    <th>EPC</th>
                    <th>Zone</th>
                    <th>Line</th>
                    <th>Level</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
       
        </div>
        <!-- /.col -->
    </div>

</section>

<!-- DataTables -->
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable({responsive: true});
  });
</script>