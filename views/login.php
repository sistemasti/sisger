<?php 

require_once "./models/DB.class.php";
require_once "./controllers/Access.class.php";


$objAccess 	= new Access;
$logado = $objAccess->logado();



?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISGER</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
   <small>Risk Management System</small>
  </div>
  <!-- /.login-logo -->
		  <div class="card">
		  <?php
						
							//var_dump($_POST);
							$txterr       = "";
							
							if(isset($_POST['access'])){
								
								$login        = ((isset($_POST['email']))  and ($_POST['email'] <> ''));
								$password     = ((isset($_POST['password']))  and ($_POST['password'] <> ''));
							
								if(($login) and ($password)){
		 
									if($objAccess->logar($_POST['email'],sha1($_POST['password']))){
										
										$u = Access::select_login($_POST['email'], sha1($_POST['password']));
										
										
											session_start();
											$_SESSION['id_logado'] 			= $u['id'];
											$_SESSION['perfil_logado'] 		= $u['profiles_id'];
											$_SESSION['nome_logado'] 		= $u['name'];
											$_SESSION['institutions_id'] 	= $u['institutions_id'];
											$_SESSION['first_acess'] 		= $u['first_acess'];
										
											if($_SESSION['first_acess'] == "1"){
											echo '<script language= "JavaScript">location.href="first_acess"</script>';
											}else{
											echo '<script language= "JavaScript">location.href="index"</script>';
											}
									
									
										
									}else{				
										$txterr .= "- LOGIN and/or PASSWORD incorrect!<br>";				
									}
				
								}
								
							}

							if ( $txterr != "" ){ ?>
										
								<div class="alert alert-danger">
									<div class="container-fluid">
									  <?php echo $txterr; ?>
									</div>
								</div>
							
						
						<?php } ?>
					
					
						
						
			<div class="card-body login-card-body">
			  <p class="login-box-msg">Sign in to start your session</p>

			  <form action="login" method="post">
				<input type="hidden" name="access" value="1">
				<div class="input-group mb-3">
				  <input type="email" name="email" id="email" class="form-control" placeholder="Email">
				  <div class="input-group-append">
					<div class="input-group-text">
					  <span class="fas fa-envelope"></span>
					</div>
				  </div>
				</div>
				<div class="input-group mb-3">
				  <input type="password" name="password" id="password" class="form-control" placeholder="Password">
				  <div class="input-group-append">
					<div class="input-group-text">
					  <span class="fas fa-lock"></span>
					</div>
				  </div>
				</div>
				<div class="row">
				  <!--<div class="col-8">
					<div class="icheck-primary">
					  <input type="checkbox" id="remember">
					  <label for="remember">
						Remember Me
					  </label>
					</div>
				  </div>
				   /.col -->
				  <div class="col-12">
					<button type="submit" class="btn btn-primary btn-block">Sign In</button>
				  </div>
				  <!-- /.col -->
				</div>
				<br>
				<center><small>Version 1.0.3</small></center>
			  </form>
		<!--
			  <div class="social-auth-links text-center mb-3">
				<p>- OR -</p>
				<a href="#" class="btn btn-block btn-primary">
				  <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
				</a>
				<a href="#" class="btn btn-block btn-danger">
				  <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
				</a>
			  </div>
			   /.social-auth-links -->

			  <!--<p class="mb-1">
				<a href="forgot-password.html">I forgot my password</a>
			  </p>
			  <p class="mb-0">
				<a href="register.html" class="text-center">Register a new membership</a>
			  </p>
			</div>
			 /.login-card-body -->
		  </div>
		</div>
		<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
