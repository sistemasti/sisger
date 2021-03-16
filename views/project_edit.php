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
            <h1><?php echo $_SESSION[$_SESSION['lang']]['Project Edit']; ?></h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>-->
			<a href="project_report"><button type="button" class="btn btn-block btn-outline-success btn-xs"><?php echo $_SESSION[$_SESSION['lang']]['Return']; ?></button></a>
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
								
								$i = Projects::select_project_id($_REQUEST['id']);
								
								
								if($i['status'] != "1") {
									$readonly = "readonly='readonly'";
								}else{
									$readonly = "";
								}		
								
								if(isset($_POST['project'])){ 
									$project = removerCodigoMalicioso(trim($_POST['project'])); 
								}else{ 
									$project = $i['project']; 
								}
											
								if(isset($_POST['project_type'])){ 
									$project_type = removerCodigoMalicioso(trim($_POST['project_type'])); 
								}else{ 
									$project_type = $i['project_type']; 
								}
											
								if(isset($_POST['note'])){ 
									$note = removerCodigoMalicioso(trim($_POST['note'])); 
								}else{ 
									$note = $i['note']; 
								}
																
								if(isset($_POST['time_horizon'])){ 
									$time_horizon = removerCodigoMalicioso(trim($_POST['time_horizon'])); 
								}else{ 
									$time_horizon = $i['time_horizon']; 
								}
								

									
								if(isset($_POST['institutions_id'])){ 
									$institutions_id = removerCodigoMalicioso(trim($_POST['institutions_id'])); 
								}else{ 
									$institutions_id = $i['institutions_id']; 
								}
									

								
								if ( isset($_POST['cadastrar']) ){
									
									
									
										
									if ( $txterr == "" ){
										
										Projects::update_project($institutions_id, $project, $note, $time_horizon, $project_type, $_REQUEST['id']);
										
										if($_SESSION['project_id']==$_REQUEST['id']){
											$_SESSION['time_horizon'] 	= $time_horizon;
											$_SESSION['project_type'] 	= $project_type;
										}
										/* $_SESSION['project_id'] 	= $_REQUEST['projectHeader'];										
										$_SESSION['project'] 		= $pi['project'];
										$_SESSION['project_fi'] 	= $pi['status']; */
										
										
										echo'<script language= "JavaScript">alert("'.$_SESSION[$_SESSION['lang']]['Registration successful'].'.");location.href="project_report"</script>';
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
			  <form name="frmInstitution" method="post" action="project_edit">
			  <input type="hidden" name="cadastrar" id="cadastrar" value="1">
			  <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>">
			     <div class="form-group">
                    <label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Project']; ?></label>
                    <input type="text" class="form-control" id="project" name="project" placeholder="Enter institution name" value="<?php echo $project; ?>" required <?php echo $readonly; ?>>
                  </div>
				  
				  <div class="form-group">
                    <label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Note']; ?></label>
                    <textarea name="note" id="note" class="form-control"  <?php echo $readonly; ?>><?php echo $note; ?></textarea>
                  </div>
				  
			    <div class="form-group">
                    <label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Time horizon in years for this project']; ?></label>
                    <input type="text" class="form-control" id="time_horizon" name="time_horizon" placeholder="Enter project name" value="<?php echo $time_horizon; ?>" required  <?php echo $readonly; ?> onKeyDown="Mascara(this,Integer);" maxlength="4" onKeyPress="Mascara(this,Integer);" onKeyUp="Mascara(this,Integer);">
                  </div>
				  
				  
				  <div class="form-group">	
                        <label><?php echo $_SESSION[$_SESSION['lang']]['Institution']; ?></label>
						<?php if($_SESSION['perfil_logado'] == "1"){ ?>
                        <select class="form-control" id="institutions_id" name="institutions_id">
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
				  
				  
				<?php if($i['status'] == "1") { ?><button type="submit" class="btn btn-block bg-gradient-primary btn-sm"><?php echo $_SESSION[$_SESSION['lang']]['Register']; ?>
				<?php } ?>
				</button>
              </form>
              </div> 
			  <div class="col-sm-4 col-md-6">
               <div class="callout callout-info">
                  <h5><?php echo $_SESSION[$_SESSION['lang']]['Project Edit']; ?></h5>

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