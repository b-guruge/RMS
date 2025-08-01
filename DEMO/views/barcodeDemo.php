<!-- Main content -->
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
        //require 'dbOperations.php';
        $oper = new DBOperations();
        echo '
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Scan Details</h3>
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
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Barcode Text</label>
                    <input type="text" id="barTxt" class="form-control" placeholder="Barcode">
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        
        <div class="row">
          <div class="col-md-12" style="padding-bottom:10px;">
            <button type="button" onclick="clearTable();" class="btn btn-success btn-sm">Clear Table</button>
          </div>
        </div>
        
        <div id="bcodeDataTable">
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
            </div>
          </div>';
      }
    ?>
</section>
<!-- /.content -->

<script>

  function clearText()
  {
    $('#barTxt').val('');
    $('#barTxt').focus();
  }

  function loadTable()
  {
    $.post("views/_barcode_demo_table.php",{
          },
          function(ret){
            $("#bcodeDataTable").empty();
            $('#bcodeDataTable').html(ret);
          });
  }

  function clearTable()
  {
    $.post("controller/getDB.php",{
        method:"barcode_demo_clear",
      },
      function(ret){
        loadTable();
        clearText();
    });
  }

  $(function () {
    $('#barTable').DataTable();

    clearText();

    $('#barTxt').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
          $.post("controller/getDB.php",{
            method:"barcode_demo_add",
            barcode:$.trim($('#barTxt').val())
          },
          function(ret){
              var data = $.parseJSON(ret);
              if(data[0]["RET"] == "1")
              {
                  clearText();
                  loadTable();
                  //Lobibox.notify("success", { pauseDelayOnHover: true, continueDelayOnInactiveTab: false, title: "Successful", msg: "Barcode has been added" });
              }
              else
              {
                Lobibox.notify("warning", { pauseDelayOnHover: true, continueDelayOnInactiveTab: false, title: "Error", msg: "Unknown error occured. Please try again." });
              }
          });
        }
    });
  });
</script>