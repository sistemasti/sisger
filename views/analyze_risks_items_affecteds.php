	<script>					
	
								
								function range_I_A(field,value){
									var f=0;

									if(field == "Max"){
										
										if(value < document.getElementById('plia').value){
												f=1; 	
												alert(<?php echo "'".$_SESSION[$_SESSION['lang']]['This score must be less than or equal to the Expected score. It cannot be changed if the Expected score is empty']."'"; ?>);
										}

									}
					
									if(field == "Med"){

										if(value > document.getElementById('heia').value || value < document.getElementById('leia').value ){
												f=1; 	
												alert(<?php echo "'".$_SESSION[$_SESSION['lang']]["This score must be less than or equal to the Expected score. It cannot be changed if the Expected score is empty"]."'"; ?>);
										}

									}
					
									if(field == "Min"){

										if(value > document.getElementById('plia').value ){
												f=1; 	
												alert(<?php echo "'".$_SESSION[$_SESSION['lang']]["This score must be less than or equal to the Expected score. It cannot be changed if the Expected score is empty"]."'"; ?>);
										}

									}
									
										
									
									if(f==0){
										
									
										document.getElementById('magnitude_IA_'+field).innerHTML = value;
									
										
										if(
										document.getElementById('heia').value != "" &&
										document.getElementById('plia').value != "" &&
										document.getElementById('leia').value != ""
										){
											var base = parseFloat(document.getElementById('heia').value) + parseFloat(document.getElementById('plia').value) + parseFloat(document.getElementById('leia').value);
											var media = base / 3;		
																
											document.getElementById('magnitude_IA_MEDIA').innerHTML = media.toFixed(1);
										}	
										
										document.getElementById('ia_Div_'+field).innerHTML = value;
										document.getElementById('ia_Inp_'+field).value = value;
										
										var range = (document.getElementById('heia').value)-(document.getElementById('leia').value);
										
										document.getElementById('ia_Div_Range').innerHTML = range;
										document.getElementById('ia_Inp_Range').value = range;
									
									}
									
									magnitudeRisk();

								}

							</script>	
