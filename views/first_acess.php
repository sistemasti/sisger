<?php

require_once("header_first_access.php");



?>
 
 <style>
    .color-palette {
      height: 35px;
      line-height: 35px;
      text-align: left;
      padding-left: 15px;
	  font-size: 13px;
    }
    
    .color-palette.disabled {
      text-align: center;
      padding-right: 0;
      display: block;
    }
    
    .color-palette-set {
      margin-bottom: 15px;
    }

    .color-palette span {
      display: none;
      font-size: 12px;
    }

    .color-palette:hover span {
      display: block;
    }

    .color-palette.disabled span {
      display: block;
      text-align: left;
      padding-left: .75rem;
    }

    .color-palette-box h4 {
      position: absolute;
      left: 1.25rem;
      margin-top: .75rem;
      color: rgba(255, 255, 255, 0.8);
      font-size: 12px;
      display: block;
      z-index: 7;
    }
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
<br>
          <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1><?php echo $_SESSION[$_SESSION['lang']]['First Access']; ?></h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>-->
			
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
			  <div class="row">
								<div class="col-lg-12">
									
								<?php
									
									
									
								$txterr 	= '';
								
								
								
								if(isset($_POST['current_password'])){ 
									$current_password = removerCodigoMalicioso(trim($_POST['current_password'])); 
								}else{ 
									$current_password = ""; 
								}
										
								if(isset($_POST['new_password'])){ 
									$new_password = removerCodigoMalicioso(trim($_POST['new_password'])); 
								}else{ 
									$new_password = ""; 
								}
																
								
									
								if ( isset($_POST['cadastrar']) ){
									
									
									$cp = Access::select_login($_SESSION['usuario'],sha1($current_password));
									
									if($cp['num'] < 1){
										
										$txterr = $_SESSION[$_SESSION['lang']]['Current password is incorrect']; 
										//$txterr = ""; 
										
									}	
										
									if ( $txterr == "" ){
										
										Users::update_user_password(sha1($new_password),$_SESSION['uid']);
										echo'<script language= "JavaScript">alert("'.$_SESSION[$_SESSION['lang']]['Registration successful'].'.");location.href="index"</script>';
										
										unset($_POST);
										
									?>	
										<div class="alert alert-success">
											<?php echo $_SESSION[$_SESSION['lang']]['Registration successful']; ?>.
										</div>
										
									<?php	
									}else{
									?>
										<div class="alert alert-danger">
											<?php echo $txterr; ?>
										</div>
									<?php
									}
										
								}
								?>
									
									</div>
							    </div>
			  
			  
                <div class="row">
             
              <div class="col-sm-4 col-md-6">
			  <form name="frmInstitution" method="post" action="first_acess">
			  <input type="hidden" name="cadastrar" id="cadastrar" value="1">
			  <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>">
				  <div class="form-group">
                    <label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Current password']; ?></label>
                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter your current password" value="<?php echo $current_password; ?>" required>
                  </div>
				  
				  <div class="form-group">
                    <label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['New password']; ?></label>
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter your new password" value="<?php echo $new_password; ?>" required>
                  </div>
				  
			    
				<button type="submit" class="btn btn-block bg-gradient-primary btn-sm"><?php echo $_SESSION[$_SESSION['lang']]['Register']; ?></button>
              </form>
              </div> 
			  <div class="col-sm-4 col-md-6">
               <div class="callout callout-info">
                  <h5><?php echo $_SESSION[$_SESSION['lang']]['First Access']; ?></h5>

                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum est id elit auctor consequat. In mattis massa nibh, et scelerisque ipsum molestie sit amet. Nulla sagittis consectetur odio non eleifend. </p>
                </div>
              </div>
              <!-- /.col -->
              <!-- /.col -->              
			  <!--<div class="col-sm-4 col-md-4">
                

               
                <select class="form-control">
                          <option>Select a project</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
              </div>-->
              <!-- /.col -->
            
            </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
           
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

       
        <!-- /.row -->

      
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<?php

require_once("footer.php");

?>