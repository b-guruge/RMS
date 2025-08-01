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
                <h3 class="box-title">Softwares</h3>
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
                        <select id="Software" onchange="setUrl(this.options[this.selectedIndex].getAttribute(\'data-url\'))" class="form-control select2" style="width: 100%;">
                        <option selected="selected" value="-1">Please Select a Software</option>';

                            $operations = new DBOperations();
                            $resData = $operations->getAllSoftware();
                            for ($x = 0; $x < count($resData); $x++) {
                                echo "<option data-url=".$resData[$x]["download_path"]." value=".$resData[$x]["id"].">".$resData[$x]["software"]."</option>";
                            }
                        
                       echo '</select>
                </div>
                <a href="" style="display:none;" id="download_link" target="_blank"><button type="button" download>Download</button></a>
                <button type="button" onclick="getSoftware()" class="btn btn-primary btn-sm">Download</button>
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

    function getSoftware()
    {
        if(GLOBAL_SEL_URL == "-1" || GLOBAL_SEL_URL == "")
        {
            Lobibox.notify("warning",
            {
                msg: "Please Select a Software to download!"
            });
        }
        else
        {
            $("#download_link").attr("href",GLOBAL_SEL_URL);
            $('#download_link')[0].click();
        }
    }

    function setUrl(urlValue)
    {
        if($("#Software").val() == "-1")
        {
            GLOBAL_SEL_URL = "-1";
            $("#download_link").attr("href","");
            return;
        }
        else{
            GLOBAL_SEL_URL = urlValue;
            return;
        }
         
        
    }
    
</script>