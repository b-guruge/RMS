<?php 
  if($_SESSION['exceptionFlag'] == 1)
  {
    echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>'. $_SESSION['exceptionHeader'] .'</h4>
            '. $_SESSION['exceptionMsg'] .'
          </div>';
  }
?>
<!-- Button trigger modal -->
<button type="button" id="triggerPass" style="display:none" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#passModel"></button>

<div class="modal fade" id="passModel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="closeModel" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Password Required</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Current Password (*)</label>
                            <input type="password" id="curpass" class="form-control pull-right" >
                        </div>
                        <!-- /.form group -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" id="btnConfirm" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

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
        echo '<form id="testForm" method="post">
        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Basic Details</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Salutation</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-edit"></i>
                                  </div>
                                  <select class="form-control select2" id="SalId" style="width: 100%;">';
                                    $oper = new DBOperations();
                                    $resData = $oper->getSalutations();
                                    for ($x = 0; $x < count($resData); $x++) {
                                      echo "<option value=".$resData[$x]['id'].">".$resData[$x]['val']."</option>";
                                    }
                                echo '</select>
                                </div>

                            </div>
                            <!-- /.form group -->
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Country</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-edit"></i>
                                  </div>
                                  <select id="country" class="form-control select2" style="width: 100%;">';
                                          $resData = $oper->getAllCountries();
                                          for ($x = 0; $x < count($resData); $x++) {
                                              echo "<option value=".$resData[$x]['id'].">".$resData[$x]['val']."</option>";
                                          }
                                  echo '</select>
                              </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" value="'. $_SESSION['firstName'] .'" class="form-control pull-right" id="fname">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" value="'. $_SESSION['lastName'] .'" class="form-control pull-right" id="lname">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Known name</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" value="'. $_SESSION['knownName'] .'" class="form-control pull-right" id="kname">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>User Level</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" value="'. $_SESSION['userLevel'] .'" class="form-control pull-right" id="ulevel">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>User Email</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" value="'. $_SESSION['email'] .'" class="form-control pull-right" id="email">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>


                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer">
                        Please edit only the necessary details
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            </div>

            <div class="col-md-12">
                <!-- Default box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Login Details</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Username</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" value="'. $_SESSION['userName'] .'" class="form-control pull-right" id="uname">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="password" class="form-control pull-right" id="pword" autocomplete="off">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="conpword" autocomplete="off">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>

                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="button" id="btnUpdate" onclick="val_form()" class="btn btn-primary">Update</button>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            </div>


        </div>
    </form>';
      }
    ?>

</section>
<!-- /.content -->
<script>
    function clean_passwords() {
        $("#pword").val("");
        $("#conpword").val("");
        $("#pword").closest(".form-group").removeClass("has-warning");
        $("#pword").closest(".form-group").removeClass("has-success");
        $("#conpword").closest(".form-group").removeClass("has-warning");
        $("#conpword").closest(".form-group").removeClass("has-success");
    }

    $(document).ready(function () {
        //change this after uploading to server
        //$("#country option:contains("+ <?php //echo $operations->ip_info($operations->getUserIpAddr(), "Address"); ?> +")").attr('selected', 'selected');
        $("#SalId option:contains(<?php echo $_SESSION["salutation"];?>)").attr('selected', 'selected');
        $("#country option:contains(Sri Lanka)").attr('selected', 'selected');
        $('#country').select2().trigger('change');

        $("#btnConfirm").on("click", function () {
            if ($.trim($("#curpass").val()) == "") {
                notify("warning", "Current Password", "Please Enter your Current Password to proceed!");
                return;
            }
            else {
                alert("Goes to DB"); //implement
            }
        });
        
        $("#conpword").keyup(function () {
            if ($.trim($("#pword").val()) === $.trim($("#conpword").val())) {
                $(this).closest(".form-group").removeClass("has-warning");
                $(this).closest(".form-group").addClass("has-success");
            }
            else {
                $(this).closest(".form-group").removeClass("has-success");
                $(this).closest(".form-group").addClass("has-warning");
            }
                
        });

        $(":text").focus(function () {
            if ($(this).closest(".form-group").hasClass("has-error"))
                $(this).closest(".form-group").removeClass("has-error");
        });



    });

    function val_form() {

        var errorList = []; //for storing each error

        if ($.trim($("#pword").val()) !== $.trim($("#conpword").val())) {
            clean_passwords();
            notify("warning", "Password Mismatch", "Please Re-Enter your new password");
            $("#pword").val(""); //Clearing new password
            $("#conpword").val(""); //Clearing new password confirm
            $("#pword").focus();
            return;
        }
        if ($.trim($("#fname").val()) == "" || !check_alpha($("#fname").val())) {
            errorList.push("#fname");
        }
        if ($.trim($("#lname").val()) == "" || !check_alpha($("#lname").val())) {
            errorList.push("#lname");
        }
        if ($.trim($("#kname").val()) == "" || !check_alpha($("#kname").val())) {
            errorList.push("#kname");
        }
        if ($.trim($("#uname").val()) == "") {
            errorList.push("#uname");
        }
        if ($.trim($("#email").val()) == "") {
            errorList.push("#email");
        }
        if ($.trim($("#ulevel").val()) == "") {
            errorList.push("#ulevel");
        }
        if (!$.trim($("#pword").val()) === $.trim($("#conpword").val())) {
            errorList.push("#pword");
            errorList.push("#conpword");
        }

        if (errorList.length > 0) {
            $.each(errorList, function (index, value) {
                $(value).closest(".form-group").addClass("has-error");
                $("#closeModel").click();
            });
            notify("warning", "Details Required", "Please insert the correct details!");
        }
        else {
            $("#curpass").val(""); //Clearing password on model load
            $("#triggerPass").click(); //to open the password model
        }
    }
</script>