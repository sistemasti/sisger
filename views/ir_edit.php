<?php

require_once("header.php");


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
            <h1>Edit Risks</h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>-->
			<a href="ir_risks"><button type="button" class="btn btn-block btn-outline-success btn-xs">Return</button></a>
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
								$i 			= Risks::select_risk_id($_REQUEST['id']);
								
								
								
								if(isset($_POST['name'])){ 
									$name = removerCodigoMalicioso(trim($_POST['name'])); 
								}else{ 
									$name = $i['name']; 
								}
									
								if(isset($_POST['summary'])){ 
									$summary = removerCodigoMalicioso(trim($_POST['summary'])); 
								}else{ 
									$summary = $i['summary']; 
								}											
											
								if(isset($_POST['ec_groups_id'])){ 
									$ec_groups_id = removerCodigoMalicioso(trim($_POST['ec_groups_id'])); 
								}else{ 
									$ec_groups_id = $i['ec_groups_id']; 
								}
								
								if(isset($_POST['data_analyzed'])){ 
									$data_analyzed = removerCodigoMalicioso(trim($_POST['data_analyzed'])); 
								}else{ 
									$data_analyzed =$i['data_analyzed']; 
								}																
																					
								if(isset($_POST['ir_agents_id'])){ 
									$ir_agents_id = removerCodigoMalicioso(trim($_POST['ir_agents_id'])); 
								}else{ 
									$ir_agents_id =$i['ir_agents_id']; 
								}
											
									
								if ( isset($_POST['cadastrar']) ){
									
								
										
									if ( $txterr == "" ){
																				
										//Documents::insert_document($name,$summary,$risk_group,$_SESSION['institutions_id'],$_SESSION['project_id'],$ir_agents_id);
										
										Risks::update_risk($name, $summary, $ec_groups_id, $ir_agents_id, $data_analyzed, $_REQUEST['id']);
										
										
										
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
			   <form name="frmDocuments" method="post" action="ir_edit"  enctype="multipart/form-data">
					  <input type="hidden" name="cadastrar" id="cadastrar" value="1">
					  <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>">
					  
						<div class="form-group">
							<label for="Name">Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Risk name" value="<?php echo $name; ?>" required <?php echo $readonly; ?>>
						</div>
						  
						<div class="form-group">
							<label for="Name">Summary</label>
							<textarea class="form-control" id="summary" name="summary" placeholder="Risk summary sentence" <?php echo $readonly; ?> maxlength="500"><?php echo $summary; ?></textarea>
						</div>
						  
						<div class="form-group">	
                        <label>Agent</label>
						
                        <select class="form-control" id="ir_agents_id"
					name="ir_agents_id" <?php echo $readonly; ?>>
                           <?php 
							$in = Agents::select_ir_agents();												
							foreach($in['dados'] as $in){
								
								if($in['id'] == $ir_agents_id){
								
						  ?>
								<option value="<?php echo $in['id']; ?>" selected><?php echo $in['agent']; ?></option>
						  <?php 
						  
								}else{
											
						  ?>
								<option value="<?php echo $in['id']; ?>"><?php echo $in['agent']; ?></option>
						  <?php
								}	
							}
						  ?>
                          
                         
                        </select>
						
                </div>
						  
				<div class="form-group">	
                        <label>Risk group name</label>
						
                        <select class="form-control" id="ec_groups_id"
					name="ec_groups_id" <?php echo $readonly; ?>>
                           <?php 
							$in = Risks::select_risk_group();												
							foreach($in['dados'] as $in){
								
								if($in['id'] == $ec_groups_id){
								
						  ?>
								<option value="<?php echo $in['id']; ?>" selected><?php echo $in['risk_group']; ?></option>
						  <?php 
						  
								}else{
											
						  ?>
								<option value="<?php echo $in['id']; ?>"><?php echo $in['risk_group']; ?></option>
						  <?php
								}	
							}
						  ?>
                          
                         
                        </select>
						
                </div>
						
				 <div class="form-group">
                  <label>Date analyzed </label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" class="form-control"  id="data_analyzed"
					name="data_analyzed"  value="<?php echo $data_analyzed; ?>"  onKeyDown="Mascara(this,Data);" onKeyPress="Mascara(this,Data);" onKeyUp="Mascara(this,Data);" maxlength="10" required>
                  </div>
                  <!-- /.input group -->
                </div>		    
					
						  
						
						
				<?php if($readonly != "readonly"){ ?>
				<button type="submit" name="btn2" class="btn btn-block bg-gradient-info btn-sm" value="2">Save</button>
				<?php } ?>
				
					  </form>
              </div> 
			  <div class="col-sm-4 col-md-6">
               <div class="callout callout-info">
                  <h5>Identify Risks</h5>

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