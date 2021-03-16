<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");
include("../controllers/EC_Select_values.class.php");
include("../controllers/EC_Enter_values.class.php");

?>
<div class="card">
<div class="card-body">
	<h4><?php echo $_SESSION[$_SESSION['lang']]['Value and their scores']; ?></h4>
	<div style="padding: 5px;background-color:#f4fbcd">
		<small><strong><?php echo $_SESSION[$_SESSION['lang']]['Subgroup']; ?>:</strong> <?php 
					
					$g = Build_value_pie::select_ec_subgroups_value_id($_GET['subgroup_id']);
					echo $g['name'];
					?></small>
		</div>
		<br>
	<?php 
			$i 	= Select_values_scale::select_ec_values_scale_for_report();
			$in = Build_value_pie::select_ec_values_and_their_scores($_GET['subgroup_id']);			
		?>	
			
		<input type="hidden" name="totalScores" id="totalScores" value="<?php echo $in['num']; ?>">		
	<?php 
	if($in['num']>0){
	foreach($in['dados'] as $in){
		
	?>	
		<div class="row">
			<div class="col-sm-5 col-md-5">
				<center>
					<select class="form-control" id="ev_<?php echo $in['id']; ?>" name="ev_<?php echo $in['id']; ?>" onchange="calculate_scores(<?php echo $in['id']; ?>)">
						
							<?php 
									$ev = Enter_values::select_mixed_values_for_report($_SESSION['project_id']);			
									
									foreach($ev['dados'] as $ev){
										if($in['value_pie_type'] ==$ev['id']){
							?>
										<option value="<?php echo $ev['id']."|".$ev['weight']; ?>" selected><?php echo $ev['name_value']; ?></option>
							<?php
									}else{
							?>
										<option value="<?php echo $ev['id']."|".$ev['weight']; ?>"><?php echo $ev['name_value']; ?></option>
							<?php	
									}	 ?>	
						<?php } ?>
					</select>
					
					<br>
					<span id="score_<?php echo $in['id']; ?>"><?php echo $in['value_pie_value']; ?></span>
				</center>	
			</div>
			<div class="col-sm-1 col-md-1">
			<BR>
			<BR>
			
			
				<center>
					X
				</center>	
			</div>
			<div class="col-sm-5 col-md-5">
			
				<center>
					<select class="form-control" id="pb_<?php echo $in['id']; ?>" name="pb_<?php echo $in['id']; ?>"  onchange="calculate_scores(<?php echo $in['id']; ?>)" style="width:80% !important;">
						
						<option value="<?php echo $i['none']; ?>" <?php if($in['value_scale_value'] == $i['none']){ echo "selected"; } ?>><?php echo $_SESSION[$_SESSION['lang']]['none']; ?></option>
						<option value="<?php echo $i['very_small']; ?>" <?php if($in['value_scale_value'] == $i['very_small']){ echo "selected"; } ?>><?php echo $_SESSION[$_SESSION['lang']]['very_small']; ?></option>
						<option value="<?php echo $i['small']; ?>" <?php if($in['value_scale_value'] == $i['small']){ echo "selected"; } ?>><?php echo $_SESSION[$_SESSION['lang']]['small']; ?></option>
						<option value="<?php echo $i['medium']; ?>" <?php if($in['value_scale_value'] == $i['medium']){ echo "selected"; } ?>><?php echo $_SESSION[$_SESSION['lang']]['medium']; ?></option>
						<option value="<?php echo $i['large']; ?>"  <?php if($in['value_scale_value'] == $i['large']){ echo "selected"; } ?>><?php echo $_SESSION[$_SESSION['lang']]['large']; ?></option>
						<option value="<?php echo $i['very_large']; ?>" <?php if($in['value_scale_value'] == $i['very_large']){ echo "selected"; } ?>><?php echo $_SESSION[$_SESSION['lang']]['very_large']; ?></option>
						<option value="<?php echo $i['excepitional']; ?>" <?php if($in['value_scale_value'] == $i['excepitional']){ echo "selected"; } ?>><?php echo $_SESSION[$_SESSION['lang']]['exceptional']; ?></option>
					</select>
					<br>
					<span id="prob_<?php echo $in['id']; ?>"><?php echo $in['value_scale_value']; ?></span>&nbsp;&nbsp;&nbsp;  <div style="padding:7px; background-color:#ccc"><?php echo $_SESSION[$_SESSION['lang']]['total']; ?>: <strong><span id="total_<?php echo $in['id']; ?>"><?php echo $in['result']; ?></span></strong></div>
				</center> 
			</div>
			<a href="javascript:void(0)" onclick="if(confirm('Do you really want to delete?')){ value_their_delete(<?php echo $in['id'];?>,<?php echo $_GET['subgroup_id']; ?>); atualiza_value_pie_table(); }" style="text-decoration: none; color:#fff;">
									<div  style="padding:3px;background-color:#c82333;margin-top:3px;"><SMALL>
<i class="fas fa-trash-alt"></i></SMALL></div></a>
		</div>
		<br>
		<hr>
			<?php }
			}else{
				echo $_SESSION[$_SESSION['lang']]['no results registered'];
				//echo "no results registered";

			}
			?>
	
		
																		<br>
																		<br>
																		<br>
	<?php $t = Build_value_pie::select_sum_ec_values_and_their_scores($_GET['subgroup_id']); ?>																		
		<strong> <?php echo $_SESSION[$_SESSION['lang']]['Points in the subgroup']; ?>: </strong> <span class="btn btn-block btn-outline-success btn-xs" id="html_points_subgroup">
		
		<?php 
		
		$u = Build_value_pie::update_subgroup_points($t['total'],$_GET['subgroup_id']);
		echo $t['total']; 
		
		?></span>

			<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="
			if(document.getElementById('fd_scores').style.display=='none'){
				document.getElementById('fd_scores').style.display='block'
			}else{
				document.getElementById('fd_scores').style.display='none'
			}
			"><?php echo $_SESSION[$_SESSION['lang']]['Insert a new score']; ?></button>
			<div id="fd_scores" style="display:none">
			<select class="form-control" id="new_ev" name="new_ev" >
						<option value="0"><?php echo $_SESSION[$_SESSION['lang']]['select']; ?></option>
							<?php 
									$ev = Enter_values::select_mixed_values_for_report($_SESSION['project_id']);			
									
									foreach($ev['dados'] as $ev){
										
							?>
										<option value="<?php echo $ev['id']."|".$ev['weight']; ?>"><?php echo $ev['name_value']; ?></option>

							<?php	
												
								} 
								
							?>
					</select>
					
					<select class="form-control" id="new_pb" name="new_pb"  onchange="calculate_scores(<?php echo $in['id']; ?>)">
						
						<option value="<?php echo $i['none']; ?>"><?php echo $_SESSION[$_SESSION['lang']]['none']; ?></option>
						<option value="<?php echo $i['very_small']; ?>"><?php echo $_SESSION[$_SESSION['lang']]['very_small']; ?></option>
						<option value="<?php echo $i['small']; ?>"><?php echo $_SESSION[$_SESSION['lang']]['small']; ?></option>
						<option value="<?php echo $i['medium']; ?>"><?php echo $_SESSION[$_SESSION['lang']]['medium']; ?></option>
						<option value="<?php echo $i['large']; ?>"><?php echo $_SESSION[$_SESSION['lang']]['large']; ?></option>
						<option value="<?php echo $i['very_large']; ?>"><?php echo $_SESSION[$_SESSION['lang']]['very_large']; ?></option>
						<option value="<?php echo $i['excepitional']; ?>"><?php echo $_SESSION[$_SESSION['lang']]['exceptional']; ?></option>
					</select>
			
			<button type="button" class="btn btn-block bg-gradient-success btn-sm" onclick="if(document.getElementById('new_ev').value=='0'){alert('fill in the name field')}else{score_register(<?php echo $_GET['subgroup_id']; ?>,document.getElementById('new_ev').value,document.getElementById('new_pb').value)}"><?php echo $_SESSION[$_SESSION['lang']]['save']; ?></button>
			</div>
	</div>	
</div>	