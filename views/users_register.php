<?php

require_once("header.php");
if($_SESSION['perfil_logado'] != "1" && $_SESSION['perfil_logado'] != "2" ){ 

	echo'<script language= "JavaScript">alert("'.$_SESSION[$_SESSION['lang']]['You dont have permission to access this page'].'");location.href="index"</script>';

} 


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
            <h1><?php echo $_SESSION[$_SESSION['lang']]['User Registration']; ?></h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>-->
			<a href="users_report"><button type="button" class="btn btn-block btn-outline-success btn-xs"><?php echo $_SESSION[$_SESSION['lang']]['Return']; ?></button></a>
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
									
								/* echo "<pre>";	
								print_r($_SESSION);
								echo "</pre>";	 */
									
								$txterr 	= '';
								
								if(isset($_POST['btn2'])){ 
									$btn2 = removerCodigoMalicioso(trim($_POST['btn2'])); 
								}else{ 
									$btn2 = ''; 
								}
									
								if(isset($_POST['btn1'])){ 
									$btn1 = removerCodigoMalicioso(trim($_POST['btn1'])); 
								}else{ 
									$btn1 = ''; 
								}
											
								
								if(isset($_POST['name'])){ 
									$name = removerCodigoMalicioso(trim($_POST['name'])); 
								}else{ 
									$name = ""; 
								}
																
								if(isset($_POST['email'])){ 
									$email = removerCodigoMalicioso(trim($_POST['email'])); 
								}else{ 
									$email = ""; 
								}
																	
								
								if(isset($_POST['telephone'])){ 
									$telephone = removerCodigoMalicioso(trim($_POST['telephone'])); 
								}else{ 
									$telephone = "";   
								}
								
								if(isset($_POST['first_acess'])){ 
									$first_acess = removerCodigoMalicioso(trim($_POST['first_acess'])); 
								}else{ 
									$first_acess = "";   
								}
								
								if(isset($_POST['password'])){ 
									$password = removerCodigoMalicioso(trim($_POST['password'])); 
								}else{ 
									$password = "";  
								}
								
								if(isset($_POST['institutions_id'])){ 
									$institutions_id = removerCodigoMalicioso(trim($_POST['institutions_id'])); 
								}else{ 
									$institutions_id = "";   
								}
								
								if(isset($_POST['profiles_id'])){ 
									$profiles_id = removerCodigoMalicioso(trim($_POST['profiles_id'])); 
								}else{ 
									$profiles_id = "";   
								}
								
									
								if ( isset($_POST['cadastrar']) ){
									
									$c_cpf = Users::isset_cpf($cpf);									
									if($c_cpf['num'] > 0){
										
										$txterr .= "SSN / CPF already registered<br>";
										
									}	
									
									$c_email = Users::isset_email($email);									
									if($c_email['num'] > 0){
										
										$txterr .= "E-mail already registered<br>";
										
									}	
									
									if(strlen($password) < 5){
										
										$txterr .= "Password must be at least 5 characters<br>";
										
									}	
										
									if ( $txterr == "" ){
										
										Users::insert_users($name, $email, '-', '-', $telephone, sha1($password), $institutions_id, $profiles_id);
										
										if($btn2 == "2"){
											
											echo'<script language= "JavaScript">alert("'.$_SESSION[$_SESSION['lang']]['Registration successful'].'.");location.href="users_report"</script>';
											
										}
										
										$name = ""; 
										$email = ""; 
										$cpf = ""; 
										$matriculation = ""; 
										$telephone = "";  
										$first_acess = "";  
										$password = ""; 
										$institutions_id = ""; 
										$profiles_id = ""; 
										
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
			  <form name="frmInstitution" id="frmInstitution" method="post" action="user_register">
			  <input type="hidden" name="cadastrar" id="cadastrar" value="1">
			  
			    <div class="form-group">
                    <label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Name']; ?></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?php echo $name; ?>" required>
                  </div>
				  
			    <div class="form-group">
                    <label for="Sigla">E-mail</label>
                    <input type="email" class="form-control" id="email"
					name="email" placeholder="" value="<?php echo $email; ?>">
                  </div>
				 <!-- 
			    <div class="form-group">
                    <label for="Sigla">SSN / CPF</label>
                    <input type="text" class="form-control" id="cpf"
					name="cpf" placeholder="Enter documentation"  required value="<?php echo $cpf; ?>">
                </div>-->
				<!--  
				<div class="form-group">
                        <label>Matriculation</label>
                        <input type="text" class="form-control" id="matriculation"
					name="matriculation" placeholder=""  required value="<?php echo $matriculation; ?>">
                </div>-->
				
				<div class="form-group">
                        <label><?php echo $_SESSION[$_SESSION['lang']]['Telephone']; ?></label>
                        <input type="text" class="form-control" id="telephone"
					name="telephone" placeholder=""  required value="<?php echo $telephone; ?>" onkeydown="Mascara(this,Telefone);" maxlength="15" onkeypress="Mascara(this,Telefone);" onkeyup="Mascara(this,Telefone);">
                </div>
				<!--
				<div class="form-group">
                        <label>First_acess</label>
                        <select class="form-control" id="first_acess"
					name="first_acess">
                          <option value="1" <?php if($first_acess == "1"){ echo "selected"; }; ?>>Yes</option>
                          <option value="0" <?php if($first_acess == "0"){ echo "selected"; }; ?>>No</option>
                          
                         
                        </select>
                </div>-->
              
				<div class="form-group">
                        <label><?php echo $_SESSION[$_SESSION['lang']]['Password']; ?></label>
                        <input type="password" class="form-control" id="password"
					name="password" placeholder=""  required value="<?php echo $password; ?>">
                </div>
				
				<div class="form-group">	
                        <label><?php echo $_SESSION[$_SESSION['lang']]['Institution']; ?></label>
						<?php if($_SESSION['perfil_logado'] == "1"){ ?>
                        <select class="form-control" id="institutions_id"
					name="institutions_id">
                           <?php 
							$in = Institutions::select_institutions_for_hierarquie_register();												
							foreach($in['dados'] as $in){
								
								if($in['id'] == $institutions_id){
								
						  ?>
								<option value="<?php echo $in['id']; ?>" selected><?php echo $in['name']; ?></option>
						  <?php 
						  
								}else{
											
						  ?>
								<option value="<?php echo $in['id']; ?>"><?php echo $in['name']; ?></option>
						  <?php
								}	
							}
						  ?>
                          
                         
                        </select>
						<?php }else{ 
							
								$ins = Institutions::select_institutions_id($_SESSION['institutions_id']);
								echo $ins['name'];
								?>
								<input type="hidden" name="institutions_id" id="institutions_id" value="<?php echo $_SESSION['institutions_id']; ?>">
								<?php
								
							} ?>
                </div>
				<div class="form-group">
                        <label><?php echo $_SESSION[$_SESSION['lang']]['Profile']; ?></label>
                        <select class="form-control" id="profiles_id"
					name="profiles_id">
                           <?php 
							$pr = Users::select_profiles();												
							foreach($pr['dados'] as $pr){
								
								if($pr['id'] == $profiles_id){
								
						  ?>
								<option value="<?php echo $pr['id']; ?>" selected><?php echo $pr['profile']; ?></option>
						  <?php 
						  
								}else{
											
						  ?>
								<option value="<?php echo $pr['id']; ?>"><?php echo $pr['profile']; ?></option>
						  <?php
								}	
							}
						  ?>
                          
                         
                        </select>
                </div>
				
				<!-- 
				 email: {
					required: true,
					email: true,
				  },
				  password: {
					required: true,
					minlength: 5
				  },
				  name: {
					required: true
				  },
				  cpf: {
					required: true
				  },
				  matriculation: {
					required: true
				  },
				  telephone: {
					required: true
				  },
				  institutions_id: {
					required: true
				  },
				  profiles_id: {
					required: true
				  },
				-->
				<button type="submit" name="btn1" class="btn btn-block bg-gradient-primary btn-sm" value="1" onclick="
					if(
					document.getElementById('name').value==''
					|| document.getElementById('email').value==''
					|| document.getElementById('password').value==''
					|| document.getElementById('cpf').value==''
					|| document.getElementById('matriculation').value==''
					|| document.getElementById('telephone').value==''
					|| document.getElementById('institutions_id').value==''
					|| document.getElementById('profiles_id').value==''
					
					){
						alert(<?php echo "'".$_SESSION[$_SESSION['lang']]['All fields are required']."'"; ?>);	
						return false
					}
					
					
					"><?php echo $_SESSION[$_SESSION['lang']]['Save & Add New']; ?></button>
				
				<button type="submit" name="btn2" class="btn btn-block bg-gradient-info btn-sm" value="2" onclick="
					if(
					document.getElementById('name').value==''
					|| document.getElementById('email').value==''
					|| document.getElementById('password').value==''
					|| document.getElementById('cpf').value==''
					|| document.getElementById('matriculation').value==''
					|| document.getElementById('telephone').value==''
					|| document.getElementById('institutions_id').value==''
					|| document.getElementById('profiles_id').value==''
					
					){
						alert(<?php echo "'".$_SESSION[$_SESSION['lang']]['All fields are required']."'"; ?>);		
						return false
					}
					
					
					"><?php echo $_SESSION[$_SESSION['lang']]['Save & Return']; ?></button>
              </form>
              </div> 
			  <div class="col-sm-4 col-md-6">
               <div class="callout callout-info">
                  <h5><?php echo $_SESSION[$_SESSION['lang']]['User Registration']; ?></h5>

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

<!-- jquery-validation -->
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../plugins/jquery-validation/additional-methods.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#frmInstitution').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      name: {
        required: true
      },
      cpf: {
        required: true
      },
      matriculation: {
        required: true
      },
      telephone: {
        required: true
      },
      institutions_id: {
        required: true
      },
      profiles_id: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      name: "Please fill the name",
      cpf: "Please fill the cpf",
      matriculation: "Please fill the matriculation",
      telephone: "Please fill the telephone",
      institutions_id: "Please fill the institutions_id",
      profiles_id: "Please fill the profiles_id"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>