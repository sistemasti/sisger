	<script>

								function range_I_A(field,value){
									var f=0;

									/* if(field == "Max"){
										
										if(value < document.getElementById('plia_o').value){
												f=1; 	
												alert("This score must be less than or equal to the Expected score. It cannot be changed if the Expected score is empty");
										}

									}
					
									if(field == "Med"){

										if(value > document.getElementById('heia_o').value || value < document.getElementById('leia_o').value ){
												f=1; 	
												alert("This score must be less than or equal to the Expected score. It cannot be changed if the Expected score is empty");
										}

									}
					
									if(field == "Min"){

										if(value > document.getElementById('plia_o').value ){
												f=1; 	
												alert("This score must be less than or equal to the Expected score. It cannot be changed if the Expected score is empty");
										}

									}
									 */
										
									
									if(f==0){
										
									
										document.getElementById('magnitude_IA_'+field+'_o').innerHTML = value;
									
										
										if(
										document.getElementById('heia_o').value != "" &&
										document.getElementById('plia_o').value != "" &&
										document.getElementById('leia_o').value != ""
										){
											var base = parseFloat(document.getElementById('heia_o').value) + parseFloat(document.getElementById('plia_o').value) + parseFloat(document.getElementById('leia_o').value);
											var media = base / 3;		
																
											document.getElementById('magnitude_IA_MEDIA_o').innerHTML = media.toFixed(1);
										}	
										
										//document.getElementById('magnitude_IA_Min_o').innerHTML = value;
										document.getElementById('ia_Div_'+field+"_o").innerHTML = value;
										document.getElementById('ia_Inp_'+field+"_o").value = value;
										
										var range = (document.getElementById('heia_o').value)-(document.getElementById('leia_o').value);
										
										document.getElementById('ia_Div_Range_o').innerHTML = range;
										document.getElementById('ia_Inp_Range_o').value = range;
									
									}
									
									magnitudeRisk_o();
									changeTypeCalc(2);
									//alert('4: '+document.getElementById('magnitude_IA_Min_o').innerHTML);
								}

							</script>	 
						  <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
						  <div class="row">
	<div class="col-sm-4 col-md-6" style="padding:15px;">
										  <div style="float:right;"> 

											  <input type="hidden" id="ia_Inp_Min"  name="ia_Inp_Min" value="<?php echo $ia_Inp_Min; ?>">
											  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="ia_Div_Min" ><?php echo $ia_Inp_Min; ?></div>
											  
											  <input type="hidden" id="ia_Inp_Med" name="ia_Inp_Med" value="<?php echo $ia_Inp_Med; ?>">	
											  <div style="display:inline-block; padding:10px; margin:1px; background-color:#d8d7de; "  id="ia_Div_Med" ><?php echo $ia_Inp_Med; ?></div>
											  
											  <input type="hidden" id="ia_Inp_Max" name="ia_Inp_Max" value="<?php echo $ia_Inp_Max; ?>">	
											  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="ia_Div_Max"><?php echo $ia_Inp_Max; ?></div>
											  &nbsp;
											  &nbsp;
											  &nbsp;
											  &nbsp;
											  &nbsp;
											  &nbsp; <span >Uncertainty range</span>
											  <input type="hidden" id="ia_Inp_Range" name="ia_Inp_Range" value="">	
											  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="ia_Div_Range">0.0</div>
											  </div>
											  
									 
											  
										  <BR>
										  <BR>
										  <BR>
										  <BR>
										<span id="title_id" style="font-size:16px;">What fraction of the value will be affected?</span>
										  <BR>
										  <BR>
											<div class="form-group">
														<label for="Sigla">Explain the estimates of items affected</label>
														<textarea class="form-control" name="explain_ia" id="explain_ia" readonly="readonly"><?php echo $explain_ia; ?></textarea>
														
														<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg_ia" style="float:right; margin-top:2px">
														  Zoom explanation and notes
														</button>	
														<br>
														<br>
														<br>
				
				
											
											<br>
											C.2 Select how this score will be entered:
											<br>
											<?PHP $displayFra = "block"; ?>
											<input type="radio" name="type_score" id="type_score_1" value="1"  onclick="
													document.getElementById('type_score_selected').style.display='1';
													document.getElementById('bxFractionAffected').style.display='block';
													document.getElementById('bxFractionAffected_o').style.display='block';
													document.getElementById('bxValuePieAffected_o').style.display='none';
													
													document.getElementById('C_type_list_o').value='1';
													
													" disabled> Step scale, considering the heritage asset as a whole
													
													<br>
											<input type="radio" name="type_score" id="type_score_2" value="2" onclick="
													
													document.getElementById('type_score_selected').style.display='2';
													document.getElementById('bxFractionAffected').style.display='none';
													document.getElementById('bxFractionAffected_o').style.display='none';
													document.getElementById('bxValuePieAffected_o').style.display='block';
													document.getElementById('C_type_list_o').value='2';
													
													
													
													" <?PHP if(isset($_GET['id_option'])){ echo "checked"; $displayFra = "none"; } ?> disabled> More precise data using the value pie<br>
											
											<input type="hidden" name="C_type_list" id="C_type_list" value='1'>
											<br>
											<br>
											<div id="bxFractionAffected" style="display: <?PHP echo $displayFra; ?>">
													<div class="form-group">
														<label for="Sigla">High estimate</label>
														<select class="form-control" id="heia" name="heia"  onchange="range_I_A('Max',this.value)" disabled>
                           
																<option value="0.0" >Select</option>
																<option value="5.0" <?php if($heia == "5.0"){ echo "selected"; } ?>>~1/1, total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($heia == "4.5"){ echo "selected"; } ?>>~1/3  loss of value in each item affected.</option>
																<option value="4.0" <?php if($heia == "4.0"){ echo "selected"; } ?>>~1/10  loss of value in each item affected.</option>
																<option value="3.5" <?php if($heia == "3.5"){ echo "selected"; } ?>>~1/30  loss of value in each item affected.</option>
																<option value="3.0" <?php if($heia == "3.0"){ echo "selected"; } ?>>~1/100  loss of value in each item affected.</option>
																<option value="2.5" <?php if($heia == "2.5"){ echo "selected"; } ?>>~1/300  loss of value in each item affected.</option>
																<option value="2.0" <?php if($heia == "2.0"){ echo "selected"; } ?>>~1/1000  loss of value in each item affected.</option>
																<option value="1.5" <?php if($heia == "1.5"){ echo "selected"; } ?>>~1/3 000  loss of value in each item affected.</option>
																<option value="1.0" <?php if($heia == "1.0"){ echo "selected"; } ?>>~1/10 000  loss of value in each item affected.</option>
																<option value="0.5" <?php if($heia == "0.5"){ echo "selected"; } ?>>~1/30 000  loss of value in each item affected.</option>
																
																
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Probable loss to each item affected</label>
														<select class="form-control" id="plia" name="plia" onchange="range_I_A('Med',this.value)" disabled>
																
																<option value="0.0" >Select</option>	
																<option value="5.0" <?php if($plia == "5.0"){ echo "selected"; } ?>>~1/1, total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($plia == "4.5"){ echo "selected"; } ?>>~1/3  loss of value in each item affected.</option>
																<option value="4.0" <?php if($plia == "4.0"){ echo "selected"; } ?>>~1/10  loss of value in each item affected.</option>
																<option value="3.5" <?php if($plia == "3.5"){ echo "selected"; } ?>>~1/30  loss of value in each item affected.</option>
																<option value="3.0" <?php if($plia == "3.0"){ echo "selected"; } ?>>~1/100  loss of value in each item affected.</option>
																<option value="2.5" <?php if($plia == "2.5"){ echo "selected"; } ?>>~1/300  loss of value in each item affected.</option>
																<option value="2.0" <?php if($plia == "2.0"){ echo "selected"; } ?>>~1/1000  loss of value in each item affected.</option>
																<option value="1.5" <?php if($plia == "1.5"){ echo "selected"; } ?>>~1/3 000  loss of value in each item affected.</option>
																<option value="1.0" <?php if($plia == "1.0"){ echo "selected"; } ?>>~1/10 000  loss of value in each item affected.</option>
																<option value="0.5" <?php if($plia == "0.5"){ echo "selected"; } ?>>~1/30 000  loss of value in each item affected.</option>
														  
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Low estimate</label>
														<select class="form-control" id="leia" name="leia" onchange="range_I_A('Min',this.value)" disabled>
																
																<option value="0.0" >Select</option>
																<option value="5.0" <?php if($leia == "5.0"){ echo "selected"; } ?>>~1/1, total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($leia == "4.5"){ echo "selected"; } ?>>~1/3  loss of value in each item affected.</option>
																<option value="4.0" <?php if($leia == "4.0"){ echo "selected"; } ?>>~1/10  loss of value in each item affected.</option>
																<option value="3.5" <?php if($leia == "3.5"){ echo "selected"; } ?>>~1/30  loss of value in each item affected.</option>
																<option value="3.0" <?php if($leia == "3.0"){ echo "selected"; } ?>>~1/100  loss of value in each item affected.</option>
																<option value="2.5" <?php if($leia == "2.5"){ echo "selected"; } ?>>~1/300  loss of value in each item affected.</option>
																<option value="2.0" <?php if($leia == "2.0"){ echo "selected"; } ?>>~1/1000  loss of value in each item affected.</option>
																<option value="1.5" <?php if($leia == "1.5"){ echo "selected"; } ?>>~1/3 000  loss of value in each item affected.</option>
																<option value="1.0" <?php if($leia == "1.0"){ echo "selected"; } ?>>~1/10 000  loss of value in each item affected.</option>
																<option value="0.5" <?php if($leia == "0.5"){ echo "selected"; } ?>>~1/30 000  loss of value in each item affected.</option>
														  
														 
														</select>
													</div>
													</div>	
													
												
													<!--<div id="bxValuePieAffected" style="display: none">
														<div class="form-group">
															<label for="Sigla">Low</label>
															<input type="text" class="form-control" id="evento"
															name="evento" placeholder="" value="">
														</div>
														<div class="form-group">
															<label for="Sigla">Probable</label>
															<input type="text" class="form-control" id="evento"
															name="evento" placeholder="" value="">
														</div>
														<div class="form-group">
															<label for="Sigla">High</label>
															<input type="text" class="form-control" id="evento"
															name="evento" placeholder="" value="">
														</div>
														<div class="form-group">
															<label for="Sigla">Item in the subgroup</label>
															<input type="text" class="form-control" id="evento"
															name="evento" placeholder="" value="" readonly>
														</div>
														<div class="form-group">
															<label for="Sigla">Subgroup</label>
															<select class="form-control" name="">
																<option >Arquitetonico,Hosp. Evandro Chagas </option>
																<option >Museulóicos, Tesouros (itens especiais) </option>
																<option >Etomológico, coleção geral </option>
															</select>
														</div>
														<div class="form-group">
														
															<div style="padding:10px; background-color:#efefef">
															<strong>Low:</strong> 34,00&nbsp;
															<strong>Probable:</strong> 343,00&nbsp;
															<strong>High:</strong> 501,00
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Value pie fraction affected:</strong> 2,9% | 29,1% | 3,6%
															
															</div>														
															
														</div>
														
													</div>	-->
												
							<!--<button type="button" class="btn btn-block bg-gradient-success btn-sm">Refresh calculations</button>-->
							
						  </div>
						  </div>
						 
						  
						  
						  <!--- analize --->
						  <!--- analize --->
						  <!--- analize --->
						  <!--- analize --->
						  <!--- analize --->
						  <!--- analize --->
						  <!--- analize --->
						  <!--- analize --->
						  <!--- analize --->
						  <!--- analize --->
						  <!--- analize --->
						  <!--- analize --->
						  <!--- analize --->
						  
						  
						  <div class="col-sm-4 col-md-6" style="padding:15px;background-color:#f9f2d2">
							<form method="post" name="ar_ia_o" id="ar_ia_o">

							<input type="hidden" name="C_type_list_o" id="C_type_list_o" value='1'>

											  
											  <!---  MIN -->
											  <div style="float:right;"> 
												 <input type="hidden" id="ia_Inp_Min_o"  name="ia_Inp_Min_o" value="<?php 
												 if(isset($_GET['ca_low'])){
												 echo  (str_ireplace("C: ","",$_GET['ca_low']));
												 }ELSE{
												 echo $ia_Inp_Min_o; 	 
												 }
												 
												 ?>">
											  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="ia_Div_Min_o" ><?php 
												 if(isset($_GET['ca_low'])){
												 echo (str_ireplace("C: ","",$_GET['ca_low']));
												 }ELSE{
												 echo $ia_Inp_Min_o; 	 
												 }
												 
												 ?></div>
											  
											  
											  
											  <!---  MED -->
											  <input type="hidden" id="ia_Inp_Med_o" name="ia_Inp_Med_o" value="<?php 
											  							if(isset($_GET['ca_media'])){
																		 echo $_GET['ca_media'];
																		 }ELSE{
																		 echo $ia_Inp_Med_o; 	 
																		 }
											  
											  ?>">	
											  <div style="display:inline-block; padding:10px; margin:1px; background-color:#d8d7de;"  id="ia_Div_Med_o" ><?php  
												if(isset($_GET['ca_media'])){
												 echo $_GET['ca_media'];
												 }ELSE{
												 echo $ia_Inp_Med_o; 	 
												 }
											  
											 ?></div>
											  
											  
											  
											  
											  <!---  MAX -->
											  <input type="hidden" id="ia_Inp_Max_o" name="ia_Inp_Max_o" value="<?php 
											  
											   if(isset($_GET['ca_high'])){
												 echo $_GET['ca_high'];
												 }ELSE{
												 echo $ia_Inp_Max_o; 	 
												 }
											  
											  ?>">	
											  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="ia_Div_Max_o"><?php 
											  
											  if(isset($_GET['ca_high'])){
												 echo $_GET['ca_high'];
												 }ELSE{
												 echo $ia_Inp_Max_o; 	 
												 } ?></div>
												 
												 
												 
												 
											  &nbsp;
											  &nbsp;
											  &nbsp;
											  &nbsp;
											  &nbsp;
											  &nbsp; 
											  
											  
											  <!--- MED -->
											  <span >Uncertainty range</span>
											  
											  <input type="hidden" id="ia_Inp_Range_o" name="ia_Inp_Range_o" value="<?php 
											  
											  if(isset($_GET['ca_high'])){
												  echo ($_GET['ca_high'])-(str_ireplace("C: ","",$_GET['ca_low']));
												 }ELSE{
												 echo $ia_Inp_Range_o; 	 
												 } ?>">	
											  
											  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="ia_Div_Range_o"><?php 
											  
											  if(isset($_GET['ca_high'])){
												 echo ($_GET['ca_high'])-(str_ireplace("C: ","",$_GET['ca_low']));
												 }ELSE{
												 echo $ia_Inp_Range_o; 	 
												 } ?></div>
											  </div>
											  
									 
											  
										  <BR>
										  <BR>
										  <BR>
										  <BR>
										<span id="title_id" style="font-size:16px;">What fraction of the value will be affected?</span>
										  <BR>
										  <BR>
											<div class="form-group">
														<label for="Sigla">Explain the estimates of items affected</label>
														<textarea class="form-control" name="explain_ia_o" id="explain_ia_o" onkeyup="document.getElementById('ia_zoom_explanation_fields_o').value=this.value"><?php echo $explain_ia_o; ?></textarea>
														
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg_ia_o" style="float:right; margin-top:2px">
                  Zoom explanation and notes
                </button>	
				<br>
				<br>
				<br>
				
				
											</div>
											
										
											<br>
											<br>											
											<br>
											<br>
											
										
											<br>											
											<?PHP 
											
											if(isset($_GET['id_option'])){
												
													$displayFA_o 	= "none";
													$displayVPA_o 	= "block";
													
													
											}else{
													$displayFA_o 	= "block";
													$displayVPA_o 	= "none";
													
												
											}
												?>
											
											<div id="bxFractionAffected_o" style="display: <?php echo $displayFA_o; ?>">
													<div class="form-group">
														<label for="Sigla">High estimate</label>
														<select class="form-control" id="heia_o" name="heia_o"  onchange="range_I_A('Max',this.value)">
                           
																<option value="0.0" >Select</option>
																<option value="5.0" <?php if($heia == "5.0"){ echo "selected"; } ?>>~1/1, total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($heia == "4.5"){ echo "selected"; } ?>>~1/3  loss of value in each item affected.</option>
																<option value="4.0" <?php if($heia == "4.0"){ echo "selected"; } ?>>~1/10  loss of value in each item affected.</option>
																<option value="3.5" <?php if($heia == "3.5"){ echo "selected"; } ?>>~1/30  loss of value in each item affected.</option>
																<option value="3.0" <?php if($heia == "3.0"){ echo "selected"; } ?>>~1/100  loss of value in each item affected.</option>
																<option value="2.5" <?php if($heia == "2.5"){ echo "selected"; } ?>>~1/300  loss of value in each item affected.</option>
																<option value="2.0" <?php if($heia == "2.0"){ echo "selected"; } ?>>~1/1000  loss of value in each item affected.</option>
																<option value="1.5" <?php if($heia == "1.5"){ echo "selected"; } ?>>~1/3 000  loss of value in each item affected.</option>
																<option value="1.0" <?php if($heia == "1.0"){ echo "selected"; } ?>>~1/10 000  loss of value in each item affected.</option>
																<option value="0.5" <?php if($heia == "0.5"){ echo "selected"; } ?>>~1/30 000  loss of value in each item affected.</option>
																
																
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Probable loss to each item affected</label>
														<select class="form-control" id="plia_o" name="plia_o" onchange="range_I_A('Med',this.value)">
																
																<option value="0.0" >Select</option>	
																<option value="5.0" <?php if($plia == "5.0"){ echo "selected"; } ?>>~1/1, total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($plia == "4.5"){ echo "selected"; } ?>>~1/3  loss of value in each item affected.</option>
																<option value="4.0" <?php if($plia == "4.0"){ echo "selected"; } ?>>~1/10  loss of value in each item affected.</option>
																<option value="3.5" <?php if($plia == "3.5"){ echo "selected"; } ?>>~1/30  loss of value in each item affected.</option>
																<option value="3.0" <?php if($plia == "3.0"){ echo "selected"; } ?>>~1/100  loss of value in each item affected.</option>
																<option value="2.5" <?php if($plia == "2.5"){ echo "selected"; } ?>>~1/300  loss of value in each item affected.</option>
																<option value="2.0" <?php if($plia == "2.0"){ echo "selected"; } ?>>~1/1000  loss of value in each item affected.</option>
																<option value="1.5" <?php if($plia == "1.5"){ echo "selected"; } ?>>~1/3 000  loss of value in each item affected.</option>
																<option value="1.0" <?php if($plia == "1.0"){ echo "selected"; } ?>>~1/10 000  loss of value in each item affected.</option>
																<option value="0.5" <?php if($plia == "0.5"){ echo "selected"; } ?>>~1/30 000  loss of value in each item affected.</option>
														  
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Low estimate</label>
														<select class="form-control" id="leia_o" name="leia_o" onchange="range_I_A('Min',this.value)">
																
																<option value="0.0" >Select</option>
																<option value="5.0" <?php if($leia == "5.0"){ echo "selected"; } ?>>~1/1, total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($leia == "4.5"){ echo "selected"; } ?>>~1/3  loss of value in each item affected.</option>
																<option value="4.0" <?php if($leia == "4.0"){ echo "selected"; } ?>>~1/10  loss of value in each item affected.</option>
																<option value="3.5" <?php if($leia == "3.5"){ echo "selected"; } ?>>~1/30  loss of value in each item affected.</option>
																<option value="3.0" <?php if($leia == "3.0"){ echo "selected"; } ?>>~1/100  loss of value in each item affected.</option>
																<option value="2.5" <?php if($leia == "2.5"){ echo "selected"; } ?>>~1/300  loss of value in each item affected.</option>
																<option value="2.0" <?php if($leia == "2.0"){ echo "selected"; } ?>>~1/1000  loss of value in each item affected.</option>
																<option value="1.5" <?php if($leia == "1.5"){ echo "selected"; } ?>>~1/3 000  loss of value in each item affected.</option>
																<option value="1.0" <?php if($leia == "1.0"){ echo "selected"; } ?>>~1/10 000  loss of value in each item affected.</option>
																<option value="0.5" <?php if($leia == "0.5"){ echo "selected"; } ?>>~1/30 000  loss of value in each item affected.</option>
														  
														 
														</select>
													</div>
													</div>	
													
											<div id="bxValuePieAffected_o" style="display: <?php echo $displayVPA_o; ?>"><br>
											<br>
											<center>
											<a href="javascript:void(0)" onclick="if(document.getElementById('risk').value=='' || document.getElementById('risk').value=='#' ){alert('select a risk');}else{items_affecteds_register_o(1);location.href = 'zoom_list?type=op&option_id='+document.getElementById('id_option').value+'&risk_id='+document.getElementById('risk').value;}"><center><button type="button" class="btn btn-block bg-gradient-info btn-sm" style="padding:20px;width:60%" >Zoom list of items affected</button></center></a>
											<!--<button type="button" class="btn btn-block bg-gradient-info btn-sm" style="padding:20px;width:60%" data-toggle="modal" data-target="#modal-lg_list_affected" onclick="
											 zoom_list_html();
											if(document.getElementById('C_type_list').value=='1'){
												document.getElementById('low_estimate_top').style.display='none';
												document.getElementById('most_probable_top').style.display='none';
												document.getElementById('high_estimate_top').style.display='none';				
												
												document.getElementById('bx_Exposed_Assuming_High').style.display='none';			
												document.getElementById('bx_Exposed_Assuming_Low').style.display='none';			
												document.getElementById('bx_Exposed_Assuming_Most').style.display='none';			
												document.getElementById('bxExposedUsingLow').style.display='none';			
												document.getElementById('bxExposedUsingMost').style.display='none';			
												document.getElementById('bxExposedUsingHigh').style.display='none';			
												
												document.getElementById('bxAllAffectedUsingLow').style.display='block';			
												document.getElementById('bxAllAffectedUsingMost').style.display='block';			
												document.getElementById('bxAllAffectedUsingHigh').style.display='block';			
												document.getElementById('bx_AllAffected_Assuming_Low').style.display='block';			
												document.getElementById('bx_AllAffected_Assuming_Most').style.display='block';			
												document.getElementById('bx_AllAffected_Assuming_High').style.display='block';	
											}	
											
											if(document.getElementById('C_type_list').value=='2'){
												document.getElementById('low_estimate_top').style.display='block';
												document.getElementById('most_probable_top').style.display='block';
												document.getElementById('high_estimate_top').style.display='block';
												
												document.getElementById('bx_Exposed_Assuming_High').style.display='block';			
												document.getElementById('bx_Exposed_Assuming_Low').style.display='block';			
												document.getElementById('bx_Exposed_Assuming_Most').style.display='block';			
												document.getElementById('bxExposedUsingLow').style.display='block';			
												document.getElementById('bxExposedUsingMost').style.display='block';			
												document.getElementById('bxExposedUsingHigh').style.display='block';			
												
												document.getElementById('bxAllAffectedUsingLow').style.display='none';			
												document.getElementById('bxAllAffectedUsingMost').style.display='none';			
												document.getElementById('bxAllAffectedUsingHigh').style.display='none';			
												document.getElementById('bx_AllAffected_Assuming_Low').style.display='none';			
												document.getElementById('bx_AllAffected_Assuming_Most').style.display='none';			
												document.getElementById('bx_AllAffected_Assuming_High').style.display='none';	
											}	
											
											">Zoom list of items affected</button>--></center>
											<br>
											<br>
											<br>
											<br>
											
											<script>
											function zoom_list_html() {	
												
												//alert(name);	
												$.ajax({
												dataType: 'html',
												type: "POST",
												url: "ajax_process/zoom_list_html.php?risk_id="+document.getElementById('risk').value,
												data: {
													name:name		
												},
												processData: false,
												contentType: false,
												success: function(data) {
													//document.getElementById('subgroup_column').style.display='block';
													document.getElementById('zoom_list_html').innerHTML=data;
													//document.getElementById('btnChart').innerHTML="<button type='button' class='btn btn-block bg-gradient-secondary btn-sm'  data-toggle='modal' data-target='#modal-graph"+group_id+"'>Value Pie for the select group</button>";
													
												}
												}); 
												
												
												
												
											}
											</script>
											
											</div>
											
											
											<br>
									<input type="hidden" name="type_score_selected" id="type_score_selected" value="1">
									<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="items_affecteds_register_o(2)">Save</button>
						  </div>
						  	
						  </div>
						  </div>
						  
			
					
				<div class="modal fade" id="modal-lg_ia">
								
					<div class="modal-dialog modal-lg">
					  <form id="frmZoomIA" method="post" enctype="multipart/form-data">
							<div class="modal-dialog modal-lg">
							  <div class="modal-content">
								<div class="modal-header">
								  <h4 class="modal-title">Analysis notes and documents (C)</h4>
								  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								  </button>
								</div>
								<div class="modal-body">
									<span id="zoomRisk_ia" style="padding:10px;margin-bottom:7px;background-color:#E3F5EA"></span>
								<br>&nbsp;								
								
									<div class="row">
										<div class="col-sm-12 col-md-12">
											<textarea class="form-control" placeholder="Obs" name="ia_zoom_obs" ID="ia_zoom_obs" readonly="readonly"><?php echo $ia_zoom_obs; ?></textarea>
										</div>
									</div>
									<br>&nbsp;
									<div class="row">
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label for="Sigla">Explain your estimates for items affecteds</label>
														<textarea class="form-control" name="ia_zoom_explanation_fields" ID="ia_zoom_explanation_fields" readonly="readonly"><?php echo $ia_zoom_explanation_fields; ?></textarea>
													</div>	
												</div>	
												<div class="col-sm-6 col-md-6">
												<div class="form-group">
														<label for="Sigla">Notes for this explanation .</label>
														<textarea class="form-control" name="ia_zoom_notes_explanation" ID="ia_zoom_notes_explanation" readonly="readonly"><?php echo $ia_zoom_notes_explanation; ?></textarea>
													</div>	
												</div>
									</div>
									<hr>
									<h5>Documents associated with this risk its options</h5>
									<br>
									<div class="row">
												<div class="col-sm-4 col-md-4">
													<div class="form-group">
														<label for="Sigla">Document name</label>
														<input type="text" class="form-control" id="ia_zoom_document_name"
													name="ia_zoom_document_name" placeholder=""  required value="<?php echo $ia_zoom_document_name; ?>" readonly="readonly">
													</div>	
												</div>	
												<div class="col-sm-4 col-md-4">
													<div class="form-group">
														<label for="Sigla">Comment</label>
														<input type="text" class="form-control" id="ia_zoom_comment"
													name="ia_zoom_comment" placeholder=""  required value="<?php echo $ia_zoom_comment; ?>" readonly="readonly">
													</div>	
												</div>
												<div class="col-sm-4 col-md-4">
													<div class="form-group">
														<label for="Sigla">Link..</label>
														<input type="text" class="form-control" id="ia_zoom_link"
													name="ia_zoom_link" placeholder=""  required value="<?php echo $ia_zoom_link; ?>" readonly="readonly">
													<div id="ia_zoom_link_bx" style="background-color: #c5dcc6;padding:7px;">
													<?php 
													if($ia_zoom_link != "undefined"){
													echo "<a href='".$ia_zoom_link."' target='_blank'>".$ia_zoom_link."</a>"; 
													}
													?>
													</div>
													</div>	
												</div>														
												<!--<div class="col-sm-3 col-md-3">
													<div class="form-group">
														<label for="Sigla">Document file</label>
														
													<input type="text" class="form-control" id="ia_zoom_document_file"
													name="ia_zoom_document_file" placeholder=""  required value="<?php echo $ia_zoom_document_file; ?>" readonly="readonly">
													<div id="ia_zoom_document_file_bx" style="background-color: #c5dcc6;padding:7px;">
													<?php 
													if($ia_zoom_document_file != "undefined"){
													echo "<a href='".$ia_zoom_document_file."' target='_blank'>".$ia_zoom_document_file."</a>"; 
													}
													?>
													</div>	
													</div>	
												
												<div class="col-sm-3 col-md-2">
													<div class="form-group">
														<br>
														
													</div>	
												</div>	
												
									</div>-->
								</div>
								
							  </div>
							  <!-- /.modal-content -->
							</div>
					<!-- /.modal-dialog -->
					</form>
					  <!-- /.modal-content -->
					</div>
					</div>	
					</div>
					
				
					
				  
				  
				<div class="modal fade" id="modal-lg_ia_o">
								
					<div class="modal-dialog modal-lg">
					  <form id="frmZoomIA_o" method="post" enctype="multipart/form-data">
							<div class="modal-dialog modal-lg">
							  <div class="modal-content">
								<div class="modal-header">
								  <h4 class="modal-title"><?php echo $_SESSION[$_SESSION['lang']]['Analysis notes and documents']; ?> (C)</h4>
								  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								  </button>
								</div>
								<div class="modal-body">
									<span id="zoomRisk_ia_o" style="padding:10px;margin-bottom:7px;background-color:#E3F5EA"><?php echo $risk_name; ?></span>
								<br>&nbsp;								
								
									<div class="row">
										<div class="col-sm-12 col-md-12">
											<textarea class="form-control" placeholder="Obs" name="ia_zoom_obs_o" ID="ia_zoom_obs_o"><?php echo $ia_zoom_obs; ?></textarea>
										</div>
									</div>
									<br>&nbsp;
									<div class="row">
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Explain your estimates for items affecteds']; ?></label>
														<textarea class="form-control" name="ia_zoom_explanation_fields_o" ID="ia_zoom_explanation_fields_o" onkeyup="document.getElementById('explain_ia_o').value=this.value"><?php echo $ia_zoom_explanation_fields_o; ?></textarea>
													</div>	
												</div>	
												<div class="col-sm-6 col-md-6">
												<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Notes for this explanation']; ?> .</label>
														<textarea class="form-control" name="ia_zoom_notes_explanation_o" ID="ia_zoom_notes_explanation_o"><?php echo $ia_zoom_notes_explanation_o; ?></textarea>
													</div>	
												</div>
									</div>
									<hr>
									<h5><?php echo $_SESSION[$_SESSION['lang']]['Documents associated with this risk its options']; ?></h5>
									<br>
									<div class="row">
												<div class="col-sm-4 col-md-4">
													<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Document name']; ?></label>
														<input type="text" class="form-control" id="ia_zoom_document_name_o"
													name="ia_zoom_document_name_o" placeholder=""  required value="<?php echo $ia_zoom_document_name; ?>" >
													</div>	
												</div>	
												<div class="col-sm-4 col-md-4">
													<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Comment']; ?></label>
														<input type="text" class="form-control" id="ia_zoom_comment_o"
													name="ia_zoom_comment_o" placeholder=""  required value="<?php echo $ia_zoom_comment_o; ?>" >
													</div>	
												</div>
												<div class="col-sm-4 col-md-4">
													<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Link']; ?>..</label>
														<input type="text" class="form-control" id="ia_zoom_link_o"
														name="ia_zoom_link_o" placeholder=""  required value="<?php echo $ia_zoom_link_o; ?>"  onkeyup="atualizaFileField ('ia_zoom_link_bx_o',this.value)">
														<div id="ia_zoom_link_bx_o" style="background-color: #c5dcc6;padding:7px;">
															<?php 
															if($ia_zoom_link_o != "undefined"){
															echo "<a href='".$ia_zoom_link_o."' target='_blank'>".$ia_zoom_link_o."</a>"; 
															}
															?>
														</div>
													</div>	
												</div>														
												<!--<div class="col-sm-3 col-md-3">
													<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Document file']; ?></label>
														
													<input type="text" class="form-control" id="ia_zoom_document_file_o"
													name="ia_zoom_document_file_o" placeholder=""  required value="<?php echo $ia_zoom_document_file_o; ?>" onkeyup="atualizaFileField ('ia_zoom_document_file_bx_o',this.value)">
													<div id="ia_zoom_document_file_bx_o" style="background-color: #c5dcc6;padding:7px;">
													<?php 
													if($ia_zoom_document_file_o != "undefined"){
													echo "<a href='".$ia_zoom_document_file_o."' target='_blank'>".$ia_zoom_document_file_o."</a>"; 
													}
													?>
													</div>	
													</div>	
												
												<div class="col-sm-3 col-md-2">
													<div class="form-group">
														<br>
														
													</div>	
												</div>	
												
									</div>-->
								</div>
								<div class="modal-footer justify-content-between">
								  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $_SESSION[$_SESSION['lang']]['Close']; ?></button>
								  <button type="button" class="btn btn-primary" onclick="zoom_ia_save_o(2);items_affecteds_register_o();" data-dismiss="modal"><?php echo $_SESSION[$_SESSION['lang']]['Save changes']; ?></button>
								</div>
							  </div>
							  <!-- /.modal-content -->
							</div>
					<!-- /.modal-dialog -->
					</form>
					  <!-- /.modal-content -->
					</div>
					</div>	
					</div>
				  
						  <script>


					function zoom_ia_save_o(f) {	
					    //alert('success');
						var formulario = document.getElementById('frmZoomIA_o');
						var dados = new FormData(formulario);
					  
					  $.ajax({
						dataType: 'json',
						type: "POST",
						url: "ajax_process/zoom_ia_save_o.php?id_risk="+document.getElementById('risk').value+"&id_option="+document.getElementById('id_option').value,
						data: dados,
						processData: false,
						contentType: false,
						success: function(data) {
							if(data==1){
								
								if(f==2){
									alert('Register save successfull');
									
								}
									
							}else{ 
							
									alert('Falha');
									/* document.getElementById('bxError').style.display='block';
									document.getElementById('bxSucess').style.display='none';
									document.getElementById('bxError').innerHTML=data[1]; */
					
							}	
							window.scrollTo(0, 0);
						}
					  });
					}
				</script>
						 <script>  
							function items_affecteds_register_o(f) {	
							
								if(document.getElementById('risk').value == '#'){
									
									alert("Select a risk");
									
								}else{	
								  var formulario = document.getElementById('ar_ia_o');
								  var dados = new FormData(formulario);								  
								 
								  
								  $.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/ar_ia_register_o.php?id_risk="+document.getElementById('risk').value+"&id_option="+document.getElementById('id_option').value+"&type_score="+document.getElementById('type_score_selected').value+"&C_type_list="+document.getElementById('C_type_list_o').value,
									data: dados,
									processData: false,
									contentType: false,
									success: function(data) {
										registraMR_o();
										if(data==1){
											if(f==2){
											alert('Registro atualizado com sucesso');
											window.scrollTo(0, 0);
											}
										}
									},
									error: function(data) {
										alert('erro');
									}
								  });
								  
								  
								}  
								  
							}
						</script>  