<?php

require_once("header.php");

?>
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
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
            <h1>Zoom list</h1>

          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>-->
			
			
			<?php 
			/* echo "<pre>";
			print_r($_SESSION);
			echo "</pre>"; */
			
			if(isset($_GET['type'])){ ?>
			
				<a href="javascript:void(0)" onclick="location.href = 'analyze_options?id='+<?php echo $_GET['risk_id']; ?>+'&id_option='+<?php echo $_GET['option_id']; ?>+'&ca_high='+document.getElementById('ca_high_o').value+'&ca_media='+document.getElementById('ca_media_o').value+'&ca_low='+document.getElementById('ca_low_o').value+'&view=1';"><button type="button" class="btn btn-block btn-outline-success btn-xs" style="margin-top:2px;"> << Return</button></a>
				
			<?php }else{ ?>
			
				<a href="zoom_list_register?risk_id=<?php echo $_GET['risk_id']; ?>&option_id=<?php echo $_GET['option_id']; ?>"><button type="button" class="btn btn-block btn-success btn-xs">Register a new item >></button></a>
				
				<a href="javascript:void(0)" onclick="location.href = 'analyze_risks?id='+<?php echo $_GET['risk_id']; ?>+'&ca_high='+document.getElementById('ca_high').value+'&ca_media='+document.getElementById('ca_media').value+'&ca_low='+document.getElementById('ca_low').value+'&view=1';"><button type="button" class="btn btn-block btn-outline-success btn-xs" style="margin-top:2px;"> << Return</button></a>
				
			<?php } 
			
			
			$ia = Build_value_pie::select_ar_zoom_list_items_affected($_GET['risk_id']); 
			$iac = Build_value_pie::select_ar_zoom_list_items_affected_checked($_GET['risk_id']); 
			?>
			
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              
              <!-- /.card-header -->
            <div class="card-body">
			
			<br>
											
		<input type="radio" name="type_list" id="type_list_1" value="1"  onclick="
				zoom_list_update_type_list(1,<?php echo $_GET['risk_id']; ?>);
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
				
				
				" <?php if($iac['type_list'] == 1){ echo "checked"; $displayTop="none"; } ?>> <?php//  echo $iac['type_list']; ?> Items listed are all affected
				
				<br>
		<input type="radio" name="type_list" id="type_list_2" value="2" onclick="
		zoom_list_update_type_list(2,<?php echo $_GET['risk_id']; ?>);
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
				
				
				" <?php if($iac['type_list'] == 2){ echo "checked"; $displayTop="block"; } ?>> Items listed are exposed, but only this many affected:
				
													<br>
													<br>
			
				<script>
				
				<?php if($iac['type_list'] == 1){ ?> 
					
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
					
				<?php } ?>
				
				
				<?php if($iac['type_list'] == 2){ ?> 
						
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
						
				<?php } ?>
				
				
				</script>
			
              <table id="example1" class="table table-bordered table-striped">
              <?php  
														$ia = Build_value_pie::select_ar_zoom_list_items_affected($_GET['risk_id']); 
														//if($ia['num'] > 0){
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
													 <table id="example1" class="table table-bordered table-striped">
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
															  <th><input type="text" class="form-control" id="low_estimate_top" name="low_estimate_top" 
															  value="<?php echo $low_estimate_general; ?>" onblur="if(this.value != ''){ zoom_list_update_top() }" required style="display:<?php echo $displayTop; ?>" <?php if(isset($_GET['type'])){ echo "readonly"; } ?> onkeypress="return keypressed( this , event );">
															  
															  </th>                
															  <th><input type="text" class="form-control" id="most_probable_top" name="most_probable_top" value="<?php echo $most_probable_top; ?>" onblur="if(this.value != ''){ zoom_list_update_top() }" required style="display:<?php echo $displayTop; ?>" <?php if(isset($_GET['type'])){ echo "readonly"; } ?> onkeypress="return keypressed( this , event );"></th>                
															  <th><input type="text" class="form-control" id="high_estimate_top" name="high_estimate_top" onblur="if(this.value != ''){  zoom_list_update_top() }" value="<?php echo $high_estimate_top; ?>" required style="display:<?php echo $displayTop; ?>" <?php if(isset($_GET['type'])){ echo "readonly"; } ?> onkeypress="return keypressed( this , event );"></th>    
															
															</tr>
														</thead>
														
														
														<tbody>	
														
														<?php 
														
														
															
															
																$formulaE = 0;
																$formulaF = 0;
																$formulaG = 0;
																foreach($ia['dados'] as $ia){
																	
																$vp = Build_value_pie::select_ec_value_pie_table_id($ia['id_ec_value_pie_table']);	
																
																//if($vp['num'] > 0){
																
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
															///echo "----->".$ia['id_ec_value_pie_table'];		
														?>
															<tr id="row<?php  echo $ia['id']; ?>">
															  <td><?php  echo $ia['identification']; ?></td>
															  
															  <td><?php  echo $ia['number_subgroups']; ?></td>
															 
					<td><input type="text" class="form-control" id="low_estimate_<?php  echo $ia['id']; ?>" name="low_estimate_<?php  echo $ia['id']; ?>" value="<?php  echo $ia['low_estimate']; ?>" 
					 required onblur="
					 
					 if(this.value != ''){ 
						
						zoom_list_update(<?php  echo $ia['id']; ?>,this.value,document.getElementById('most_probable_<?php  echo $ia['id']; ?>').value,document.getElementById('high_estimate_<?php  echo $ia['id']; ?>').value) 
						
					}
					
					" <?php if(isset($_GET['type'])){ echo "readonly"; } ?> onkeypress="return keypressed( this , event );"></td>
											  
					<td><input type="text" class="form-control" id="most_probable_<?php  echo $ia['id']; ?>" name="most_probable_<?php  echo $ia['id']; ?>" value="<?php  echo $ia['most_probable']; ?>" 
					onblur="if(this.value != ''){ zoom_list_update(<?php  echo $ia['id']; ?>,document.getElementById('low_estimate_<?php  echo $ia['id']; ?>').value,this.value,document.getElementById('high_estimate_<?php  echo $ia['id']; ?>').value) }" required  <?php if(isset($_GET['type'])){ echo "readonly"; } ?> onkeypress="return keypressed( this , event );"></td>
															  
															  <td><input type="text" class="form-control" id="high_estimate_<?php  echo $ia['id']; ?>" name="high_estimate_<?php  echo $ia['id']; ?>" value="<?php  echo $ia['high_estimate']; ?>" required onblur="if(this.value != ''){  zoom_list_update(<?php  echo $ia['id']; ?>,document.getElementById('low_estimate_<?php  echo $ia['id']; ?>').value,document.getElementById('most_probable_<?php  echo $ia['id']; ?>').value,this.value) } " <?php if(isset($_GET['type'])){ echo "readonly"; } ?> onkeypress="return keypressed( this , event );"></td>
															  
															  <td>
															  <?php if(!isset($_GET['type'])){ ?>
																<a href="javascript:void(0)" onclick="if(confirm('Do you really want to delete?')){ zoom_list_delete(<?php echo $ia['id'];?>)}">
																
																<button type="button" class="btn btn-block btn-danger btn-sm" style="margin-top:2px;">
<i class="fas fa-trash-alt"></i></button></a>
															  <?php }?>
																</td>
															</tr>
															
															<?php 
																//}
																}
																
															?>
															
															
															
															<tr id="row">
															<td colspan="5"></td>
															</tr>
															<tr id="row">
															  <td colspan="2" style="text-align:right"><small>Using value pie:</small></td>
															  
															 <!-- LOW ESTIMATE -->
															  <td>
															  <!-- 
															  ###########################################
															  as divs serão exibidas de acordo com o item selecionado no radio button
															  ###########################################
															  -->
																
																
															   <div id="bxAllAffectedUsingLow">
																  <center>
																	  <span class="badge bg-info"><div id="uvp_le_percent"><?php echo $formulaE; ?>%</div></span>
																	  <br>
																	  <div id="uvp_le_c">C: <?php 
																	  
																			$ca = 5 + log10($formulaE/100);
																			echo round($ca,1);
																			$caForDB1 = round($ca,1);
																		?>
																		</div>
																  </center>
																  <input type="hidden" id="ca_low" name="ca_low" value="<?php echo round($ca,1); ?>">
																</div>  
																
																 <div id="bxExposedUsingLow" style="display:none">
																  <center>
																	  <span class="badge bg-info"><div id="ex_uvp_le_percent"><?php  
																	  $totalLow = Build_value_pie::select_sum_low_estimate_ec_value_pie_table($_GET['risk_id']); 
																	
																	 $a = ((float)$formulaE*(float)$low_estimate_general)/(float)$totalLow['total']; 
																	  echo round($a,5);
																	  ?>%</div></span>
																	  <br>
																		<div id="ex_uvp_le_c">C: <?php 
																	  
																			$ca = 5 + log10(round($a,5)/100);
																			echo round($ca,1);
																			$caForDB2 = round($ca,1);
																		?>
																		</div>
																		<input type="hidden" id="ca_low" name="ca_low" value="<?php echo round($ca,1); ?>">
																  </center>
																</div>  
																
																
															  </td>
															  <!-- MOST PROBABLE -->
															  <td> 
															  
															  <div id="bxAllAffectedUsingMost">
																  <center>
																		  <span class="badge bg-info"><div id="uvp_mp_percent"><?php echo $formulaF; ?>%</div></span>
																		  <br>
																		    <div id="uvp_mp_c">
																				<?php 
																			  
																					$cb = 5 + log10($formulaF/100);
																					echo round($cb,1);
																					$cbForDB1 = round($cb,1);
																				?>
																			</div>
																  </center>
																  <input type="hidden" id="ca_media" name="ca_media" value="<?php echo round($cb,1); ?>">
																</div>  
																
															  <div id="bxExposedUsingMost" style="display:none">
																  <center>
																		  <span class="badge bg-info">
																		  <div id="ex_uvp_mp_percent"><?php 
																		  
																			$totalMost = Build_value_pie::select_sum_most_probable_ec_value_pie_table($_GET['risk_id']); 
																	
																			$b = ((float)$formulaF*(float)$most_probable_general)/(float)$totalMost['total']; 
																			  echo round($b,5);

																	  ?>%</div></span>
																		  <br>
																		   <div id="ex_uvp_mp_c">
																		   <?php 
																		  
																				$cb = 5 + log10(round($b,5)/100);
																				echo round($cb,1);
																				$cbForDB2 = round($cb,1);
																			?>
																			</div>
																			 <input type="hidden" id="ca_media" name="ca_media" value="<?php echo round($cb,1); ?>">
																  </center>
																</div>  
																
															 </td>
															 
															 
															  <!-- HIGH ESTIMATE -->
															  <td> 
															  
															  <div id="bxAllAffectedUsingHigh">
																<center>
																	  <span class="badge bg-info"><div id="uvp_he_percent"><?php echo $formulaG; ?>%</div></span>
																	  <br>
																		 <div id="uvp_he_c">
																			<?php 
																		  
																				$cc =5 + log10($formulaG/100);
																				echo round($cc,1);
																				$ccForDB1 = round($cc,1);
																			?>
																			
																		</div>
																  </center>
																   <input type="hidden" id="ca_high" name="ca_high" value="<?php echo round($cc,1); ?>">
															  </div>
															   <div id="bxExposedUsingHigh" style="display:none">
																  <center>
																		  <span class="badge bg-info"><div id="ex_uvp_he_percent"><?php  
																			$totalHigh = Build_value_pie::select_sum_high_estimate_ec_value_pie_table($_GET['risk_id']); 
																	
																			$c = ((float)$formulaG*(float)$high_estimate_general)/(float)$totalHigh['total']; 
																			  echo round($c,5); ?>%</div></span>
																		  <br>
																		    <div id="ex_uvp_he_c"><?php 
																		  
																				$cc = 5 + log10(round($c,5)/100);
																				echo round($cc,1);
																				$ccForDB2 = round($cc,1);
																			?>
																			</div>
																			<input type="hidden" id="ca_high" name="ca_high" value="<?php echo round($cc,1); ?>">
																  </center>
																</div> 
																
																<?php 
													/* echo $caForDB1."<br>";
													echo $cbForDB1."<br>";
													echo $ccForDB1."<br>"; */
													$C_unc_range = $ccForDB1-$caForDB1;
													//echo $C_unc_range;
													
													
														//}
													?>	
																
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
																	  <span class="badge bg-info"><div id="aev_le_percent">
																	  <?php 
																	  $totalLow = Build_value_pie::select_sum_low_estimate_ec_value_pie_table($_GET['risk_id']); 
																	  
																	  $l = ((float)$totalLow['total']/(float)$items_in_asset)*100;
																	  echo round($l,5);
																	  ?>
																	  %</div></span>
																	  <br>
																	    <div id="aev_le_c">C:  <?php 
																	  
																			$cd =5 + log10(round($l,5)/100);
																			echo round($cd,1);
																		?>
																		</div>
																		  <input type="hidden" id="cd_low" name="cd_low" value="<?php echo round($cd,1); ?>">
																  </center>
																</div> 
																<div id="bx_Exposed_Assuming_Low" style="display:none">
																  <center>
																	  <span class="badge bg-info"><div id="ex_aev_le_percent">
																	  <?php  
																	  $totalLow = Build_value_pie::select_sum_low_estimate_ec_value_pie_table($_GET['risk_id']); 
																	  $l = ((float)$totalLow['total']/(float)$items_in_asset)*100;
																	  $l = round($l,5);
																	   
																	   
																	   
																	 $d = ((float)$l*(float)$low_estimate_general)/(float)$totalLow['total']; 
																	  echo round($d,5);
																	  ?>
																	  %</div></span>
																	  <br>
																		  <div id="ex_aev_le_c"> C:  <?php 
																		  
																				$cd =5 + log10(round($d,5)/100);
																				echo round($cd,1);
																			?>
																		</div>
																		 <input type="hidden" id="cd_low" name="cd_low" value="<?php echo round($cd,1); ?>">
																  </center>
																</div> 
															
																
															  </td>
															  
															  <td> 
															  
																<div id="bx_AllAffected_Assuming_Most">
																	<center> 
																		  <span class="badge bg-info"><div id="aev_mp_percent"><?php 
																		  $totalMost = Build_value_pie::select_sum_most_probable_ec_value_pie_table($_GET['risk_id']); 
																		  
																		  $m = ((float)$totalMost['total']/(float)$items_in_asset)*100;
																		  echo round($m,5);
																		  ?>%</div></span>
																		  <br>
																		  <div id="aev_mp_c"> <?php 
																		  
																				$ce =5 + log10(round($m,5)/100);
																				echo round($ce,1);
																			?>
																			</div>
																			<input type="hidden" id="ce_most" name="ce_most" value="<?php echo round($ce,1); ?>">
																	</center>
																</div>
																<div id="bx_Exposed_Assuming_Most" style="display:none">
																	<center>
																		  
																		  
																		  <span class="badge bg-info"><div id="ex_aev_mp_percent"><?php 
																			$totalMost = Build_value_pie::select_sum_most_probable_ec_value_pie_table($_GET['risk_id']); 
																			$l = ((float)$totalMost['total']/(float)$items_in_asset)*100;
																			$l = round($l,5);
																			$e = ((float)$l*(float)$most_probable_general)/(float)$totalMost['total']; 
																			
																		  echo round($e,5);
																		  ?>%</div></span>
																		 
	
																		 <br>
																		  <div id="ex_aev_mp_c">  <?php 
																		  
																				$ce =5 + log10(round($e,5)/100);
																				echo round($ce,1);
																			?>
																			</div>
																			<input type="hidden" id="ce_most" name="ce_most" value="<?php echo round($ce,1); ?>">
																	</center>
																</div>  
																  
																  </td>
															  
															  <td> 
															  
																<div id="bx_AllAffected_Assuming_High">
																	<center>
																		  <span class="badge bg-info"><div id="aev_he_percent"><?php 
																		  $totalHigh = Build_value_pie::select_sum_high_estimate_ec_value_pie_table($_GET['risk_id']); 
																		  
																		  $h = ((float)$totalHigh['total']/(float)$items_in_asset)*100;
																		  echo round($h,5);
																		  ?>%</div></span>
																		  <br>
																		 <div id="aev_he_c"><?php 
																		  
																				$cf =5 + log10(round($h,5)/100);
																				echo round($cf,1);
																			?>
																			</div>
																			<input type="hidden" id="cf_high" name="cf_high" value="<?php echo round($cf,1); ?>">
																	</center>
																</div>
																<div id="bx_Exposed_Assuming_High" style="display:none">
																	<center>
																		  <span class="badge bg-info"><div id="ex_aev_he_percent"><?php 
																		 
																		  $totalMost = Build_value_pie::select_sum_high_estimate_ec_value_pie_table($_GET['risk_id']); 
																		  $l = ((float)$totalMost['total']/(float)$items_in_asset)*100;
																		  $l = round($l,5);$f = ((float)$l*(float)$high_estimate_general)/(float)$totalMost['total']; 
																		  echo round($f,5);
																		  
																		  ?>%</div></span>
																		  <br>
																		<div id="ex_aev_he_c"> <?php 
																		  
																				$cf = 5 + log10(round($f,5)/100);
																				echo round($cf,1);
																			?>
																		</div>
																			<input type="hidden" id="cf_high" name="cf_high" value="<?php echo round($cf,1); ?>">
																	</center>
																</div>
																</td>
																
															  
															</tr>
															
														</tbody>	
													  </table>
													
            </div>
              <!-- ./card-body -->
           
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
					<!-- ANÁLISE DE OPÇÕES -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
		<!-- ########################################################################################### -->
       <?php if(isset($_GET['type'])){ ?>
		<br>
		<br>
	   
	    <div class="col-sm-10">
            <h3>Options to reduce the risk</h3>

          </div>
	   
	  
        <div class="row" >
          <div class="col-md-12">
            <div class="card">
              
              <!-- /.card-header -->
            <div class="card-body">
			 <a href="zoom_list_register_o?risk_id=<?php echo $_GET['risk_id']; ?>&option_id=<?php echo $_GET['option_id']; ?>"><button type="button" class="btn btn-block btn-success btn-xs" style="width:15%;float:right;">Register a new item >></button></a>
			<br>
		<input type="hidden" id="id_option" name="id_option">									
		<input type="radio" name="type_list_o" id="type_list_1_o" value="1"  onclick="
				document.getElementById('low_estimate_top_o').style.display='none';
				document.getElementById('most_probable_top_o').style.display='none';
				document.getElementById('high_estimate_top_o').style.display='none';				
				
				document.getElementById('bx_Exposed_Assuming_High_o').style.display='none';			
				document.getElementById('bx_Exposed_Assuming_Low_o').style.display='none';			
				document.getElementById('bx_Exposed_Assuming_Most_o').style.display='none';			
				document.getElementById('bxExposedUsingLow_o').style.display='none';			
				document.getElementById('bxExposedUsingMost_o').style.display='none';			
				document.getElementById('bxExposedUsingHigh_o').style.display='none';			
				
				document.getElementById('bxAllAffectedUsingLow_o').style.display='block';			
				document.getElementById('bxAllAffectedUsingMost_o').style.display='block';			
				document.getElementById('bxAllAffectedUsingHigh_o').style.display='block';			
				document.getElementById('bx_AllAffected_Assuming_Low_o').style.display='block';			
				document.getElementById('bx_AllAffected_Assuming_Most_o').style.display='block';			
				document.getElementById('bx_AllAffected_Assuming_High_o').style.display='block';		
				
				document.getElementById('C_type_list').value=1;			
				
				
				" checked> Items listed are all affected
				
				<br>
		<input type="radio" name="type_list_o" id="type_list_2_o" value="2" onclick="
				document.getElementById('low_estimate_top_o').style.display='block';
				document.getElementById('most_probable_top_o').style.display='block';
				document.getElementById('high_estimate_top_o').style.display='block';
				
				document.getElementById('bx_Exposed_Assuming_High_o').style.display='block';			
				document.getElementById('bx_Exposed_Assuming_Low_o').style.display='block';			
				document.getElementById('bx_Exposed_Assuming_Most_o').style.display='block';			
				document.getElementById('bxExposedUsingLow_o').style.display='block';			
				document.getElementById('bxExposedUsingMost_o').style.display='block';			
				document.getElementById('bxExposedUsingHigh_o').style.display='block';			
				
				document.getElementById('bxAllAffectedUsingLow_o').style.display='none';			
				document.getElementById('bxAllAffectedUsingMost_o').style.display='none';			
				document.getElementById('bxAllAffectedUsingHigh_o').style.display='none';			
				document.getElementById('bx_AllAffected_Assuming_Low_o').style.display='none';			
				document.getElementById('bx_AllAffected_Assuming_Most_o').style.display='none';			
				document.getElementById('bx_AllAffected_Assuming_High_o').style.display='none';	
				
				document.getElementById('C_type_list').value=2;	
				
				"> Items listed are exposed, but only this many affected:
				
													<br>
													<br>
			
			
			
              <table id="example1" class="table table-bordered table-striped">
              <?php  
														$ia = Build_value_pie::select_ar_zoom_list_items_affected_o($_GET['risk_id'],$_GET['option_id']); 
														//if($ia['num'] > 0){
														if(isset($ia['dados'][0]['low_estimate_general'])){
															$low_estimate_general_o=$ia['dados'][0]['low_estimate_general'];
														}else{
															$low_estimate_general_o='0.0';
														}	
														
														if(isset($ia['dados'][0]['most_probable_general'])){
															$most_probable_top_o=$ia['dados'][0]['most_probable_general'];
														}else{
															$most_probable_top_o='0.0';
														}	
														
														if(isset($ia['dados'][0]['high_estimate_general'])){
															$high_estimate_top_o=$ia['dados'][0]['high_estimate_general'];
														}else{
															$high_estimate_top_o='0.0';
														}	
														
														?>
													 <table id="example1" class="table table-bordered table-striped">
														<thead>	
															<tr>
															  <th style="width:40%"><?php//echo $ia['num']; ?></th>
															  <th><small>Number of items in subgroup</small></th>
															  <th><small>Low estimate</small> </th>                
															  <th><small>Most Probable</small></th>                
															  <th><small>High estimate</small></th>    
															  
															</tr>
															<tr>
															  <th></th>
															  <th></th>                
															  <th><input type="text" class="form-control" id="low_estimate_top_o" name="low_estimate_top_o" value="<?php echo $low_estimate_general_o; ?> " onkeyup="if(this.value != ''){ zoom_list_update_top_o() }" onkeypress="return keypressed( this , event );" required style="display:none" >
															  
															  </th>                
															  <th><input type="text" class="form-control" id="most_probable_top_o" name="most_probable_top_o" value="<?php echo $most_probable_top_o; ?>" onkeyup=" if(this.value != ''){ zoom_list_update_top_o() }" onkeypress="return keypressed( this , event );" required style="display:none" ></th>                
															  <th><input type="text" class="form-control" id="high_estimate_top_o" name="high_estimate_top_o" onkeyup="if(this.value != ''){ zoom_list_update_top_o() }" value="<?php echo $high_estimate_top_o; ?>" onkeypress="return keypressed( this , event );" required style="display:none" ></th>    
															
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
																	$items_value_as_percent_of_asset_o = 1;
																}else{
																	$items_value_as_percent_of_asset_o = $vp['items_value_as_percent_of_asset'];		
																}		
																
																$formulaE = $formulaE+((float)($ia['low_estimate'])*(float)($items_value_as_percent_of_asset_o));
																
																$formulaF = $formulaF+((float)($ia['most_probable'])*(float)($items_value_as_percent_of_asset_o));
																
																$formulaG = $formulaG+((float)($ia['high_estimate'])*(float)($items_value_as_percent_of_asset_o));
																
																$items_in_asset_o = $vp['items_in_asset'];
																$low_estimate_general_o = $ia['low_estimate_general'];
																$most_probable_general_o = $ia['most_probable_general'];
																$high_estimate_general_o = $ia['high_estimate_general'];
																	
														?>
															<tr id="row_o_<?php  echo $ia['id']; ?>">
															  <td><?php  echo $ia['identification']; ?></td>
															  
															  <td><?php  echo $ia['number_subgroups']; ?></td>
															 
					<td>
					<input 
					type="text" 
					class="form-control" 
					id="low_estimate_<?php  echo $ia['id']; ?>_o" 
					name="low_estimate_<?php  echo $ia['id']; ?>_o" 
					
					value="<?php  echo $ia['low_estimate']; ?>" 
					onkeyup=" 
					if(this.value != ''){ 
					
						zoom_list_update_o(<?php  echo $ia['id']; ?>,
						this.value,
						document.getElementById('most_probable_<?php  echo $ia['id']; ?>_o').value,
						document.getElementById('high_estimate_<?php  echo $ia['id']; ?>_o').value) 
					
					}" 
					onkeypress="return keypressed( this , event );" 
					required  ></td>
											  
					<td><input type="text" class="form-control" id="most_probable_<?php  echo $ia['id']; ?>_o" name="most_probable_<?php  echo $ia['id']; ?>_o" value="<?php  echo $ia['most_probable']; ?>" onkeyup=" if(this.value != ''){ zoom_list_update_o(<?php  echo $ia['id']; ?>,document.getElementById('low_estimate_<?php  echo $ia['id']; ?>_o').value,this.value,document.getElementById('high_estimate_<?php  echo $ia['id']; ?>_o').value) }" required onkeypress="return keypressed( this , event );"  ></td>
															  
															  <td><input type="text" class="form-control" id="high_estimate_<?php  echo $ia['id']; ?>_o" name="high_estimate_<?php  echo $ia['id']; ?>_o" value="<?php  echo $ia['high_estimate']; ?>" required onkeyup=" if(this.value != ''){ zoom_list_update_o(<?php  echo $ia['id']; ?>,document.getElementById('low_estimate_<?php  echo $ia['id']; ?>_o').value,document.getElementById('most_probable_<?php  echo $ia['id']; ?>_o').value,this.value) }" onkeypress="return keypressed( this , event );" ></td>
															  
															  <td>
															 
																<a href="javascript:void(0)" onclick="if(confirm('Do you really want to delete?')){ zoom_list_delete_o(<?php echo $ia['id'];?>)}">
																
																<button type="button" class="btn btn-block btn-danger btn-sm" style="margin-top:2px;">
