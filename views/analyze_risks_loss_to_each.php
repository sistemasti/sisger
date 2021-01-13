  	<script>
  	
								function isNumber(val){
									alert(typeof val);
									  return typeof val === "number"
								}
									
									
									
								function range_L_E_I(field,value,y=0){
									/* alert(value);
												alert(document.getElementById('B_fdProbable').value); */
									
									if(value == 0){
											//alert('Invalid value');
									}else{
											var f=0;									
											var newValue = value;
											
											if(field == "High"){
												
												
												fieldM = "Max";
												
												if(y==-0){
													//if(newValue < document.getElementById('B_fdProbable').value){
													//		f=1; 	
													//		alert("This score must be less than or equal to the Expected score. It cannot be changed if the Expected score is empty");
													//		document.getElementById('valid1').value = 1;
													//		return false;
													//}else{
															document.getElementById('valid1').value = 0;
													//}
												}
												

											}
							
											if(field == "Probable"){
												fieldM = "Med";
												document.getElementById('B_fdProbable').value = newValue;
												if(y==-0){
													//if(newValue > document.getElementById('B_fdHigh').value || newValue < document.getElementById('B_fdLow').value ){
													//		f=1; 	
													//		alert("This score must be less than or equal to the Expected score. It cannot be changed if the Expected score is empty");
													//		document.getElementById('valid2').value = 1;
													//		return false;
													//}else{
															document.getElementById('valid2').value = 0;
													//}
												}

											}
							
											if(field == "Low"){
												fieldM = "Min";
												if(y==-0){
													//if(newValue > document.getElementById('B_fdProbable').value){
													//		f=1; 	
													//		alert("This score must be less than or equal to the Expected score. It cannot be changed if the Expected score is empty");
													//		document.getElementById('valid3').value = 1;
													//		return false;
													//}else{
															document.getElementById('valid3').value = 0;
													//}
												}

											}
											
											if(field == "DecimalsHigh"){
												
												field = "High";
												fieldM = "Max";
												/* if(newValue > 1){
													alert("this number must be between 0.00001 and 1.0 .");
													document.getElementById('valid4').value = 1;
													
													return false;
												
												}else{
													document.getElementById('valid4').value = 0;
												}	 */
												
												var res = value.replace(",", ".");
												var value_r = 5+ (Math.log(res)/Math.log(10));	
												var value = value_r.toFixed(1);		
											}
																				
											if(field == "DecimalsProbable"){
												
												field = "Probable";
												fieldM = "Med";
												/* if(newValue > 1){
													alert("this number must be between 0.00001 and 1.0 ..");
													document.getElementById('valid5').value = 1;
													return false;
												
												}else{
													document.getElementById('valid5').value = 0;
												} */	
												
												var res = value.replace(",", ".");
												var value_r = 5+ (Math.log(res)/Math.log(10));	
												var value = value_r.toFixed(1);		
											}
																				
											if(field == "DecimalsLow"){
												
												field = "Low";
												fieldM = "Min";										
												/* if(newValue > 1){
													alert("this number must be between 0.00001 and 1.0 ...");
													document.getElementById('valid6').value = 1;
													return false;
												
												}else{
													document.getElementById('valid6').value = 0;
												}	 */
												
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
								}

							</script>
							<input type="hidden" name="valid1" id="valid1" value="0">
							<input type="hidden" name="valid2" id="valid2" value="0">
							<input type="hidden" name="valid3" id="valid3" value="0">
							<input type="hidden" name="valid4" id="valid4" value="0">
							<input type="hidden" name="valid5" id="valid5" value="0">
							<input type="hidden" name="valid6" id="valid6" value="0">
							<input type="hidden" name="valid7" id="valid7" value="0">
							<div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
								 <form method="post" name="ar_le" id="ar_le">									  
											  <div style="float:right;"> 

											  <input type="hidden" id="B_fdLow" name="B_fdLow" value="<?php echo $B_fdLow; ?>">
											  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="B_bxLow" ><?php echo $B_bxLow; ?></div>
											  
											  <input type="hidden" id="B_fdProbable" name="B_fdProbable" value="<?php echo $B_bxProbable; ?>">	
											  <div style="display:inline-block; padding:14px; margin:1px; background-color:#d8d7de; font-size: 22px;""  id="B_bxProbable" ><?php echo $B_bxProbable; ?></div>
											  
											  
											  <input type="hidden" id="B_fdHigh" name="B_fdHigh"  value="<?php echo $B_fdHigh; ?>">	
											  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="B_bxHigh"><?php echo $B_bxHigh; ?></div>
											  &nbsp;
											  &nbsp;
											  &nbsp;
											  &nbsp;
											  &nbsp;
											  &nbsp; <span >Uncertainty range</span>
											  <input type="hidden" id="B_fdUncert" name="B_fdUncert" value="<?php echo $B_fdUncert; ?>">	
											  <div style="display:inline-block; padding:4px; margin:1px; background-color:#e4e4e4;" id="lei_Div_Range"><?php echo $B_fdUncert; ?></div>
											  </div>
										  <BR>
										  <BR>
						
						   <span id="title_id" style="font-size:22px;">What fraction of the value will be lost in each item affected?</span>
										  <BR>
										  <BR>
											<div class="form-group">
														<label for="Sigla">Explain the esimates of loss to each item affected.</label>
														<textarea class="form-control" name="explain_le" id="explain_le"  onkeyup="document.getElementById('le_zoom_explanation_fields').value=this.value"><?php echo $explain_le; ?></textarea>	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg_le" style="float:right; margin-top:2px" >
                  Zoom explanation and notes
                </button>	
				<br>
				<br>
				<br>
											
											</div>
											
											<br>
											Select the type of scales, then choose from the selection offered (if you use any of the 'Steps' options, you can convert between them by changing the option):
											<br>
											<br>
											<div class="row">
												<div class="col-sm-4 col-md-4" style="padding:10px;background-color:#ececd5">
													<input type="radio" name="steps"  id="steps1" value="1" onclick="
													document.getElementById('bxWords').style.display='block';
													document.getElementById('bxFraction').style.display='none';
													document.getElementById('bxPercentage').style.display='none';
													document.getElementById('bxDecimals').style.display='none';
													document.getElementById('bxAnyDecimals').style.display='none';
													
													" <?php if($steps == "1"){ echo "checked"; } ?>> Steps in words<br>
													
													
													<input type="radio" name="steps" id="steps2" value="2" onclick="
													document.getElementById('bxWords').style.display='none';
													document.getElementById('bxFraction').style.display='block';
													document.getElementById('bxPercentage').style.display='none';
													document.getElementById('bxDecimals').style.display='none';
													document.getElementById('bxAnyDecimals').style.display='none';
													
													" <?php if($steps == "2"){ echo "checked"; } ?>> Steps in fraction<br>
													<input type="radio" name="steps" id="steps3" value="3" onclick="
													document.getElementById('bxWords').style.display='none';
													document.getElementById('bxFraction').style.display='none';
													document.getElementById('bxPercentage').style.display='block';
													document.getElementById('bxDecimals').style.display='none';
													document.getElementById('bxAnyDecimals').style.display='none';
													
													" <?php if($steps == "3"){ echo "checked"; } ?>> Steps in percentage<br>
													
													<input type="radio" name="steps" id="steps4" value="4" onclick="
													document.getElementById('bxWords').style.display='none';
													document.getElementById('bxFraction').style.display='none';
													document.getElementById('bxPercentage').style.display='none';
													document.getElementById('bxDecimals').style.display='block';
													document.getElementById('bxAnyDecimals').style.display='none';
													
													" <?php if($steps == "4"){ echo "checked"; } ?> >  Steps in decimals<br>
													
													
													<input type="radio" name="steps" value="5"  id="steps5" onclick="
													document.getElementById('bxWords').style.display='none';
													document.getElementById('bxFraction').style.display='none';
													document.getElementById('bxPercentage').style.display='none';
													document.getElementById('bxDecimals').style.display='none';
													document.getElementById('bxAnyDecimals').style.display='block';
													
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
                           <option value="" >select</option>
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
                           <option value="" >select</option>
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
                           <option value="" >select</option>
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
                           <option value="" >select</option>
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
                           <option value="" >select</option>
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
                           <option value="" >select</option>
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
                           <option value="" >select</option>
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
                           <option value="" >select</option>
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
                           <option value="" >select</option>
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
														<select class="form-control" id="he4" name="he4" onchange="range_L_E_I('High',this.value,1)">
                           <option value="" >select</option>
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
														<select class="form-control" id="pl4" name="pl4"  onchange="range_L_E_I('Probable',this.value,1)">
                           <option value="" >select</option>
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
														<select class="form-control" id="le4" name="le4"  onchange="range_L_E_I('Low',this.value,1)">
                           <option value="" >select</option>
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
												<!-- onkeypress='return event.charCode >= 48 && event.charCode <= 57' -->
													<div class="form-group"> 
														<label for="Sigla">High estimate</label><br>
														<input type="text" class="form-control" min="1" style="width:50%"  id="he5" name="he5"  placeholder="" onblur="range_L_E_I('DecimalsHigh',this.value);" onchange="valida_high_any_decimals(this.value);" value="" onkeypress="return keypressed( this , event );"   maxlength="10">
													</div>
													<div class="form-group">
														<label for="Sigla">Probable loss to each item affected</label><br>
														<input type="text" class="form-control" min="1" style="width:50%" id="pl5" name="pl5"  placeholder="" onblur="range_L_E_I('DecimalsProbable',this.value);" onchange="valida_probable_any_decimals(this.value);" value="" onkeypress="return keypressed( this , event );" maxlength="10">
													</div>
													<div class="form-group">
														<label for="Sigla">Low estimate</label><br>
														<input type="text" min="1"  class="form-control" style="width:50%" id="le5" name="le5" placeholder=""  onchange="valida_low_any_decimals(this.value);"  onblur="range_L_E_I('DecimalsLow',this.value); " value="" onkeypress="return keypressed( this , event );" maxlength="10">
													</div>
													</div>
													
												</div>	
											</div>
											
											<script>
											
											function keypressed( obj , e ) {
												 var tecla = ( window.event ) ? e.keyCode : e.which;
												 var texto = obj.value
												// var indexvir = texto.indexOf(",")
												 var indexpon = texto.indexOf(".")
												
												if ( tecla == 8 || tecla == 0 )
													return true;
												if ( tecla != 46 && tecla < 48 || tecla > 57 )
													return false;
												
												if (tecla == 46) { if (indexvir !== -1 || indexpon !== -1) {return false} }
											}
											
											function formataAnyDecimal (value,id){
												
												var d1 = value.substring(0,1);
												var d2 = value.substring(1,10);
												
												document.getElementById(id).value = d1+','+d2;
												
												
											}
											
											</script>
											<br>
											<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="
											
											 if(document.getElementById('steps5').checked == true){
												 
												valida_by_button()
												
											}else{
												if(
												
													document.getElementById('valid1').value== 1|| document.getElementById('valid2').value== 1|| document.getElementById('valid3').value== 1
													
												){

													alert('This score must be less than or equal to the Expected score. It cannot be changed if the Expected score is empty');

												}else if(
												document.getElementById('valid4').value== 1 || document.getElementById('valid5').value== 1 || document.getElementById('valid6').value== 1 || document.getElementById('valid7').value== 1
												){		
												
													alert('this number must be between 0.00001 and 1.0');
												
												}
												else{		
												
												loss_to_each_register()
												
												}
											}
											">Save</button>
						    </form>
							</div>
							
							<script>
	
								function valida_any_decimals(valor){
									if (valor < 0.00001 || valor > 1 ) {
										return true;
									} else {
										return false;
									}
								}
								
								function valida_pontuacao(valor){
									qtdPonto = 0;
									var tamanho = valor.length;
									for(i = 0; i < tamanho; i++){ //verifica se foi digitado mais de 1 ponto
										if(valor.charAt(i) == '.'){
											qtdPonto += 1;
										}			
									}		
									
									if(tamanho == ''){//verifica se está vazio
											return "It cannot be empty.";
									}
									
									if(valor.charAt(tamanho-1) == '.'){//verifica se o último caracter é um ponto
											return "The last character cannot be a dot.";
									}	
									
									if(valor.charAt(0) == '.'){//verifica se o primeiro caracter é um ponto
											return "The first character cannot be a dot.";
									}
									
									if(qtdPonto > 1) {
										return "Incorrect value format. Use only one dot.";
									} else {
										return "";
									}
								}
								
								function valida_high_any_decimals(valor){
									msg = "High estimate must be between 0.00001 and 1.0.";
									
									validacao_1 = valida_pontuacao(valor);
									if (valida_any_decimals(valor) || validacao_1 != ""){
									
										if (validacao_1 != ""){
											alert(validacao_1);
										} else {
											alert(msg);			
										}
										document.getElementById('he5').focus();
										document.getElementById('pl5').disabled = true;
										document.getElementById('le5').disabled = true;
										return false;			
									
									} else {
									
										document.getElementById('pl5').disabled = false;
										document.getElementById('le5').disabled = false;
										return true;
										
									}
								}
								
								function valida_probable_any_decimals(valor){
									msg = "Probable loss must be between 0.00001 and 1.0.";	
									
									validacao_1 = valida_pontuacao(valor);
									if (valida_any_decimals(valor) || validacao_1 != ""){
									
										if (validacao_1 != ""){
											alert(validacao_1);
										} else {
											alert(msg);			
										}		
										document.getElementById('pl5').focus();			
										document.getElementById('he5').disabled = true;
										document.getElementById('le5').disabled = true;			
										return false;			
									
									} else {
									
										document.getElementById('he5').disabled = false;
										document.getElementById('le5').disabled = false;
										return true;
									
									}
									
								}
								
								function valida_low_any_decimals(valor){
									msg = "Low estimate must be between 0.00001 and 1.0.";	
									
									validacao_1 = valida_pontuacao(valor);
									if (valida_any_decimals(valor) || validacao_1 != ""){
									
										if (validacao_1 != ""){
											alert(validacao_1);
										} else {
											alert(msg);			
										}		
										document.getElementById('le5').focus();
										document.getElementById('he5').disabled = true;
										document.getElementById('pl5').disabled = true;
										return false;			
									
									} else {
									
										document.getElementById('he5').disabled = false;
										document.getElementById('pl5').disabled = false;
										return true;
									
									}
								}
								
								function valida_by_button(){
									
									if(valida_high_any_decimals(document.getElementById('he5').value)){
										if(valida_probable_any_decimals(document.getElementById('pl5').value)){		
											valida_low_any_decimals(document.getElementById('le5').value);
											loss_to_each_register();
										}
									}
									
								}
								
								
								
								</script>
							
							
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
								<span id="zoomRisk_le" style="padding:10px;margin-bottom:7px;background-color:#E3F5EA"><?php echo $risk_name; ?></span>
								<br>&nbsp;	
																			
								
									<div class="row">
										<div class="col-sm-12 col-md-12">
											<textarea class="form-control" placeholder="Obs" name="le_zoom_obs" ID="le_zoom_obs"><?php echo $le_zoom_obs; ?></textarea>
										</div>
									</div>
									<div class="row">
												<div class="col-sm-6 col-md-6">
													<div class="form-group"><br>
														<label for="Sigla">Explain the esimates of loss to each item affected.</label>
														<textarea class="form-control" name="le_zoom_explanation_fields" ID="le_zoom_explanation_fields"  onkeyup="document.getElementById('explain_le').value=this.value"><?php echo $le_zoom_explanation_fields; ?></textarea>
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
												<div class="col-sm-4 col-md-4">
													<div class="form-group">
														<label for="Sigla">Document name</label>
														<input type="text" class="form-control" id="le_zoom_document_name"
													name="le_zoom_document_name" placeholder=""  required value="<?php echo $le_zoom_document_name; ?>" >
													</div>	
												</div>	
												<div class="col-sm-4 col-md-4">
													<div class="form-group">
														<label for="Sigla">Comment</label>
														<input type="text" class="form-control" id="le_zoom_comment"
													name="le_zoom_comment" placeholder=""  required value="<?php echo $le_zoom_comment; ?>" >
													</div>	
												</div>	
												<div class="col-sm-4 col-md-4">
													<div class="form-group">
														<label for="Sigla">Link..</label>
														<input type="text" class="form-control" id="le_zoom_link"
													name="le_zoom_link" placeholder=""  required value="<?php echo $le_zoom_link; ?>" onkeyup="atualizaFileField ('le_zoom_link_bx',this.value)">
													<div id="le_zoom_link_bx" style="background-color: #c5dcc6;padding:7px;">
													<?php 
													if($le_zoom_link != "undefined"){
													echo "<a href='".$le_zoom_link."' target='_blank'>".$le_zoom_link."</a>"; 
													}
													?>
													</div>
													</div>	
													</div>	
												<!--<div class="col-sm-3 col-md-3">
													<div class="form-group">
														<label for="Sigla">Document file</label>
														<
													<input type="text" class="form-control" id="le_zoom_document_file"
													name="le_zoom_document_file" placeholder=""  required value="<?php echo $le_zoom_document_file; ?>"  onkeyup="atualizaFileField ('le_zoom_document_file_bx',this.value)">
													<div id="le_zoom_document_file_bx" style="background-color: #c5dcc6;padding:7px;">
													<?php 
													if($le_zoom_document_file != "undefined"){
													echo "<a href='./files/".$le_zoom_document_file."' target='_blank'>".$le_zoom_document_file."</a>"; 
													}
													?>
													</div>	
												</div>	
												
												
												
									</div>-->
								</div>
								<div class="modal-footer justify-content-between">
								  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="zoom_le_save();loss_to_each_register()">Save changes</button>
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
							function loss_to_each_register() {	
							
								if(document.getElementById('risk').value == '#'){
									
									alert("Select a risk");
									
								}else{	
								  var formulario = document.getElementById('ar_le');
								  var dados = new FormData(formulario);
									
								  $.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/ar_le_register.php?id_risk="+document.getElementById('risk').value,
									data: dados,
									processData: false,
									contentType: false,
									success: function(data) {
										registraMR();
										if(data==1){
											alert('Registro atualizado com sucesso');
											window.scrollTo(0, 0);
										}
									}
								  });
								}  
								  
							}
						</script> 
						<script>


							function zoom_le_save() {	
							   
								var formulario = document.getElementById('frmZoomLE');
								var dados = new FormData(formulario);
							  
							  $.ajax({
								dataType: 'json',
								type: "POST",
								url: "ajax_process/zoom_le_save.php?id="+document.getElementById('risk').value,
								data: dados,
								processData: false,
								contentType: false,
								success: function(data) {
									if(data==1){
										
											//alert('Register save successfull');
											
											
									}else{ 
									
											alert('Falha');
											
							
									}	
									window.scrollTo(0, 0);
								}
							  });
							}
						</script>	