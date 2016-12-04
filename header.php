<?php 
  session_start();
  if(!isset($_SESSION["seq_usuario"])){
      header("location: /login.php"); 
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <title>Meu_Porquinho</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
			  <link href="assets/css/fileupload.css" rel="stylesheet" type="text/css" />
			  <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
			  <style>
					@media (max-width: 1024px) 
          {
						.container {
								padding-right: 2px;
								padding-left: 4px;
								margin-right: auto;
								margin-left: auto;
							min-height: 60px;
						}
						
						.content-page{
							   top: -82px;
                 position: relative;
						}
					}
			  </style>
	

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>
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


        <!-- Counter Up  -->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

        <!-- Dashboard init -->
       <!-- <script src="assets/pages/jquery.dashboard.js"></script> -->
			        <!-- Datatables-->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>

        <!-- App js --><!-- Datatable init js -->
        <script src="assets/pages/jquery.datatables.init.js"></script>
        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
			  <script src="assets/js/jquery.uploadfile.min.js"></script>
			
			


    </head>


    <body>
	  <div id="fileuploader"></div>
			

			
        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="index.php" class="logo">
                            <span>MeuPorquinho</span>
                            <!--<span><img src="assets/images/logo.png" alt="logo" style="height: 20px;"></span>-->
                        </a>
                    </div>
                    <!-- End Logo container-->

                    <div class="navbar-custom navbar-left">
                        <div id="navigation">
                            <!-- Navigation Menu-->
                            <ul class="navigation-menu">
       
                                <li class="has-submenu">
                                    <a href="?q=home-grafico">
                                        <span><i class="zmdi zmdi-invert-colors"></i></span>
                                        <span> Listagem</span> </a>
                       
                                </li>
															  <li class="has-submenu">
                                     <a href="?q=regras">
                                        <span><i class="zmdi zmdi-invert-colors"></i></span>
                                        <span> Regras</span> </a>
                       
                                </li>
																<li class="has-submenu">
                                     <a href="?q=categorias">
                                        <span><i class="zmdi zmdi-invert-colors"></i></span>
                                        <span> Categorias</span> </a>
                       
                                </li>

                            </ul>
                            <!-- End navigation menu  -->
                        </div>
                    </div>


                    <div class="menu-extras" style=" float: left;">

                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li>
                                <form action="?q=pesquisa" method="POST" class="navbar-left app-search pull-left hidden-xs">
                                     <input type="text" name="pesquisa" placeholder="Search..." class="form-control">
                                     <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </li>
                            <li>
                                <!-- Notification -->
                    
                                <!-- End Notification bar -->
                            </li>

      
                        </ul>

                    </div>
									<div id="label_status" class="navbar-left app-search pull-left hidden-xs" style="color: #C1C5C8;margin: 19px;">
										
									</div>
									            <div class="notification-box" style="float: right;">
                                    <ul class="list-inline m-b-0">
                                        <li>
                                            <a href='javascript:$("[type=file]")[0].click();' class="right-bar-toggle">
                                                <i class="zmdi zmdi-collection-text"></i>
                                            </a>
                              
                                        </li>
																			                                     <li>
                                            <a href='javascript:atualizarLancamentos()' class="right-bar-toggle">
                                                <i class="zmdi zmdi-fire"></i>
                                            </a>
                                            <div class="noti-dot">
                                                <span class="dot"></span>
                                                <span class="pulse"></span>
                                            </div>
                                        </li>
																				<li>
                                            <a href='https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=https://gerenciador.meuporquinho.site/login.php' class="right-bar-toggle">
                                                <i class="zmdi zmdi-run"></i>
                                            </a>
                      
                                        </li>
                                    </ul>
                                </div>

                </div>
            </div>


        </header>
        <!-- End Navigation Bar-->
      
              <div class="wrapper">
            <div class="container">