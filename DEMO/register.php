<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CATSYS Register</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Select 2 -->
    <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <!-- Lobibox -->
    <link rel="stylesheet" href="plugins/LobiBox/css/Lobibox.min.css" />

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background:url('Images/back2.jpg')">
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>CATSYS</b> PRT</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Register With Us</p>
            <form action="" method="post">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-edit"></i>
                        </div>
                        <select id="salutation" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" aria-hidden="true">
                            <option selected="selected" value="-1">Please Select a Salutation</option>
                            <?php 
                                require 'controller/dbOperations.php';
                                $operations = new DBOperations();
                                $resData = $operations->getSalutations();
                                for ($x = 0; $x < count($resData); $x++) {
                                    echo "<option value=".$resData[$x]['id'].">".$resData[$x]['val']."</option>";
                                }
                            ?>
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-edit"></i>
                        </div>
                        <select id="country" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="-1">Please Select a Country</option>
                            <?php 
                                $resData = $operations->getAllCountries();
                                for ($x = 0; $x < count($resData); $x++) {
                                    echo "<option value=".$resData[$x]['id'].">".$resData[$x]['val']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" id="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Known Name" id="Kname">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Last Name" id="Lname">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="User Name" id="UserName">
                    <span class="glyphicon glyphicon-thumbs-up form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" id="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Confirm Password" id="ConPassword">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
            </form>


            <div class="row">
                <!-- /.col -->
                <div class="col-xs-6">
                    <button id="regUser" onclick="insertUser()" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.social-auth-links -->
            <br />
            <a style="text-align:center; display:block;" href="login.php" class="text-center">Already a Member</a>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- Select 2 -->
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- Lobibox -->
    <script src="plugins/LobiBox/js/lobibox.min.js"></script>
    <!-- Customized Script for registration -->
    <script src="Scripts/Register.js"></script>
    <!--Custom validation-->
    <script src="Scripts/CustomValidation.js"></script>
    <script>
        $(function () {
            $(".select2").select2();
            //change this after uploading to server
            //$("#country option:contains("+ <?php //echo $operations->ip_info($operations->getUserIpAddr(), "Address"); ?> +")").attr('selected', 'selected');
            $("#country option:contains(Sri Lanka)").attr('selected', 'selected');
            $('#country').select2().trigger('change');
        });

        Lobibox.notify.DEFAULTS = $.extend({}, Lobibox.notify.DEFAULTS, {
            soundPath: 'plugins/LobiBox/sounds/',
            //write down all parameters you want to override
        });

        $(document).ready(function () {

            $(window).keydown(function (event) {
                if (event.keyCode == 13) {
                    insertUser();
                }
            });
        });

    </script>
</body>
</html>