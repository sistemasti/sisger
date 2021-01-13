<script>
									
										function carregaFormulario(id){
									
										if(id < 3){
											/* document.getElementById('bxFrm1').style.display = 'block';
											document.getElementById('bxFrm2').style.display = 'none'; */
											document.getElementById('title_id').innerHTML = <?php echo "'".$_SESSION[$_SESSION['lang']]['How often will the event occur?']."'"; ?>;
											document.getElementById('title_id_o').innerHTML = <?php echo "'".$_SESSION[$_SESSION['lang']]['How often will the event occur?']."'"; ?>;
										}else{
											/* document.getElementById('bxFrm1').style.display = 'none';
											document.getElementById('bxFrm2').style.display = 'block'; */
											document.getElementById('title_id').innerHTML = <?php echo "'".$_SESSION[$_SESSION['lang']]['How soon will the process cause the specified loss?']."'"; ?>;
											document.getElementById('title_id_o').innerHTML = <?php echo "'".$_SESSION[$_SESSION['lang']]['How soon will the process cause the specified loss?']."'"; ?>;
										}		
										
										if(id ==1){
											document.getElementById('bxFrm1').style.display = 'block';
											document.getElementById("abey").readOnly = false;
											document.getElementById("ley").readOnly = false;
											document.getElementById("hey").readOnly = false;
											document.getElementById('label1').innerHTML = <?php echo "'".$_SESSION[$_SESSION['lang']]['Most probable time period between events, years']."'"; ?>;
											document.getElementById('label1_o').innerHTML = <?php echo "'".$_SESSION[$_SESSION['lang']]['Most probable time period between events, years']."'"; ?>;
										}
										
										if(id ==2){
											document.getElementById('bxFrm1').style.display = 'block';
											document.getElementById("abey").readOnly = false;
											document.getElementById("ley").readOnly = false;
											document.getElementById("hey").readOnly = false;
											document.getElementById('label1').innerHTML =  <?php echo "'".$_SESSION[$_SESSION['lang']]['Most probable time period between events, years']."'"; ?>;
											document.getElementById('label1_o').innerHTML =  <?php echo "'".$_SESSION[$_SESSION['lang']]['Most probable time period between events, years']."'"; ?>;
										}			
										
										if(id ==3){
											document.getElementById('bxFrm1').style.display = 'block';
											document.getElementById("abey").readOnly = false;
											document.getElementById("ley").readOnly = true;
											document.getElementById("hey").readOnly = true;
											
											document.getElementById("ley").value = document.getElementById("abey").value;
											document.getElementById("hey").value = document.getElementById("abey").value;
											
											
											document.getElementById('label1').innerHTML = <?php echo "'".$_SESSION[$_SESSION['lang']]['This time period has been selected for analysis of the loss to each item affected']."'"; ?>;
											document.getElementById('label1_o').innerHTML = <?php echo "'".$_SESSION[$_SESSION['lang']]['This time period has been selected for analysis of the loss to each item affected']."'"; ?>;
										}	
										
										if(id ==4){
											document.getElementById('bxFrm1').style.display = 'block';
											document.getElementById("abey").readOnly = true;
											document.getElementById("ley").readOnly = true;
											document.getElementById("hey").readOnly = true;

											document.getElementById("abey").value = document.getElementById("time_horizon").value;
											document.getElementById("ley").value = document.getElementById("time_horizon").value;
											document.getElementById("hey").value = document.getElementById("time_horizon").value;
											calculcaPontuacao(document.getElementById("time_horizon").value,'High');
											calculcaPontuacao(document.getElementById("time_horizon").value,'Low');
											calculcaPontuacao(document.getElementById("time_horizon").value,'Probable');
											document.getElementById('label1').innerHTML = <?php echo "'".$_SESSION[$_SESSION['lang']]['The time horizon has been selected and entered automatically']."'"; ?>;
											document.getElementById('label1_o').innerHTML = <?php echo "'".$_SESSION[$_SESSION['lang']]['The time horizon has been selected and entered automatically']."'"; ?>;
										}	
										
										if(id ==5){
											document.getElementById('bxFrm1').style.display = 'block';
											document.getElementById("abey").readOnly = false;
											document.getElementById("ley").readOnly = false;
											document.getElementById("hey").readOnly = false;
											document.getElementById('label1').innerHTML = <?php echo "'".$_SESSION[$_SESSION['lang']]['A particular loss to each item affected was selected for analysis, this is the estimate of years required to reach that loss']."'"; ?>;
											document.getElementById('label1_o').innerHTML = <?php echo "'".$_SESSION[$_SESSION['lang']]['A particular loss to each item affected was selected for analysis, this is the estimate of years required to reach that loss']."'"; ?>;
										}
										
										if(id ==6){
											
											/* 
												fdLow
												fdProbable
												fdHigh
												fdUncert
											  
												bxHigh
												bxProbable
												bxLow 
											  */
											  
											  document.getElementById('bxHigh').innerHTML='0.0';
											  document.getElementById('bxProbable').innerHTML='0.0';
											  document.getElementById('bxLow').innerHTML='0.0';
											  document.getElementById('bxUncert').innerHTML='0.0';
											
											  document.getElementById('fdLow').value='';
											  document.getElementById('fdProbable').value='';
											  document.getElementById('fdHigh').value='';
											  document.getElementById('fdUncert').value='';
											
											document.getElementById('bxFrm1').style.display = 'none';
											//document.getElementById('bxFrm2').style.display = 'none';
										}	
										
									}	
									
									
									function calculcaPontuacao(valor,field){
										
										//AScore: SeImed([TimeToLoss]>0;5-Log([TimeToLoss])/Log(10)) .toFixed(2)
										
										
											if(valor > 0){	
												var result = 5- (Math.log(valor)/Math.log(10));
												document.getElementById('bx'+field).innerHTML = result.toFixed(1);
												document.getElementById('fd'+field).value = result.toFixed(1);
												
												if(field=="High"){
													document.getElementById('magnitude_FR_Low').innerHTML = result.toFixed(1);
												}
												if(field=="Low"){
													document.getElementById('magnitude_FR_High').innerHTML = result.toFixed(1);
												}
												if(field=="Probable"){
													if(document.getElementById('type_risk').value == 3){
														document.getElementById('bxHigh').innerHTML = result.toFixed(1);
														document.getElementById('fdHigh').value = result.toFixed(1);
														
														document.getElementById('bxLow').innerHTML = result.toFixed(1);
														document.getElementById('fdLow').value = result.toFixed(1);
														
														document.getElementById('magnitude_FR_Low').innerHTML = result.toFixed(1);
														document.getElementById('magnitude_FR_Probable').innerHTML = result.toFixed(1);
														document.getElementById('magnitude_FR_High').innerHTML = result.toFixed(1);
													}else{
														document.getElementById('magnitude_FR_Probable').innerHTML = result.toFixed(1);
													}
												}
												
											}	
												
										var base = parseFloat(document.getElementById('fdLow').value) + parseFloat(document.getElementById('fdProbable').value) + parseFloat(document.getElementById('fdHigh').value);
										
										var media = base / 3;
										
										document.getElementById('magnitude_FR_MEDIA').innerHTML = media.toFixed(1);
										
										var range = (document.getElementById('fdLow').value)-(document.getElementById('fdHigh').value);
										document.getElementById('bxUncert').innerHTML = range.toFixed(1);
										document.getElementById('fdUncert').value = range.toFixed(1);
										
										magnitudeRisk();
																				
										
									}	
									
									function calculaPontuacaoOption(valor,field){
										
										
											if(valor > 0){	
												var result = 5- (Math.log(valor)/Math.log(10));
												document.getElementById('bx'+field+'_o').innerHTML = result.toFixed(1);
												document.getElementById('fd'+field+'_o').value = result.toFixed(1);
												//alert('fd'+field+'_o');
												if(field=="High"){
													document.getElementById('magnitude_FR_High_o').innerHTML = result.toFixed(1);
												}
												if(field=="Low"){
													document.getElementById('magnitude_FR_Low_o').innerHTML = result.toFixed(1);
												}
												if(field=="Probable"){
													if(document.getElementById('type_risk').value == 3){
														document.getElementById('bxHigh_o').innerHTML = result.toFixed(1);
														document.getElementById('fdHigh_o').value = result.toFixed(1);
														
														document.getElementById('bxLow_o').innerHTML = result.toFixed(1);
														document.getElementById('fdLow_o').value = result.toFixed(1);
														
														document.getElementById('magnitude_FR_Low_o').innerHTML = result.toFixed(1);
														document.getElementById('magnitude_FR_Probable_o').innerHTML = result.toFixed(1);
														document.getElementById('magnitude_FR_High_o').innerHTML = result.toFixed(1);
													}else{
														document.getElementById('magnitude_FR_Probable_o').innerHTML = result.toFixed(1);
													}
												}
												
											}	
												
										var base = parseFloat(document.getElementById('fdLow_o').value) + parseFloat(document.getElementById('fdProbable_o').value) + parseFloat(document.getElementById('fdHigh_o').value);
										
										var media = base / 3;
										
										document.getElementById('magnitude_FR_MEDIA_o').innerHTML = media.toFixed(1);
										
										var range = (document.getElementById('fdLow_o').value)-(document.getElementById('fdHigh_o').value);
										document.getElementById('bxUncert_o').innerHTML = range.toFixed(1);
										document.getElementById('fdUncert_o').value = range.toFixed(1);
										
										magnitudeRisk_o();
												
																				
										
									}	
									
									function calculateProbab(v){
										
										var result = document.getElementById('time_horizon').value / v;
										document.getElementById('ped_th').value = result
									}	
									
	
									function calculateEstimate(th){
										
										var high_estimate 	= th / document.getElementById('ley').value;
										var low_estimate 	= th / document.getElementById('abey').value;
										var ave_estimate 	= th / document.getElementById('hey').value;
										
										// result.toFixed(1);
										
										document.getElementById('high_estimate_value').value = high_estimate;
										document.getElementById('to_obtain_value').value = low_estimate;
										document.getElementById('low_estimate_value').value = ave_estimate;
																					
										var high_estimate_percent 	= high_estimate * 100;
										var to_obtain_percent 		= low_estimate * 100;
										var low_estimate_percent 	= ave_estimate * 100;
																					
										document.getElementById('high_estimate_percent').value =  high_estimate_percent.toFixed(2)+"%";
										document.getElementById('to_obtain_percent').value = to_obtain_percent.toFixed(2)+" %";
										document.getElementById('low_estimate_percent').value = low_estimate_percent.toFixed(2)+" %";
										
									}	
