<?php
session_start();

//session_name(md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));

if(!isset($_SESSION['id_logado'])){
	
	echo'<script language= "JavaScript">location.href="login"</script>';
	
}	

include("./functions.php");
include("./models/DB.class.php");
include("./controllers/ADM_Institutions.class.php");
include("./controllers/ADM_Users.class.php");
include("./controllers/ADM_Projects.class.php");
include("./controllers/Access.class.php");

/* 

function __autoload($className){
	
	 //Carrega models
	 if(file_exists("./models/".$className.".class.php")){
          include("./models/".$className.".class.php"); 
     }
	 
	 //Carrega controllers
     if(file_exists("./controllers/".$className.".class.php")){
          include("./controllers/".$className.".class.php"); 
     }
} */

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>SISGER</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand  navbar-light" style="color:#fff !important;background-color:#9b4f01 !important;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <span class="nav-link"  style="color:#fff !important;">Welcome, <strong> <?php echo $_SESSION['nome_logado'];  ?></strong></span>
      </li>
     
    </ul>

   

    <!-- Right navbar links -->
 
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   <center> <a href="/sisger" class="brand-link">
      <h2>SISGER</h2>
      
    </a>
 </center>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     
		<?php if($_SESSION['first_acess']==0){ require_once("sidebar_menu.php"); } ?>	
	
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>