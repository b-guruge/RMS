<?php 
error_reporting(0);
require_once("controller/config.php");
require_once("controller/class.login.php");
require_once("controller/dbOperations.php");
$log = new logme();
$accessDB = new DBOperations();
if (!isset($_SESSION['loggedIn']))
{
    header( "Location: http://$webhost/login.php" );
}
else
{
    if (isset($_GET['page'])) {
        $_SESSION["CurPage"] = $page = $_GET['page'];
    }
    else
    {
        $_SESSION["CurPage"] = $page = "2"; //dashboard
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">   
    <title>CATSYS PRT</title>
    
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet"/>
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet"/>
    <link href="bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet"/>
    <link href="plugins/LobiBox/css/lobibox.min.css" rel="stylesheet"/>
    <link href="bower_components/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="plugins/LobiBox/js/lobibox.min.js"></script>
    <script src="Scripts/CustomValidation.js"></script>
    <!-- SlimScroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>  
    <!-- ChartJS -->
    <script src="bower_components/chart.js/Chart.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) 
    <script src="dist/js/pages/dashboard2.js"></script> -->
    <!-- AdminLTE for demo purposes 
    <script src="dist/js/demo.js"></script> -->
    <!-- DataTables -->
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script>
        $(function () {
            $(".select2").select2();
        });

        Lobibox.notify.DEFAULTS = $.extend({}, Lobibox.notify.DEFAULTS, {
            soundPath: '../plugins/LobiBox/sounds/',
            //write down all parameters you want to override
        });

        function notify(header, ctitle, msg) { //to access lobibox notifications
            Lobibox.notify(header,
                {
                    title: ctitle,
                    msg: msg
                });
        }

        $(document).ready(function () {
            //disable left navigation menu search bar enter key
            $("#sMenu").keydown(function (event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });

        //function to return only the text part excluding the child elements inside a controller
        function onText(a) {
            return $(a).clone()
                .children()
                .remove()
                .end()
                .text();
        }

        //function to validate email
        function isEmail(email) {
            var regex = /^[a-zA-Z0-9_.-]+@@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            return regex.test(email);
        }

        //menu search function
        function searchMenu() {
            var filter = $("#sMenu").val().toString().toLowerCase();
            var mainLi = $(".mainLi");
            var subUl = mainLi.find(".sMenuLi");
            $(".mainLi").each(function () {
                var fnd = false; //make it true only if the child menu items contain the keyword
                $(this).find(".sMenuLi").each(function () {
                    var cnt = $(this).length;
                    var a = $(this).find("a")[0];
                    if (onText(a).toString().toLowerCase().indexOf(filter) > -1) {
                        this.style.display = "";
                        fnd = true;
                    } else {
                        this.style.display = "none";
                    }
                });
                if (fnd)
                    this.style.display = "";
                else
                    this.style.display = "none";
            });
        }

        function user_logout() {
            $.post("controller/getDB.php",{
                method:"user_logout",
            },
            function(ret){
                $(location).attr('href', 'login.php');
            });
        }
    </script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>C</b>AT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>CATSYS</b>PRT</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src=<?php echo $_SESSION["user_image_path"] ?> class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $_SESSION["firstName"] ?> <?php echo $_SESSION["lastName"] ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src=<?php echo $_SESSION["user_image_path"] ?> class="img-circle" alt="User Image">
                                    <p>
                                        <?php echo $_SESSION["firstName"] ?> <?php echo $_SESSION["lastName"] ?> - <?php echo $_SESSION["userLevel"] ?>
                                        <small>Known Name : <?php echo $_SESSION["knownName"] ?></small>
                                    </p>
                                </li>
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="index.php?page=6" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a onclick="user_logout();" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- =============================================== -->
        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo $_SESSION["user_image_path"] ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $_SESSION["firstName"] ?> <?php echo $_SESSION["lastName"] ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <?php include 'sidebar.php'; ?>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- =============================================== -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php 
                try{
                    $res = $accessDB->getNavigationAccess($_SESSION["userID"],$page);
                    if($res[0]['active_flag'] == "1"){
                        //authorized
                        $_SESSION["CurController"] = $res[0]['controller'];
                        $_SESSION["CurMenuLabel"] = $res[0]['menu_label'];
                        $_SESSION["mainLabel"] = $res[0]['main_label'];
                        $_SESSION["subDesc"] = $res[0]['sub_desc'];

                        echo '
                        <section class="content-header">
                        <h1>
                            '. $_SESSION["mainLabel"] .'
                            <small>'.$_SESSION["subDesc"].'</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-dashboard"></i>'.$_SESSION["CurController"].'</a></li>
                            <li class="active">'.$_SESSION["CurMenuLabel"].'</li>
                        </ol>
                        </section>';

                        if(!include $res[0]['action']){
                            include('views/404error.php');
                        }
                    }
                    else if($res[0]['active_flag'] == "-1")
                    {
                        include('views/404error.php');
                    }
                    else{
                        //not authorized
                        $_SESSION['exceptionFlag'] = 1;
                        $_SESSION['exceptionHeader'] = "Not Authorized";
                        $_SESSION['exceptionMsg'] = "Sorry. You don't have authority to view the contents of this page. Please get the required privileges from an Admin.";
                        include('views/500error.php');
                    }
                    
                }
                catch(Exception $ex)
                {
                    //error
                    $_SESSION['exceptionFlag'] = 1;
                    $_SESSION['exceptionHeader'] = "Exception Occured";
                    $_SESSION['exceptionMsg'] = $ex->getMessage();
                    include('views/500error.php');
                }
                
            ?>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.0.1
            </div>
            <strong>Copyright &copy; 2020 - <?php echo date("Y"); ?> <a href="https://crosspoint.lk">Crosspoint</a>.</strong> All rights reserved.
        </footer>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->
                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->
                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->
                        <h3 class="control-sidebar-heading">Chat Settings</h3>
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
</body>

</html>