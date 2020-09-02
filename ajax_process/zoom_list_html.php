<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");

	
	//Build_value_pie::update_ar_zoom_list_items_affected_top($_GET['low_estimate_top'],$_GET['most_probable_top'],$_GET['high_estimate_top']);



?>

	<br>
											
		<input type="radio" name="type_list" id="type_list_1" value="1"  onclick="
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
				
				document.getElementById('C_type_list').value=1;			
				
				
				" checked> Items listed are all affected
				
				<br>
		<input type="radio" name="type_list" id="type_list_2" value="2" onclick="
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
				
				document.getElementById('C_type_list').value=2;	
				
				"> Items listed are exposed, but only this many affected:
				
													<br>
													<br>
													<br>
														<?php  
														$ia = Build_value_pie::select_ar_zoom_list_items_affected($_GET['risk_id']); 
														if($ia['num'] > 0){
														if(isset($ia['dados'][0]['low_estimate_general'])){
															$low_estimate_general=$ia['dados'][0]['low_estimate_general'];
														}else{
															$low_estimate_general='0.0';
														}	
														
														if(isset($ia['dados'][0]['most_probable_general'])){
															$most_probable_top=$ia['dados'][0]['most_probable_general'];
														}else{
															$most_probable_top='0.0';
														}	
														
														if(isset($ia['dados'][0]['high_estimate_general'])){
															$high_estimate_top=$ia['dados'][0]['high_estimate_general'];
														}else{
															$high_estimate_top='0.0';
														}	
														
														?>
													  <table id="example" class="table">
														<thead>	
															<tr>
															  <th style="width:40%"></th>
															  <th><small>Number of items in subgroup</small></th>
															  <th><small>Low estimate</small> </th>                
															  <th><small>Most Probable</small></th>                
															  <th><small>High estimate</small></th>    
															  
															</tr>
															<tr>
															  <th></th>
															  <th></th>                
															  <th><input type="text" class="form-control" id="low_estimate_top" name="low_estimate_top" placeholder="Enter document name" value="<?php echo $low_estimate_general; ?> " onkeyup="zoom_list_update_top()" required style="display:none">
															  
															  </th>                
															  <th><input type="text" class="form-control" id="most_probable_top" name="most_probable_top" placeholder="Enter document name" value="<?php echo $most_probable_top; ?>" onkeyup="zoom_list_update_top()" required style="display:none"></th>                
															  <th><input type="text" class="form-control" id="high_estimate_top" name="high_estimate_top" placeholder="Enter document name" onkeyup="zoom_list_update_top()" value="<?php echo $high_estimate_top; ?>" required style="display:none"></th>    
															
															</tr>
														</thead>
														
														
														<tbody>	
														
														<?php 
														
														
															
															
																$formulaE = 0;
																$formulaF = 0;
																$formulaG = 0;
																foreach($ia['dados'] as $ia){
																	
																$vp = Build_value_pie::select_ec_value_pie_table_id($ia['id_ec_value_pie_table']);	
																
																if($vp['num'] > 0){
																
																if($vp['items_value_as_percent_of_asset'] ==0 || $vp['items_value_as_percent_of_asset'] ==''){
																	$items_value_as_percent_of_asset = 1;
																}else{
																	$items_value_as_percent_of_asset = $vp['items_value_as_percent_of_asset'];		
																}		
																
																$formulaE = $formulaE+((float)($ia['low_estimate'])*(float)($items_value_as_percent_of_asset));
																
																$formulaF = $formulaF+((float)($ia['most_probable'])*(float)($items_value_as_percent_of_asset));
																
																$formulaG = $formulaG+((float)($ia['high_estimate'])*(float)($items_value_as_percent_of_asset));
																
																$items_in_asset = $vp['items_in_asset'];
																$low_estimate_general = $ia['low_estimate_general'];
																$most_probable_general = $ia['most_probable_general'];
																$high_estimate_general = $ia['high_estimate_general'];
																	
														?>
															<tr id="row">
															  <td><?php  echo $ia['identification']; ?></td>
															  
															  <td><?php  echo $ia['number_subgroups']; ?></td>
															 
															 <td><input type="text" class="form-control" id="low_estimate_<?php  echo $ia['id']; ?>" name="low_estimate_<?php  echo $ia['id']; ?>" placeholder="Enter document name" value="<?php  echo $ia['low_estimate']; ?>" onkeyup="zoom_list_update(<?php  echo $ia['id']; ?>,this.value,document.getElementById('most_probable_<?php  echo $ia['id']; ?>').value,document.getElementById('high_estimate_<?php  echo $ia['id']; ?>').value)" required></td>
															  
															  <td><input type="text" class="form-control" id="most_probable_<?php  echo $ia['id']; ?>" name="most_probable_<?php  echo $ia['id']; ?>" placeholder="Enter document name" value="<?php  echo $ia['most_probable']; ?>" onkeyup="zoom_list_update(<?php  echo $ia['id']; ?>,document.getElementById('low_estimate_<?php  echo $ia['id']; ?>').value,this.value,document.getElementById('high_estimate_<?php  echo $ia['id']; ?>').value)" required></td>
															  
															  <td><input type="text" class="form-control" id="high_estimate_<?php  echo $ia['id']; ?>" name="high_estimate_<?php  echo $ia['id']; ?>" placeholder="Enter document name" value="<?php  echo $ia['high_estimate']; ?>" required onkeyup="zoom_list_update(<?php  echo $ia['id']; ?>,document.getElementById('low_estimate_<?php  echo $ia['id']; ?>').value,document.getElementById('most_probable_<?php  echo $ia['id']; ?>').value,this.value)"></td>
															  
															</tr>
															
															<?php 
																}
																}
																
															?>
															
															
															
															<tr id="row">
															<td colspan="5"></td>
															</tr>
															<tr id="row">
															  <td colspan="2" style="text-align:right"><small>Using value pie:</small></td>
															 
															  <td>
															  <!-- 
															  ###########################################
															  as divs serão exibidas de acordo com o item selecionado no radio button
															  ###########################################
															  -->
																
																
															   <div id="bxAllAffectedUsingLow">
																  <center>
																	  <span class="badge bg-info"><div id="modalZoomDados"><?php echo $formulaE; ?>%</div></span>
																	  <br>
																	  C: <?php 
																	  
																			$ca = log10($formulaE/100);
																			echo round($ca,1);
																		?>
																  </center>
																  <input type="hidden" id="ca_low" name="ca_low" value="<?php echo round($ca,1); ?>">
																</div>  
																
																 <div id="bxExposedUsingLow" style="display:none">
																  <center>
																	  <span class="badge bg-info"><div id=""><?php  
																	  $totalLow = Build_value_pie::select_sum_low_estimate_ec_value_pie_table(); 
																	
																	 $a = ((float)$formulaE*(float)$low_estimate_general)/(float)$totalLow['total']; 
																	  echo round($a,5);
																	  ?>%</div></span>
																	  <br>
																	  C: <?php 
																	  
																			$ca = log10(round($a,5)/100);
																			echo round($ca,1);
																		?>
																		<input type="hidden" id="ca_low" name="ca_low" value="<?php echo round($ca,1); ?>">
																  </center>
																</div>  
																
																
															  </td>
															  
															  <td> 
															  
															  <div id="bxAllAffectedUsingMost">
																  <center>
																		  <span class="badge bg-info"><div id="modalZoomDados"><?php echo $formulaF; ?>%</div></span>
																		  <br>
																		   <?php 
																		  
																				$cb = log10($formulaF/100);
																				echo round($cb,1);
																			?>
																  </center>
																  <input type="hidden" id="ca_media" name="ca_media" value="<?php echo round($cb,1); ?>">
																</div>  
																
															  <div id="bxExposedUsingMost" style="display:none">
																  <center>
																		  <span class="badge bg-info">
																		  <div id="modalZoomDados"><?php 
																		  
																			$totalMost = Build_value_pie::select_sum_most_probable_ec_value_pie_table(); 
																	
																			$b = ((float)$formulaF*(float)$most_probable_general)/(float)$totalMost['total']; 
																			  echo round($b,5);

																	  ?>%</div></span>
																		  <br>
																		   <?php 
																		  
																				$cb = log10(round($b,5)/100);
																				echo round($cb,1);
																			?>
																			 <input type="hidden" id="ca_media" name="ca_media" value="<?php echo round($cb,1); ?>">
																  </center>
																</div>  
																
															 </td>
															  
															  <td> 
															  
															  <div id="bxAllAffectedUsingHigh">
																<center>
																	  <span class="badge bg-info"><div id="modalZoomDados"><?php echo $formulaG; ?>%</div></span>
																	  <br>
																	 <?php 
																	  
																			$cc =log10($formulaG/100);
																			echo round($cc,1);
																		?>
																  </center>
																   <input type="hidden" id="ca_high" name="ca_high" value="<?php echo round($cc,1); ?>">
															  </div>
															   <div id="bxExposedUsingHigh" style="display:none">
																  <center>
																		  <span class="badge bg-info"><div id="modalZoomDados"><?php  
																			$totalHigh = Build_value_pie::select_sum_high_estimate_ec_value_pie_table(); 
																	
																			$c = ((float)$formulaG*(float)$high_estimate_general)/(float)$totalHigh['total']; 
																			  echo round($c,5); ?>%</div></span>
																		  <br>
																		   <?php 
																		  
																				$cc = log10(round($c,5)/100);
																				echo round($cc,1);
																			?>
																			<input type="hidden" id="ca_high" name="ca_high" value="<?php echo round($cc,1); ?>">
																  </center>
																</div> 
																</td>
															</tr>
															<tr >
															  <td id="row" colspan="2" style="text-align:right"><small>Assuming all items of equal value:</small></td>
															  <!-- 
															  ###########################################
															  as divs serão exibidas de acordo com o item selecionado no radio button
															  ###########################################
															  -->
															  <td>
															  
															  <div id="bx_AllAffected_Assuming_Low">
																  <center>
																	  <span class="badge bg-info"><div id="modalZoomDados">
																	  <?php 
																	  $totalLow = Build_value_pie::select_sum_low_estimate_ec_value_pie_table(); 
																	  
																	  $l = ((float)$totalLow['total']/(float)$items_in_asset)*100;
																	  echo round($l,5);
																	  ?>
																	  %</div></span>
																	  <br>
																	  C:  <?php 
																	  
																			$cd =log10(round($l,5)/100);
																			echo round($cd,1);
																		?>
																		  <input type="hidden" id="cd_low" name="cd_low" value="<?php echo round($cd,1); ?>">
																  </center>
																</div> 
																<div id="bx_Exposed_Assuming_Low" style="display:none">
																  <center>
																	  <span class="badge bg-info"><div id="modalZoomDados">
																	  <?php  
																	  $totalLow = Build_value_pie::select_sum_low_estimate_ec_value_pie_table(); 
																	  $l = ((float)$totalLow['total']/(float)$items_in_asset)*100;
																	  $l = round($l,5);
																	   
																	   
																	   
																	 $d = ((float)$l*(float)$low_estimate_general)/(float)$totalLow['total']; 
																	  echo round($d,5);
																	  ?>
																	  %</div></span>
																	  <br>
																	  C:  <?php 
																	  
																			$cd =log10(round($d,5)/100);
																			echo round($cd,1);
																		?>
																		 <input type="hidden" id="cd_low" name="cd_low" value="<?php echo round($cd,1); ?>">
																  </center>
																</div> 
															
																
															  </td>
															  
															  <td> 
															  
																<div id="bx_AllAffected_Assuming_Most">
																	<center>
																		  <span class="badge bg-info"><div id="modalZoomDados"><?php 
																		  $totalMost = Build_value_pie::select_sum_most_probable_ec_value_pie_table(); 
																		  
																		  $m = ((float)$totalMost['total']/(float)$items_in_asset)*100;
																		  echo round($m,5);
																		  ?>%</div></span>
																		  <br>
																		   <?php 
																		  
																				$ce =log10(round($m,5)/100);
																				echo round($ce,1);
																			?>
																			<input type="hidden" id="ce_most" name="ce_most" value="<?php echo round($ce,1); ?>">
																	</center>
																</div>
																<div id="bx_Exposed_Assuming_Most" style="display:none">
																	<center>
																		  
																		  
																		  <span class="badge bg-info"><div id="modalZoomDados"><?php 
																		  $totalMost = Build_value_pie::select_sum_most_probable_ec_value_pie_table(); 
																		  $l = ((float)$totalMost['total']/(float)$items_in_asset)*100;
																		  $l = round($l,5);
																		   
																		   
																		   
																		 $e = ((float)$l*(float)$most_probable_general)/(float)$totalMost['total']; 
																		  echo round($e,5);
																		  ?>%</div></span>
																		 
	
																		 <br>
																		   <?php 
																		  
																				$ce =log10(round($e,5)/100);
																				echo round($ce,1);
																			?>
																			
																			<input type="hidden" id="ce_most" name="ce_most" value="<?php echo round($ce,1); ?>">
																	</center>
																</div>  
																  
																  </td>
															  
															  <td> 
															  
																<div id="bx_AllAffected_Assuming_High">
																	<center>
																		  <span class="badge bg-info"><div id="modalZoomDados"><?php 
																		  $totalHigh = Build_value_pie::select_sum_high_estimate_ec_value_pie_table(); 
																		  
																		  $h = ((float)$totalHigh['total']/(float)$items_in_asset)*100;
																		  echo round($h,5);
																		  ?>%</div></span>
																		  <br>
																		 <?php 
																		  
																				$cf =log10(round($h,5)/100);
																				echo round($cf,1);
																			?>
																			<input type="hidden" id="cf_high" name="cf_high" value="<?php echo round($cf,1); ?>">
																	</center>
																</div>
																<div id="bx_Exposed_Assuming_High" style="display:none">
																	<center>
																		  <span class="badge bg-info"><div id="modalZoomDados"><?php 
																		  $totalMost = Build_value_pie::select_sum_high_estimate_ec_value_pie_table(); 
																		  $l = ((float)$totalMost['total']/(float)$items_in_asset)*100;
																		  $l = round($l,5);
																		   
																		   
																		   
																		 $f = ((float)$l*(float)$high_estimate_general)/(float)$totalMost['total']; 
																		  echo round($f,5);
																		  ?>%</div></span>
																		  <br>
																		 <?php 
																		  
																				$cf =log10(round($f,5)/100);
																				echo round($cf,1);
																			?>
																			<input type="hidden" id="cf_high" name="cf_high" value="<?php echo round($cf,1); ?>">
																	</center>
																</div>
																</td>
															  
															</tr>
															
														</tbody>	
													  </table>
													<?php 
														}
													?>	