<?php
/* echo "<pre>";
	print_r($_GET);
echo "</pre>"; */
 ?>							
						  <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
							<form method="post" name="ar_ia" id="ar_ia">




											  <div style="float:right;"> 

											  <input type="hidden" id="ia_Inp_Min"  name="ia_Inp_Min" value="<?php echo $ia_Inp_Min; ?>">
											  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="ia_Div_Min" ><?php echo $ia_Div_Min; ?></div>
											  
											  <input type="hidden" id="ia_Inp_Med" name="ia_Inp_Med" value="<?php echo $ia_Inp_Med; ?>">	
											  <div style="display:inline-block; padding:14px; margin:1px; background-color:#d8d7de; font-size: 22px;"  id="ia_Div_Med" ><?php echo $ia_Div_Med; ?></div>
											  
											  <input type="hidden" id="ia_Inp_Max" name="ia_Inp_Max" value="<?php echo $ia_Inp_Max; ?>">	
											  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="ia_Div_Max"><?php echo $ia_Div_Max; ?></div>
											  &nbsp;
											  &nbsp;
											  &nbsp;
											  &nbsp;
											  &nbsp;
											  &nbsp; <span ><?php echo $_SESSION[$_SESSION['lang']]['Uncertainty range']; ?> </span>
											  <input type="hidden" id="ia_Inp_Range" name="ia_Inp_Range" value="">	
											  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="ia_Div_Range">0.0</div>
											  </div>
											  
									 
											  
										  <BR>
										  <BR>
										<span id="title_id" style="font-size:22px;"><?php echo $_SESSION[$_SESSION['lang']]['What fraction of the value will be affected?']; ?></span>
										  <BR>
										  <BR>
											<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Explain the estimates of items affected']; ?></label>
														<textarea class="form-control" name="explain_ia" id="explain_ia" onkeyup="document.getElementById('ia_zoom_explanation_fields').value=this.value"><?php echo $explain_ia; ?></textarea>
														
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg_ia" style="float:right; margin-top:2px">
                 <?php echo $_SESSION[$_SESSION['lang']]['Zoom explanation and notes']; ?>
                </button>	
				<br>
				<br>
				<br>
				
				
											
											<br>
											C.2 <?php echo $_SESSION[$_SESSION['lang']]['Select how this score will be entered']; ?>
											<br>
											
											<input type="radio" name="type_score" id="type_score_1" value="1"  onclick="
													document.getElementById('bxFractionAffected').style.display='block';
													document.getElementById('bxValuePieAffected').style.display='none';
													carregaValoresStepsScale();
													" <?php if (!isset($_GET['ca_high']) || $type_score==1){ echo "checked";}else{echo "";} ?> > <?php echo $_SESSION[$_SESSION['lang']]['Step scale, considering the heritage asset as a whole.']; ?>
													
													<br>
											<input type="radio" name="type_score" id="type_score_2" value="2" onclick="
													document.getElementById('bxFractionAffected').style.display='none';
													document.getElementById('bxValuePieAffected').style.display='block';
													select_risk_ia_zoom(document.getElementById('risk').value);
													" <?php if ((isset($_GET['ca_high'])) || $type_score==2){ echo "checked";}else{echo "";} ?>> <?php echo $_SESSION[$_SESSION['lang']]['More precise data using the value pie']; ?><br>
											
											<input type="hidden" name="C_type_list" id="C_type_list" value='1'>
											<br>
											<br>
											<script>
											
											function select_risk_ia_zoom(id) {		
					
					  	
					 
					  $.ajax({
						type: "POST",
						url: "ajax_process/select_risk.php",
						data: {
							id: id
						},
						dataType: 'json',
						success: function(data) {
							
							
							
							//C
							$("#ia_Inp_Min").val(data['ia_Inp_Min']);
							$("#ia_Inp_Med").val(data['ia_Inp_Med']);
							$("#ia_Inp_Max").val(data['ia_Inp_Max']);
							$("#ia_Inp_Range").val(data['ia_Inp_Range']);
							$("#explain_ia").val(data['explain_ia']);
							
							$("#ia_Div_Min").html(data['ia_Inp_Min']);
							$("#ia_Div_Med").html(data['ia_Inp_Med']);
							$("#ia_Div_Max").html(data['ia_Inp_Max']);
							$("#ia_Div_Range").html(data['ia_Inp_Range']);
							$("#ia_Div_Range").html(data['ia_Inp_Range']);
							
							
							
							if(data['leia'] == "0.5"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/30 000, ".$_SESSION[$_SESSION['lang']]['Less than a trace of the whole asset value but not zero']."'"; ?>, data['leia'], true, true);
							}
							
							if(data['leia'] == "1.0"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/10 000, ".$_SESSION[$_SESSION['lang']]['A trace of the whole asset value']."'"; ?>, data['leia'], true, true);
							}
							
							if(data['leia'] == "1.5"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/3 000, ".$_SESSION[$_SESSION['lang']]['Between a tiny fraction and a trace of the whole asset value']."'"; ?>, data['leia'], true, true);
							}
							
							if(data['leia'] == "2.0"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/1000, ".$_SESSION[$_SESSION['lang']]['A tiny fraction of the whole asset value']."'"; ?>, data['leia'], true, true);
							}
							
							if(data['leia'] == "2.5"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/300, ".$_SESSION[$_SESSION['lang']]['Between small and tiny fraction of the whole asset value']."'"; ?>, data['leia'], true, true);
							}
							
							if(data['leia'] == "3.0"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/100, ".$_SESSION[$_SESSION['lang']]['A small fraction of the whole asset value']."'"; ?>, data['leia'], true, true);
							}
							
							if(data['leia'] == "3.5"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/30, ".$_SESSION[$_SESSION['lang']]['Between large and small fraction of the whole asset value']."'"; ?>, data['leia'], true, true);
							}
							
							if(data['leia'] == "4.0"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/10, ".$_SESSION[$_SESSION['lang']]['A large fraction of the whole asset value']."'"; ?>, data['leia'], true, true);
							}
							
							if(data['leia'] == "4.5"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/3, ".$_SESSION[$_SESSION['lang']]['Between most and a large fraction of the whole asset value']."'"; ?>, data['leia'], true, true);
							}
							
							if(data['leia'] == "5.0"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/1, ".$_SESSION[$_SESSION['lang']]['All or most of the whole asset value']."'"; ?>, data['leia'], true, true);
							}
							
							//plia
							if(data['plia'] == "0.5"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/30 000, ".$_SESSION[$_SESSION['lang']]['Less than a trace of the whole asset value but not zero']."'"; ?>, data['plia'], true, true);
							}
							
							if(data['plia'] == "1.0"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/10 000, ".$_SESSION[$_SESSION['lang']]['A trace of the whole asset value']."'"; ?>, data['plia'], true, true);
							}
							
							if(data['plia'] == "1.5"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/3 000, ".$_SESSION[$_SESSION['lang']]['Between a tiny fraction and a trace of the whole asset value']."'"; ?>, data['plia'], true, true);
							}
							
							if(data['plia'] == "2.0"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/1000, ".$_SESSION[$_SESSION['lang']]['A tiny fraction of the whole asset value']."'"; ?>, data['plia'], true, true);
							}
							
							if(data['plia'] == "2.5"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/300, ".$_SESSION[$_SESSION['lang']]['Between small and tiny fraction of the whole asset value']."'"; ?>, data['plia'], true, true);
							}
							
							if(data['plia'] == "3.0"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/100, ".$_SESSION[$_SESSION['lang']]['A small fraction of the whole asset value']."'"; ?>, data['plia'], true, true);
							}
							
							if(data['plia'] == "3.5"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/30, ".$_SESSION[$_SESSION['lang']]['Between large and small fraction of the whole asset value']."'"; ?>, data['plia'], true, true);
							}
							
							if(data['plia'] == "4.0"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/10, ".$_SESSION[$_SESSION['lang']]['A large fraction of the whole asset value']."'"; ?>, data['plia'], true, true);
							}
							
							if(data['plia'] == "4.5"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/3, ".$_SESSION[$_SESSION['lang']]['Between most and a large fraction of the whole asset value']."'"; ?>, data['plia'], true, true);
							}
							
							if(data['plia'] == "5.0"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/1, ".$_SESSION[$_SESSION['lang']]['All or most of the whole asset value']."'"; ?>, data['plia'], true, true);
							}
							
							//heia
							if(data['heia'] == "0.5"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/30 000, ".$_SESSION[$_SESSION['lang']]['Less than a trace of the whole asset value but not zero']."'"; ?>, data['heia'], true, true);
							}
							
							if(data['heia'] == "1.0"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/10 000, ".$_SESSION[$_SESSION['lang']]['A trace of the whole asset value']."'"; ?>, data['heia'], true, true);
							}
							
							if(data['heia'] == "1.5"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/3 000, ".$_SESSION[$_SESSION['lang']]['Between a tiny fraction and a trace of the whole asset value']."'"; ?>, data['heia'], true, true);
							}
							
							if(data['heia'] == "2.0"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/1000, ".$_SESSION[$_SESSION['lang']]['A tiny fraction of the whole asset value']."'"; ?>, data['heia'], true, true);
							}
							
							if(data['heia'] == "2.5"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/300, ".$_SESSION[$_SESSION['lang']]['Between small and tiny fraction of the whole asset value']."'"; ?>, data['heia'], true, true);
							}
							
							if(data['heia'] == "3.0"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/100, ".$_SESSION[$_SESSION['lang']]['A small fraction of the whole asset value']."'"; ?>, data['heia'], true, true);
							}
							
							if(data['heia'] == "3.5"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/30, ".$_SESSION[$_SESSION['lang']]['Between large and small fraction of the whole asset value']."'"; ?>, data['heia'], true, true);
							}
							
							if(data['heia'] == "4.0"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/10, ".$_SESSION[$_SESSION['lang']]['A large fraction of the whole asset value']."'"; ?>, data['heia'], true, true);
							}
							
							if(data['heia'] == "4.5"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/3, ".$_SESSION[$_SESSION['lang']]['Between most and a large fraction of the whole asset value']."'"; ?>, data['heia'], true, true);
							}
							
							if(data['heia'] == "5.0"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/1, ".$_SESSION[$_SESSION['lang']]['All or most of the whole asset value']."'"; ?>, data['heia'], true, true);
							}
							
						
							
							
						}
					  });
					}
											
											
											</script>
					
											<?php 											
											if (($type_score == 1 || $type_score == "") && !isset($_GET['ca_high'])){ 
											?>
											<div id="bxFractionAffected" style="display: block">
											<?php
											}else{
												?>
											<div id="bxFractionAffected" style="display: none">
											<?php
											} 											
											?>
											
													<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['High estimate'];  ?></label>
														<select class="form-control" id="heia" name="heia"  onchange="range_I_A('Max',this.value)">
                           
																<option value="0.0" selected><?php echo $_SESSION[$_SESSION['lang']]['Select']; ?></option>
																<option value="5.0" <?php if($heia == "5.0"){ echo "selected"; } ?> >~1/1, <?php echo $_SESSION[$_SESSION['lang']]['All or most of the whole asset value']; ?></option>
																<option value="4.5" <?php if($heia == "4.5"){ echo "selected"; } ?>>~1/3   <?php echo $_SESSION[$_SESSION['lang']]['Between most and a large fraction of the whole asset value']; ?></option>
																<option value="4.0" <?php if($heia == "4.0"){ echo "selected"; } ?>>~1/10  <?php echo $_SESSION[$_SESSION['lang']]['A large fraction of the whole asset value']; ?></option>
																<option value="3.5" <?php if($heia == "3.5"){ echo "selected"; } ?>>~1/30  <?php echo $_SESSION[$_SESSION['lang']]['Between large and small fraction of the whole asset value']; ?>.</option>
																<option value="3.0" <?php if($heia == "3.0"){ echo "selected"; } ?>>~1/100  <?php echo $_SESSION[$_SESSION['lang']]['A small fraction of the whole asset value']; ?>.</option>
																<option value="2.5" <?php if($heia == "2.5"){ echo "selected"; } ?>>~1/300  <?php echo $_SESSION[$_SESSION['lang']]['Between small and tiny fraction of the whole asset value']; ?>.</option>
																<option value="2.0" <?php if($heia == "2.0"){ echo "selected"; } ?>>~1/1000  <?php echo $_SESSION[$_SESSION['lang']]['A tiny fraction of the whole asset value']; ?>.</option>
																<option value="1.5" <?php if($heia == "1.5"){ echo "selected"; } ?>>~1/3 000  <?php echo $_SESSION[$_SESSION['lang']]['Between a tiny fraction and a trace of the whole asset value']; ?>.</option>
																<option value="1.0" <?php if($heia == "1.0"){ echo "selected"; } ?>>~1/10 000  <?php echo $_SESSION[$_SESSION['lang']]['A trace of the whole asset value']; ?>.</option>
																<option value="0.5" <?php if($heia == "0.5"){ echo "selected"; } ?>>~1/30 000  <?php echo $_SESSION[$_SESSION['lang']]['Less than a trace of the whole asset value but not zero']; ?>.</option>
																
																
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Probable loss to each item affected']; ?></label>
														<select class="form-control" id="plia" name="plia" onchange="range_I_A('Med',this.value)">
																
																<option value="0.0" selected><?php echo $_SESSION[$_SESSION['lang']]['Select']; ?></option>	
																<option value="5.0" <?php if($plia == "5.0"){ echo "selected"; } ?>>~1/1, <?php echo $_SESSION[$_SESSION['lang']]['All or most of the whole asset value']; ?></option>
																<option value="4.5" <?php if($plia == "4.5"){ echo "selected"; } ?>>~1/3  <?php echo $_SESSION[$_SESSION['lang']]['Between most and a large fraction of the whole asset value']; ?>.</option>
																<option value="4.0" <?php if($plia == "4.0"){ echo "selected"; } ?>>~1/10  <?php echo $_SESSION[$_SESSION['lang']]['A large fraction of the whole asset value']; ?>.</option>
																<option value="3.5" <?php if($plia == "3.5"){ echo "selected"; } ?>>~1/30  <?php echo $_SESSION[$_SESSION['lang']]['Between large and small fraction of the whole asset value']; ?>.</option>
																<option value="3.0" <?php if($plia == "3.0"){ echo "selected"; } ?>>~1/100   <?php echo $_SESSION[$_SESSION['lang']]['A small fraction of the whole asset value']; ?>.</option>
																<option value="2.5" <?php if($plia == "2.5"){ echo "selected"; } ?>>~1/300  <?php echo $_SESSION[$_SESSION['lang']]['Between small and tiny fraction of the whole asset value']; ?></option>
																<option value="2.0" <?php if($plia == "2.0"){ echo "selected"; } ?>>~1/1000  <?php echo $_SESSION[$_SESSION['lang']]['A tiny fraction of the whole asset value']; ?>.</option>
																<option value="1.5" <?php if($plia == "1.5"){ echo "selected"; } ?>>~1/3 000  <?php echo $_SESSION[$_SESSION['lang']]['Between a tiny fraction and a trace of the whole asset value']; ?>.</option>
																<option value="1.0" <?php if($plia == "1.0"){ echo "selected"; } ?>>~1/10 000  <?php echo $_SESSION[$_SESSION['lang']]['A trace of the whole asset value']; ?>.</option>
																<option value="0.5" <?php if($plia == "0.5"){ echo "selected"; } ?>>~1/30 000  <?php echo $_SESSION[$_SESSION['lang']]['Less than a trace of the whole asset value but not zero']; ?>.</option>
														  
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Low estimate']; ?></label>
														<select class="form-control" id="leia" name="leia" onchange="range_I_A('Min',this.value)">
																
																<option value="0.0" selected><?php echo $_SESSION[$_SESSION['lang']]['Select']; ?></option>
																<option value="5.0" <?php if($leia == "5.0"){ echo "selected"; } ?>>~1/1, <?php echo $_SESSION[$_SESSION['lang']]['All or most of the whole asset value']; ?></option>
																<option value="4.5" <?php if($leia == "4.5"){ echo "selected"; } ?>>~1/3  <?php echo $_SESSION[$_SESSION['lang']]['Between most and a large fraction of the whole asset value']; ?>.</option>
																<option value="4.0" <?php if($leia == "4.0"){ echo "selected"; } ?>>~1/10  <?php echo $_SESSION[$_SESSION['lang']]['A large fraction of the whole asset value']; ?>.</option>
																<option value="3.5" <?php if($leia == "3.5"){ echo "selected"; } ?>>~1/30  <?php echo $_SESSION[$_SESSION['lang']]['Between large and small fraction of the whole asset value']; ?>.</option>
																<option value="3.0" <?php if($leia == "3.0"){ echo "selected"; } ?>>~1/100  <?php echo $_SESSION[$_SESSION['lang']]['A small fraction of the whole asset value']; ?>.</option>
																<option value="2.5" <?php if($leia == "2.5"){ echo "selected"; } ?>>~1/300  <?php echo $_SESSION[$_SESSION['lang']]['Between small and tiny fraction of the whole asset value']; ?>.</option>
																<option value="2.0" <?php if($leia == "2.0"){ echo "selected"; } ?>>~1/1000 <?php echo $_SESSION[$_SESSION['lang']]['A tiny fraction of the whole asset value']; ?> .</option>
																<option value="1.5" <?php if($leia == "1.5"){ echo "selected"; } ?>>~1/3 000  <?php echo $_SESSION[$_SESSION['lang']]['Between a tiny fraction and a trace of the whole asset value']; ?>.</option>
																<option value="1.0" <?php if($leia == "1.0"){ echo "selected"; } ?>>~1/10 000  <?php echo $_SESSION[$_SESSION['lang']]['A trace of the whole asset value']; ?>.</option>
																<option value="0.5" <?php if($leia == "0.5"){ echo "selected"; } ?>>~1/30 000  <?php echo $_SESSION[$_SESSION['lang']]['Less than a trace of the whole asset value but not zero']; ?>.</option>
														  
														 
														</select>
													</div>
													</div>	
											

											<?php 											
											if (( isset($_GET['ca_high'])  ) || $type_score==2){ 
											?>
											<div id="bxValuePieAffected" style="display: block">
											<?php
											}else{
												?>
											<div id="bxValuePieAffected" style="display: none">
											<?php
											} 											
											?>

											
											<br>
											<br>

