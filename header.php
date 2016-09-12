<?php 
  session_start();
  if(!isset($_SESSION["seq_usuario"])){
      header("location: /login.php"); 
  }
?>
<!DOCTYPE html>
<html>

</html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
  <meta name="author" content="Coderthemes">

  <link rel="shortcut icon" href="assets/images/favicon.ico">

  <title>Meu Porquinho</title>

  <!--Morris Chart CSS -->
  <link rel="stylesheet" href="assets/plugins/morris/morris.css">

  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

  <script src="assets/js/modernizr.min.js"></script>
  <script>
    var resizefunc = [];
  </script>

  <!-- jQuery  -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/detect.js"></script>
  <script src="assets/js/fastclick.js"></script>
  <script src="assets/js/jquery.slimscroll.js"></script>
  <script src="assets/js/jquery.blockUI.js"></script>
  <script src="assets/js/waves.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/jquery.nicescroll.js"></script>
  <script src="assets/js/jquery.scrollTo.min.js"></script>

  <!--Morris Chart
<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael-min.js"></script>

 Counter Up  -->
  <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
  <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

  <!-- Dashboard init
<script src="assets/pages/jquery.dashboard.js"></script>

 -->
  <!-- App js -->
  <script src="assets/js/jquery.core.js"></script>
  <script src="assets/js/jquery.app.js"></script>


</head>

<body class="fixed-left">


  <!-- Begin page -->
  <div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

      <!-- LOGO -->
      <div class="topbar-left">
        <div class="text-center">
          <a href="/meuporquinho" class="logo">
                            Meu Porquinho
                            <!--<span><img src="assets/images/logo.png" alt="logo" style="height: 20px;"></span>-->
                        </a>
        </div>
      </div>

      <!-- Button mobile view to collapse sidebar menu -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container">
          <div class="">


            <form role="search" class="navbar-left app-search pull-left hidden-xs">
              <input type="text" placeholder="Search..." class="form-control">
              <a href=""><i class="fa fa-search"></i></a>
            </form>


            <ul class="nav navbar-nav navbar-right pull-right">

              <li>
                <!-- Notification -->
                <div class="notification-box">




                  <ul class="list-inline m-b-0">
                    
                    <li>
                      <a href="?q=detalhe-novo" class="">
                        <i class="zmdi zmdi-open-in-new"></i>
                      </a>
                    </li>                    
                    <li>
                      <a href="javascript:void(0);" class="">
                        <i class="zmdi zmdi-fire"></i>
                      </a>
                    </li>


                    <li>
                      <a href="javascript:void(0);" class="right-bar-toggle">
                        <i class="zmdi zmdi-notifications-none"></i>
                      </a>

                      <div class="noti-dot">
                        <span class="dot"></span>
                        <span class="pulse"></span>
                      </div>
                    </li>


                  </ul>
                </div>
                <!-- End Notification bar -->
              </li>

              <li class="dropdown user-box">
                <a href="" class="dropdown-toggle waves-effect waves-light profile " data-toggle="dropdown" aria-expanded="true">
                  <img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle user-img">
                  <div class="user-status away"><i class="zmdi zmdi-dot-circle"></i></div>
                </a>

                <ul class="dropdown-menu">
                  <li><a href="javascript:void(0)"><i class="ti-user m-r-5"></i> Profile</a></li>
                  <li><a href="javascript:void(0)"><i class="ti-settings m-r-5"></i> Settings</a></li>
                  <li><a href="javascript:void(0)"><i class="ti-lock m-r-5"></i> Lock screen</a></li>
                  <li><a href="javascript:void(0)"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                </ul>
              </li>
            </ul>

          </div>
          <!--/.nav-collapse -->
        </div>
      </div>
    </div>