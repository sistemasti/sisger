<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");


$go = Build_value_pie::select_ec_groups_value_id($_REQUEST['id']);
?>

<table class="table table-bordered table-striped">
								<thead>                  
								<tr>
									<th ><?php echo $_SESSION[$_SESSION['lang']]['Items in asset']; ?></th>
									<th><?php echo $_SESSION[$_SESSION['lang']]['Group']; ?></th>
									<th><?php echo $_SESSION[$_SESSION['lang']]['Items in group']; ?></th>
									<th ><?php echo $_SESSION[$_SESSION['lang']]['Group as % of asset']; ?></th>
									<th ><?php echo $_SESSION[$_SESSION['lang']]['Subgroup']; ?></th>
									<th ><?php echo $_SESSION[$_SESSION['lang']]['Items in subgroup']; ?></th>
									<th ><?php echo $_SESSION[$_SESSION['lang']]['Subgroup as % of asset']; ?></th>
									<th ><?php echo $_SESSION[$_SESSION['lang']]['Subgroup as % of group']; ?></th>
									<th ><?php echo $_SESSION[$_SESSION['lang']]['Item value as % of asset']; ?></th>
								</tr>
								</thead>
								<tbody>
								<?php 
								
								$in = Build_value_pie::select_ec_value_pie_table_all();
								
							
								if($in['num'] > 0){												
								foreach($in['dados'] as $in){
									
								
								
									?>
									<tr>
										<td><?php echo $in['items_in_asset']; ?></td>
										<td><?php echo $in['group_value']; ?></td>
										<td><?php echo $in['items_in_group']; ?></td>
										<td><?php echo $in['group_as_percent_of_asset']; ?>%</td>
										<td><?php echo $in['subgroup_value']; ?></td>
										<td><?php echo $in['items_ind_subgroup']; ?></td>
										<td><?php echo $in['subgroup_as_percent_of_asset']; ?>%</td><!-- <------------ -->
										<td><?php echo $in['subgroup_as_percent_of_group']; ?>%</td>
										<td><?php echo $in['items_value_as_percent_of_asset']; ?>%</td>
									</tr>
							
								<?php
								
								}
								
								}else{
									//echo "no registered groups";
								}		
								
								?>	
								
								</tbody>
							</table>
							<br>
							<!--
							<a href="javascript:void(0)" onclick="view_value_type(<?php echo $_REQUEST['id']; ?>)"><center><button type="button" class="btn btn-success">close & refresh calculations</button></center></a>-->