</script>

 <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
 <div class="row">
				  <div class="col-sm-4 col-md-6" style="padding:15px;">
								<!--########################################################-->
								<!--########################################################-->
								<!--###################$#### FORM ###################$$$$###-->
								<!--########################################################-->
								<!--########################################################-->
								<!--########################################################-->
								
								<form method="post" name="ar_fr" id="ar_fr">
						  <div style="float:right;width:50%">
							<?php echo $_SESSION[$_SESSION['lang']]['Time horizon, years']; ?> 
							<input type="text" id="time_horizon" name="time_horizon" disabled value="<?php echo $_SESSION['time_horizon']; ?>" style="width:25%;float:right;padding-right:7px;">
						
							</div>
						<br>
						<br>
						
						  	<br>
						<br>
						
						  
									<div class="form-group">
										<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Select the type risk']; ?></label>
										 <select class="form-control" id="type_risk" name="type_risk" onchange="carregaFormulario(this.value)" disabled>
											  
											  <option value="1" <?php if($type_risk == "1"){ echo "selected"; } ?>><?php echo $_SESSION[$_SESSION['lang']]['Event, rare (time between events greater than time horizon)']; ?></option>
											  
											  <option value="2" <?php if($type_risk == "2"){ echo "selected"; } ?>><?php echo $_SESSION[$_SESSION['lang']]['Event, frequent (must be at least one year between events)']; ?></option>
											  
											  <option value="3" <?php if($type_risk == "3"){ echo "selected"; } ?>><?php echo $_SESSION[$_SESSION['lang']]['Process or cumulative events, analysed over a particular period of time']; ?></option>
											  
											  <option value="4" <?php if($type_risk == "4"){ echo "selected"; } ?>><?php echo $_SESSION[$_SESSION['lang']]['Process or cumulative events, analyzed at the time horizon']; ?></option>
											  
											  <option value="5" <?php if($type_risk == "5"){ echo "selected"; } ?>><?php echo $_SESSION[$_SESSION['lang']]['Process or cumulative events, analyzed at a particular stage of damage']; ?></option>
											  
											  <option value="6" <?php if($type_risk == "6"){ echo "selected"; } ?>><?php echo $_SESSION[$_SESSION['lang']]['Not selected yet']; ?></option>
											 
											</select>
									  </div>
									  
						
						<br>
						<br>
									<?php 
									
									if($type_risk == 6){ 
										$displaybxFrm1 = "none";
									}else{ 
										$displaybxFrm1 = "block";
									} 
									
									
									?>
									<div id="bxFrm1" style="display:<?php echo $displaybxFrm1; ?>">		
									
											
									
						  <input type="hidden" name="fdLow" id="fdLow" value="<?php echo $fdLow; ?>">
						  <input type="hidden" name="fdProbable" id="fdProbable" value="<?php echo $fdProbable; ?>">
						  <input type="hidden" name="fdHigh" id="fdHigh" value="<?php echo $fdHigh; ?>">
						  <input type="hidden" name="fdUncert" id="fdUncert" value="<?php echo $fdUncert; ?>">
						  
						  <div style="float:right;"> &nbsp;&nbsp;&nbsp;
						   <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="bxHigh"  value="<?php echo $bxHigh; ?>"><?php echo $bxHigh; ?>
						  </div>
						  
						  <div style="display:inline-block; padding:10px; margin:1px; background-color:#aececc; font-size: 18px;" id="bxProbable" value="<?php echo $bxProbable; ?>"><?php echo $bxProbable; ?>
						  </div>
						  
						  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="bxLow" value="<?php echo $bxLow; ?>"><?php echo $bxLow; ?>
						  </div>
						 

						  <span >&nbsp;&nbsp;<small><em><?php echo $_SESSION[$_SESSION['lang']]['Uncertainty range']; ?></em></small></span>
						  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="bxUncert" value="<?php echo $bxUncert; ?>"><?php echo $bxUncert; ?></div>
						  </div>
						  <br>
						 &nbsp;
						   <span id="title_id" style="font-size:16px;"><?php echo $_SESSION[$_SESSION['lang']]['How often will the event occur?']; ?></span>
						  <br>
						  <br>
						  
							 <div class="col-sm-4 col-md-12">
							
								  
								  <input type="hidden" name="cadastrar" id="cadastrar" value="1">
									
									<div class="form-group">
										<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Explain your estimates for frequency or rate']; ?></label>
										<textarea class="form-control" name="explain" ID="explain" onkeyup="document.getElementById('fr_zoom_explanation_fields').value=this.value" disabled><?php echo $explain; ?></textarea>
																	
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg" style="float:right; margin-top:2px" onclick="return false">
                  <?php echo $_SESSION[$_SESSION['lang']]['Zoom explanation and notes']; ?>
                </button>	
				<br>
				<br>
				<br>
				
						
							
							
				
									  </div>
									
									<!-- FRM1 -->
									
									
											
								<div class="form-group">
										<div class="row">
										<div class="col-sm-4 col-md-10" style="text-align:right;">
											<label for="Sigla" style="vertical-align:baseline;margin-top:7px;"><?php echo $_SESSION[$_SESSION['lang']]['Low estimate of years']; ?></label>
										</div>	
										<div class="col-sm-4 col-md-2">
											<input type="text" class="form-control" id="ley"
											name="ley" placeholder=""  required value="<?php echo $ley; ?>"  onchange="
											
											//COMENTADO PARA RETIRAR A VALIDAÇÃO E FICAR DE ACORDO COM O ACCESS
											//if(
											//document.getElementById('abey').value > 0 &&
											//this.value > document.getElementById('abey').value
											//){
											//	alert('This number must be greater than 1; it must be LESS than or equal to expected years; it cannot be changed if expected years is empty');
											//	this.value=document.getElementById('abey').value
												
											//}else{ 
											
												calculcaPontuacao(this.value,'Low');
											
											//}
											
											" onKeyUp="maskIt(this,event,'#########',true)" maxlength="10" <?php if($type_risk == 3){ echo "readonly"; } ?> disabled>
										</div>	
										</div>
									<hr>
										<div class="row">
										<div class="col-sm-4 col-md-10" style="text-align:right;">
											<label for="Sigla" style="vertical-align:baseline;margin-top:7px;" id="label1"><?php echo $_SESSION[$_SESSION['lang']]['Average time period between events, years']; ?></label>
										</div>	
										<div class="col-sm-4 col-md-2">
											<input type="text" class="form-control" id="abey"
											name="abey" placeholder=""  required value="<?php echo $abey; ?>" onchange="
											if(document.getElementById('type_risk').value != 3){
												//COMENTADO PARA RETIRAR A VALIDAÇÃO E FICAR DE ACORDO COM O ACCESS
												//if(
												//(this.value > 0 &&
												//this.value < document.getElementById('ley').value) 
												//||
												//(this.value > document.getElementById('hey').value) )
												//{
												//	alert('This number must be greater than 1; it must be LARGER than or equal to low estimate of years; it cannot be changed if expected years is empty');
													
												//	this.value=document.getElementById('ley').value
													
												//}else{
													calculcaPontuacao(this.value,'Probable'); 
													calculateProbab(this.value);
												//}
											}else{
												
												document.getElementById('ley').value = this.value;
												document.getElementById('hey').value = this.value;
												calculcaPontuacao(this.value,'Probable'); 
												calculateProbab(this.value);
												
											}	
											
											" onKeyUp="maskIt(this,event,'#########',true)" maxlength="10" disabled>
										</div>	
										</div>
									<hr>
									<div class="row">
										<div class="col-sm-4 col-md-10" style="text-align:right;">
											<label for="Sigla" style="vertical-align:baseline;margin-top:7px;"><?php echo $_SESSION[$_SESSION['lang']]['High estimate of years']; ?></label>
										</div>	
										<div class="col-sm-4 col-md-2">
											<input type="text" class="form-control" id="hey"
											name="hey" placeholder=""  required value="<?php echo $hey; ?>"  onKeyUp="
											//COMENTADO PARA RETIRAR A VALIDAÇÃO E FICAR DE ACORDO COM O ACCESS
											//if(document.getElementById('abey').value > 0 && this.value < document.getElementById('abey').value){
												
											//	alert('This number be LARGER than or equal to expected years; it cannot be changed if expected years is empty');this.value=document.getElementById('abey').value
												
											//}else{
												
												calculcaPontuacao(this.value,'High');
												
											//}
											
											" onKeyUp="maskIt(this,event,'#########',true)" maxlength="10"  <?php if($type_risk == 3){ echo "readonly"; } ?> disabled>
										</div>	
									</div>	
									
									
									<br>		
									<br>		
									
								
									</div>
									</div>
									</div>
								
									
								  </form>
								
				  </div> 
								  <!--<br>
								
									<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="frequency_or_rate_register()">Save!</button>-->
								
						 




