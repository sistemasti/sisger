<?php

require_once("header.php");
if($_SESSION['perfil_logado'] != "1" && $_SESSION['perfil_logado'] != "2"){ 

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
            <h1><?php echo $_SESSION[$_SESSION['lang']]['Institution Registration']; ?></h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>-->
			<a href="institution_report"><button type="button" class="btn btn-block btn-outline-success btn-xs"><?php echo $_SESSION[$_SESSION['lang']]['Return']; ?></button></a>
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
								print_r($_POST);
								echo "</pre>";		 */
									
									
								$txterr 	= '';
								
								
								if(isset($_POST['name'])){ 
									$name = removerCodigoMalicioso(trim($_POST['name'])); 
								}else{ 
									$name = ''; 
								}
								
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
																
								if(isset($_POST['sigla'])){ 
									$sigla = removerCodigoMalicioso(trim($_POST['sigla'])); 
								}else{ 
									$sigla = ''; 
								}
																	
								if(isset($_POST['code'])){ 
									$code = removerCodigoMalicioso(trim($_POST['code'])); 
								}else{ 
									$code = ''; 
								}
																
								if(isset($_POST['description'])){ 
									$description = removerCodigoMalicioso(trim($_POST['description'])); 
								}else{ 
									$description = ''; 
								}
								
								if(isset($_POST['type'])){ 
									$type = removerCodigoMalicioso(trim($_POST['type'])); 
								}else{ 
									$type = ''; 
								}
								
								if(isset($_POST['hierarquie'])){ 
									$hierarquie = removerCodigoMalicioso(trim($_POST['hierarquie'])); 
								}else{ 
									$hierarquie = ''; 
								}
								
									
								if ( isset($_POST['cadastrar']) ){
									
									
									
										
									if ( $txterr == "" ){
										
										Institutions::insert_institution($name, $code, $sigla, $description, 10, 0);
										
										if($btn2 == "2"){
											
											echo'<script language= "JavaScript">alert("'.$_SESSION[$_SESSION['lang']]['Registration successful'].'.");location.href="institution_report"</script>';
											
										}
										
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
			  <form name="frmInstitution" method="post" action="instituicao">
			  <input type="hidden" name="cadastrar" id="cadastrar" value="1">
			    <div class="form-group">
                    <label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Name']; ?></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?php echo $name; ?>" required>
                  </div>
				  
			    <div class="form-group">
                    <label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Code']; ?></label>
                    <input type="code" class="form-control" id="code"
					name="code" placeholder="" value="<?php echo $code; ?>">
                  </div>
				  
			    <div class="form-group">
                    <label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Acronym']; ?></label>
                    <input type="text" class="form-control" id="sigla"
					name="sigla" placeholder=""  required value="<?php echo $sigla; ?>">
                </div>
				  
				<div class="form-group">
                        <label><?php echo $_SESSION[$_SESSION['lang']]['Description']; ?></label>
                        <textarea class="form-control" rows="3" placeholder="" id="description"
					name="description"><?php echo $description; ?></textarea>
                </div>
				<!--
				<div class="form-group">
                        <label>Type</label>
                        <select class="form-control" id="type"
					name="type" onchange="if(this.value=='10'){document.getElementById('bxHierarquie').style.display='none'}else{document.getElementById('bxHierarquie').style.display='block'}" required>
                          <option value="10" <?php if($type == "10"){ echo "selected"; }; ?>>Institution</option>
                          <option value="20" <?php if($type == "20"){ echo "selected"; }; ?>>Unity</option>
                          <option value="30" <?php if($type == "30"){ echo "selected"; }; ?>>Sector</option>
                         
                        </select>
                </div>
              
				<div class="form-group" id="bxHierarquie" style="display:none;" >
                        <label>Hierarquie</label>
                        <select class="form-control" id="hierarquie"
					name="hierarquie">
                          
						  <?php 
							$in = Institutions::select_institutions_for_hierarquie_register();												
							foreach($in['dados'] as $in){
								
								if($in['id'] == $hierarquie){
								
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
                </div>-->
				<button type="submit" name="btn1" class="btn btn-block bg-gradient-primary btn-sm" value="1"><?php echo $_SESSION[$_SESSION['lang']]['Save & Add New']; ?></button>
				
				<button type="submit" name="btn2" class="btn btn-block bg-gradient-info btn-sm" value="2"><?php echo $_SESSION[$_SESSION['lang']]['Save & Return']; ?></button>
              </form>
              </div> 
			  <div class="col-sm-4 col-md-6">
               <div class="callout callout-info">
                  <h5><?php echo $_SESSION[$_SESSION['lang']]['Institution Registration']; ?></h5>

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