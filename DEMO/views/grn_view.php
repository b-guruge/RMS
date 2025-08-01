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
              <h3 class="box-title">GRN Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Product Code</th>
                  <th>Batch No</th>
                  <th>Expiry Date</th>
                  <th>UOM</th>
                  <th>Carton Pack Size</th>
                  <th>Carton Qty</th>
                  <th>Loose</th>
                  <th>Short</th>
                  <th>Damaged</th>
                  <th>Total Qty</th>
                  <th>Location</th>
                  <th>Price</th>
                  <th>In Date</th>
                  <th>In Time</th>
                </tr>
                </thead>
                <tbody>

                <?php 
                    $assets = $accessDB->viewAllGRN();
                    
                    foreach($assets as $value)
                    {
                        echo '
                        <tr data-id="'.$value["asset_id"].'">
                            <td>'.$value["asset_name"].'</td>
                            <td>'.$value["product_code"].'</td>
                            <td>'.$value["batch_no"].'</td>
                            <td>'.$value["expiry_date"].'</td>
                            <td>'.$value["uom"].'</td>
                            <td>'.$value["carton_pack_size"].'</td>
                            <td>'.$value["carton_qty"].'</td>
                            <td>'.$value["loose_qty"].'</td>
                            <td>'.$value["short_qty"].'</td>
                            <td>'.$value["damage_qty"].'</td>
                            <td>'.$value["total_qty"].'</td>
                            <td>'.$value["location"].'</td>
                            <td>'.$value["price"].'</td>
                            <td>'.$value["in_date"].'</td>
                            <td>'.$value["in_time"].'</td>
                        </tr>
                        ';
                    }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Batch No</th>
                    <th>Expiry Date</th>
                    <th>UOM</th>
                    <th>Carton Pack Size</th>
                    <th>Carton Qty</th>
                    <th>Loose</th>
                    <th>Short</th>
                    <th>Damaged</th>
                    <th>Total Qty</th>
                    <th>Location</th>
                    <th>Price</th>
                    <th>In Date</th>
                    <th>In Time</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>
</div>

</section>

<script>

    var GLOBAL_SEL_TR = "";

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
        //$('#example1').DataTable();

        $('#example1').DataTable({
            "scrollX": true
        });
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

    });

    
</script>