<i class="fas fa-trash-alt"></i></button></a>
															 
																</td>
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
																  <input type="hidden" id="ca_low_o" name="ca_low_o" value="<?php echo round($ca,1); ?>">
																</div>  
																
																 <div id="bxExposedUsingLow_o" style="display:none">
																  <center>
																	  <span class="badge bg-info"><div id=""><?php  
																	  $totalLow = Build_value_pie::select_sum_low_estimate_ec_value_pie_table($_GET['risk_id']); 
																	
																	 $a = ((float)$formulaE*(float)$low_estimate_general_o)/(float)$totalLow['total']; 
																	  echo round($a,5);
																	  ?>%</div></span>
																	  <br>
																	  C: <?php 
																	  
																			$ca = log10(round($a,5)/100);
																			echo round($ca,1);
																		?>
																		<input type="hidden" id="ca_low_o" name="ca_low_o" value="<?php echo round($ca,1); ?>">
																  </center>
																</div>  
																
																
															  </td>
															  
															  <td> 
															  
															  <div id="bxAllAffectedUsingMost_o">
																  <center>
																		  <span class="badge bg-info"><div id="modalZoomDados"><?php echo $formulaF; ?>%</div></span>
																		  <br>
																		   <?php 
																		  
																				$cb = log10($formulaF/100);
																				echo round($cb,1);
																			?>
																  </center>
																  <input type="hidden" id="ca_media_o" name="ca_media_o" value="<?php echo round($cb,1); ?>">
																</div>  
																
															  <div id="bxExposedUsingMost_o" style="display:none">
																  <center>
																		  <span class="badge bg-info">
																		  <div id="modalZoomDados"><?php 
																		  
																			$totalMost = Build_value_pie::select_sum_most_probable_ec_value_pie_table($_GET['risk_id']); 
																	
																			$b = ((float)$formulaF*(float)$most_probable_general_o)/(float)$totalMost['total']; 
																			  echo round($b,5);

																	  ?>%</div></span>
																		  <br>
																		   <?php 
																		  
																				$cb = log10(round($b,5)/100);
																				echo round($cb,1);
																			?>
																			 <input type="hidden" id="ca_media_o" name="ca_media_o" value="<?php echo round($cb,1); ?>">
																  </center>
																</div>  
																
															 </td>
															  
															  <td> 
															  
															  <div id="bxAllAffectedUsingHigh_o">
																<center>
																	  <span class="badge bg-info"><div id="modalZoomDados"><?php echo $formulaG; ?>%</div></span>
																	  <br>
																	 <?php 
																	  
																			$cc =log10($formulaG/100);
																			echo round($cc,1);
																		?>
																  </center>
																   <input type="hidden" id="ca_high_o" name="ca_high_o" value="<?php echo round($cc,1); ?>">
															  </div>
															   <div id="bxExposedUsingHigh_o" style="display:none">
																  <center>
																		  <span class="badge bg-info"><div id="modalZoomDados"><?php  
																			$totalHigh = Build_value_pie::select_sum_high_estimate_ec_value_pie_table($_GET['risk_id']); 
																	
																			$c = ((float)$formulaG*(float)$high_estimate_general_o)/(float)$totalHigh['total']; 
																			  echo round($c,5); ?>%</div></span>
																		  <br>
																		   <?php 
																		  
																				$cc = log10(round($c,5)/100);
																				echo round($cc,1);
																			?>
																			<input type="hidden" id="ca_high_o" name="ca_high_o" value="<?php echo round($cc,1); ?>">
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
															  
															  <div id="bx_AllAffected_Assuming_Low_o">
																  <center>
																	  <span class="badge bg-info"><div id="modalZoomDados">
																	  <?php 
																	  $totalLow = Build_value_pie::select_sum_low_estimate_ec_value_pie_table($_GET['risk_id']); 
																	  
																	  $l = ((float)$totalLow['total']/(float)$items_in_asset_o)*100;
																	  echo round($l,5);
																	  ?>
																	  %</div></span>
																	  <br>
																	  C:  <?php 
																	  
																			$cd =log10(round($l,5)/100);
																			echo round($cd,1);
																		?>
																		  <input type="hidden" id="cd_low_o" name="cd_low_o" value="<?php echo round($cd,1); ?>">
																  </center>
																</div> 
																<div id="bx_Exposed_Assuming_Low_o" style="display:none">
																  <center>
																	  <span class="badge bg-info"><div id="modalZoomDados">
																	  <?php  
																	  $totalLow = Build_value_pie::select_sum_low_estimate_ec_value_pie_table($_GET['risk_id']); 
																	  $l = ((float)$totalLow['total']/(float)$items_in_asset_o)*100;
																	  $l = round($l,5);
																	   
																	   
																	   
																	 $d = ((float)$l*(float)$low_estimate_general_o)/(float)$totalLow['total']; 
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
															  
																<div id="bx_AllAffected_Assuming_Most_o">
																	<center>
																		  <span class="badge bg-info"><div id="modalZoomDados"><?php 
																		  $totalMost = Build_value_pie::select_sum_most_probable_ec_value_pie_table($_GET['risk_id']); 
																		  
																		  $m = ((float)$totalMost['total']/(float)$items_in_asset_o)*100;
																		  echo round($m,5);
																		  ?>%</div></span>
																		  <br>
																		   <?php 
																		  
																				$ce =log10(round($m,5)/100);
																				echo round($ce,1);
																			?>
																			<input type="hidden" id="ce_most_o" name="ce_most_o" value="<?php echo round($ce,1); ?>">
																	</center>
																</div>
																<div id="bx_Exposed_Assuming_Most_o" style="display:none">
																	<center>
																		  
																		  
																		  <span class="badge bg-info"><div id="modalZoomDados"><?php 
																		  $totalMost = Build_value_pie::select_sum_most_probable_ec_value_pie_table($_GET['risk_id']); 
																		  $l = ((float)$totalMost['total']/(float)$items_in_asset_o)*100;
																		  $l = round($l,5);
																		   
																		   
																		   
																		 $e = ((float)$l*(float)$most_probable_general_o)/(float)$totalMost['total']; 
																		  echo round($e,5);
																		  ?>%</div></span>
																		 
	
																		 <br>
																		   <?php 
																		  
																				$ce =log10(round($e,5)/100);
																				echo round($ce,1);
																			?>
																			
																			<input type="hidden" id="ce_most_o" name="ce_most_o" value="<?php echo round($ce,1); ?>">
																	</center>
																</div>  
																  
																  </td>
															  
															  <td> 
															  
																<div id="bx_AllAffected_Assuming_High_o">
																	<center>
																		  <span class="badge bg-info"><div id="modalZoomDados"><?php 
																		  $totalHigh = Build_value_pie::select_sum_high_estimate_ec_value_pie_table($_GET['risk_id']); 
																		  
																		  $h = ((float)$totalHigh['total']/(float)$items_in_asset_o)*100;
																		  echo round($h,5);
																		  ?>%</div></span>
																		  <br>
																		 <?php 
																		  
																				$cf =log10(round($h,5)/100);
																				echo round($cf,1);
																			?>
																			<input type="hidden" id="cf_high_o" name="cf_high_o" value="<?php echo round($cf,1); ?>">
																	</center>
																</div>
																<div id="bx_Exposed_Assuming_High_o" style="display:none">
																	<center>
																		  <span class="badge bg-info"><div id="modalZoomDados"><?php 
																		  $totalMost = Build_value_pie::select_sum_high_estimate_ec_value_pie_table($_GET['risk_id']); 
																		  $l = ((float)$totalMost['total']/(float)$items_in_asset_o)*100;
																		  $l = round($l,5);
																		   
																		   
																		   
																		 $f = ((float)$l*(float)$high_estimate_general_o)/(float)$totalMost['total']; 
																		  echo round($f,5);
																		  ?>%</div></span>
																		  <br>
																		 <?php 
																		  
																				$cf =log10(round($f,5)/100);
																				echo round($cf,1);
																			?>
																			<input type="hidden" id="cf_high_o" name="cf_high_o" value="<?php echo round($cf,1); ?>">
																	</center>
																</div>
																</td>
																
															  
															</tr>
															
														</tbody>	
													  </table>
													<?php 
													
													
													
														//}
													?>	
            </div>
              <!-- ./card-body -->
           
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

       <?php } ?>
	   
	   
	   
	   
	   
	   
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
  
  <script>
  
  
				function atualia_calculos_zoom_list(risk_id) {			
					/* alert(document.getElementById("type_list_1").checked);
					alert(document.getElementById("type_list_2").checked); */
					// alert('ok')
					  $.ajax({
						type: "POST",
						url: "ajax_process/atualia_calculos_zoom_list.php?type_list_1="+document.getElementById("type_list_1").checked+"&type_list_2="+document.getElementById("type_list_2").checked,
						data: {
							risk_id: risk_id
						},
						dataType: 'json',
						success: function(data) {
							/* alert('asd');*/
							//alert(document.getElementById("type_list_2").checked); 
						if(document.getElementById("type_list_1").checked == true){
							
							//seta as divs
							$("#uvp_le_percent").html(data['uvp_le_percent']);
							$("#uvp_le_c").html(data['uvp_le_c']);								
							$("#uvp_mp_percent").html(data['uvp_mp_percent']);
							$("#uvp_mp_c").html(data['uvp_mp_c']);							//
							$("#uvp_he_percent").html(data['uvp_he_percent']);
							$("#uvp_he_c").html(data['uvp_he_c']);
								
							$("#aev_le_percent").html(data['aev_le_percent']);
							$("#aev_le_c").html(data['aev_le_c']);
							$("#aev_mp_percent").html(data['aev_mp_percent']);
							$("#aev_mp_c").html(data['aev_mp_c']);
							$("#aev_he_percent").html(data['aev_he_percent']);
							$("#aev_he_c").html(data['aev_he_c']);
							
							//seta os campos
							$("#ca_low").val(data['uvp_le_c']);
							$("#ca_media").val(data['uvp_mp_c']);						
							$("#ca_high").val(data['uvp_he_c']);	
							
							$("#cd_low").val(data['aev_le_c']);						
							$("#ce_most").val(data['aev_mp_c']);						
							$("#cf_high").val(data['aev_he_c']);	
							
						}
						
						if(document.getElementById("type_list_2").checked == true){								
							
							//seta as divs
							$("#ex_uvp_le_percent").html(data['ex_uvp_le_percent']);
							$("#ex_uvp_le_c").html(data['ex_uvp_le_c']);
							$("#ex_aev_le_percent").html(data['ex_aev_le_percent']);
							$("#ex_aev_le_c").html(data['ex_aev_le_c']);	
							$("#ex_uvp_mp_percent").html(data['ex_uvp_mp_percent']);
							$("#ex_uvp_mp_c").html(data['ex_uvp_mp_c']);							
							$("#ex_aev_mp_percent").html(data['ex_aev_mp_percent']);
							$("#ex_aev_mp_c").html(data['ex_aev_mp_c']);													
							$("#ex_uvp_he_percent").html(data['ex_uvp_he_percent']);
							$("#ex_uvp_he_c").html(Math.log10(data['ex_uvp_he_c']));
							$("#ex_aev_he_percent").html(data['ex_aev_he_percent']);
							$("#ex_aev_he_c").html(Math.log10(data['ex_aev_he_c']));	
							
							
							//seta os campos
							$("#ca_low").val(data['ex_uvp_le_c']);
							$("#ca_media").val(data['ex_uvp_mp_c']);						
							$("#ca_high").val(Math.log10(data['ex_uvp_he_c']));	
							
							$("#cd_low").val(data['ex_aev_le_c']);						
							$("#ce_most").val(data['ex_aev_mp_c']);						
							$("#cf_high").val(Math.log10(data['ex_aev_he_c']));	
							
							
						}

							
						},
						error: function(data) {
							//alert('erro');
						}
					  });
					}
  
  
											
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
  <script>


															function zoom_list_update_top() {			
															 
															  $.ajax({
																type: "POST",
																url: "ajax_process/zoom_list_update_top.php?low_estimate_top="+document.getElementById('low_estimate_top').value+"&most_probable_top="+document.getElementById('most_probable_top').value+"&high_estimate_top="+document.getElementById('high_estimate_top').value,
																
																dataType: 'json',
																success: function(data) {
																	alert('oi');
																	atualia_calculos_zoom_list(<?php echo $_GET['risk_id'] ?>)
																	//alert('ok');																  
																	
																}
															  });
															}
														
														
														
															function zoom_list_update_top_o() {			
															 
															  $.ajax({
																type: "POST",
																url: "ajax_process/zoom_list_update_top_o.php?low_estimate_top_o="+document.getElementById('low_estimate_top_o').value+"&most_probable_top_o="+document.getElementById('most_probable_top_o').value+"&high_estimate_top_o="+document.getElementById('high_estimate_top_o').value,
																
																dataType: 'json',
																success: function(data) {
																	
																	//alert('ok');																  
																	
																}
															  });
															}
														
														
														
																											  
