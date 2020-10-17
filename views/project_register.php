<?php

require_once("header.php");
if($_SESSION['perfil_logado'] != "1" && $_SESSION['perfil_logado'] != "2"){ 

	echo'<script language= "JavaScript">alert("you dont have permission to access this page");location.href="index"</script>';

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
            <h1>Project Registration</h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>-->
			<a href="project_report"><button type="button" class="btn btn-block btn-outline-success btn-xs">Return</button></a>
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
											
								
								if(isset($_POST['project'])){ 
									$project = removerCodigoMalicioso(trim($_POST['project'])); 
								}else{ 
									$project = ''; 
								}
								
								if(isset($_POST['project_type'])){ 
									$project_type = removerCodigoMalicioso(trim($_POST['project_type'])); 
								}else{ 
									$project_type = ''; 
								}
								
								if(isset($_POST['note'])){ 
									$note = removerCodigoMalicioso(trim($_POST['note'])); 
								}else{ 
									$note = ''; 
								}
									
								if(isset($_POST['time_horizon'])){ 
									$time_horizon = removerCodigoMalicioso(trim($_POST['time_horizon'])); 
								}else{ 
									$time_horizon = ''; 
								}
									
								if(isset($_POST['institutions_id'])){ 
									$institutions_id = removerCodigoMalicioso(trim($_POST['institutions_id'])); 
								}else{ 
									$institutions_id = ''; 
								}
												
								
								if ( isset($_POST['cadastrar']) ){
									
									
									
										
									if ( $txterr == "" ){
										
										$i = Projects::insert_project($institutions_id,$project,$note,$time_horizon,$project_type);
										
										
										$_SESSION['time_horizon'] 	= $time_horizon;
										$_SESSION['project_id'] 	= $i['id_last_insert'];										
										$_SESSION['project_type'] 	= $project_type;										
										$_SESSION['project'] 		= $project;
										$_SESSION['project_fi'] 	= 1;
										
										if($btn2 == "2"){
											
											echo'<script language= "JavaScript">alert("Registration successful.");location.href="project_report"</script>';
											
										}
										
										$project = '';
										$note = '';
										$time_horizon = ''; 
										$institutions_id = ''; 
										
										unset($_POST);
										
									?>	
										<div class="alert alert-success">
											Registration successful.
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
			  <form name="frmProject" method="post" action="project_register">
			  <input type="hidden" name="cadastrar" id="cadastrar" value="1">
			      <div class="form-group">
                    <label for="Name">Project</label>
                    <input type="text" class="form-control" id="project" name="project" placeholder="Enter project name" value="<?php echo $project; ?>" required>
                  </div>
				  
			      <div class="form-group">
                    <label for="Name">Project type</label>
                     <select class="form-control" id="project_type"
					name="project_type">
						<option value="1" selected>Mixed values</option>
						<option value="2" >Single general value</option>
					</select>
                  </div>
				  
				  
				  <div class="form-group">
                    <label for="Name">Note</label>
                    <textarea name="note" id="note" class="form-control" ><?php echo $note; ?></textarea>
                  </div>
				  
				  <div class="form-group">
                    <label for="Name">Time horizon in years
for this project</label>
                    <input type="text" class="form-control" id="time_horizon" name="time_horizon" placeholder="Time horizon in years for this project" value="<?php echo $time_horizon; ?>" required onKeyDown="Mascara(this,Integer);" maxlength="4" onKeyPress="Mascara(this,Integer);" onKeyUp="Mascara(this,Integer);">
                  </div>
				
					
					<div class="form-group">	
                        <label>Institution</label>
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


				
				<!--<button type="submit" name="btn1" class="btn btn-block bg-gradient-primary btn-sm" value="1">Save & Add New</button>-->
				
				<button type="submit" name="btn2" class="btn btn-block bg-gradient-info btn-sm" value="2">Save & Return</button>
              </form>
              </div> 
			  <div class="col-sm-4 col-md-6">
               <div class="callout callout-info">
                  <h5>Project Registration</h5>

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