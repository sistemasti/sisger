<?php

require_once("header.php");

if($_SESSION['perfil_logado'] != "1" && $_SESSION['perfil_logado'] != "2" && $_SESSION['perfil_logado'] != "3"){ 

	echo '<script language= "JavaScript">alert("'.$_SESSION[$_SESSION['lang']]['You dont have permission to access this page'].'");location.href="index"</script>';

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
            <h1><?php echo $_SESSION[$_SESSION['lang']]['Edit Agent']; ?></h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>-->
			<a href="ir_agents"><button type="button" class="btn btn-block btn-outline-success btn-xs"><?php echo $_SESSION[$_SESSION['lang']]['Report']; ?></button></a>
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
								$i 			= Agents::select_ir_agents_id($_REQUEST['id']);
								
								
								
								if(isset($_POST['agent'])){ 
									$agent = removerCodigoMalicioso(trim($_POST['agent'])); 
								}else{ 
									$agent = $i['agent']; 
								}
									
								if(isset($_POST['description'])){ 
									$description = removerCodigoMalicioso(trim($_POST['description'])); 
								}else{ 
									$description = $i['description']; 
								}											
											
								
									
								if ( isset($_POST['cadastrar']) ){
									
								
										
									if ( $txterr == "" ){
																				
										//Documents::insert_document($name,$summary,$risk_group,$_SESSION['institutions_id'],$_SESSION['project_id'],$ir_agents_id);
										
										Agents::update_agents($agent, $description,$_REQUEST['id']);
										
										echo'<script language= "JavaScript">alert("'.$_SESSION[$_SESSION['lang']]['Registration successful'].'.");location.href="ir_agents"</script>';
										
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
			   <form name="frmDocuments" method="post" action="ir_agents_edit"  enctype="multipart/form-data">
					  <input type="hidden" name="cadastrar" id="cadastrar" value="1">
					  <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>">
					  
							<div class="form-group">
							<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Agent']; ?></label>
							<input type="text" class="form-control" id="agent" name="agent" placeholder="<?php echo $_SESSION[$_SESSION['lang']]['Agent name']; ?>" value="<?php echo $agent; ?>" required>
						</div>
						  
						<div class="form-group">
							<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Description']; ?></label>
							<textarea class="form-control" id="description" name="description" placeholder="<?php echo $_SESSION[$_SESSION['lang']]['Description']; ?>" ><?php echo $description; ?></textarea>
						</div>
						    
					
						  
						
						
				
				<button type="submit" name="btn2" class="btn btn-block bg-gradient-info btn-sm" value="2"><?php echo $_SESSION[$_SESSION['lang']]['Save']; ?>
					  </form>
              </div> 
			  <div class="col-sm-4 col-md-6">
               <div class="callout callout-info">
                  <h5><?php echo $_SESSION[$_SESSION['lang']]['Agent']; ?></h5>

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