/* function refreshDataByZoom(){


		document.getElementById('magnitude_IA_Max').innerHTML = document.getElementById("ca_high").value;
		document.getElementById('magnitude_IA_Med').innerHTML = document.getElementById("ca_media").value;
		document.getElementById('magnitude_IA_Min').innerHTML = document.getElementById("ca_low").value;
		
		
		
		document.getElementById('leia').options[0]=new Option("Selected by zoom", document.getElementById("ca_low").value, true, true);
		document.getElementById('plia').options[0] = new Option("Selected by zoom", document.getElementById("ca_media").value, true, true);
		document.getElementById('heia').options[0] = new Option("Selected by zoom", document.getElementById("ca_high").value, true, true);
		
		
		
		var base = parseFloat(document.getElementById('ca_high').value) + parseFloat(document.getElementById('ca_media').value) + parseFloat(document.getElementById('ca_low').value);
		var media = base / 3;		
							
		document.getElementById('magnitude_IA_MEDIA').innerHTML = media.toFixed(1);
		
		
		document.getElementById('ia_Div_Max').innerHTML = document.getElementById("ca_high").value;
		document.getElementById('ia_Inp_Max').value = document.getElementById("ca_high").value;
		
		document.getElementById('ia_Div_Med').innerHTML = document.getElementById("ca_media").value;
		document.getElementById('ia_Inp_Med').value = document.getElementById("ca_media").value;
		
		document.getElementById('ia_Div_Min').innerHTML = document.getElementById("ca_low").value;
		document.getElementById('ia_Inp_Min').value = document.getElementById("ca_low").value;
		
		var range = (document.getElementById('ca_high').value)-(document.getElementById('ca_low').value);		
		document.getElementById('ia_Div_Range').innerHTML = range.toFixed(1);
		document.getElementById('ia_Inp_Range').value = range.toFixed(1);
	

	
	magnitudeRisk();

} */
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
																	atualia_calculos_zoom_list(<?php echo $_GET['risk_id'] ?>)
																	//alert('ok');
																  
																	
																}
															  });
															}
														
															function zoom_list_update_o(id,low_estimate,most_probable,high_estimate) {			
															 
															  $.ajax({
																type: "POST",
																url: "ajax_process/zoom_list_update_o.php",
																data: {
																	id: id,
																	low_estimate_o: low_estimate,
																	most_probable_o: most_probable,
																	high_estimate_o: high_estimate																},
																dataType: 'json',
																success: function(data) {
																	
																	//alert('ok');
																  
																	
																}
															  });
															}
														
														
														</script>
  <script>
 /*  
  function zoom_list_update_top() {			
															 
	  $.ajax({
		type: "POST",
		url: "ajax_process/zoom_list_update_top.php?low_estimate_top="+document.getElementById('low_estimate_top').value+"&most_probable_top="+document.getElementById('most_probable_top').value+"&high_estimate_top="+document.getElementById('high_estimate_top').value,
		
		dataType: 'json',
		success: function(data) {
			atualia_calculos_zoom_list(<?php echo $_GET['risk_id'] ?>)
			//alert('ok');																  
			
		}
	  });
	} 
	
	*/
	
		function zoom_list_update_type_list(type_list,id) {			
															 
			  $.ajax({
				type: "POST",
				url: "ajax_process/zoom_list_update_type_list.php",
				data: {
					id: id,
					type_list: type_list
				},
				dataType: 'json',
				success: function(data) {
					//atualia_calculos_zoom_list(<?php echo $_GET['risk_id'] ?>)
					//alert('ok');																  
					
				}
			  });
		} 
  
  
