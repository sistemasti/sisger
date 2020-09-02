<?php 
require_once("config.php");

/* phpinfo();
exit; */


?>

<!DOCTYPE html>
<html lang="en" ng-app>
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
        <span class="nav-link"  style="color:#fff !important;"><?php echo $_SESSION[$_SESSION['lang']]['Welcome']; ?>, <strong> <?php echo $_SESSION['nome_logado'];  ?></strong></span>
      </li>
		     
	   <li class="nav-item d-none d-sm-inline-block">
	 
	 <?php 
		if(isset($_REQUEST['projectHeader'])){
			
			if($_REQUEST['projectHeader']=="reset"){
				
				unset($_SESSION['project_id']);
				unset($pi);
				unset($_SESSION['project']);
				unset($_SESSION['project_fi']);

				
			}else{	
			
				$_SESSION['project_id'] 	= $_REQUEST['projectHeader'];
				$pi 						= Projects::select_project_id($_REQUEST['projectHeader']);
				$_SESSION['project'] 		= $pi['project'];
				$_SESSION['project_type'] 		= $pi['project_type'];
				$_SESSION['time_horizon'] 		= $pi['time_horizon'];
				$_SESSION['project_fi'] 	= $pi['status'];
			
			}
			
		}	
	 

		if(isset($_SESSION['project'])){
			
			
			$id_projeto					= $_SESSION['project_id'];
			
		}else{
			
			
			$id_projeto					= "";
		}		

		?>
	
	 
	 
						<form name="frmProject" method="post" action="index">
						<input type="hidden" name="sendFilterProject" value="1">
						<span class="nav-link"  style="color:#fff !important;"><?php echo $_SESSION[$_SESSION['lang']]['Change to']; ?>: 
							<select id="type"
							name="projectHeader" required style="color:#574f3e;"  onchange="if(this.value !='#'){location.href = 'index?projectHeader='+this.value}else{location.href = 'index?projectHeader=reset'}">
									<option value="#" ><?php echo $_SESSION[$_SESSION['lang']]['select']; ?>...</option>
									<?php 
									 if($_SESSION['perfil_logado'] == "1" ){
										 
											$in = Projects::select_projects_for_report_super();
										 
									 }else{

											$in = Projects::select_projects_for_report();


									 }		
									 
									 
									 
										foreach($in['dados'] as $in){
										
										?>
											<option value="<?php echo $in['id']; ?>" <?php if($id_projeto == $in['id']){ echo "selected"; } ?>><?php echo $in['project']; ?></option>
									<?php		
										}
									  ?>
								 
							</select> 
							
							
						</span>
						</form>
      </li>
	  <?php 
						if($_SESSION['perfil_logado'] == "999" ){
	  ?>
					  <li class="nav-item d-none d-sm-inline-block">
						<div style="margin-top:7px;">ou</div>
					  </li>
					  <li class="nav-item d-none d-sm-inline-block">
														 
										 &nbsp;&nbsp;&nbsp;
										<a href="project_register"><button type="button" name="btn1" class="btn bg-gradient-info btn-xs" value="1" style="margin-top:8px;"><?php echo $_SESSION[$_SESSION['lang']]['new project']; ?></button></a>
										
					  </li>
	  <?php 
					 }
	  ?>	
    </ul>

&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
		<!--
		<a href="index?lang=pt-br">
			<div type="submit" name="btn1" class="btn bg-gradient-warning btn-xs" value="1" style="margin-top:-7px;">pt-br</div> 
		</a> 
		&nbsp;
        <a href="index?lang=eng">
			<div type="submit" name="btn1" class="btn bg-gradient-warning btn-xs" value="1" style="margin-top:-7px;">eng</div>
		</a>-->
    <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
       
		
		
		
						<form name="frmProject" method="post" action="index">
						<input type="hidden" name="sendFilterProject" value="1">
						<span class="nav-link"  style="color:#fff !important;"><?php echo $_SESSION[$_SESSION['lang']]['language']; ?>: 
							<select id="type"
							name="selectLANGUAGE" required style="color:#574f3e;" onchange="location.href = 'index?lang='+this.value">
									<option value="#" ><?php echo $_SESSION[$_SESSION['lang']]['select']; ?>...</option>
									
											<option value="pt-br" <?php if($_SESSION['lang']=="pt-br"){ echo "selected"; } ?>><?php echo $_SESSION[$_SESSION['lang']]['portuguese']; ?></option>
											<option value="eng" <?php if($_SESSION['lang']=="eng"){ echo "selected"; } ?>><?php echo $_SESSION[$_SESSION['lang']]['english']; ?></option>
									
								 
							</select> 
							<!--<button type="submit" name="btn1" class="btn bg-gradient-info btn-xs" value="1" style="margin-top:-3px;"><?php echo $_SESSION[$_SESSION['lang']]['change']; ?></button>-->
							
						</span>
						</form>
     
      </li>
      <!-- Notifications Dropdown Menu -->
    
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   <center> <a href="index" class="brand-link">
      <h2>SISGER</h2>
      
    </a>
 </center>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     
		<?php if($_SESSION['first_acess']==0){ require_once("sidebar_menu.php"); } 
		
		/* echo "<pre>";
			print_r($_SESSION);
		echo "</pre>"; */
		?>	
	
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>