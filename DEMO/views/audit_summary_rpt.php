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
      <!-- Default box -->
      <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Audits</h3>
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
                <div class="col-md-6">
                        <select id="audit_id" class="form-control select2" style="width: 100%;">
                        <option selected="selected" value="-1">Please Select an Audit</option>';

                            $operations = new DBOperations();
                            $resData = $operations->getAllCompletedAudits();
                            for ($x = 0; $x < count($resData); $x++) {
                                echo "<option value=".$resData[$x]["id"].">".$resData[$x]["val"]."</option>";
                            }
                        
                       echo '</select>
                </div>
                <a href="" style="display:none;" id="download_link" target="_blank"><button type="button" download>Download</button></a>
                <button type="button" onclick="getReport()" class="btn btn-primary btn-sm">Download</button>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
      ';
  }
?>         
</section>

<script>

    var GLOBAL_SEL_URL = "";

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
    });

    function getReport()
    {
        if($("#audit_id").val() == "-1")
        {
            Lobibox.notify("warning",
            {
                msg: "Please Select an Audit to download reports!"
            });
        }
        else
        {
            $.get("controller/getDB.php",{
                method:"create_audit_summary_excel",
            },
            function(ret){
                var data = $.parseJSON(ret);
                return;
            });

            $("#download_link").attr("href","Excels/summary.xlsx");
            $('#download_link')[0].click();
        }
    }
    
</script>