/*    function zoom_list_update_type_list(type_list,id) {			
	  //var i = '#row'+id;
	  $.ajax({
		type: "POST",
		url: "ajax_process/zoom_list_update_type_list.php",
		data: {
			id: id,
			type_list: type_list
		},
		dataType: 'json',
		success: function(data) {
			//atualia_calculos_zoom_list(<?php echo $_GET['risk_id'] ?>)
		  //$(i).css({"display":"none"});
		}
	  });
	}
	 */
  
  function institution_active(id,status) {			
	  var i = '#row'+id;
	  $.ajax({
		type: "POST",
		url: "ajax_process/institutuion_active.php",
		data: {
			id: id,
			status: status
		},
		success: function(data) {
		  //$(i).css({"display":"none"});
		  location.reload();
		}
	  });
	}
	

	function zoom_list_delete(id) {			
	  var i = '#row'+id;
	  $.ajax({
		type: "POST",
		url: "ajax_process/zoom_list_delete.php",
		data: {
			id: id
		},
		success: function(data) {
			atualia_calculos_zoom_list(<?php echo $_GET['risk_id'] ?>)
		  $(i).css({"display":"none"});
		}
	  });
	}
	
	function zoom_list_delete_o(id) {			
	  var i = '#row_o_'+id;
	  $.ajax({
		type: "POST",
		url: "ajax_process/zoom_list_delete_o.php",
		data: {
			id: id
		},
		success: function(data) {
		  $(i).css({"display":"none"});
		}
	  });
	}
  </script>
<?php

require_once("footer.php");

?>