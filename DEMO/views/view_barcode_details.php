<style>
.glow_green {
	 -moz-box-shadow:    inset 0 0 10px #269c19;
   -webkit-box-shadow: inset 0 0 10px #269c19;
   box-shadow:         inset 0 0 10px #269c19;
}
</style>
<script type="text/javascript" src="Scripts/BrowserPrint/BrowserPrint-2.0.0.75.min.js"></script>
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

<!-- Default box -->
<div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Scan Barcode</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <input id="barcode" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="button" id="search" class="btn btn-block btn-primary btn-sm">Search</button>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                            <i class="fa fa-file"></i>
                            <h3 class="box-title">Product Description</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                            <dl class="dl-horizontal" id="description">
                                
                            </dl>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>

                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

</section>

<script>

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();

        $("#barcode").on('keyup', function (e) {
            if (e.key === 'Enter' || e.keyCode === 13) {
                getBarcodeDetails($("#barcode").val());
            }
        });

        $("#search").on('click', function (e) {
            getBarcodeDetails($("#barcode").val());
        });

    });

    function light_bulb()
    {
        $('body').addClass('glow_green');
        setTimeout(function() { 
            $('body').removeClass('glow_green');
        }, 250);
    }

    function getBarcodeDetails(barcode)
    {
        light_bulb();
        $("#barcode").val('');
        $("#description").empty();
        var extract = barcode.substring(0, 6);
        var uni_id = extract.substr(extract.length - 4);
        var auto_string = extract.slice(0, 2);

        $.get("controller/getDB.php",{
            method:"get_barcode_details",
            uni_id:uni_id,
            auto_string:auto_string
        },
        function(ret){
            var data = $.parseJSON(ret);

            $("#description").append("<dt>Barcode</dt><dd>"+ barcode +"</dd>");
            $("#description").append("<dt>"+data[0]["print_method"]+"</dt><dd>"+ data[1]["print_method"] +"</dd>");
            $("#description").append("<dt>"+data[0]["product_code"]+"</dt><dd>"+ data[1]["product_code"] +"</dd>");
            $("#description").append("<dt>"+data[0]["asset"]+"</dt><dd>"+ data[1]["asset"] +"</dd>");
            $("#description").append("<dt>"+data[0]["batch_no"]+"</dt><dd>"+ data[1]["batch_no"] +"</dd>");
            $("#description").append("<dt>"+data[0]["price"]+"</dt><dd>"+ data[1]["price"] +"</dd>");
            $("#description").append("<dt>"+data[0]["print_date"]+"</dt><dd>"+ data[1]["print_date"] +"</dd>");
            $("#description").append("<dt>"+data[0]["print_time"]+"</dt><dd>"+ data[1]["print_time"] +"</dd>");
        });
    }
    
</script>