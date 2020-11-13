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
            <h1>Zoom list register (Analyze option)</h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>-->
			<a href="zoom_list?type=1&risk_id=<?php echo $_GET['risk_id']; ?>&option_id=<?php echo $_GET['option_id']; ?>"><button type="button" class="btn btn-block btn-outline-success btn-xs">Return</button></a>
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
								
								if(isset($_POST['agent'])){ 
									$agent = removerCodigoMalicioso(trim($_POST['agent'])); 
								}else{ 
									$agent = ''; 
								}
									
								if(isset($_POST['description'])){ 
									$description = removerCodigoMalicioso(trim($_POST['description'])); 
								}else{ 
									$description = ''; 
								}											
									
								if ( isset($_POST['cadastrar']) ){
									
								
										
									if ( $txterr == "" ){
																				
										//Documents::insert_document($name,$summary,$risk_group,$_SESSION['institutions_id'],$_SESSION['project_id'],$ir_agents_id);
										
										Agents::insert_agents($agent,$description);
										
										if($btn2 == "2"){
											
											echo'<script language= "JavaScript">alert("Registration successful.");location.href="ir_agents"</script>';
											
										}
										$agent = ''; 		
										$description = ''; 
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
			   <form name="frmZoomLista" id="frmZoomLista" method="post" action="ir_agents_register"  enctype="multipart/form-data">
					  <input type="hidden" name="cadastrar" id="cadastrar" value="1">
					  <input type="hidden" id="risk_id" name="risk_id" value="<?php echo $_REQUEST['risk_id']; ?>">
						<div class="form-group">
							<label for="Name">Register</label>
							<select class="form-control" id="value_table" name="value_table" onchange="select_dados_value_table_id(this.value)">
							<option value="" >select</option>
				<?php 
				$in = Build_value_pie::select_ec_value_pie_table_all_zoom_list_o($_REQUEST['option_id']);
				
				foreach($in['dados'] as $in){
					
				$gr = Build_value_pie::select_ec_groups_value_id($in['group_id']);
				$sb = Build_value_pie::select_ec_subgroups_value_id($in['subgroup_id']);
				?>
							
							   <option value="<?php echo $in['id']; ?>" >
							   <?php echo $gr['name'].", ".$sb['name']; ?>
							   </option>
							
							 
				<?php } ?>

																					
																								</select>
						</div>
						  <script>
															function select_dados_value_table_id(id) {			
															 
															  $.ajax({
																type: "POST",
																url: "ajax_process/select_dados_value_table_id.php",
																data: {
																	id: id
																},
																dataType: 'json',
																success: function(data) {
																	
																	$("#numbers_itens_inp").val(data['items_in_group']);
																	$("#identification").val(data['identification']);						
																	$("#id_ec_value_pie_table").val(data['id_ec_value_pie_table']);						
																  
																	
																}
															  });
															}
														
														
														</script>
						<div class="form-group">
							<label for="Name">Numbers of itens in subgroup</label>
							<div class="row">
														<div class="col-sm-12 col-md-12">
															<input type="text" class="form-control" id="numbers_itens_inp" name="numbers_itens_inp" placeholder="0" value="" readonly required>
														</div>
																									
															<input type="hidden" class="form-control" id="identification" name="identification" placeholder="0" value="" readonly required>
															
														<div class="col-sm-6 col-md-6">
															<input type="hidden" class="form-control" id="id_ec_value_pie_table" name="id_ec_value_pie_table" placeholder="0" value="" readonly required>
														
														</div>
							</div>
						</div>
						
						
						 <div class="row">
														 <div class="col-sm-4 col-md-4">
														 <div class="form-group">
															<label for="Name">Low estimate</label>
															<input type="text" class="form-control" id="low_estimate" name="low_estimate" placeholder="" value="<?php echo $low_estimate; ?>" onkeypress="return keypressed( this , event );" required>
														 </div>
														 </div> 
														 <div class="col-sm-4 col-md-4">
														  <div class="form-group">
															<label for="Name">Most Probable</label>
															<input type="text" class="form-control" id="most_probable" name="most_probable" placeholder="" value="" onkeypress="return keypressed( this , event );" required>
														 </div>
														 </div> 
														 <div class="col-sm-4 col-md-4">
														 <div class="form-group">
															<label for="Name">High estimate</label>
															<input type="text" class="form-control" id="high_estimate" name="high_estimate" placeholder="" value="" required onkeypress="return keypressed( this , event );">
														 </div>
														 <!--<div style="float:right">
														 <button type="button" onclick="zoom_list_save();" class="btn btn-info">Save</button>
														 </form>
														 </div>-->
														 </div>
														 </div> 
						<script>
											
											function keypressed( obj , e ) {
												 var tecla = ( window.event ) ? e.keyCode : e.which;
												 var texto = obj.value
												 //var indexvir = texto.indexOf(",")
												 var indexpon = texto.indexOf(".")
												
												if ( tecla == 8 || tecla == 0 )
													return true;
												if ( tecla != 46 && tecla < 48 || tecla > 57 )
													return false;
												/* if (tecla == 44) { if (indexvir !== -1 || indexpon !== -1) {return false} } */
												if (tecla == 46) { if (indexvir !== -1 || indexpon !== -1) {return false} }
											}
											
											function formataAnyDecimal (value,id){
												
												var d1 = value.substring(0,1);
												var d2 = value.substring(1,10);
												
												document.getElementById(id).value = d1+','+d2;
												
												
											}
											
											</script>
						
						<button type="button" onclick="if( document.getElementById('value_table').value==''){ alert('select a register'); }else{ zoom_list_save(1) }" name="btn1" class="btn btn-block bg-gradient-primary btn-sm" value="1">Save & Add New</button>
				
						<button type="button" name="btn2" class="btn btn-block bg-gradient-info btn-sm" value="2" onclick="if( document.getElementById('value_table').value==''){  alert('select a register'); }else{ zoom_list_save(2) }" >Save & Return</button>
					  </form>
              </div> 
			  <div class="col-sm-4 col-md-6">
               <div class="callout callout-info">
                  <h5>Zoom list register</h5>

                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum est id elit auctor consequat. In mattis massa nibh, et scelerisque ipsum molestie sit amet. Nulla sagittis consectetur odio non eleifend. </p>
                </div>
              </div>
			  <script>


							function zoom_list_save(r) {	
							     if( 
							   
							   document.getElementById('low_estimate').value == '' ||
							   document.getElementById('most_probable').value == '' ||
							   document.getElementById('high_estimate').value == '' 
							   
							   ){
								   alert('Low estimate, Most probable and High estimate fields are required');
							   }else{   
							   
							   
								var formulario = document.getElementById('frmZoomLista');
								var dados = new FormData(formulario);
							  
							  $.ajax({
								dataType: 'json',
								type: "POST",
								url: "ajax_process/zoom_list_save_o.php?risk_id="+<?php echo $_REQUEST['risk_id']; ?>+"&option_id="+<?php echo $_REQUEST['option_id']; ?>,
								data: dados,
								processData: false,
								contentType: false,
								success: function(data) {
									if(data==1){
										
											alert('Register save successfull');
											
											if(r == 1){
												location.reload();
											}else{
												location.href = "zoom_list?type=1&risk_id="+<?php echo $_REQUEST['risk_id']; ?>+"&option_id="+<?php echo $_REQUEST['option_id']; ?>;
											}		
											
											
									}else{ 
									
											alert('Falha');
											
							
									}	
									window.scrollTo(0, 0);
								}
							  })
							   }
							}
						</script>	
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