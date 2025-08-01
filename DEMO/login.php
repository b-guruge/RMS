<?php
  error_reporting(0);  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CATSYS Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- Lobibox -->
  <link rel="stylesheet" href="plugins/LobiBox/css/lobibox.min.css"/>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
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
          <p class="login-box-msg">Sign in to start your session</p>
          <form action="Login" method="post">
                <div class="form-group">
                    <select id="Company" class="form-control select2" style="width: 100%;">
                    <option selected="selected" value="-1">Please Select a Company</option>
                    <?php 
                        require 'controller/dbOperations.php';
                        $operations = new DBOperations();
                        $resData = $operations->getAllCompanies();
                        for ($x = 0; $x < count($resData); $x++) {
                            echo "<option value=".$resData[$x]['id'].">".$resData[$x]['val']."</option>";
                        }
                    ?>
                    </select>
              </div>
              <div class="form-group has-feedback">
                  <?php 
                    if(isset($_COOKIE["username"]) && $_COOKIE["username"] != "") {
                        echo '<input id="UserName" value="'.$_COOKIE["username"].'" type="text" class="form-control" placeholder="Username">';
                    } else {
                        echo '<input id="UserName" value="" type="text" class="form-control" placeholder="Username">';
                    }
                  ?>
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                    <?php 
                        if(isset($_COOKIE["password"]) && $_COOKIE["password"] != "") {
                            echo '<input id="Password" value="'.$_COOKIE["password"].'" type="password" class="form-control" placeholder="Password">';
                        } else {
                            echo '<input id="Password" value="" type="password" class="form-control" placeholder="Password">';
                        }
                    ?>
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              
          </form>
          <div class="row">
              <div class="col-xs-8">
                  <div class="checkbox icheck">
                      <label>
                        <?php
                            if(isset($_COOKIE["rememberMe"]) && $_COOKIE["rememberMe"] == "true") {
                                echo "<input type='checkbox' id='ChkRem' checked='checked'>";
                            } else {
                                echo "<input type='checkbox' id='ChkRem'>";
                            }
                        ?>
                        Remember Me
                      </label>
                  </div>
              </div>
              <!-- /.col -->
              <div class="col-xs-4">
                  <button type="submit" id="Logme" onclick="LogUser()" class="btn btn-primary btn-block btn-flat">Sign In</button>
              </div>
              <!-- /.col -->
          </div>

          <div class="overlay" id="loader" style="text-align:center; display:none">
              <i class="fa fa-refresh fa-spin"></i>
          </div>

          <div class="social-auth-links text-center">
            <p>- OR -</p>
          </div>

          <a style="text-align:center; display:block;" href="register.php" class="text-center">Register a New Membership</a>
          <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

      </div>
      <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Select2 -->
  <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- iCheck -->
  <script src="plugins/iCheck/icheck.min.js"></script>
  <!-- lobibox -->
  <script src="plugins/LobiBox/js/lobibox.min.js"></script>
  <!-- Customized JS -->
  <script src="Scripts/Login.js"></script>
  <script>
      $(function () {
          //Initialize Select2 Elements
          $('.select2').select2();

          $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%' // optional
          });
      });

      Lobibox.notify.DEFAULTS = $.extend({}, Lobibox.notify.DEFAULTS, {
          soundPath: 'plugins/LobiBox/sounds/',
          //write down all parameters you want to override
      });

      $(document).ready(function () {
          
          $(window).keydown(function (event) {
              if (event.keyCode == 13) {
                  LogUser();
              }
          });
      });


  </script>
</body>
</html>