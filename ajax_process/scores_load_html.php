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
	<h3>Value and their scores</h3>
	<div style="padding: 5px;background-color:#f4fbcd">
		<small><strong>Subgroup:</strong> <?php 
					
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
						
						<option value="<?php echo $i['none']; ?>" <?php if($in['value_scale_value'] == $i['none']){ echo "selected"; } ?>>none</option>
						<option value="<?php echo $i['very_small']; ?>" <?php if($in['value_scale_value'] == $i['very_small']){ echo "selected"; } ?>>very_small</option>
						<option value="<?php echo $i['small']; ?>" <?php if($in['value_scale_value'] == $i['small']){ echo "selected"; } ?>>small</option>
						<option value="<?php echo $i['medium']; ?>" <?php if($in['value_scale_value'] == $i['medium']){ echo "selected"; } ?>>medium</option>
						<option value="<?php echo $i['large']; ?>"  <?php if($in['value_scale_value'] == $i['large']){ echo "selected"; } ?>>large</option>
						<option value="<?php echo $i['very_large']; ?>" <?php if($in['value_scale_value'] == $i['very_large']){ echo "selected"; } ?>>very_large</option>
						<option value="<?php echo $i['exceptional']; ?>" <?php if($in['value_scale_value'] == $i['exceptional']){ echo "selected"; } ?>>exceptional</option>
					</select>
					<br>
					<span id="prob_<?php echo $in['id']; ?>"><?php echo $in['value_scale_value']; ?></span>&nbsp;&nbsp;&nbsp;  <div style="padding:7px; background-color:#ccc">total: <strong><span id="total_<?php echo $in['id']; ?>"><?php echo $in['result']; ?></span></strong></div>
				</center> 
			</div>
			<a href="javascript:void(0)" onclick="if(confirm('Do you really want to delete?')){ value_their_delete(<?php echo $in['id'];?>,<?php echo $_GET['subgroup_id']; ?>)}" style="text-decoration: none; color:#fff;">
									<div  style="padding:3px;background-color:#c82333;margin-top:3px;"><SMALL>
<i class="fas fa-trash-alt"></i></SMALL></div></a>
		</div>
		<br>
		<hr>
			<?php }
			}else{

				echo "no results registered";

			}
			?>
	
		
																		<br>
																		<br>
																		<br>
	<?php $t = Build_value_pie::select_sum_ec_values_and_their_scores($_GET['subgroup_id']); ?>																		
		<strong> Points in the subgroup: </strong> <span class="btn btn-block btn-outline-success btn-xs" id="html_points_subgroup">
		
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
			">insert a new scores</button>
			<div id="fd_scores" style="display:none">
			<select class="form-control" id="new_ev" name="new_ev" >
						<option value="0">select</option>
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
						
						<option value="<?php echo $i['none']; ?>">none</option>
						<option value="<?php echo $i['very_small']; ?>">very_small</option>
						<option value="<?php echo $i['small']; ?>">small</option>
						<option value="<?php echo $i['medium']; ?>">medium</option>
						<option value="<?php echo $i['large']; ?>">large</option>
						<option value="<?php echo $i['very_large']; ?>">very_large</option>
						<option value="<?php echo $i['exceptional']; ?>">exceptional</option>
					</select>
			
			<button type="button" class="btn btn-block bg-gradient-success btn-sm" onclick="if(document.getElementById('new_ev').value=='0'){alert('fill in the name field')}else{score_register(<?php echo $_GET['subgroup_id']; ?>,document.getElementById('new_ev').value,document.getElementById('new_pb').value)}">save</button>
			</div>
	</div>	
</div>	