<!-- ######################################## -->
<!-- ######################################## -->
<!-- ######################################## -->
<!-- ######################################## -->
<!-- ######################################## -->
				<!-- ANALISE -->
<!-- ######################################## -->
<!-- ######################################## -->
<!-- ######################################## -->
<!-- ######################################## -->
<!-- ######################################## -->




						  
				<div class="col-sm-4 col-md-6" style="padding:15px;background-color:#f9f2d2">
						<form method="post" name="ar_fr_o" id="ar_fr_o">
						 
						
									<div class="form-group">
										<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Option summary sentence']; ?></label>
										<textarea class="form-control" rows="2" name="summary" id="summary" readOnly="readOnly"></textarea>
									</div>
									  
						
						<div class="row">
							<div class="col-sm-4 col-md-4">
								<label for="Name"><small><?php echo $_SESSION[$_SESSION['lang']]['Capital (one time) cost']; ?></small></label>
								<input type="text" class="form-control" id="one_time_cost" name="one_time_cost" placeholder="" readOnly="readOnly" required value="" >
							</div>
							<div class="col-sm-4 col-md-4">
								<label for="Name"><small><?php echo $_SESSION[$_SESSION['lang']]['Annual (maint.) cost']; ?></small></label>
								<input type="text" class="form-control" id="annual_cost" name="annual_cost" placeholder=""  readOnly="readOnly" required value="" >
							</div>
							<div class="col-sm-4 col-md-4">
								<label for="Name"><small><?php echo $_SESSION[$_SESSION['lang']]['Date implemented']; ?></small></label>
								<input type="text" class="form-control" id="data" name="data" placeholder=""  readOnly="readOnly" required value="" >
							</div>
						</div>
						  <br>
						 
						 <div style="margin-top:5px;">&nbsp;</div>
						   <input type="hidden" name="fdLow_o" id="fdLow_o" value="<?php echo $fdLow_o; ?>">
						  <input type="hidden" name="fdProbable_o" id="fdProbable_o" value="<?php echo $fdProbable_o; ?>">
						  <input type="hidden" name="fdHigh_o" id="fdHigh_o" value="">
						  <input type="hidden" name="fdUncert_o" id="fdUncert_o" value="<?php echo $fdUncert_o; ?>">
						  
						  <div style="float:right;"> &nbsp;&nbsp;&nbsp;
						   <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="bxLow_o" ><?php echo $bxLow_o; ?>
						  </div>
						  
						  <div style="display:inline-block; padding:10px; margin:1px; background-color:#aececc; font-size: 18px;" id="bxProbable_o" value="<?php echo $bxProbable_o; ?>"><?php echo $bxProbable_o; ?>
						  </div>
						  
						  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="bxHigh_o" value="<?php echo $bxHigh_o; ?>"><?php echo $bxHigh_o; ?>
						  </div>
						 

						  <span >&nbsp;&nbsp;<small><em><?php echo $_SESSION[$_SESSION['lang']]['Uncertainty range']; ?></em></small></span>
						  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="bxUncert_o" value="<?php echo $bxUncert_o; ?>"><?php echo $bxUncert_o; ?></div>
						  </div>
						  <br>
						 &nbsp;
						   <span id="title_id_o" style="font-size:16px;"><?php echo $_SESSION[$_SESSION['lang']]['How often will the event occur?']; ?></span>
						  <br>
						  <br>
							 <div class="col-sm-4 col-md-12">
							
								  
								  <input type="hidden" name="cadastrar_o" id="cadastrar_o" value="1">
									
									<div class="form-group">
										<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Explain your estimates for frequency or rate']; ?></label>
										<textarea class="form-control" name="explain_o" ID="explain_o" onkeyup="document.getElementById('fr_zoom_explanation_fields_o').value=this.value"><?php echo $explain; ?></textarea>
																	
										<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg_o" style="float:right; margin-top:2px" onclick="return false">
                  <?php echo $_SESSION[$_SESSION['lang']]['Zoom explanation and notes']; ?>
                </button>	
				<br>
				<br>
				<br>
				
						
							
							
				
									  </div>
									
									<!-- FRM1 -->
									
									
									
									<div class="form-group" style="text-align:left;">
										<div class="row" style="text-align:left;">
										<div class="col-sm-4 col-md-10" style="text-align:right;">
											<label for="Sigla" style="vertical-align:baseline;margin-top:7px;"><?php echo $_SESSION[$_SESSION['lang']]['Low estimate of years']; ?></label>
										</div>	
										<div class="col-sm-4 col-md-2">
											<input type="text" class="form-control" id="ley_o"
											name="ley_o" placeholder=""  required value="<?php echo $ley_o; ?>"  onchange="
											
											//COMENTADO PARA RETIRAR A VALIDAÇÃO E FICAR DE ACORDO COM O ACCESS
											//if(
											//document.getElementById('abey').value > 0 &&
											//this.value > document.getElementById('abey').value
											//){
											//	alert('This number must be greater than 1; it must be LESS than or equal to expected years; it cannot be changed if expected years is empty');
											//	this.value=document.getElementById('abey').value
												
											//}else{ 
											
												calculaPontuacaoOption(this.value,'Low');
											
											//}
											
											" onKeyUp="maskIt(this,event,'#########',true)" maxlength="10" <?php if($type_risk == 3){ echo "readonly"; } ?>>
										</div>	
										</div>
									<hr>
										<div class="row">
										<div class="col-sm-4 col-md-10" style="text-align:right;">
											<label for="Sigla" style="vertical-align:baseline;margin-top:7px;" id="label1_o"><?php echo $_SESSION[$_SESSION['lang']]['Average time period between events, years']; ?></label>
										</div>	
										<div class="col-sm-4 col-md-2">
											<input type="text" class="form-control" id="abey_o"
											name="abey_o" placeholder=""  required value="<?php echo $abey_o; ?>" onchange="
											
											if(document.getElementById('type_risk').value != 3){
												//COMENTADO PARA RETIRAR A VALIDAÇÃO E FICAR DE ACORDO COM O ACCESS
												//if(
												//(this.value > 0 &&
												//this.value < document.getElementById('ley_o').value) 
												//||
												//(this.value > document.getElementById('hey_o').value) )
												//{
												//	alert('This number must be greater than 1; it must be LARGER than or equal to low estimate of years; it cannot be changed if expected years is empty');
													
												//	this.value=document.getElementById('ley_o').value
													
												//}else{
													
													calculaPontuacaoOption(this.value,'Probable'); 
													
													// calculateProbab(this.value);
													
												//}
											}else{
												
												document.getElementById('ley_o').value = this.value;
												
												document.getElementById('hey_o').value = this.value;
												
												calculaPontuacaoOption(this.value,'Probable'); 
												
													// calculateProbab(this.value);
												
												
											}	
											
											" onKeyUp="maskIt(this,event,'#########',true)" maxlength="10">
										</div>	
										</div>
									<hr>
									<div class="row">
										<div class="col-sm-4 col-md-10" style="text-align:right;">
											<label for="Sigla" style="vertical-align:baseline;margin-top:7px;"><?php echo $_SESSION[$_SESSION['lang']]['High estimate of years']; ?></label>
										</div>	
										<div class="col-sm-4 col-md-2">
											<input type="text" class="form-control" id="hey_o"
											name="hey_o" placeholder=""  required value="<?php echo $hey_o; ?>"  onKeyUp="
											//COMENTADO PARA RETIRAR A VALIDAÇÃO E FICAR DE ACORDO COM O ACCESS
											//if(document.getElementById('abey_o').value > 0 && this.value < document.getElementById('abey_o').value){
												
											//	alert('This number be LARGER than or equal to expected years; it cannot be changed if expected years is empty');this.value=document.getElementById('abey_o').value
												
											//}else{
												
												calculaPontuacaoOption(this.value,'High');
												
											//}
											
											" onKeyUp="maskIt(this,event,'#########',true)" maxlength="10"  <?php if($type_risk == 3){ echo "readonly"; } ?>>
										</div>	
									</div>	
									
									
									<br>		
									<br>		
									
								
									</div>
									<br>
								
									<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="frequency_or_rate_register_o()"><?php echo $_SESSION[$_SESSION['lang']]['Save']; ?></button>
									</div>
									
									
									<!-- FRM2  -->
									<!--<div id="bxFrm2" style="display:none">	
										<div class="form-group">
										
											<div class="row">
											<div class="col-sm-4 col-md-10" style="text-align:right;">
												<label for="Sigla" style="vertical-align:baseline;margin-top:7px;">Low estimate of years</label>
											</div>	
											<div class="col-sm-4 col-md-2">
												<input type="text" class="form-control" id="leoy"
												name="leoy" placeholder="0"  required value="" readonly onchange="calculcaPontuacao(this.value,'Low');if(this.value > document.getElementById('th_1').value){alert('This number must be greater than 1; it must be LESS than or equal to expected years; it cannot be changed if expected years is empty');this.value=document.getElementById('th_1').value}">
											</div>	
											</div>
											
											
											<div class="row">
											<div class="col-sm-4 col-md-10" style="text-align:right;">
												<label for="Sigla" style="vertical-align:baseline;margin-top:7px;" id="label2"></label>
											</div>	
											<div class="col-sm-4 col-md-2">
												<input type="text" class="form-control" id="th_1"
												name="th_1" placeholder="0"  required value="" onchange="calculcaPontuacao(this.value,'Probable'); calculateProbab(this.value)">
											</div>	
											</div>
											
											
											<div class="row">
											<div class="col-sm-4 col-md-10" style="text-align:right;">
												<label for="Sigla" style="vertical-align:baseline;margin-top:7px;">High estimate of years</label>
											</div>	
											<div class="col-sm-4 col-md-2">
												<input type="text" class="form-control" id="heoy"
												name="heoy" placeholder="0"  required value="" readonly onchange="calculcaPontuacao(this.value,'High');if(this.value < document.getElementById('th_1').value){alert('This number be LARGER than or equal to expected years; it cannot be changed if expected years is empty');this.value=document.getElementById('th_1').value}">
											</div>	
											</div>
											
										</div>
									</div>-->
									<!---->
									
								  </form>
								  </div> 
								  
								
						  </div>
						 
						  
					  </div>	  
					 	  
					<!-- ZOOM -->	  
					<div class="modal fade" id="modal-lg_o">
					<form id="frmZoomFR2_o2" method="post" enctype="multipart/form-data">
							<div class="modal-dialog modal-lg">
							  <div class="modal-content">
								<div class="modal-header">
								  <h4 class="modal-title"><?php echo $_SESSION[$_SESSION['lang']]['Analysis notes and documents (A)']; ?></h4>
								 
								  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								  </button>
								   <br>
								  
								</div>
								<div class="modal-body">
								<span id="zoomRisk_o" style="padding:10px;margin-bottom:7px;background-color:#E3F5EA"><?php echo $risk_name; ?></span>
								<br>&nbsp;	
												
								
								
									<div class="row">
										<div class="col-sm-12 col-md-12">
											<textarea class="form-control" name="fr_zoom_obs_o" id="fr_zoom_obs_o" placeholder="Obs"><?php echo $fr_zoom_obs_o; ?></textarea>
										</div>
									</div>
									<br>
									<div class="row">
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Explain your estimates for frequency or rate']; ?></label>
														<textarea class="form-control" name="fr_zoom_explanation_fields_o" id="fr_zoom_explanation_fields_o" onkeyup="document.getElementById('explain_o').value=this.value"><?php echo $fr_zoom_explanation_fields; ?></textarea>
													</div>	
												</div>	
												<div class="col-sm-6 col-md-6">
												<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Notes for this explanation']; ?> .</label>
														<textarea class="form-control" name="fr_zoom_notes_explanation_o" ID="fr_zoom_notes_explanation_o"><?php echo $fr_zoom_notes_explanation_o; ?></textarea>
													</div>	
												</div>
									</div>
									<hr>
									<h5><?php echo $_SESSION[$_SESSION['lang']]['Documents associated with this risk its options']; ?></h5>
									<br>
									<div class="row" >
												<div class="col-sm-4 col-md-4">
													<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Document name']; ?></label>
														<input type="text" class="form-control" id="fr_zoom_document_name_o"
													name="fr_zoom_document_name_o" placeholder=""  required value="<?php echo $fr_zoom_document_name_o; ?>" >
													</div>	
												</div>	
												<div class="col-sm-4 col-md-4">
													<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Comment']; ?></label>
														<input type="text" class="form-control" id="fr_zoom_comment_o"
													name="fr_zoom_comment_o" placeholder=""  required value="<?php echo $fr_zoom_comment_o; ?>" >
													</div>	
												</div>
												<div class="col-sm-4 col-md-4">
													<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['External Link']; ?>..</label>
														<input type="text" class="form-control" id="fr_zoom_link_o"
													name="fr_zoom_link_o" placeholder=""  required value="<?php echo $fr_zoom_link_o; ?>" onkeyup="atualizaFileField ('fr_zoom_link_bx_o',this.value)">
													<div id="fr_zoom_link_bx_o" style="background-color: #c5dcc6;padding:7px;">
													<?php 
													if($fr_zoom_link != "undefined"){
													echo "Link: <a href='".$fr_zoom_link."' target='_blank'>".$fr_zoom_link."</a>"; 
													}
													?>
													</div>	
													</div>	
												</div>													
												<!--<div class="col-sm-3 col-md-3">
													<div class="form-group">
														<label for="Sigla">..<?php echo $_SESSION[$_SESSION['lang']]['or Document link']; ?></label>
														<input type="text" class="form-control" id="fr_zoom_document_file_o"
													name="fr_zoom_document_file_o" placeholder=""  required value="<?php echo $fr_zoom_document_file_o; ?>" onkeyup="atualizaFileField ('fr_zoom_document_file_bx_o',this.value)">
													<div id="fr_zoom_document_file_bx_o" style="background-color: #c5dcc6;padding:7px;">
													<?php 
													if($fr_zoom_document_file_o != "undefined"){
													echo "Link: <a href='".$fr_zoom_document_file_o."' target='_blank'>".$fr_zoom_document_file_o."</a>"; 
													}
													?>
													</div>	
												
													
													
													</div>	
												
												
												
												
									</div>-->
									
								</div>
								<div class="modal-footer justify-content-between">
								  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $_SESSION[$_SESSION['lang']]['Close']; ?></button>
								  <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="zoom_fr_save();frequency_or_rate_register();"><?php echo $_SESSION[$_SESSION['lang']]['Save changes']; ?></button>
								</div>
							  </div>
							  <!-- /.modal-content -->
							</div>
					<!-- /.modal-dialog -->
					</form>
				  </div>		
				  </div>		