<a href="javascript:void(0)" onclick="if(document.getElementById('risk').value=='' || document.getElementById('risk').value=='#' ){alert('select a risk');}else{location.href = 'zoom_list?risk_id='+document.getElementById('risk').value;}"><center><button type="button" class="btn btn-block bg-gradient-info btn-sm" style="padding:20px;width:60%" ><?php echo $_SESSION[$_SESSION['lang']]['Zoom list of items affected']; ?></button></center></a>
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
													<br>
								
									<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="items_affecteds_register()"><?php echo $_SESSION[$_SESSION['lang']]['Save']; ?></button>
							<!--<button type="button" class="btn btn-block bg-gradient-success btn-sm">Refresh calculations</button>-->
							</form>
						  </div>
						  
					
				  </div>	
					
					<div class="modal fade" id="modal-lg_ia">
								
					<div class="modal-dialog modal-lg">
					  <form id="frmZoomIA" method="post" enctype="multipart/form-data">
							<div class="modal-dialog modal-lg">
							  <div class="modal-content">
								<div class="modal-header">
								  <h4 class="modal-title"><?php echo $_SESSION[$_SESSION['lang']]['Analysis notes and documents']; ?> (C)</h4>
								  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								  </button>
								</div>
								<div class="modal-body">
									<span id="zoomRisk_ia" style="padding:10px;margin-bottom:7px;background-color:#E3F5EA"><?php echo $risk_name; ?></span>
								<br>&nbsp;								
								
									<div class="row">
										<div class="col-sm-12 col-md-12">
											<textarea class="form-control" placeholder="Obs" name="ia_zoom_obs" ID="ia_zoom_obs"><?php echo $ia_zoom_obs; ?></textarea>
										</div>
									</div>
									<br>&nbsp;
									<div class="row">
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Explain your estimates for items affecteds']; ?></label>
														<textarea class="form-control" name="ia_zoom_explanation_fields" ID="ia_zoom_explanation_fields" onkeyup="document.getElementById('explain_ia').value=this.value"><?php echo $ia_zoom_explanation_fields; ?></textarea>
													</div>	
												</div>	
												<div class="col-sm-6 col-md-6">
												<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Notes for this explanation']; ?> .</label>
														<textarea class="form-control" name="ia_zoom_notes_explanation" ID="ia_zoom_notes_explanation"><?php echo $ia_zoom_notes_explanation; ?></textarea>
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
														<input type="text" class="form-control" id="ia_zoom_document_name"
													name="ia_zoom_document_name" placeholder=""  required value="<?php echo $ia_zoom_document_name; ?>" >
													</div>	
												</div>	
												<div class="col-sm-4 col-md-4">
													<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Comment']; ?></label>
														<input type="text" class="form-control" id="ia_zoom_comment"
													name="ia_zoom_comment" placeholder=""  required value="<?php echo $ia_zoom_comment; ?>" >
													</div>	
												</div>
												<div class="col-sm-4 col-md-4">
													<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Link']; ?>..</label>
														<input type="text" class="form-control" id="ia_zoom_link"
													name="ia_zoom_link" placeholder=""  required value="<?php echo $ia_zoom_link; ?>"  onkeyup="atualizaFileField ('ia_zoom_link_bx',this.value)">
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
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Document file']; ?></label>
														
													<input type="text" class="form-control" id="ia_zoom_document_file"
													name="ia_zoom_document_file" placeholder=""  required value="<?php echo $ia_zoom_document_file; ?>" onkeyup="atualizaFileField ('ia_zoom_document_file_bx',this.value)">
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
								<div class="modal-footer justify-content-between">
								  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $_SESSION[$_SESSION['lang']]['Close']; ?></button>
								  <button type="button" class="btn btn-primary" onclick="zoom_ia_save();items_affecteds_register();" data-dismiss="modal"><?php echo $_SESSION[$_SESSION['lang']]['Save changes']; ?></button>
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
					
					<div class="modal fade" id="modal-lg_list_affected">
					<div class="modal-dialog modal-lg">
					  <div class="modal-content">
						<div class="modal-header">
						  <h4 class="modal-title"><?php echo $_SESSION[$_SESSION['lang']]['Original Risk']; ?></h4>
						  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
						</div>
						<div class="modal-body">
							<div id="zoom_list_html"></div>
													  <script>


															function zoom_list_update_top() {			
															 
															  $.ajax({
																type: "POST",
																url: "ajax_process/zoom_list_update_top.php?low_estimate_top="+document.getElementById('low_estimate_top').value+"&most_probable_top="+document.getElementById('most_probable_top').value+"&high_estimate_top="+document.getElementById('high_estimate_top').value,
																
																dataType: 'json',
																success: function(data) {
																	
																	//alert('ok');
																  
																	
																}
															  });
															}
														
														
														
																											  

															function zoom_list_update(id,low_estimate,most_probable,high_estimate) {			
															 
															  $.ajax({
																type: "POST",
																url: "ajax_process/zoom_list_update.php",
																data: {
																	id: id,
																	low_estimate: low_estimate,
																	most_probable: most_probable,
																	high_estimate: high_estimate																},
																dataType: 'json',
																success: function(data) {
																	
																	//alert('ok');
																  
																	
																}
															  });
															}
														
														
														</script>
													  <br>
													  <hr>
													  <br>
													  <form id="frmZoomLista" method="post">
													   <center><button type="button" class="btn btn-info" onclick="$( '#bxNewRegister' ).toggle();"><?php echo $_SESSION[$_SESSION['lang']]['New register']; ?></button></center>
													 <br>
													 
													 <div id="bxNewRegister" style="padding:20px; background-color:#e2f1e8;display:none;">
														 <div class="row">
														  <div class="col-sm-9 col-md-9">
														 <div class="form-group">
															<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Register']; ?></label>
															<select class="form-control" id="value_table" name="value_table" onchange="select_dados_value_table_id(this.value)">
															<option value="" >
																		 <?php echo $_SESSION[$_SESSION['lang']]['select']; ?>
																		   </option>
															<?php 
															$in = Build_value_pie::select_ec_value_pie_table_all(1);
															
															foreach($in['dados'] as $in){
															?>
																		
																		   <option value="<?php echo $in['id']; ?>" >
																		   <?php echo $in['group_value'].", ".$in['subgroup_value']; ?>
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
														 </div> 
														 <div class="col-sm-3 col-md-3">
														 <div class="form-group">
															<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['numbers of itens']; ?></label>
															<input type="text" class="form-control" id="numbers_itens_inp" name="numbers_itens_inp" placeholder="0" value="" readonly required>
															<input type="hidden" class="form-control" id="identification" name="identification" placeholder="0" value="" readonly required>
															<input type="text" class="form-control" id="id_ec_value_pie_table" name="id_ec_value_pie_table" placeholder="0" value="" readonly required>
														 </div>
														 </div> 
														 </div>
														 <div class="row">
														 <div class="col-sm-4 col-md-4">
														 <div class="form-group">
															<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Low estimate']; ?></label>
															<input type="text" class="form-control" id="low_estimate" name="low_estimate" placeholder="0.0" value="<?php echo $low_estimate; ?>" required>
														 </div>
														 </div> 
														 <div class="col-sm-4 col-md-4">
														  <div class="form-group">
															<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Most Probable']; ?></label>
															<input type="text" class="form-control" id="most_probable" name="most_probable" placeholder="0.0" value="" required>
														 </div>
														 </div> 
														 <div class="col-sm-4 col-md-4">
														 <div class="form-group">
															<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['High estimate']; ?></label>
															<input type="text" class="form-control" id="high_estimate" name="high_estimate" placeholder="0.0" value="" required>
														 </div>
														 <div style="float:right">
														 <button type="button" onclick="zoom_list_save();" class="btn btn-info"><?php echo $_SESSION[$_SESSION['lang']]['Save']; ?></button>
														 </form>
														 </div>
														 </div>
														 </div>  
														</div>   
																							
											
						</div>
						<div class="modal-footer justify-content-between">
						  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $_SESSION[$_SESSION['lang']]['Close']; ?></button>
						  <button type="button" class="btn btn-primary" onclick="refreshDataByZoom();items_affecteds_register();" data-dismiss="modal"><?php echo $_SESSION[$_SESSION['lang']]['Save changes & refresh calculation']; ?></button>
						</div>
					  </div>
					  <!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				  </div>
					
					
					<!-- /.modal-dialog -->
						 <script>  
							function items_affecteds_register(x=0) {	
							
								if(document.getElementById('risk').value == '#'){
									
									alert("Select a risk");
									
								}else{	
								  var formulario = document.getElementById('ar_ia');
								  var dados = new FormData(formulario);
								  
								 
								  
								  $.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/ar_ia_register.php?id_risk="+document.getElementById('risk').value,
									data: dados,
									processData: false,
									contentType: false,
									success: function(data) {
										registraMR();
										if(data==1){																						
											if(x==0){
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
						<script>


							function zoom_ia_save() {	
							   
								var formulario = document.getElementById('frmZoomIA');
								var dados = new FormData(formulario);
							  
							  $.ajax({
								dataType: 'json',
								type: "POST",
								url: "ajax_process/zoom_ia_save.php?id="+document.getElementById('risk').value,
								data: dados,
								processData: false,
								contentType: false,
								success: function(data) {
									if(data==1){
										
											//alert(<?php echo "'".$_SESSION[$_SESSION['lang']]['Register save successfull']."'"; ?>);
											
											
									}else{ 
									
											alert('Falha');
											
							
									}	
									window.scrollTo(0, 0);
								}
							  });
							}
						</script>	
						
						<script>


							function zoom_list_save() {	
							   
								var formulario = document.getElementById('frmZoomLista');
								var dados = new FormData(formulario);
							  
							  $.ajax({
								dataType: 'json',
								type: "POST",
								url: "ajax_process/zoom_list_save.php?risk_id="+document.getElementById('risk').value,
								data: dados,
								processData: false,
								contentType: false,
								success: function(data) {
									if(data==1){
										
											alert(<?php echo "'".$_SESSION[$_SESSION['lang']]['Register save successfull']."'"; ?>);
											
											
									}else{ 
									
											alert('Falha');
											
							
									}	
									window.scrollTo(0, 0);
								}
							  });
							}
							
							
						</script>	
						
						<script>
					
					function carregaValoresStepsScale(){
						//alert(document.getElementById('plia').value);
						
						/* var leia = document.getElementById("leia");
						alert(leia.options[leia.selectedIndex].value); */
						
						var plia = document.getElementById("plia");
						//alert(plia.options[plia.selectedIndex].value);
						
						document.getElementById('ia_Inp_Min').value 		= document.getElementById('leia').value;
						document.getElementById('ia_Div_Min').innerHTML 	= document.getElementById('leia').value;
						
						document.getElementById('ia_Inp_Med').value 		= document.getElementById('plia').value;
						document.getElementById('ia_Div_Med').innerHTML 	= document.getElementById('plia').value;
						
						document.getElementById('ia_Inp_Max').value 		= document.getElementById('heia').value;
						document.getElementById('ia_Div_Max').innerHTML 	= document.getElementById('heia').value;
						
						
						
					}
					
					</script>