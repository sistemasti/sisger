<?php

require_once("header.php");
if($_SESSION['perfil_logado'] != "1"){ 

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
            <h1>Institution Edit</h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>-->
			<a href="institution_report"><button type="button" class="btn btn-block btn-outline-success btn-xs">Return</button></a>
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
								
								$i = Institutions::select_institutions_id($_REQUEST['id']);
								
								if(isset($_POST['name'])){ 
									$name = removerCodigoMalicioso(trim($_POST['name'])); 
								}else{ 
									$name = $i['name']; 
								}
																
								if(isset($_POST['sigla'])){ 
									$sigla = removerCodigoMalicioso(trim($_POST['sigla'])); 
								}else{ 
									$sigla = $i['sigla']; 
								}
																	
								if(isset($_POST['code'])){ 
									$code = removerCodigoMalicioso(trim($_POST['code'])); 
								}else{ 
									$code = $i['code']; 
								}
																
								if(isset($_POST['description'])){ 
									$description = removerCodigoMalicioso(trim($_POST['description'])); 
								}else{ 
									$description = $i['description']; 
								}
								
								if(isset($_POST['type'])){ 
									$type = removerCodigoMalicioso(trim($_POST['type'])); 
								}else{ 
									$type = $i['type'];  
								}
								
								if(isset($_POST['hierarquie'])){ 
									$hierarquie = removerCodigoMalicioso(trim($_POST['hierarquie'])); 
								}else{ 
									$hierarquie = $i['hierarquie'];  
								}
								
									
								if ( isset($_POST['cadastrar']) ){
									
									
									
										
									if ( $txterr == "" ){
										
										Institutions::update_institution($name, $code, $sigla, $description, 10, 0, $_REQUEST['id']);
										
										echo'<script language= "JavaScript">alert("Registration successful.");location.href="institution_report"</script>';
										
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
			  <form name="frmInstitution" method="post" action="institution_edit">
			  <input type="hidden" name="cadastrar" id="cadastrar" value="1">
			  <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>">
			    <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter institution name" value="<?php echo $name; ?>" required>
                  </div>
				  
			    <div class="form-group">
                    <label for="Sigla">Code</label>
                    <input type="code" class="form-control" id="code"
					name="code" placeholder="Enter institution code " value="<?php echo $code; ?>">
                  </div>
				  
			    <div class="form-group">
                    <label for="Sigla">Acronym</label>
                    <input type="text" class="form-control" id="sigla"
					name="sigla" placeholder="Enter institution acronym"  required value="<?php echo $sigla; ?>">
                </div>
				  
				<div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" placeholder="Talk about the institution. Your goals, values and mission.." id="description"
					name="description"><?php echo $description; ?></textarea>
                </div>
				<!--
				<div class="form-group">
                        <label>Type</label>
                        <select class="form-control" id="type"
					name="type" onchange="if(this.value=='10'){document.getElementById('bxHierarquie').style.display='none'}else{document.getElementById('bxHierarquie').style.display='block'}" required>
                          <option value="10" <?php if($type == "10"){ echo "selected"; $displayHierarquie="none"; }; ?>>Institution</option>
                          <option value="20" <?php if($type == "20"){ echo "selected"; $displayHierarquie="block"; }; ?>>Unity</option>
                          <option value="30" <?php if($type == "30"){ echo "selected"; $displayHierarquie="block"; }; ?>>Sector</option>
                         
                        </select>
                </div>
              
				<div class="form-group" id="bxHierarquie" style="display:<?php echo $displayHierarquie ?>;" >
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
				<button type="submit" class="btn btn-block bg-gradient-primary btn-sm">Save</button>
              </form>
              </div> 
			  <div class="col-sm-4 col-md-6">
               <div class="callout callout-info">
                  <h5>Institution Edit</h5>

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