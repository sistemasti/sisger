  	<script>
								function isNumber(val){
									alert(typeof val);
									  return typeof val === "number"
									}
									
									
								function range_L_E_I(field,value){
									var f=0;

									if(field == "High"){
										
										
										fieldM = "Max";
										
										if(value < document.getElementById('B_fdProbable').value){
												f=1; 	
												alert("This score must be less than or equal to the Expected score. It cannot be changed if the Expected score is empty");
										}

									}
					
									if(field == "Probable"){
										fieldM = "Med";
										document.getElementById('B_fdProbable').value = value;
										if(value > document.getElementById('B_fdHigh').value || value < document.getElementById('B_fdLow').value ){
												f=1; 	
												alert("This score must be less than or equal to the Expected score. It cannot be changed if the Expected score is empty");
										}

									}
					
									if(field == "Low"){
										fieldM = "Min";
										if(value > document.getElementById('B_fdProbable').value){
												f=1; 	
												alert("This score must be less than or equal to the Expected score. It cannot be changed if the Expected score is empty");
										}

									}
									
									if(field == "DecimalsHigh"){
										
										field = "High";
										fieldM = "Max";
										if(value > 1){
											alert("this number must be between 0.00001 and 1.0");
										}	
										
										var res = value.replace(",", ".");
										var value_r = 5+ (Math.log(res)/Math.log(10));	
										var value = value_r.toFixed(1);		
									}
																		
									if(field == "DecimalsProbable"){
										
										field = "Probable";
										fieldM = "Med";
										if(value > 1){
											alert("this number must be between 0.00001 and 1.0");
										}	
										
										var res = value.replace(",", ".");
										var value_r = 5+ (Math.log(res)/Math.log(10));	
										var value = value_r.toFixed(1);		
									}
																		
									if(field == "DecimalsLow"){
										
										field = "Low";
										fieldM = "Min";										
										if(value > 1){
											alert("this number must be between 0.00001 and 1.0");
										}	
										
										var res = value.replace(",", ".");
										var value_r = 5+ (Math.log(res)/Math.log(10));	
										var value = value_r.toFixed(1);	
									}
									
									if(f==0){
				
										document.getElementById('B_bx'+field).innerHTML = value;
										
										document.getElementById('B_fd'+field).value = value;
										
										if(fieldM=="Min"){
													document.getElementById('magnitude_LE_Min').innerHTML = value;
													
										}
										if(fieldM=="Med"){
													document.getElementById('magnitude_LE_Med').innerHTML = value;
										}
										if(fieldM=="Max"){
													document.getElementById('magnitude_LE_Max').innerHTML = value;
										}
										
										if(
										document.getElementById('B_fdProbable').value != "" &&
										document.getElementById('B_fdHigh').value != "" &&
										document.getElementById('B_fdLow').value != ""
										){
											var base = parseFloat(document.getElementById('B_fdProbable').value) + parseFloat(document.getElementById('B_fdHigh').value) + parseFloat(document.getElementById('B_fdLow').value);
											var media = base / 3;		
																
											document.getElementById('magnitude_LE_MEDIA').innerHTML = media.toFixed(1);
										}	
										
										var range = (document.getElementById('B_fdHigh').value)-(document.getElementById('B_fdLow').value);
										
										document.getElementById('lei_Div_Range').innerHTML = range.toFixed(1);
										document.getElementById('B_fdUncert').value = range.toFixed(1);
									
									}
										
										magnitudeRisk();

								}	
								
								
								function range_L_E_I_o(field,value){
									var f=0;

									if(field == "High"){
										
										
										fieldM = "Max";
										
										if(value < document.getElementById('B_fdProbable_o').value){
												f=1; 	
												alert("This score must be less than or equal to the Expected score. It cannot be changed if the Expected score is empty");
										}

									}
					
									if(field == "Probable"){
										fieldM = "Med";
										document.getElementById('B_fdProbable_o').value = value;
										if(value > document.getElementById('B_fdHigh_o').value || value < document.getElementById('B_fdLow_o').value ){
												f=1; 	
												alert("This score must be less than or equal to the Expected score. It cannot be changed if the Expected score is empty");
										}

									}
					
									if(field == "Low"){
										fieldM = "Min";
										if(value > document.getElementById('B_fdProbable_o').value){
												f=1; 	
												alert("This score must be less than or equal to the Expected score. It cannot be changed if the Expected score is empty");
										}

									}
									
									if(field == "DecimalsHigh"){
										
										field = "High";
										fieldM = "Max";
										if(value > 1){
											alert("this number must be between 0.00001 and 1.0");
										}	
										
										var res = value.replace(",", ".");
										var value_r = 5+ (Math.log(res)/Math.log(10));	
										var value = value_r.toFixed(1);		
									}
																		
									if(field == "DecimalsProbable"){
										
										field = "Probable";
										fieldM = "Med";
										if(value > 1){
											alert("this number must be between 0.00001 and 1.0");
										}	
										
										var res = value.replace(",", ".");
										var value_r = 5+ (Math.log(res)/Math.log(10));	
										var value = value_r.toFixed(1);		
									}
																		
									if(field == "DecimalsLow"){
										
										field = "Low";
										fieldM = "Min";										
										if(value > 1){
											alert("this number must be between 0.00001 and 1.0");
										}	
										
										var res = value.replace(",", ".");
										var value_r = 5+ (Math.log(res)/Math.log(10));	
										var value = value_r.toFixed(1);	
									}
									
									if(f==0){
										
										var range = (document.getElementById('B_fdHigh_o').value)-(document.getElementById('B_fdLow_o').value);
										
										document.getElementById('lei_Div_Range_o').innerHTML = range.toFixed(1);
										document.getElementById('B_fdUncert_o').value = range.toFixed(1);
										
										document.getElementById('B_bx'+field+'_o').innerHTML = value;
										
										document.getElementById('B_fd'+field+'_o').value = value;
										
										if(fieldM=="Min"){
													document.getElementById('magnitude_LE_Min_o').innerHTML = value;
													
										}
										if(fieldM=="Med"){
													document.getElementById('magnitude_LE_Med_o').innerHTML = value;
										}
										if(fieldM=="Max"){
													document.getElementById('magnitude_LE_Max_o').innerHTML = value;
										}
										
										if(
										document.getElementById('B_fdProbable_o').value != "" &&
										document.getElementById('B_fdHigh_o').value != "" &&
										document.getElementById('B_fdLow_o').value != ""
										){
											var base = parseFloat(document.getElementById('B_fdProbable_o').value) + parseFloat(document.getElementById('B_fdHigh_o').value) + parseFloat(document.getElementById('B_fdLow_o').value);
											var media = base / 3;		
																
											//document.getElementById('magnitude_LE_MEDIA_o').innerHTML = media.toFixed(1);
										}	
										
										
									
									}
										
										magnitudeRisk_o();

								}

							</script>
							<div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
							 <div class="row">
	<div class="col-sm-4 col-md-6" style="padding:15px;">
								 <form method="post" name="ar_le" id="ar_le">									  
											  <div style="float:right;"> 

											  <input type="hidden" id="B_fdLow" name="B_fdLow" value="0.0">
											  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="B_bxLow" >0.0</div>
											  
											  <input type="hidden" id="B_fdProbable" name="B_fdProbable" value="0.0">	
											  <div style="display:inline-block; padding:10px; margin:1px; background-color:#d8d7de; font-size: 16px;"  id="B_bxProbable" >0.0</div>
											  
											  
											  <input type="hidden" id="B_fdHigh" name="B_fdHigh"  value="<?php echo $B_fdHigh; ?>">	
											  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="B_bxHigh">0.0</div>
											  &nbsp;
											  &nbsp;
											  &nbsp;
											  &nbsp;
											  &nbsp;
											  &nbsp; <span >Uncertainty range</span>
											  <input type="hidden" id="B_fdUncert" name="B_fdUncert" value="<?php echo $B_fdUncert; ?>">	
											  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="lei_Div_Range">0.0</div>
											  </div>
										  <BR>
										  <BR>
										  <BR>
						
						   <span id="title_id" style="font-size:16px;">What fraction of the value will be lost in each item affected?</span>
										  <BR>
										  <BR>
											<div class="form-group">
														<label for="Sigla">Explain your estimates for frequency or rate</label>
														<textarea class="form-control" name="explain_le" id="explain_le" ><?php echo $explain_le; ?></textarea>	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg_le" style="float:right; margin-top:2px">
                  Zoom explanation and notes
                </button>	
				<br>
				<br>
				<br>
				<div class="modal fade" id="modal-lg_le">
								
					<div class="modal-dialog modal-lg">
					  <form id="frmZoomLE" method="post" enctype="multipart/form-data">
							<div class="modal-dialog modal-lg">
							  <div class="modal-content">
								<div class="modal-header">
								  <h4 class="modal-title">Analysis notes and documents (B)</h4>
								  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								  </button>
								</div>
								<div class="modal-body">
								
									<span id="zoomRisk_le" style="padding:10px;margin-bottom:7px;background-color:#E3F5EA"></span>
								<br>&nbsp;												
								
									<div class="row">
										<div class="col-sm-12 col-md-12">
											<textarea class="form-control" placeholder="Obs" name="le_zoom_obs" ID="le_zoom_obs"><?php echo $le_zoom_obs; ?></textarea>
										</div>
									</div>
									<div class="row">
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label for="Sigla">Explain your estimates of loss to each items affecteds.</label>
														<textarea class="form-control" name="le_zoom_explanation_fields" ID="le_zoom_explanation_fields"><?php echo $le_zoom_explanation_fields; ?></textarea>
													</div>	
												</div>	
												<div class="col-sm-6 col-md-6">
												<div class="form-group">
														<label for="Sigla">
														&nbsp;<br>
														Notes for this explanation .
														</label>
														<textarea class="form-control" name="le_zoom_notes_explanation" ID="le_zoom_notes_explanation"><?php echo $le_zoom_notes_explanation; ?></textarea>
													</div>	
												</div>
									</div>
									<hr>
									<h5>Documents associated with this risk its options</h5>
									<br>
									<div class="row">
												<div class="col-sm-3 col-md-3">
													<div class="form-group">
														<label for="Sigla">Document name</label>
														<input type="text" class="form-control" id="le_zoom_document_name"
													name="le_zoom_document_name" placeholder=""  required value="<?php echo $le_zoom_document_name; ?>" >
													</div>	
												</div>	
												<div class="col-sm-3 col-md-3">
													<div class="form-group">
														<label for="Sigla">Comment</label>
														<input type="text" class="form-control" id="le_zoom_comment"
													name="le_zoom_comment" placeholder=""  required value="<?php echo $le_zoom_comment; ?>" >
													</div>	
												</div>	
												<div class="col-sm-3 col-md-3">
													<div class="form-group">
														<label for="Sigla">Link..</label>
														<input type="text" class="form-control" id="le_zoom_link"
													name="le_zoom_link" placeholder=""  required value="<?php echo $le_zoom_link; ?>" >
													<div id="le_zoom_link_bx" style="background-color: #c5dcc6;padding:7px;">
													<?php 
													if($le_zoom_link != "undefined"){
													echo "<a href='".$le_zoom_link."' target='_blank'>".$le_zoom_link."</a>"; 
													}
													?>
													</div>
													</div>	
													</div>	
												<div class="col-sm-3 col-md-3">
													<div class="form-group">
														<label for="Sigla">Document file</label>
														<!--<input type="file" class="form-control" id="le_zoom_document_file"
													name="le_zoom_document_file" placeholder=""  required value="" >-->
													<input type="text" class="form-control" id="le_zoom_document_file"
													name="le_zoom_document_file" placeholder=""  required value="<?php echo $le_zoom_document_file; ?>" >
													<div id="le_zoom_document_file_bx" style="background-color: #c5dcc6;padding:7px;">
													<?php 
													if($le_zoom_document_file != "undefined"){
													echo "<a href='./files/".$le_zoom_document_file."' target='_blank'>".$le_zoom_document_file."</a>"; 
													}
													?>
													</div>	
												</div>	
												
												
												
									</div>
								</div>
								<div class="modal-footer justify-content-between">
								  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="zoom_le_save()">Save changes</button>
								</div>
							  </div>
							  <!-- /.modal-content -->
							</div>
					<!-- /.modal-dialog -->
					</form>
					  <!-- /.modal-content -->
					</div>
					</div>	
					<!-- /.modal-dialog -->
				  </div>	
				
														
											</div>
											
											<br>
											Select the type of scales, then choose from the selection offered (if you use any of the 'Steps' options, you can convert between them by changin the option):
											<br>
											<br>
											<div class="row">
												<div class="col-sm-4 col-md-4" style="padding:10px;background-color:#ececd5">
													<input type="radio" name="steps"  id="steps1" value="1" onclick="	
													
													document.getElementById('stepSelected').value = 1;
													document.getElementById('bxWords').style.display='block';
													document.getElementById('bxFraction').style.display='none';
													document.getElementById('bxPercentage').style.display='none';
													document.getElementById('bxDecimals').style.display='none';
													document.getElementById('bxAnyDecimals').style.display='none';
													document.getElementById('bxWords_o').style.display='block';
													document.getElementById('bxFraction_o').style.display='none';
													document.getElementById('bxPercentage_o').style.display='none';
													document.getElementById('bxDecimals_o').style.display='none';
													document.getElementById('bxAnyDecimals_o').style.display='none';
													
													
													" <?php if($steps == "1"){ echo "checked"; } ?>> Steps in words<br>
													
													
													<input type="radio" name="steps" id="steps2" value="2" onclick="
													
													document.getElementById('stepSelected').value = 2;	
													
													document.getElementById('bxWords').style.display='none';
													document.getElementById('bxFraction').style.display='block';
													document.getElementById('bxPercentage').style.display='none';
													document.getElementById('bxDecimals').style.display='none';
													document.getElementById('bxAnyDecimals').style.display='none';
													
													document.getElementById('bxWords_o').style.display='none';
													document.getElementById('bxFraction_o').style.display='block';
													document.getElementById('bxPercentage_o').style.display='none';
													document.getElementById('bxDecimals_o').style.display='none';
													document.getElementById('bxAnyDecimals_o').style.display='none';
													
													
													
													" <?php if($steps == "2"){ echo "checked"; } ?>> Steps in fraction<br>
													<input type="radio" name="steps" id="steps3" value="3" onclick="
													
													document.getElementById('stepSelected').value = 3;
													
													document.getElementById('bxWords').style.display='none';
													document.getElementById('bxFraction').style.display='none';
													document.getElementById('bxPercentage').style.display='block';
													document.getElementById('bxDecimals').style.display='none';
													document.getElementById('bxAnyDecimals').style.display='none';
													
													document.getElementById('bxWords_o').style.display='none';
													document.getElementById('bxFraction_o').style.display='none';
													document.getElementById('bxPercentage_o').style.display='block';
													document.getElementById('bxDecimals_o').style.display='none';
													document.getElementById('bxAnyDecimals_o').style.display='none';
													
													
													
													" <?php if($steps == "3"){ echo "checked"; } ?>> Steps in percentage<br>
													
													<input type="radio" name="steps" id="steps4" value="4" onclick="
													
													document.getElementById('stepSelected').value = 4;
													document.getElementById('bxWords').style.display='none';
													document.getElementById('bxFraction').style.display='none';
													document.getElementById('bxPercentage').style.display='none';
													document.getElementById('bxDecimals').style.display='block';
													document.getElementById('bxAnyDecimals').style.display='none';
													
													
													document.getElementById('bxWords_o').style.display='none';
													document.getElementById('bxFraction_o').style.display='none';
													document.getElementById('bxPercentage_o').style.display='none';
													document.getElementById('bxDecimals_o').style.display='block';
													document.getElementById('bxAnyDecimals_o').style.display='none';
													
													
													" <?php if($steps == "4"){ echo "checked"; } ?> >  Steps in decimals<br>
													
													
													<input type="radio" name="steps" value="5"  id="steps5" onclick="
													
													document.getElementById('stepSelected').value = 5;
													document.getElementById('bxWords').style.display='none';
													document.getElementById('bxFraction').style.display='none';
													document.getElementById('bxPercentage').style.display='none';
													document.getElementById('bxDecimals').style.display='none';
													document.getElementById('bxAnyDecimals').style.display='block';
													
													
													document.getElementById('bxWords_o').style.display='none';
													document.getElementById('bxFraction_o').style.display='none';
													document.getElementById('bxPercentage_o').style.display='none';
													document.getElementById('bxDecimals_o').style.display='none';
													document.getElementById('bxAnyDecimals_o').style.display='block';
													
													
													" <?php if($steps == "5"){ echo "checked"; } ?> > Any decimal<br>
												</div>	
												<div class="col-sm-4 col-md-8">
												
												
												<?php if($steps == "1"){ ?> 
													<div id="bxWords" style="display: block"	>											
												<?php }else{ ?> 
													<div id="bxWords" style="display: none">												
												<?php } ?> 
												
													<div class="form-group">
														<label for="Sigla">High estimate</label>
														<select class="form-control" id="he" name="he" onchange="range_L_E_I('High',this.value)" >
                           
																<option value="5.0" <?php if($he == "5.0"){ echo "selected"; } ?> >TOTAL or almost total loss of value in each item affected.</option>
																<option value="4.5" <?php if($he == "4.5"){ echo "selected"; } ?>>----------- (between total and large on the word scale)</option>
																<option value="4.0"  <?php if($he == "4.0"){ echo "selected"; } ?>>LARGE  loss of value in each item affected.</option>
																<option value="3.5"  <?php if($he == "3.5"){ echo "selected"; } ?>>----------- (between large and small on the word scale).</option>
																<option value="3.0"  <?php if($he == "3.0"){ echo "selected"; } ?>>SMALL loss of value in each item affected.</option>
																<option value="2.5"  <?php if($he == "2.5"){ echo "selected"; } ?>>----------- (between small and tiny on the word scale).</option>
																<option value="2.0"  <?php if($he == "2.0"){ echo "selected"; } ?>>TINY loss of value in each item affected.</option>
																<option value="1.5"  <?php if($he == "1.5"){ echo "selected"; } ?>>----------- (between tiny and trace on the word scale).</option>
																<option value="1.0"  <?php if($he == "1.0"){ echo "selected"; } ?>>TRACE loss of value in each item affected.</option>
																<option value="0.5"  <?php if($he == "0.5"){ echo "selected"; } ?>>----------- (between trace and none on the word scale!)</option>
																
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Probable loss to each item affected</label>
														<select class="form-control" id="pl" name="pl"  onchange="range_L_E_I('Probable',this.value)">
                           
																<option value="5.0" <?php if($pl == "5.0"){ echo "selected"; } ?>>TOTAL or almost total loss of value in each item affected.</option>
																<option value="4.5" <?php if($pl == "4.5"){ echo "selected"; } ?>>----------- (between total and large on the word scale)</option>
																<option value="4.0"  <?php if($pl == "4.0"){ echo "selected"; } ?>>LARGE  loss of value in each item affected.</option>
																<option value="3.5"  <?php if($pl == "3.5"){ echo "selected"; } ?>>----------- (between large and small on the word scale).</option>
																<option value="3.0"  <?php if($pl == "3.0"){ echo "selected"; } ?>>SMALL loss of value in each item affected.</option>
																<option value="2.5"  <?php if($pl == "2.5"){ echo "selected"; } ?>>----------- (between small and tiny on the word scale).</option>
																<option value="2.0"  <?php if($pl == "2.0"){ echo "selected"; } ?>>TINY loss of value in each item affected.</option>
																<option value="1.5"  <?php if($pl == "1.5"){ echo "selected"; } ?>>----------- (between tiny and trace on the word scale).</option>
																<option value="1.0" <?php if($pl == "1.0"){ echo "selected"; } ?> >TRACE loss of value in each item affected.</option>
																<option value="0.5"  <?php if($pl == "0.5"){ echo "selected"; } ?>>----------- (between trace and none on the word scale!)</option>
														  
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Low estimate</label>
														<select class="form-control" id="le" name="le"  onchange="range_L_E_I('Low',this.value)">
                           
																<option value="5.0" <?php if($le == "5.0"){ echo "selected"; } ?>>TOTAL or almost total loss of value in each item affected.</option>
																<option value="4.5" <?php if($le == "4.5"){ echo "selected"; } ?>>----------- (between total and large on the word scale)</option>
																<option value="4.0"  <?php if($le == "4.0"){ echo "selected"; } ?>>LARGE  loss of value in each item affected.</option>
																<option value="3.5"  <?php if($le == "3.5"){ echo "selected"; } ?>>----------- (between large and small on the word scale).</option>
																<option value="3.0"  <?php if($le == "3.0"){ echo "selected"; } ?>>SMALL loss of value in each item affected.</option>
																<option value="2.5" <?php if($le == "2.5"){ echo "selected"; } ?> >----------- (between small and tiny on the word scale).</option>
																<option value="2.0"  <?php if($le == "2.0"){ echo "selected"; } ?>>TINY loss of value in each item affected.</option>
																<option value="1.5"  <?php if($le == "1.5"){ echo "selected"; } ?>>----------- (between tiny and trace on the word scale).</option>
																<option value="1.0"  <?php if($le == "1.0"){ echo "selected"; } ?>>TRACE loss of value in each item affected.</option>
																<option value="0.5"  <?php if($le == "0.5"){ echo "selected"; } ?>>----------- (between trace and none on the word scale!)</option>
														  
														 
														</select>
													</div>
													</div>
													
												<?php if($steps == "2"){ ?> 
													<div id="bxFraction" style="display: block"	>											
												<?php }else{ ?> 
													<div id="bxFraction" style="display: none">												
												<?php } ?> 	
												
													<div class="form-group">
														<label for="Sigla">High estimate</label>
														<select class="form-control" id="he2" name="he2"  onchange="range_L_E_I('High',this.value)">
                           
																<option value="5.0" <?php if($he2 == "5.0"){ echo "selected"; } ?> >~1, total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($he2 == "4.5"){ echo "selected"; } ?>>~1/3  loss of value in each item affected.</option>
																<option value="4.0" <?php if($he2 == "4.0"){ echo "selected"; } ?>>~1/10  loss of value in each item affected.</option>
																<option value="3.5" <?php if($he2 == "3.5"){ echo "selected"; } ?>>~1/30  loss of value in each item affected.</option>
																<option value="3.0" <?php if($he2 == "3.0"){ echo "selected"; } ?>>~1/100  loss of value in each item affected.</option>
																<option value="2.5" <?php if($he2 == "2.5"){ echo "selected"; } ?>>~1/300  loss of value in each item affected.</option>
																<option value="2.0" <?php if($he2 == "2.0"){ echo "selected"; } ?>>~1/1000  loss of value in each item affected.</option>
																<option value="1.5" <?php if($he2 == "1.5"){ echo "selected"; } ?>>~1/3 000  loss of value in each item affected.</option>
																<option value="1.0" <?php if($he2 == "1.0"){ echo "selected"; } ?>>~1/10 000  loss of value in each item affected.</option>
																<option value="0.5" <?php if($he2 == "0.5"){ echo "selected"; } ?>>~1/30 000  loss of value in each item affected.</option>
																
																
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Probable loss to each item affected</label>
														<select class="form-control" id="pl2" name="pl2"  onchange="range_L_E_I('Probable',this.value)">
                           
																<option value="5.0" <?php if($pl2 == "5.0"){ echo "selected"; } ?>>~1, total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($pl2 == "4.5"){ echo "selected"; } ?>>~1/3  loss of value in each item affected.</option>
																<option value="4.0" <?php if($pl2 == "4.0"){ echo "selected"; } ?>>~1/10  loss of value in each item affected.</option>
																<option value="3.5" <?php if($pl2 == "3.5"){ echo "selected"; } ?>>~1/30  loss of value in each item affected.</option>
																<option value="3.0" <?php if($pl2 == "3.0"){ echo "selected"; } ?>>~1/100  loss of value in each item affected.</option>
																<option value="2.5" <?php if($pl2 == "2.5"){ echo "selected"; } ?>>~1/300  loss of value in each item affected.</option>
																<option value="2.0" <?php if($pl2 == "2.0"){ echo "selected"; } ?>>~1/1000  loss of value in each item affected.</option>
																<option value="1.5" <?php if($pl2 == "1.5"){ echo "selected"; } ?>>~1/3 000  loss of value in each item affected.</option>
																<option value="1.0" <?php if($pl2 == "1.0"){ echo "selected"; } ?>>~1/10 000  loss of value in each item affected.</option>
																<option value="0.5" <?php if($pl2 == "0.5"){ echo "selected"; } ?>>~1/30 000  loss of value in each item affected.</option>
														  
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Low estimate</label>
														<select class="form-control" id="le2" name="le2" onchange="range_L_E_I('Low',this.value)">
                           
																<option value="5.0" <?php if($le2 == "5.0"){ echo "selected"; } ?> >~1, total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($le2 == "4.5"){ echo "selected"; } ?> >~1/3  loss of value in each item affected.</option>
																<option value="4.0" <?php if($le2 == "4.0"){ echo "selected"; } ?> >~1/10  loss of value in each item affected.</option>
																<option value="3.5" <?php if($le2 == "3.5"){ echo "selected"; } ?> >~1/30  loss of value in each item affected.</option>
																<option value="3.0" <?php if($le2 == "3.0"){ echo "selected"; } ?> >~1/100  loss of value in each item affected.</option>
																<option value="2.5" <?php if($le2 == "2.5"){ echo "selected"; } ?> >~1/300  loss of value in each item affected.</option>
																<option value="2.0" <?php if($le2 == "2.0"){ echo "selected"; } ?> >~1/1000  loss of value in each item affected.</option>
																<option value="1.5" <?php if($le2 == "1.5"){ echo "selected"; } ?> >~1/3 000  loss of value in each item affected.</option>
																<option value="1.0" <?php if($le2 == "1.0"){ echo "selected"; } ?> >~1/10 000  loss of value in each item affected.</option>
																<option value="0.5" <?php if($le2 == "0.5"){ echo "selected"; } ?>>~1/30 000  loss of value in each item affected.</option>
														  
														 
														</select>
													</div>
													</div>	
												<?php if($steps == "3"){ ?> 
													<div id="bxPercentage" style="display: block"	>											
												<?php }else{ ?> 
													<div id="bxPercentage" style="display: none">												
												<?php } ?> 			
												
													<div class="form-group">
														<label for="Sigla">High estimate</label>
														<select class="form-control" id="he3" name="he3"  onchange="range_L_E_I('High',this.value)">
                           
																<option value="5.0" <?php if($he3 == "5.0"){ echo "selected"; } ?>>~100% total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($he3 == "4.5"){ echo "selected"; } ?>>~30%  loss of value in each item affected.</option>
																<option value="4.0" <?php if($he3 == "4.0"){ echo "selected"; } ?>>~10%  loss of value in each item affected.</option>
																<option value="3.5" <?php if($he3 == "3.5"){ echo "selected"; } ?>>~3%  loss of value in each item affected.</option>
																<option value="3.0" <?php if($he3 == "3.0"){ echo "selected"; } ?>>~1%  loss of value in each item affected.</option>
																<option value="2.5" <?php if($he3 == "2.5"){ echo "selected"; } ?>>~0.3%  loss of value in each item affected.</option>
																<option value="2.0" <?php if($he3 == "2.0"){ echo "selected"; } ?>>~0.1%  loss of value in each item affected.</option>
																<option value="1.5" <?php if($he3 == "1.5"){ echo "selected"; } ?>>~0.03%  loss of value in each item affected.</option>
																<option value="1.0" <?php if($he3 == "1.0"){ echo "selected"; } ?>>~0.01%  loss of value in each item affected.</option>
																<option value="0.5" <?php if($he3 == "0.5"){ echo "selected"; } ?>>~0.003%  loss of value in each item affected.</option>
																
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Probable loss to each item affected</label>
														<select class="form-control" id="pl3" name="pl3" onchange="range_L_E_I('Probable',this.value)">
                           
																<option value="5.0" <?php if($pl3 == "5.0"){ echo "selected"; } ?>>~100% total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($pl3 == "4.5"){ echo "selected"; } ?>>~30%  loss of value in each item affected.</option>
																<option value="4.0" <?php if($pl3 == "4.0"){ echo "selected"; } ?>>~10%  loss of value in each item affected.</option>
																<option value="3.5" <?php if($pl3 == "3.5"){ echo "selected"; } ?>>~3%  loss of value in each item affected.</option>
																<option value="3.0" <?php if($pl3 == "3.0"){ echo "selected"; } ?>>~1%  loss of value in each item affected.</option>
																<option value="2.5" <?php if($pl3 == "2.5"){ echo "selected"; } ?>>~0.3%  loss of value in each item affected.</option>
																<option value="2.0" <?php if($pl3 == "2.0"){ echo "selected"; } ?>>~0.1%  loss of value in each item affected.</option>
																<option value="1.5" <?php if($pl3 == "1.5"){ echo "selected"; } ?>>~0.03%  loss of value in each item affected.</option>
																<option value="1.0" <?php if($pl3 == "1.0"){ echo "selected"; } ?>>~0.01%  loss of value in each item affected.</option>
																<option value="0.5" <?php if($pl3 == "0.5"){ echo "selected"; } ?>>~0.003%  loss of value in each item affected.</option>
														  
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Low estimate</label>
														<select class="form-control" id="le3" name="le3" onchange="range_L_E_I('Low',this.value)">
                           
																<option value="5.0"  <?php if($le3 == "5.0"){ echo "selected"; } ?>>~100% total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($le3 == "4.5"){ echo "selected"; } ?>>~30%  loss of value in each item affected.</option>
																<option value="4.0" <?php if($le3 == "4.0"){ echo "selected"; } ?>>~10%  loss of value in each item affected.</option>
																<option value="3.5" <?php if($le3 == "3.5"){ echo "selected"; } ?>>~3%  loss of value in each item affected.</option>
																<option value="3.0" <?php if($le3 == "3.0"){ echo "selected"; } ?>>~1%  loss of value in each item affected.</option>
																<option value="2.5" <?php if($le3 == "2.5"){ echo "selected"; } ?>>~0.3%  loss of value in each item affected.</option>
																<option value="2.0" <?php if($le3 == "2.0"){ echo "selected"; } ?>>~0.1%  loss of value in each item affected.</option>
																<option value="1.5" <?php if($le3 == "1.5"){ echo "selected"; } ?>>~0.03%  loss of value in each item affected.</option>
																<option value="1.0" <?php if($le3 == "1.0"){ echo "selected"; } ?>>~0.01%  loss of value in each item affected.</option>
																<option value="0.5" <?php if($le3 == "0.5"){ echo "selected"; } ?>>~0.003%  loss of value in each item affected.</option>
														  
														 
														</select>
													</div>
													</div>
												
												<?php if($steps == "4"){ ?> 
													<div id="bxDecimals" style="display: block"	>											
												<?php }else{ ?> 
													<div id="bxDecimals" style="display: none">												
												<?php } ?> 	
												
													<div class="form-group">
														<label for="Sigla">High estimate</label>
														<select class="form-control" id="he4" name="he4" onchange="range_L_E_I('High',this.value)">
                           
																<option value="5.0" <?php if($he4 == "5.0"){ echo "selected"; } ?> >~1. Total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($he4 == "4.5"){ echo "selected"; } ?> >~0.3  loss of value in each item affected.</option>
																<option value="4.0" <?php if($he4 == "4.0"){ echo "selected"; } ?> >~0.1  loss of value in each item affected.</option>
																<option value="3.5" <?php if($he4 == "3.5"){ echo "selected"; } ?> >~0.03  loss of value in each item affected.</option>
																<option value="3.0" <?php if($he4 == "3.0"){ echo "selected"; } ?> >~0.01  loss of value in each item affected.</option>
																<option value="2.5" <?php if($he4 == "2.5"){ echo "selected"; } ?> >~0.003  loss of value in each item affected.</option>
																<option value="2.0" <?php if($he4 == "2.0"){ echo "selected"; } ?> >~0.001  loss of value in each item affected.</option>
																<option value="1.5" <?php if($he4 == "1.5"){ echo "selected"; } ?> >~0.000 3  loss of value in each item affected.</option>
																<option value="1.0" <?php if($he4 == "1.0"){ echo "selected"; } ?> >~0.000 1  loss of value in each item affected.</option>
																<option value="0.5" <?php if($he4 == "0.5"){ echo "selected"; } ?> >~0.000 03  loss of value in each item affected.</option>
																
																
																
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Probable loss to each item affected</label>
														<select class="form-control" id="pl4" name="pl4"  onchange="range_L_E_I('Probable',this.value)">
                           
																<option value="5.0" <?php if($pl4 == "5.0"){ echo "selected"; } ?> >~1. Total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($pl4 == "4.5"){ echo "selected"; } ?> >~0.3  loss of value in each item affected.</option>
																<option value="4.0" <?php if($pl4 == "4.0"){ echo "selected"; } ?> >~0.1  loss of value in each item affected.</option>
																<option value="3.5"<?php if($pl4 == "3.5"){ echo "selected"; } ?>  >~0.03  loss of value in each item affected.</option>
																<option value="3.0" <?php if($pl4 == "3.0"){ echo "selected"; } ?> >~0.01  loss of value in each item affected.</option>
																<option value="2.5" <?php if($pl4 == "2.5"){ echo "selected"; } ?> >~0.003  loss of value in each item affected.</option>
																<option value="2.0" <?php if($pl4 == "2.0"){ echo "selected"; } ?> >~0.001  loss of value in each item affected.</option>
																<option value="1.5" <?php if($pl4 == "1.5"){ echo "selected"; } ?> >~0.000 3  loss of value in each item affected.</option>
																<option value="1.0" <?php if($pl4 == "1.0"){ echo "selected"; } ?> >~0.000 1  loss of value in each item affected.</option>
																<option value="0.5" <?php if($pl4 == "0.5"){ echo "selected"; } ?> >~0.000 03  loss of value in each item affected.</option>
														  
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Low estimate</label>
														<select class="form-control" id="le4" name="le4"  onchange="range_L_E_I('Low',this.value)">
                           
																<option value="5.0" <?php if($le4 == "5.0"){ echo "selected"; } ?> >~1. Total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($le4 == "4.5"){ echo "selected"; } ?> >~0.3  loss of value in each item affected.</option>
																<option value="4.0" <?php if($le4 == "4.0"){ echo "selected"; } ?> >~0.1  loss of value in each item affected.</option>
																<option value="3.5" <?php if($le4 == "3.5"){ echo "selected"; } ?> >~0.03  loss of value in each item affected.</option>
																<option value="3.0" <?php if($le4 == "3.0"){ echo "selected"; } ?> >~0.01  loss of value in each item affected.</option>
																<option value="2.5" <?php if($le4 == "2.5"){ echo "selected"; } ?> >~0.003  loss of value in each item affected.</option>
																<option value="2.0" <?php if($le4 == "2.0"){ echo "selected"; } ?> >~0.001  loss of value in each item affected.</option>
																<option value="1.5" <?php if($le4 == "1.5"){ echo "selected"; } ?> >~0.000 3  loss of value in each item affected.</option>
																<option value="1.0" <?php if($le4 == "1.0"){ echo "selected"; } ?> >~0.000 1  loss of value in each item affected.</option>
																<option value="0.5" <?php if($le4 == "0.5"){ echo "selected"; } ?> >~0.000 03  loss of value in each item affected.</option>
														  
														 
														</select>
													</div>
													</div>
												<?php if($steps == "5"){ ?> 
													<div id="bxAnyDecimals" style="display: block"	>											
												<?php }else{ ?> 
													<div id="bxAnyDecimals" style="display: none">												
												<?php } ?> 			
												
													<div class="form-group">
														<label for="Sigla">High estimate</label><br>
														<input type="number" class="form-control" min="1" style="width:50%"  id="he5" name="he5" onchange="range_L_E_I('DecimalsHigh',this.value)" value="<?php echo $he5; ?>">
													</div>
													<div class="form-group">
														<label for="Sigla">Probable loss to each item affected</label><br>
														<input type="number" class="form-control" min="1" style="width:50%" id="pl5" name="pl5" onchange="range_L_E_I('DecimalsProbable',this.value)" value="<?php echo $pl5; ?>">
													</div>
													<div class="form-group">
														<label for="Sigla">Low estimate</label><br>
														<input type="number" min="1"  class="form-control" style="width:50%" id="le5" name="le5" onchange="range_L_E_I('DecimalsLow',this.value)" value="<?php echo $le5; ?>">
													</div>
													</div>
													
												</div>	
											</div>
											<!--<br>
											<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="loss_to_each_register()">Save</button>-->
						    </form>
							</div>
							
							
							<!-- analise-->
							
							<div class="col-sm-4 col-md-6" style="padding:15px;background-color:#f9f2d2">
								 <form method="post" name="ar_le_o" id="ar_le_o">									  
											  <div style="float:right;"> 

											  <input type="hidden" id="B_fdLow_o" name="B_fdLow_o" value="0.0">
											  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="B_bxLow_o" >0.0</div>
											  
											  <input type="hidden" id="B_fdProbable_o" name="B_fdProbable_o" value="0.0">	
											  <div style="display:inline-block; padding:10px; margin:1px; background-color:#d8d7de; font-size: 16px;"  id="B_bxProbable_o" >0.0</div>
											  
											  
											  <input type="hidden" id="B_fdHigh_o" name="B_fdHigh_o"  value="0.0">	
											  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="B_bxHigh_o">0.0</div>
											  &nbsp;
											  &nbsp;
											  &nbsp;
											  &nbsp;
											  &nbsp;
											  &nbsp; <span >Uncertainty range</span>
											  <input type="hidden" id="B_fdUncert_o" name="B_fdUncert_o" value="0.0">	
											  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="lei_Div_Range_o">0.0</div>
											  </div>
										  <BR>
										  <BR>
										  <BR>
						
						   <span id="title_id" style="font-size:16px;">What fraction of the value will be lost in each item affected?</span>
										  <BR>
										  <BR>
											<div class="form-group">
														<label for="Sigla">Explain your estimates for frequency or rate</label>
														<textarea class="form-control" name="explain_le_o" id="explain_le_o" ><?php echo $explain_le_o; ?></textarea>	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg_le_o" style="float:right; margin-top:2px">
                  Zoom explanation and notes
                </button>	
				<br>
				<br>
				<br>
				
				<div class="modal fade" id="modal-lg_le">
					<div class="modal-dialog modal-lg">
					  <div class="modal-content">
						<div class="modal-header">
						  <h4 class="modal-title">Analysis notes and documents</h4>
						  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
						</div>
						<div class="modal-body">
							<div class="row">
										<div class="col-sm-6 col-md-6">
											<div class="form-group">
												<label for="Sigla">The final text that appears in the explanation field.</label>
												<textarea class="form-control" name="explain_modal" ID="explain_modal_o"><?php echo $explain_le_o; ?></textarea>
											</div>	
										</div>	
										<div class="col-sm-6 col-md-6">
										<div class="form-group">
												<label for="Sigla">Notes for this explanation (not used in report).</label>
												<textarea class="form-control" name="explain_modal_o" ID="explain_modal_o"></textarea>
											</div>	
										</div>
							</div>
							<hr>
							<h5>Documents associated with this risk its options</h5>
							<br>
							<div class="row">
										<div class="col-sm-3 col-md-3">
											<div class="form-group">
												<label for="Sigla">Document name</label>
												<input type="text" class="form-control" id="ytr_o"
											name="ytr_o" placeholder=""  required value="" >
											</div>	
										</div>	
										<div class="col-sm-3 col-md-3">
											<div class="form-group">
												<label for="Sigla">Comment</label>
												<input type="text" class="form-control" id="ytr_o"
											name="ytr_o" placeholder=""  required value="" >
											</div>	
										</div>	
										<div class="col-sm-3 col-md-4">
											<div class="form-group">
												<label for="Sigla">Document file</label>
												<input type="file" class="form-control" id="ytr_o"
											name="ytr_o" placeholder=""  required value="" >
											</div>	
										</div>	
										<div class="col-sm-3 col-md-2">
											<div class="form-group">
												<br>
												<button type="button" class="btn btn-default" style="margin-top:9px;">save</button>
											</div>	
										</div>	
										
							</div>
						</div>
						<div class="modal-footer justify-content-between">
						  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						  <button type="button" class="btn btn-primary">Save changes</button>
						</div>
					  </div>
					  <!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				  </div>	
			
				  
				  <br>
				  <br>
				  <br>
				  <br>
				  <br>
				  <br>
				  <div class="row">
												
												<div class="col-sm-12 col-md-12">
												
												
												<?php if($steps == "1"){ ?> 
													<div id="bxWords_o" style="display: block"	>											
												<?php }else{ ?> 
													<div id="bxWords_o" style="display: none">												
												<?php } ?> 
												
													<div class="form-group">
														<label for="Sigla">High estimate</label>
														<select class="form-control" id="he_o" name="he_o" onchange="range_L_E_I_o('High',this.value)" >
                           
																<option value="5.0" <?php if($he == "5.0"){ echo "selected"; } ?> >TOTAL or almost total loss of value in each item affected.</option>
																<option value="4.5" <?php if($he == "4.5"){ echo "selected"; } ?>>----------- (between total and large on the word scale)</option>
																<option value="4.0"  <?php if($he == "4.0"){ echo "selected"; } ?>>LARGE  loss of value in each item affected.</option>
																<option value="3.5"  <?php if($he == "3.5"){ echo "selected"; } ?>>----------- (between large and small on the word scale).</option>
																<option value="3.0"  <?php if($he == "3.0"){ echo "selected"; } ?>>SMALL loss of value in each item affected.</option>
																<option value="2.5"  <?php if($he == "2.5"){ echo "selected"; } ?>>----------- (between small and tiny on the word scale).</option>
																<option value="2.0"  <?php if($he == "2.0"){ echo "selected"; } ?>>TINY loss of value in each item affected.</option>
																<option value="1.5"  <?php if($he == "1.5"){ echo "selected"; } ?>>----------- (between tiny and trace on the word scale).</option>
																<option value="1.0"  <?php if($he == "1.0"){ echo "selected"; } ?>>TRACE loss of value in each item affected.</option>
																<option value="0.5"  <?php if($he == "0.5"){ echo "selected"; } ?>>----------- (between trace and none on the word scale!)</option>
																
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Probable loss to each item affected</label>
														<select class="form-control" id="pl_o" name="pl_o"  onchange="range_L_E_I_o('Probable',this.value)">
                           
																<option value="5.0" <?php if($pl == "5.0"){ echo "selected"; } ?>>TOTAL or almost total loss of value in each item affected.</option>
																<option value="4.5" <?php if($pl == "4.5"){ echo "selected"; } ?>>----------- (between total and large on the word scale)</option>
																<option value="4.0"  <?php if($pl == "4.0"){ echo "selected"; } ?>>LARGE  loss of value in each item affected.</option>
																<option value="3.5"  <?php if($pl == "3.5"){ echo "selected"; } ?>>----------- (between large and small on the word scale).</option>
																<option value="3.0"  <?php if($pl == "3.0"){ echo "selected"; } ?>>SMALL loss of value in each item affected.</option>
																<option value="2.5"  <?php if($pl == "2.5"){ echo "selected"; } ?>>----------- (between small and tiny on the word scale).</option>
																<option value="2.0"  <?php if($pl == "2.0"){ echo "selected"; } ?>>TINY loss of value in each item affected.</option>
																<option value="1.5"  <?php if($pl == "1.5"){ echo "selected"; } ?>>----------- (between tiny and trace on the word scale).</option>
																<option value="1.0" <?php if($pl == "1.0"){ echo "selected"; } ?> >TRACE loss of value in each item affected.</option>
																<option value="0.5"  <?php if($pl == "0.5"){ echo "selected"; } ?>>----------- (between trace and none on the word scale!)</option>
														  
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Low estimate</label>
														<select class="form-control" id="le_o" name="le_o"  onchange="range_L_E_I_o('Low',this.value)">
                           
																<option value="5.0" <?php if($le == "5.0"){ echo "selected"; } ?>>TOTAL or almost total loss of value in each item affected.</option>
																<option value="4.5" <?php if($le == "4.5"){ echo "selected"; } ?>>----------- (between total and large on the word scale)</option>
																<option value="4.0"  <?php if($le == "4.0"){ echo "selected"; } ?>>LARGE  loss of value in each item affected.</option>
																<option value="3.5"  <?php if($le == "3.5"){ echo "selected"; } ?>>----------- (between large and small on the word scale).</option>
																<option value="3.0"  <?php if($le == "3.0"){ echo "selected"; } ?>>SMALL loss of value in each item affected.</option>
																<option value="2.5" <?php if($le == "2.5"){ echo "selected"; } ?> >----------- (between small and tiny on the word scale).</option>
																<option value="2.0"  <?php if($le == "2.0"){ echo "selected"; } ?>>TINY loss of value in each item affected.</option>
																<option value="1.5"  <?php if($le == "1.5"){ echo "selected"; } ?>>----------- (between tiny and trace on the word scale).</option>
																<option value="1.0"  <?php if($le == "1.0"){ echo "selected"; } ?>>TRACE loss of value in each item affected.</option>
																<option value="0.5"  <?php if($le == "0.5"){ echo "selected"; } ?>>----------- (between trace and none on the word scale!)</option>
														  
														 
														</select>
													</div>
													</div>
													
												<?php if($steps == "2"){ ?> 
													<div id="bxFraction_o" style="display: block"	>											
												<?php }else{ ?> 
													<div id="bxFraction_o" style="display: none">												
												<?php } ?> 	
												
													<div class="form-group">
														<label for="Sigla">High estimate</label>
														<select class="form-control" id="he2_o" name="he2_o"  onchange="range_L_E_I_o('High',this.value)">
                           
																<option value="5.0" <?php if($he2 == "5.0"){ echo "selected"; } ?> >~1, total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($he2 == "4.5"){ echo "selected"; } ?>>~1/3  loss of value in each item affected.</option>
																<option value="4.0" <?php if($he2 == "4.0"){ echo "selected"; } ?>>~1/10  loss of value in each item affected.</option>
																<option value="3.5" <?php if($he2 == "3.5"){ echo "selected"; } ?>>~1/30  loss of value in each item affected.</option>
																<option value="3.0" <?php if($he2 == "3.0"){ echo "selected"; } ?>>~1/100  loss of value in each item affected.</option>
																<option value="2.5" <?php if($he2 == "2.5"){ echo "selected"; } ?>>~1/300  loss of value in each item affected.</option>
																<option value="2.0" <?php if($he2 == "2.0"){ echo "selected"; } ?>>~1/1000  loss of value in each item affected.</option>
																<option value="1.5" <?php if($he2 == "1.5"){ echo "selected"; } ?>>~1/3 000  loss of value in each item affected.</option>
																<option value="1.0" <?php if($he2 == "1.0"){ echo "selected"; } ?>>~1/10 000  loss of value in each item affected.</option>
																<option value="0.5" <?php if($he2 == "0.5"){ echo "selected"; } ?>>~1/30 000  loss of value in each item affected.</option>
																
																
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Probable loss to each item affected</label>
														<select class="form-control" id="pl2_o" name="pl2_o"  onchange="range_L_E_I_o('Probable',this.value)">
                           
																<option value="5.0" <?php if($pl2 == "5.0"){ echo "selected"; } ?>>~1, total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($pl2 == "4.5"){ echo "selected"; } ?>>~1/3  loss of value in each item affected.</option>
																<option value="4.0" <?php if($pl2 == "4.0"){ echo "selected"; } ?>>~1/10  loss of value in each item affected.</option>
																<option value="3.5" <?php if($pl2 == "3.5"){ echo "selected"; } ?>>~1/30  loss of value in each item affected.</option>
																<option value="3.0" <?php if($pl2 == "3.0"){ echo "selected"; } ?>>~1/100  loss of value in each item affected.</option>
																<option value="2.5" <?php if($pl2 == "2.5"){ echo "selected"; } ?>>~1/300  loss of value in each item affected.</option>
																<option value="2.0" <?php if($pl2 == "2.0"){ echo "selected"; } ?>>~1/1000  loss of value in each item affected.</option>
																<option value="1.5" <?php if($pl2 == "1.5"){ echo "selected"; } ?>>~1/3 000  loss of value in each item affected.</option>
																<option value="1.0" <?php if($pl2 == "1.0"){ echo "selected"; } ?>>~1/10 000  loss of value in each item affected.</option>
																<option value="0.5" <?php if($pl2 == "0.5"){ echo "selected"; } ?>>~1/30 000  loss of value in each item affected.</option>
														  
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Low estimate</label>
														<select class="form-control" id="le2_o" name="le2_o" onchange="range_L_E_I_o('Low',this.value)">
                           
																<option value="5.0" <?php if($le2 == "5.0"){ echo "selected"; } ?> >~1, total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($le2 == "4.5"){ echo "selected"; } ?> >~1/3  loss of value in each item affected.</option>
																<option value="4.0" <?php if($le2 == "4.0"){ echo "selected"; } ?> >~1/10  loss of value in each item affected.</option>
																<option value="3.5" <?php if($le2 == "3.5"){ echo "selected"; } ?> >~1/30  loss of value in each item affected.</option>
																<option value="3.0" <?php if($le2 == "3.0"){ echo "selected"; } ?> >~1/100  loss of value in each item affected.</option>
																<option value="2.5" <?php if($le2 == "2.5"){ echo "selected"; } ?> >~1/300  loss of value in each item affected.</option>
																<option value="2.0" <?php if($le2 == "2.0"){ echo "selected"; } ?> >~1/1000  loss of value in each item affected.</option>
																<option value="1.5" <?php if($le2 == "1.5"){ echo "selected"; } ?> >~1/3 000  loss of value in each item affected.</option>
																<option value="1.0" <?php if($le2 == "1.0"){ echo "selected"; } ?> >~1/10 000  loss of value in each item affected.</option>
																<option value="0.5" <?php if($le2 == "0.5"){ echo "selected"; } ?>>~1/30 000  loss of value in each item affected.</option>
														  
														 
														</select>
													</div>
													</div>	
												<?php if($steps == "3"){ ?> 
													<div id="bxPercentage_o" style="display: block"	>											
												<?php }else{ ?> 
													<div id="bxPercentage_o" style="display: none">												
												<?php } ?> 			
												
													<div class="form-group">
														<label for="Sigla">High estimate</label>
														<select class="form-control" id="he3_o" name="he3_o"  onchange="range_L_E_I_o('High',this.value)">
                           
																<option value="5.0" <?php if($he3 == "5.0"){ echo "selected"; } ?>>~100% total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($he3 == "4.5"){ echo "selected"; } ?>>~30%  loss of value in each item affected.</option>
																<option value="4.0" <?php if($he3 == "4.0"){ echo "selected"; } ?>>~10%  loss of value in each item affected.</option>
																<option value="3.5" <?php if($he3 == "3.5"){ echo "selected"; } ?>>~3%  loss of value in each item affected.</option>
																<option value="3.0" <?php if($he3 == "3.0"){ echo "selected"; } ?>>~1%  loss of value in each item affected.</option>
																<option value="2.5" <?php if($he3 == "2.5"){ echo "selected"; } ?>>~0.3%  loss of value in each item affected.</option>
																<option value="2.0" <?php if($he3 == "2.0"){ echo "selected"; } ?>>~0.1%  loss of value in each item affected.</option>
																<option value="1.5" <?php if($he3 == "1.5"){ echo "selected"; } ?>>~0.03%  loss of value in each item affected.</option>
																<option value="1.0" <?php if($he3 == "1.0"){ echo "selected"; } ?>>~0.01%  loss of value in each item affected.</option>
																<option value="0.5" <?php if($he3 == "0.5"){ echo "selected"; } ?>>~0.003%  loss of value in each item affected.</option>
																
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Probable loss to each item affected</label>
														<select class="form-control" id="pl3_o" name="pl3_o" onchange="range_L_E_I_o('Probable',this.value)">
                           
																<option value="5.0" <?php if($pl3 == "5.0"){ echo "selected"; } ?>>~100% total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($pl3 == "4.5"){ echo "selected"; } ?>>~30%  loss of value in each item affected.</option>
																<option value="4.0" <?php if($pl3 == "4.0"){ echo "selected"; } ?>>~10%  loss of value in each item affected.</option>
																<option value="3.5" <?php if($pl3 == "3.5"){ echo "selected"; } ?>>~3%  loss of value in each item affected.</option>
																<option value="3.0" <?php if($pl3 == "3.0"){ echo "selected"; } ?>>~1%  loss of value in each item affected.</option>
																<option value="2.5" <?php if($pl3 == "2.5"){ echo "selected"; } ?>>~0.3%  loss of value in each item affected.</option>
																<option value="2.0" <?php if($pl3 == "2.0"){ echo "selected"; } ?>>~0.1%  loss of value in each item affected.</option>
																<option value="1.5" <?php if($pl3 == "1.5"){ echo "selected"; } ?>>~0.03%  loss of value in each item affected.</option>
																<option value="1.0" <?php if($pl3 == "1.0"){ echo "selected"; } ?>>~0.01%  loss of value in each item affected.</option>
																<option value="0.5" <?php if($pl3 == "0.5"){ echo "selected"; } ?>>~0.003%  loss of value in each item affected.</option>
														  
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Low estimate</label>
														<select class="form-control" id="le3_o" name="le3_o" onchange="range_L_E_I_o('Low',this.value)">
                           
																<option value="5.0"  <?php if($le3 == "5.0"){ echo "selected"; } ?>>~100% total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($le3 == "4.5"){ echo "selected"; } ?>>~30%  loss of value in each item affected.</option>
																<option value="4.0" <?php if($le3 == "4.0"){ echo "selected"; } ?>>~10%  loss of value in each item affected.</option>
																<option value="3.5" <?php if($le3 == "3.5"){ echo "selected"; } ?>>~3%  loss of value in each item affected.</option>
																<option value="3.0" <?php if($le3 == "3.0"){ echo "selected"; } ?>>~1%  loss of value in each item affected.</option>
																<option value="2.5" <?php if($le3 == "2.5"){ echo "selected"; } ?>>~0.3%  loss of value in each item affected.</option>
																<option value="2.0" <?php if($le3 == "2.0"){ echo "selected"; } ?>>~0.1%  loss of value in each item affected.</option>
																<option value="1.5" <?php if($le3 == "1.5"){ echo "selected"; } ?>>~0.03%  loss of value in each item affected.</option>
																<option value="1.0" <?php if($le3 == "1.0"){ echo "selected"; } ?>>~0.01%  loss of value in each item affected.</option>
																<option value="0.5" <?php if($le3 == "0.5"){ echo "selected"; } ?>>~0.003%  loss of value in each item affected.</option>
														  
														 
														</select>
													</div>
													</div>
												
												<?php if($steps == "4"){ ?> 
													<div id="bxDecimals_o" style="display: block"	>											
												<?php }else{ ?> 
													<div id="bxDecimals_o" style="display: none">												
												<?php } ?> 	
												
													<div class="form-group">
														<label for="Sigla">High estimate</label>
														<select class="form-control" id="he4_o" name="he4_o" onchange="range_L_E_I_o('High',this.value)">
                           
																<option value="5.0" <?php if($he4 == "5.0"){ echo "selected"; } ?> >~1. Total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($he4 == "4.5"){ echo "selected"; } ?> >~0.3  loss of value in each item affected.</option>
																<option value="4.0" <?php if($he4 == "4.0"){ echo "selected"; } ?> >~0.1  loss of value in each item affected.</option>
																<option value="3.5" <?php if($he4 == "3.5"){ echo "selected"; } ?> >~0.03  loss of value in each item affected.</option>
																<option value="3.0" <?php if($he4 == "3.0"){ echo "selected"; } ?> >~0.01  loss of value in each item affected.</option>
																<option value="2.5" <?php if($he4 == "2.5"){ echo "selected"; } ?> >~0.003  loss of value in each item affected.</option>
																<option value="2.0" <?php if($he4 == "2.0"){ echo "selected"; } ?> >~0.001  loss of value in each item affected.</option>
																<option value="1.5" <?php if($he4 == "1.5"){ echo "selected"; } ?> >~0.000 3  loss of value in each item affected.</option>
																<option value="1.0" <?php if($he4 == "1.0"){ echo "selected"; } ?> >~0.000 1  loss of value in each item affected.</option>
																<option value="0.5" <?php if($he4 == "0.5"){ echo "selected"; } ?> >~0.000 03  loss of value in each item affected.</option>
																
																
																
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Probable loss to each item affected</label>
														<select class="form-control" id="pl4_o" name="pl4_o"  onchange="range_L_E_I_o('Probable',this.value)">
                           
																<option value="5.0" <?php if($pl4 == "5.0"){ echo "selected"; } ?> >~1. Total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($pl4 == "4.5"){ echo "selected"; } ?> >~0.3  loss of value in each item affected.</option>
																<option value="4.0" <?php if($pl4 == "4.0"){ echo "selected"; } ?> >~0.1  loss of value in each item affected.</option>
																<option value="3.5"<?php if($pl4 == "3.5"){ echo "selected"; } ?>  >~0.03  loss of value in each item affected.</option>
																<option value="3.0" <?php if($pl4 == "3.0"){ echo "selected"; } ?> >~0.01  loss of value in each item affected.</option>
																<option value="2.5" <?php if($pl4 == "2.5"){ echo "selected"; } ?> >~0.003  loss of value in each item affected.</option>
																<option value="2.0" <?php if($pl4 == "2.0"){ echo "selected"; } ?> >~0.001  loss of value in each item affected.</option>
																<option value="1.5" <?php if($pl4 == "1.5"){ echo "selected"; } ?> >~0.000 3  loss of value in each item affected.</option>
																<option value="1.0" <?php if($pl4 == "1.0"){ echo "selected"; } ?> >~0.000 1  loss of value in each item affected.</option>
																<option value="0.5" <?php if($pl4 == "0.5"){ echo "selected"; } ?> >~0.000 03  loss of value in each item affected.</option>
														  
														 
														</select>
													</div>
													<div class="form-group">
														<label for="Sigla">Low estimate</label>
														<select class="form-control" id="le4_o" name="le4_o"  onchange="range_L_E_I_o('Low',this.value)">
                           
																<option value="5.0" <?php if($le4 == "5.0"){ echo "selected"; } ?> >~1. Total or almost total loss of value in each item affected</option>
																<option value="4.5" <?php if($le4 == "4.5"){ echo "selected"; } ?> >~0.3  loss of value in each item affected.</option>
																<option value="4.0" <?php if($le4 == "4.0"){ echo "selected"; } ?> >~0.1  loss of value in each item affected.</option>
																<option value="3.5" <?php if($le4 == "3.5"){ echo "selected"; } ?> >~0.03  loss of value in each item affected.</option>
																<option value="3.0" <?php if($le4 == "3.0"){ echo "selected"; } ?> >~0.01  loss of value in each item affected.</option>
																<option value="2.5" <?php if($le4 == "2.5"){ echo "selected"; } ?> >~0.003  loss of value in each item affected.</option>
																<option value="2.0" <?php if($le4 == "2.0"){ echo "selected"; } ?> >~0.001  loss of value in each item affected.</option>
																<option value="1.5" <?php if($le4 == "1.5"){ echo "selected"; } ?> >~0.000 3  loss of value in each item affected.</option>
																<option value="1.0" <?php if($le4 == "1.0"){ echo "selected"; } ?> >~0.000 1  loss of value in each item affected.</option>
																<option value="0.5" <?php if($le4 == "0.5"){ echo "selected"; } ?> >~0.000 03  loss of value in each item affected.</option>
														  
														 
														</select>
													</div>
													</div>
												<?php if($steps == "5"){ ?> 
													<div id="bxAnyDecimals_o" style="display: block"	>											
												<?php }else{ ?> 
													<div id="bxAnyDecimals_o" style="display: none">												
												<?php } ?> 			
												
													<div class="form-group">
														<label for="Sigla">High estimate</label><br>
														<input type="text" class="form-control" min="1" style="width:50%"  id="he5_o" name="he5_o" onchange="range_L_E_I_o('DecimalsHigh',this.value)" value="<?php echo $he5_o; ?>"  onKeyUp="maskIt(this,event,'###.###.##.##',true)" maxlength="5">
													</div>
													<div class="form-group">
														<label for="Sigla">Probable loss to each item affected</label><br>
														<input type="text" class="form-control" min="1" style="width:50%" id="pl5_o" name="pl5_o" onchange="range_L_E_I_o('DecimalsProbable',this.value)" value="<?php echo $pl5_o; ?>"  onKeyUp="maskIt(this,event,'###.###.##.##',true)" maxlength="5">
													</div>
													<div class="form-group">
														<label for="Sigla">Low estimate</label><br>
														<input type="text" min="1"  class="form-control" style="width:50%" id="le5_o" name="le5_o" onchange="range_L_E_I_o('DecimalsLow',this.value)" value="<?php echo $le5_o; ?>"  onKeyUp="maskIt(this,event,'###.###.##.##',true)" maxlength="5">
													</div>
													</div>
													
												</div>	
											</div>
														
											</div>
											
											
											<br>
											  <br>
									<input type="hidden" id="stepSelected" name="stepSelected" value="1">
									<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="loss_to_each_register()">Save</button>
										
						    </form>
							</div>
							</div>
							</div>
							
							<div class="modal fade" id="modal-lg_le_o">
								
					<div class="modal-dialog modal-lg">
					  <form id="frmZoomLE2_o2" method="post" enctype="multipart/form-data">
							<div class="modal-dialog modal-lg">
							  <div class="modal-content">
								<div class="modal-header">
								  <h4 class="modal-title">Analysis notes and documents (B)</h4>
								  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								  </button>
								</div>
								<div class="modal-body">
								
									<span id="zoomRisk_le_o" style="padding:10px;margin-bottom:7px;background-color:#E3F5EA"></span>
								<br>&nbsp;												
								
									<div class="row">
										<div class="col-sm-12 col-md-12">
											<textarea class="form-control" placeholder="Obs" name="le_zoom_obs_o" ID="le_zoom_obs_o"><?php echo $le_zoom_obs; ?></textarea>
										</div>
									</div>
									<div class="row">
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label for="Sigla">Explain your estimates of loss to each items affecteds.</label>
														<textarea class="form-control" name="le_zoom_explanation_fields_o" ID="le_zoom_explanation_fields_o"><?php echo $le_zoom_explanation_fields; ?></textarea>
													</div>	
												</div>	
												<div class="col-sm-6 col-md-6">
												<div class="form-group">
														<label for="Sigla">
														&nbsp;<br>
														Notes for this explanation .
														</label>
														<textarea class="form-control" name="le_zoom_notes_explanation_o" ID="le_zoom_notes_explanation_o"><?php echo $le_zoom_notes_explanation_o; ?></textarea>
													</div>	
												</div>
									</div>
									<hr>
									<h5>Documents associated with this risk its options</h5>
									<br>
									<div class="row">
												<div class="col-sm-3 col-md-3">
													<div class="form-group">
														<label for="Sigla">Document name</label>
														<input type="text" class="form-control" id="le_zoom_document_name_o"
													name="le_zoom_document_name_o" placeholder=""  required value="<?php echo $le_zoom_document_name_o; ?>" >
													</div>	
												</div>	
												<div class="col-sm-3 col-md-3">
													<div class="form-group">
														<label for="Sigla">Comment</label>
														<input type="text" class="form-control" id="le_zoom_comment_o"
													name="le_zoom_comment_o" placeholder=""  required value="<?php echo $le_zoom_comment_o; ?>" >
													</div>	
												</div>	
												<div class="col-sm-3 col-md-3">
													<div class="form-group">
														<label for="Sigla">Link..</label>
														<input type="text" class="form-control" id="le_zoom_link_o"
													name="le_zoom_link_o" placeholder=""  required value="<?php echo $le_zoom_link_o; ?>" >
													<div id="le_zoom_link_bx_o" style="background-color: #c5dcc6;padding:7px;">
													<?php echo $le_zoom_link_o; ?>
													</div>
													</div>	
													</div>	
												<div class="col-sm-3 col-md-3">
													<div class="form-group">
														<label for="Sigla">Document file</label>
														<!--<input type="file" class="form-control" id="le_zoom_document_file"
													name="le_zoom_document_file" placeholder=""  required value="" >-->
													<input type="text" class="form-control" id="le_zoom_document_file_o"
													name="le_zoom_document_file_o" placeholder=""  required value="<?php echo $le_zoom_document_file_o; ?>" >
													<div id="le_zoom_document_file_bx_o" style="background-color: #c5dcc6;padding:7px;">
													<?php 
													if($le_zoom_document_file_o != "undefined"){
													echo "<a href='./files/".$le_zoom_document_file_o."' target='_blank'>".$le_zoom_document_file_o."</a>"; 
													}
													?>
													</div>	
												</div>	
												
												
												
									</div>
								</div>
								<div class="modal-footer justify-content-between">
								  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="zoom_le_save_o()">Save changes</button>
								</div>
							  </div>
							  <!-- /.modal-content -->
							</div>
					<!-- /.modal-dialog -->
					</form>
					  <!-- /.modal-content -->
					</div>
					</div>	
					<!-- /.modal-dialog -->
				  </div>	
						  <script>  
						  
						  function zoom_le_save_o() {	
					    //alert('success');
						var formulario = document.getElementById('frmZoomLE2_o2');
						var dados = new FormData(formulario);
					 // alert(document.getElementById('id_option').value);
					  $.ajax({
						dataType: 'json',
						type: "POST",
						url: "ajax_process/zoom_le_save_o.php?id_risk="+document.getElementById('risk').value+"&id_option="+document.getElementById('id_option').value,
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
						  
						  
							function loss_to_each_register() {	
							
								if(document.getElementById('risk').value == '#'){
									
									alert("Select a risk");
									
								}else{	
								  var formulario = document.getElementById('ar_le_o');
								  var dados = new FormData(formulario);
									
								  $.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/ar_le_register_o.php?id_risk="+document.getElementById('risk').value+"&steps_o="+document.getElementById('stepSelected').value+"&id_option="+document.getElementById('id_option').value,
									data: dados,
									processData: false,
									contentType: false,
									success: function(data) {
										registraMR_o();
										if(data==1){
											alert('Registro atualizado com sucesso');
											window.scrollTo(0, 0);
										}
									}
								  });
								}  
								  
							}
						</script> 