<!-- ########################################## -->					
<!-- ########################################## -->	
<div class="modal fade" id="modal-lg">
					<form id="frmZoomFR" method="post" enctype="multipart/form-data">
							<div class="modal-dialog modal-lg">
							  <div class="modal-content">
								<div class="modal-header">
								  <h4 class="modal-title"><?php echo $_SESSION[$_SESSION['lang']]['Analysis notes and documents (A)']; ?></h4>
								 
								  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								  </button>
								   <br>
								  
								</div>
								<div class="modal-body">
								<span id="zoomRisk" style="padding:10px;margin-bottom:7px;background-color:#E3F5EA"><?php echo $risk_name; ?></span>
								<br>&nbsp;	
								
								
								
									<div class="row">
										<div class="col-sm-12 col-md-12">
											<textarea class="form-control" name="fr_zoom_obs" ID="fr_zoom_obs" placeholder="Obs" disabled><?php echo $fr_zoom_obs; ?></textarea>
										</div>
									</div>
									<br>
									<div class="row">
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Explain your estimates for frequency or rate']; ?></label>
														<textarea class="form-control" name="fr_zoom_explanation_fields" ID="fr_zoom_explanation_fields" onkeyup="document.getElementById('explain').value=this.value" disabled><?php echo $fr_zoom_explanation_fields; ?></textarea>
													</div>	
												</div>	
												<div class="col-sm-6 col-md-6">
												<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Notes for this explanation']; ?> .</label>
														<textarea class="form-control" name="fr_zoom_notes_explanation" ID="fr_zoom_notes_explanation" disabled><?php echo $fr_zoom_notes_explanation; ?></textarea>
													</div>	
												</div>
									</div>
									<hr>
									<h5><?php echo $_SESSION[$_SESSION['lang']]['Documents associated with this risk its options']; ?></h5>
									<br>
									<div class="row" >
												<div class="col-sm-4 col-md-4">
													<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Document name']; ?></label>
														<input type="text" class="form-control" id="fr_zoom_document_name"
													name="fr_zoom_document_name" placeholder=""  required value="<?php echo $fr_zoom_document_name; ?>" disabled="disabled" disabled>
													</div>	
												</div>	
												<div class="col-sm-4 col-md-4">
													<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Comment']; ?></label>
														<input type="text" class="form-control" id="fr_zoom_comment"
													name="fr_zoom_comment" placeholder=""  required value="<?php echo $fr_zoom_comment; ?>" disabled="disabled">
													</div>	
												</div>
												<div class="col-sm-4 col-md-4">
													<div class="form-group">
														<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['External Link']; ?>..</label>
														<input type="text" class="form-control" id="fr_zoom_link"
													name="fr_zoom_link" placeholder=""  required value="<?php echo $fr_zoom_link; ?>" onkeyup="atualizaFileField ('fr_zoom_link_bx',this.value)" disabled>
													<div id="fr_zoom_link_bx" style="background-color: #c5dcc6;padding:7px;" >
													<?php 
													if($fr_zoom_link != "undefined"){
													echo "Link: <a href='".$fr_zoom_link."' target='_blank'>".$fr_zoom_link."</a>"; 
													}
													?>
													</div>	
													</div>	
												</div>													
												<!--<div class="col-sm-3 col-md-3">
													<div class="form-group">
														<label for="Sigla">..<?php echo $_SESSION[$_SESSION['lang']]['or Document link']; ?></label>
														<input type="text" class="form-control" id="fr_zoom_document_file"
													name="fr_zoom_document_file" placeholder=""  required value="<?php echo $fr_zoom_document_file; ?>" onkeyup="atualizaFileField ('fr_zoom_document_file_bx',this.value)" disabled>
													<div id="fr_zoom_document_file_bx" style="background-color: #c5dcc6;padding:7px;" >
													<?php 
													if($fr_zoom_document_file != "undefined"){
													echo "Link: <a href='".$fr_zoom_document_file."' target='_blank'>".$fr_zoom_document_file."</a>"; 
													}
													?>
													</div>	
												
													
													
													</div>	
												
												
												
												
									</div>-->
									
								</div>
								<!--
								<div class="modal-footer justify-content-between">
								  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $_SESSION[$_SESSION['lang']]['Close']; ?></button>
								  <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="zoom_fr_save();frequency_or_rate_register_o();"><?php echo $_SESSION[$_SESSION['lang']]['Save changes']; ?></button>
								</div>-->
							  </div>
							  <!-- /.modal-content -->
							</div>
					<!-- /.modal-dialog -->
					</form>
				  </div>		
				  </div>		


  <script>


					function zoom_fr_save() {	
					    //alert('success');
						var formulario = document.getElementById('frmZoomFR2_o2');
						var dados = new FormData(formulario);
					  
					  $.ajax({
						dataType: 'json',
						type: "POST",
						url: "ajax_process/zoom_fr_save_o.php?id_risk="+document.getElementById('risk').value+"&id_option="+document.getElementById('id_option').value,
						data: dados,
						processData: false,
						contentType: false,
						success: function(data) {
							if(data==1){
									alert('Register save successfull');
									/*document.getElementById('bxError').style.display='none';
									document.getElementById('bxSucess').style.display='block';
									document.getElementById('bxSucess').innerHTML=data[1];
									
									 if(go==1){
										document.getElementById('frmRegister').reset();
									}else{
										location.href="users_report";
									}	 */
									
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
							function frequency_or_rate_register_o() {	
							
								if(document.getElementById('risk').value == '#'){
									
									alert("Select a risk");
									
								}else if(document.getElementById('id_option').value == '#'){
									
									alert("Select a option");
									
								}else{	
								  var formulario = document.getElementById('ar_fr_o');
								  var dados = new FormData(formulario);
									
								  $.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/ar_fr_register_o.php?id_risk="+document.getElementById('risk').value+"&id_option="+document.getElementById('id_option').value+"&time_horizon="+document.getElementById('time_horizon').value+"&type_risk="+document.getElementById('type_risk').value,
									data: dados,
									processData: false,
									contentType: false,
									success: function(data) {
										if(data==1){
											
											alert('Registro atualizado com sucesso');
											window.scrollTo(0, 0);
											registraMR_o();
										}
									}
								  });
								}  
								  
							}
						</script>  
						  
						  
						  
						  
						  
						  