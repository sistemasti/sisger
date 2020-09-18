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
									<th >Items in asset</th>
									<th>Group</th>
									<th>Items in group</th>
									<th >Group as % of asset</th>
									<th >Subgroup</th>
									<th >Items in subgroup</th>
									<th >Subgroup as % of asset</th>
									<th >Subgroup as % of group</th>
									<th >Item value as % of asset</th>
								</tr>
								</thead>
								<tbody>
								<?php 
								
								$in = Build_value_pie::select_ec_values_for_table();
								
								//verifica tabela no bd
								$vtb = Build_value_pie::select_ec_values_for_table();
								
								//apaga para inserir novamente, inviável o updade
								if($vtb['num'] > 0){
									$vtbd = Build_value_pie::delete_ec_value_pie_table();
								}	
								
								if($in['num'] > 0){												
								foreach($in['dados'] as $in){
									
								$tg = Build_value_pie::select_sum_ec_subgroups_items_by_project();	
								
								$ts = Build_value_pie::select_sum_ec_subgroups_items_by_group($in['group_id']);	
								
								$a = Build_value_pie::select_sum_points_group($in['group_id']);
								$a2 = Build_value_pie::select_sum_points_group_for_table($in['group_id']);
								$b = (float)$in['groupPoints'];
								$c = (float)$in['subgroupPoints'];
								$d = (float)$in['numbers_of_items'];
								
									?>
									<tr>
										<td><?php echo $tg['total']; ?></td>
										<td><?php echo $in['group_name']; ?></td>
										<td><?php echo $ts['total']; ?></td>
										<td><?php echo ($b*100)/$a['a']; ?>%</td>
										<td><?php echo $in['subgroup_name']; ?></td>
										<td><?php echo $in['numbers_of_items']; ?></td>
										<td><?php echo round(($c*100)/$a['a'],2); 
										
										?>%</td><!-- <------------ -->
										<td><?php echo round(($c*100)/$a2['a']); ?>%</td>
										<td><?php echo round((($c*100)/$a['a'])/$d,6); ?>%</td>
									</tr>
							
								<?php
								
									$ins = Build_value_pie::insert_ec_value_pie_table($tg['total'],$in['group_name'],$ts['total'],($b*100)/$a['a'],$in['subgroup_name'],$in['numbers_of_items'],round(($c*100)/$a['a'],2),round(($c*100)/$a2['a']),round((($c*100)/$a['a'])/$d,6));
								
								}
								
								}else{
									echo "no registered groups";
								}		
								
								?>	
								
								</tbody>
							</table>
							<br>
							<!--
							<a href="javascript:void(0)" onclick="view_value_type(<?php echo $_REQUEST['id']; ?>)"><center><button type="button" class="btn btn-success">close & refresh calculations</button></center></a>-->