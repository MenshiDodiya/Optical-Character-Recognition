<?php 
    ob_start();
    require_once('connection.php'); 
    checkLoggedIn();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="javascript:void(0);" class="logo"><b>OCR </b>Admin</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/images (1).jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">Admin</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/images (1).jpg" class="img-circle" alt="User Image" />
                    <p>
                      Admin
                      <small>Member since Feb. 2019</small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="code/logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/images (1).jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Admin</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <?php
            $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
            $url = end($url_array); 
          ?>
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if($url=='dashboard.php') { echo 'active'; } ?> treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($url=='dashboard.php') { echo 'active'; } ?> "><a href="dashboard.php"><i class="fa fa-circle-o"></i> Dashboard</a></li>
              </ul>
            </li>
            <li class="<?php if(strpos($url,'adminmaster') !== false || (strpos($url, 'frmUpdateAdmin') !== false)) { echo 'active'; } ?> "><a href="adminmaster.php"><i class="fa fa-user-secret"></i> Manage Admin</a></li>
            
            <li class="<?php if(strpos($url,'usermaster') !== false) { echo 'active'; } ?> "><a href="usermaster.php"><i class="fa fa-users"></i> Manage Users</a></li>

            <li class="<?php if(strpos($url,'permissionmaster') !== false || (strpos($url, 'frmUpdatePermission') !== false)) { echo 'active'; } ?> "><a href="permissionmaster.php"><i class="fa fa-check-circle"></i> Manage Permission</a></li>

            <li class="<?php if(strpos($url,'documentmaster') !== false || (strpos($url, 'frmUpdateDocument') !== false)) { echo 'active'; } ?> "><a href="documentmaster.php"><i class="fa fa-file"></i> Manage Document Type</a></li>

            <li class="<?php if(strpos($url,'trainingmaster') !== false || (strpos($url, 'frmUpdateTraining') !== false)) { echo 'active'; } ?> "><a href="trainingmaster.php"><i class="fa fa-edit"></i> Manage Training Type</a></li>

            <li class="<?php if(strpos($url,'sharedocumentmaster') !== false) { echo 'active'; } ?> "><a href="sharedocumentmaster.php"><i class="fa fa-share-alt"></i> Manage Share Document</a></li>

            <li class="<?php if(strpos($url,'exportmaster') !== false) { echo 'active'; } ?> "><a href="exportmaster.php"><i class="fa fa-upload"></i> Manage Export Document</a></li>

            <li class="<?php if(strpos($url,'userpermissionmaster') !== false) { echo 'active'; } ?> "><a href="userpermissionmaster.php"><i class="fa fa-check-circle"></i> Manage User Permission</a></li>

            <li class="<?php if(strpos($url,'usertrainingmaster') !== false) { echo 'active'; } ?> "><a href="usertrainingmaster.php"><i class="fa fa-edit"></i> Manage User Training</a></li>

            <li class="<?php if(strpos($url,'contactmaster') !== false) { echo 'active'; } ?> "><a href="contactmaster.php"><i class="fa fa-phone"></i> Manage Contact Form Data</a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>