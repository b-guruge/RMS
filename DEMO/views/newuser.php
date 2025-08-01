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
<!-- Main Content -->
<section class="content">

        <form id="testForm" method="post">
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
                                    <select class="form-control select2" id="SalId" style="width: 100%;">
                                    <?php
                                        $oper = new DBOperations();
                                        $resData = $oper->getSalutations();
                                        for ($x = 0; $x < count($resData); $x++) {
                                        echo "<option value=".$resData[$x]['id'].">".$resData[$x]['val']."</option>";
                                        }
                                    ?>
                                    </select>
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
                                        <select id="country" class="form-control select2" style="width: 100%;">
                                        <?php
                                            $resData = $oper->getAllCountries();
                                            for ($x = 0; $x < count($resData); $x++) {
                                                echo "<option value=".$resData[$x]['id'].">".$resData[$x]['val']."</option>";
                                            }
                                        ?>
                                        </select>
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
                                        <input type="text" class="form-control pull-right" id="fname">
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
                                        <input type="text" class="form-control pull-right" id="lname">
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
                                        <input type="text" class="form-control pull-right" id="kname">
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
                                        <select id="uLevel" class="form-control select2" style="width: 100%;">
                                        <?php 
                                            $resData = $oper->getUserLevels();
                                            for ($x = 0; $x < count($resData); $x++) {
                                                echo "<option value=".$resData[$x]['id'].">".$resData[$x]['val']."</option>";
                                            }
                                        ?>
                                        </select>
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
                                        <input type="text" class="form-control pull-right" id="email">
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
                                        <input type="text" class="form-control pull-right" id="uname" autocomplete="off">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>

                        </div>

                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" id="btnUpdate" onclick="val_form()" class="btn btn-primary">Save</button>
                        </div>
                        <!-- /.box-footer-->
                    </div>
                    <!-- /.box -->
                </div>


            </div>
        </form>

</section>

<script>

    $(document).ready(function () {
        $(":text").focus(function () {
            if ($(this).closest(".form-group").hasClass("has-error"))
                $(this).closest(".form-group").removeClass("has-error");
        });

        //change this after uploading to server
        //$("#country option:contains("+ <?php //echo $operations->ip_info($operations->getUserIpAddr(), "Address"); ?> +")").attr('selected', 'selected');

        $("#uLevel option:contains(MEMBER)").attr('selected', 'selected');
        $('#uLevel').select2().trigger('change');

        $("#country option:contains(Sri Lanka)").attr('selected', 'selected');
        $('#country').select2().trigger('change');
    });

    function val_form() {

        var errorList = []; //for storing each error
        
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
        if ($.trim($("#email").val()) == "" || (!isEmail($.trim($("#email").val()))) ) {
            errorList.push("#email");
        }

        if (errorList.length > 0) {
            $.each(errorList, function (index, value) {
                $(value).closest(".form-group").addClass("has-error");
            });
            notify("warning", "Details Required", "Please insert the correct details!");
        }
        else {
            var Email = $("#email").val();
            var KnownName = $("#kname").val();
            var FirstName = $("#fname").val();
            var LastName = $("#lname").val();
            var UserName = $("#uname").val();
            var Salutation = $("#salutation").val();
            var UserLevel = $("#uLevel").val();

            $.post("controller/getDB.php",{
            method:"user_registration",
            Email:Email,
            KnownName:KnownName,
            LastName:LastName,
            UserName:UserName,
            Password:Password,
            ConPassword:ConPassword,
            Salutation:Salutation
            },
            function(ret){
                var data = $.parseJSON(ret);
                if(data[0]["RET"] == "user")
                {
                    $("#UserName").val('');
                    $("#UserName").closest(".form-group").addClass("has-error");
                    Lobibox.notify("warning", { pauseDelayOnHover: true, continueDelayOnInactiveTab: false, title: "USERNAME", msg: "Username Already Exists" });
                }
                else if (parseInt(data[0]["RET"]) > 0) {
                    clearFields();
                    Lobibox.notify("success", { pauseDelayOnHover: true, continueDelayOnInactiveTab: false, title: "Congratulations!", msg: "Please get the admin approval in order to use your login!" });
                }
                else {
                    Lobibox.notify("error", { title: "Failed!", msg: "Some error occured. Please try again after some time." });
                }
            });

            /*
            var uls = {};
            uls.Email = $("#email").val();
            uls.KnownName = $("#kname").val();
            uls.FirstName = $("#fname").val();
            uls.LastName = $("#lname").val();
            uls.UserName = $("#uname").val();
            uls.Salutation = $("#salutation").val();
            uls.UserLevel = $("#uLevel").val();

            $.ajax({
                url: '/User/CreateUser',
                dataType: "json",
                type: "POST",
                contentType: 'application/json; charset=utf-8',
                data: '{uls: ' + JSON.stringify(uls) + '}',
                success: function (ret) {
                    if (ret.resultID == "1") {
                        clearFields();
                        Lobibox.notify("success", { pauseDelayOnHover: true, continueDelayOnInactiveTab: false, title: "Congratulations!", msg: "A new user has been created successfully." });
                    }
                    else if (ret.resultID == "01") //username exists
                    {
                        $("#UserName").val('');
                        $("#UserName").closest(".form-group").addClass("has-error");
                        Lobibox.notify("warning", { pauseDelayOnHover: true, continueDelayOnInactiveTab: false, title: "USERNAME", msg: ret.result });
                    }
                    else if (ret.resultID == "02") //record could not be inserted
                    {
                        Lobibox.notify("warning", { pauseDelayOnHover: true, continueDelayOnInactiveTab: false, title: "SQL Error!", msg: ret.result });
                    }
                    else {
                        Lobibox.notify("error", { title: "Failed!", msg: ret.result });
                    }

                },
                error: function (xhr) {
                    Lobibox.notify("error", { title: "Error", msg: "JSON error occured!" });
                }
            }) */
        }
    }

    function clearFields() {
        $("#email").val('');
        $("#kname").val('');
        $("#fname").val('');
        $("#lname").val('');
        $("#uname").val('');
        //$("#salutation").val('1');
        //$("#uLevel").val('1');
    }
    
</script>