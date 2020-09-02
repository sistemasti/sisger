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
            <h1>Mixed Values</h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>
			<a href="institution_report"><button type="button" class="btn btn-block btn-outline-success btn-xs">Report</button></a>
          --></div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
			  
				<script>
				
					
					function select_risk(id) {			
					  var i = '#row'+id;
					  $.ajax({
						type: "POST",
						url: "ajax_process/select_risk.php",
						data: {
							id: id
						},
						dataType: 'json',
						success: function(data) {
							
						    $("#agent").val(data['agent']);
						    $("#description").val(data['summary']);						
						    $("#explain_le").val('testeeeeeeeeeeee');						
							
							//A
						    $("#type_risk").val(data['type_risk']);							
						    $("#fdLow").val(data['fdLow']);
						    $("#fdProbable").val(data['fdProbable']);
						    $("#fdUncert").val(data['fdUncert']);							
						    $("#bxLow").html(data['fdLow']);
						    $("#bxProbable").html(data['fdProbable']);
						    $("#bxHigh").html(data['fdHigh']);
						    $("#bxUncert").html(data['fdUncert']);							
							document.getElementById('type_risk').value = data['type_risk'];						 
							$("#fdUncert").val(data['fdUncert']);
						    $("#explain").val(data['explain']);
						    $("#ley").val(data['ley']);
						    $("#abey").val(data['abey']);
						    $("#hey").val(data['hey']);						
							
							//B							
							$("#B_fdLow").val(data['B_fdLow']);
							$("#B_fdProbable").val(data['B_fdProbable']);
							$("#B_fdHigh").val(data['B_fdHigh']);
							$("#B_fdUncert").val(data['B_fdUncert']);
														
							$("#B_bxLow").html(data['B_fdLow']);
							$("#B_bxProbable").html(data['B_fdProbable']);
							$("#B_bxHigh").html(data['B_fdHigh']);
							$("#lei_Div_Range").html(data['B_fdUncert']);
							
							$("#explain_le").val(data['explain_le']);						
							
							if(data['steps'] == "1"){
								document.getElementById("steps1").checked = true;
								
								document.getElementById('bxWords').style.display='block';
								document.getElementById('bxFraction').style.display='none';
								document.getElementById('bxPercentage').style.display='none';
								document.getElementById('bxDecimals').style.display='none';
								document.getElementById('bxAnyDecimals').style.display='none';
								
								$("#he").val(data['he']);
								$("#pl").val(data['pl']);
								$("#le").val(data['le']);
								
							}	
							
							if(data['steps'] == "2"){
								document.getElementById("steps2").checked = true;
								
								document.getElementById('bxWords').style.display='none';
								document.getElementById('bxFraction').style.display='block';
								document.getElementById('bxPercentage').style.display='none';
								document.getElementById('bxDecimals').style.display='none';
								document.getElementById('bxAnyDecimals').style.display='none';
								
								$("#he2").val(data['he2']);
								$("#pl2").val(data['pl2']);
								$("#le2").val(data['le2']);
								
							}	
							
							if(data['steps'] == "3"){
								document.getElementById("steps3").checked = true;
								
								document.getElementById('bxWords').style.display='none';
								document.getElementById('bxFraction').style.display='none';
								document.getElementById('bxPercentage').style.display='block';
								document.getElementById('bxDecimals').style.display='none';
								document.getElementById('bxAnyDecimals').style.display='none';
								
								$("#he3").val(data['he3']);
								$("#pl3").val(data['pl3']);
								$("#le3").val(data['le3']);
								
							}	
							
							if(data['steps'] == "4"){
								
								document.getElementById("steps4").checked = true;								
								
								document.getElementById('bxWords').style.display='none';
								document.getElementById('bxFraction').style.display='none';
								document.getElementById('bxPercentage').style.display='none';
								document.getElementById('bxDecimals').style.display='block';
								document.getElementById('bxAnyDecimals').style.display='none';
								
								$("#he4").val(data['he4']);
								$("#pl4").val(data['pl4']);
								$("#le4").val(data['le4']);
								
							}	
							
							if(data['steps'] == "5"){
								
								document.getElementById("steps5").checked = true;
								
								document.getElementById('bxWords').style.display='none';
								document.getElementById('bxFraction').style.display='none';
								document.getElementById('bxPercentage').style.display='none';
								document.getElementById('bxDecimals').style.display='none';
								document.getElementById('bxAnyDecimals').style.display='block';
								
								$("#he5").val(data['he5']);
								$("#pl5").val(data['pl5']);
								$("#le5").val(data['le5']);
								
							}	
							 
							if(data['steps'] == ""){
								
								document.getElementById("steps1").checked = true;
								
								document.getElementById('bxWords').style.display='block';
								document.getElementById('bxFraction').style.display='none';
								document.getElementById('bxPercentage').style.display='none';
								document.getElementById('bxDecimals').style.display='none';
								document.getElementById('bxAnyDecimals').style.display='none';
								
								$("#B_bxLow").html("0.0");
								$("#B_bxProbable").html("0.0");
								$("#B_bxHigh").html("0.0");
								$("#lei_Div_Range").html("0.0");
								
								$("#he").val("");
								$("#pl").val("");
								$("#le").val("");
							}	
							
							//C
							$("#ia_Inp_Min").val(data['ia_Inp_Min']);
							$("#ia_Inp_Med").val(data['ia_Inp_Med']);
							$("#ia_Inp_Max").val(data['ia_Inp_Max']);
							$("#ia_Inp_Range").val(data['ia_Inp_Range']);
							
							$("#ia_Div_Min").html(data['ia_Inp_Min']);
							$("#ia_Div_Med").html(data['ia_Inp_Med']);
							$("#ia_Div_Max").html(data['ia_Inp_Max']);
							$("#ia_Div_Range").html(data['ia_Inp_Range']);
							
							$("#explain_ia").val(data['explain_ia']);
							
							$("#heia").val(data['heia']);
							$("#plia").val(data['plia']);
							$("#leia").val(data['leia']);
							
							//Magnitude
							$("#magnitude_FR_Low").html(data['fdHigh']);
							$("#magnitude_FR_Probable").html(data['fdProbable']);
							$("#magnitude_FR_High").html(data['fdLow']);
							
							$("#magnitude_LE_Min").html(data['B_fdLow']);
							$("#magnitude_LE_Med").html(data['B_fdProbable']);
							$("#magnitude_LE_Max").html(data['B_fdHigh']);
							
							$("#magnitude_IA_Min").html(data['ia_Inp_Min']);
							$("#magnitude_IA_Med").html(data['ia_Inp_Med']);
							$("#magnitude_IA_Max").html(data['ia_Inp_Max']);
							
							$("#magnitude_SOMA_L").html(data['magnitude_SOMA_L']);
							$("#magnitude_SOMA_P").html(data['magnitude_SOMA_P']);
							$("#magnitude_SOMA_H").html(data['magnitude_SOMA_H']);
							$("#magnitude_SOMA_RANGE").html(data['magnitude_SOMA_RANGE']);
							
							$("#magnitude_FR_MEDIA").html(data['magnitude_FR_MEDIA']);
							$("#magnitude_LE_MEDIA").html(data['magnitude_LE_MEDIA']);
							$("#magnitude_IA_MEDIA").html(data['magnitude_IA_MEDIA']);
							
							$("#magnitude_SOMA_MEDIA").html(data['magnitude_SOMA_MEDIA']);
							
						}
					  });
					}
				
				
				</script>
			  <script>
							function magnitudeRisk(){
								
								//
								var sumLow = parseFloat(document.getElementById('magnitude_FR_Low').innerHTML)+parseFloat(document.getElementById('magnitude_LE_Min').innerHTML)+parseFloat(document.getElementById('magnitude_IA_Min').innerHTML);
								
								document.getElementById('magnitude_SOMA_L').innerHTML = sumLow.toFixed(1);
								
								//
								var sumP = parseFloat(document.getElementById('magnitude_FR_Probable').innerHTML)+parseFloat(document.getElementById('magnitude_LE_Med').innerHTML)+parseFloat(document.getElementById('magnitude_IA_Med').innerHTML);								
								
								document.getElementById('magnitude_SOMA_P').innerHTML = sumP.toFixed(1);
								
								//
								var sumH = parseFloat(document.getElementById('magnitude_FR_High').innerHTML)+parseFloat(document.getElementById('magnitude_LE_Max').innerHTML)+parseFloat(document.getElementById('magnitude_IA_Max').innerHTML);								
								
								document.getElementById('magnitude_SOMA_H').innerHTML = sumH.toFixed(1);
								
								//
								var un_range = document.getElementById('magnitude_SOMA_H').innerHTML - document.getElementById('magnitude_SOMA_L').innerHTML;								
								
								document.getElementById('magnitude_SOMA_RANGE').innerHTML = un_range.toFixed(1);
								
								//
								var somaTotal = parseFloat(document.getElementById('magnitude_FR_MEDIA').innerHTML) + parseFloat(document.getElementById('magnitude_LE_MEDIA').innerHTML) + parseFloat(document.getElementById('magnitude_IA_MEDIA').innerHTML);
								
								document.getElementById('magnitude_SOMA_MEDIA').innerHTML = somaTotal.toFixed(1);
								
								
							}	
							</script>
                <div class="row">
             
              <div class="col-sm-4 col-md-12">
			  
				
			  
			  
			  
			  
			  
				<div class="col-12 col-sm-6 col-lg-12">
					<div class="card card-primary card-outline card-outline-tabs">
					  <div class="card-header p-0 border-bottom-0">
						<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
						  <li class="nav-item">
							<a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Enter the values</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Select the values scale</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Build the Value Pie</a>
						  </li>

						</ul>
					  </div>
					  <div class="card-body">
						<div class="tab-content" id="custom-tabs-three-tabContent"> 
							
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->
						  <!-- #################### FREQUENCY OR RATE ###################### -->
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->
						   <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
							<section class="content-header">
							  <div class="container-fluid">
								<div class="row mb-2">
								  <div class="col-sm-10">
									<h1>&nbsp;</h1>
								  </div>
								  <div class="col-sm-2">
									<!--<ol class="breadcrumb float-sm-right">
									  <li class="breadcrumb-item"><a href="#">Home</a></li>
									  <li class="breadcrumb-item active">Report Institution</li>
									</ol>
									<br>-->
									<a href="values_register"><button type="button" class="btn btn-block btn-outline-success btn-xs">Register a new value</button></a>
								  </div>
								</div>
							  </div><!-- /.container-fluid -->
							</section>

								<div class="row">
								  <div class="col-md-12">
									<div class="card">
									  
									  <!-- /.card-header -->
									<div class="card-body">
									  <table id="example1" class="table table-bordered table-striped">
									   <thead>
																<tr>
																  <th>ID</th>
																  <th>Name</th>                
																  <th>Weight</th>                
																  <th>Definition</th>                
																  <th>Notes</th>                
																  <th></th>                
																 
																</tr>
															</thead>
										<tbody>
										
											
													  
																					<tr id="row">
																  <td>1</td>
																  <td>Historic</td>							 				  
																  <td>15,00</td>
																  <td>Historic definion <br> line 2 <br> line 3</td>
																  <td>Historic notes</td>
																
																  <td>

																			<a href="project_edit?id="><button type="button" class="btn btn-block btn-info btn-sm">Edit</button></a>
																	
																  </td>
																</tr>
																
																<tr id="row">
																  <td>2</td>
																  <td>Scientif definition</td>							 				  
																  <td>5,00</td>
																  <td>Historic definion <br> line 2 <br> line 3</td>
																  <td>Historic notes</td>
																
																  <td>

																			<a href="project_edit?id="><button type="button" class="btn btn-block btn-info btn-sm">Edit</button></a>
																	
																  </td>
																</tr>
																
																<tr id="row">
																  <td>3</td>
																  <td>Artistic</td>							 				  
																  <td>1,00</td>
																  <td>Historic definion <br> line 2 <br> line 3</td>
																  <td>Historic notes</td>
																
																  <td>

																			<a href="project_edit?id="><button type="button" class="btn btn-block btn-info btn-sm">Edit</button></a>
																	
																  </td>
																</tr>
											
											
									  </table>
									</div>
									  <!-- ./card-body -->
								   
									</div>
									<!-- /.card -->
								  </div>
								  <!-- /.col -->
								</div>
								</div>
												
												  
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->
						  <!-- #################### LOSS TO EACH ITEM ###################### -->
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->
						  
							<div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
									<script>	
									
									function valueScale(){
									
									var ratio = document.getElementById('ratio').value;
									
									document.getElementById('v_none').value = 0;
									document.getElementById('v_very_small').value = 1;
									document.getElementById('v_small').value = ratio;
									document.getElementById('v_medium').value = document.getElementById('v_small').value * ratio;
									document.getElementById('v_large').value = document.getElementById('v_medium').value * ratio;
									document.getElementById('v_very_large').value = document.getElementById('v_large').value * ratio;
									document.getElementById('v_exceptional').value = document.getElementById('v_very_large').value * ratio;
									
										
										
									}	
									
									</script>	
									<div class="row">
										<div class="col-sm-4 col-md-6" style="text-align:right; ">
											<div style="margin-top:6px;">
												The items do not possess this contributing value
											</div>	
										</div>
										<div class="col-sm-4 col-md-1">
											<input type="text" class="form-control" id="ratio" name="ratio" value="" required>
										</div>
										<div class="col-sm-4 col-md-5">
											<div style="margin-top:6px;">
												<button type="button" class="btn btn-block btn-info btn-sm" style="width:40%" onclick="valueScale()">save & refresh</button>
											</div>	
										</div>
									</div>
									
									<br>
									<br>
									<br>
									<div class="row">
										<div class="col-sm-4 col-md-6" style="text-align:right; ">
											<div style="margin-top:6px;">
												The items do not possess this contributing value <strong> None </strong>
											</div>	
										</div>
										<div class="col-sm-4 col-md-1">
											<input type="text" class="form-control" id="v_none" name="v_none" value="" required readonly>
										</div>
										<div class="col-sm-4 col-md-5">
											<div style="margin-top:6px;">
												The items do not possess this contributing value
											</div>	
										</div>
									</div><br>
										<div class="row">
										<div class="col-sm-4 col-md-6" style="text-align:right; ">
											<div style="margin-top:6px;">
												The occurrence of this contributing value in the items is <strong> very small </strong>
											</div>	
										</div>
										<div class="col-sm-4 col-md-1">
											<input type="text" class="form-control" id="v_very_small" name="v_very_small" value="" required readonly>
										</div>
										<div class="col-sm-4 col-md-5">
											<div style="margin-top:6px;">
												(This is the benchmark step, assigned 1 point)
											</div>	
										</div>
									</div><br>
									
										<div class="row">
										<div class="col-sm-4 col-md-6" style="text-align:right; ">
											<div style="margin-top:6px;">
												The occurrence of this contributing value in the items is <strong> small </strong>
											</div>	
										</div>
										<div class="col-sm-4 col-md-1">
											<input type="text" class="form-control" id="v_small" name="v_small" value="" required readonly>
										</div>
										<div class="col-sm-4 col-md-5">
											<div style="margin-top:6px;">
												times greater than that corresponding to the score “1”
											</div>	
										</div>
									</div><br>
									
										<div class="row">
										<div class="col-sm-4 col-md-6" style="text-align:right; ">
											<div style="margin-top:6px;">
												The occurrence of this contributing value in the items is <strong> medium </strong>
											</div>	
										</div>
										<div class="col-sm-4 col-md-1">
											<input type="text" class="form-control" id="v_medium" name="v_medium" value="" required readonly>
										</div>
										<div class="col-sm-4 col-md-5">
											<div style="margin-top:6px;">
												times greater than that corresponding to the score “1”
											</div>	
										</div>
									</div><br>
									
										<div class="row">
										<div class="col-sm-4 col-md-6" style="text-align:right; ">
											<div style="margin-top:6px;">
												The occurrence of this contributing value in the items is <strong> large </strong>
											</div>	
										</div>
										<div class="col-sm-4 col-md-1">
											<input type="text" class="form-control" id="v_large" name="v_large" value="" required readonly>
										</div>
										<div class="col-sm-4 col-md-5">
											<div style="margin-top:6px;">
												times greater than that corresponding to the score “1”
											</div>	
										</div>
									</div><br>
									
										<div class="row">
										<div class="col-sm-4 col-md-6" style="text-align:right; ">
											<div style="margin-top:6px;">
												The occurrence of this contributing value in the items is <strong> very large </strong>
											</div>	
										</div>
										<div class="col-sm-4 col-md-1">
											<input type="text" class="form-control" id="v_very_large" name="v_very_large" value="" required readonly>
										</div>
										<div class="col-sm-4 col-md-5">
											<div style="margin-top:6px;">
												times greater than that corresponding to the score “1”
											</div>	
										</div>
									</div><br>
									
										<div class="row">
										<div class="col-sm-4 col-md-6" style="text-align:right; ">
											<div style="margin-top:6px;">
												The occurrence of this contributing value in the items is <strong> exceptional </strong>
											</div>	
										</div>
										<div class="col-sm-4 col-md-1">
											<input type="text" class="form-control" id="v_exceptional" name="v_exceptional" value="" required readonly>
										</div>
										<div class="col-sm-4 col-md-5">
											<div style="margin-top:6px;">
												times greater than that corresponding to the score “1”
											</div>	
										</div>
									</div>
									
							</div>
						  
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->
						  <!-- #################### ITEMS AFFECTED ###################### -->
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->
						  
							<div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
								
								<h1>Hello 3</h2>
								
								
							</div>
						  
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->
						  <!-- #################### MAGNITUDE OF RISK ###################### -->
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->

						 <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab" onchange="range_I_A('Max',this.value)">
							 
							 
							<h1>Hello 4</h2>
						  
						</div>
					  </div>
					  <!-- /.card -->
					</div>
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