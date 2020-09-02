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
								
								
								
								$in = Build_value_pie::select_ec_values_for_table_sd();
								
								//verifica tabela no bd
								$vtb = Build_value_pie::select_ec_values_for_table_sd();
								
								//apaga para inserir novamente, inviável o updade
								if($vtb['num'] > 0){
									$vtbd = Build_value_pie::delete_ec_value_pie_table();
								}	
								
								if($in['num'] > 0){												
								foreach($in['dados'] as $in){
									
								$subgroup_as_percent_of_group 	= 0;
								$subgroup_as_percent_of_asset 	= 0;
								$group_as_percent_of_asset 		= 0;
								
								$tg = Build_value_pie::select_sum_ec_subgroups_items_by_project();	
								
								$ts = Build_value_pie::select_sum_ec_subgroups_items_by_group($in['group_id']);	
								
								$a 	= (float)$in['groupRatio'];
								$b 	= Build_value_pie::select_sum_value_ratio_value_group();
								$b2 = Build_value_pie::select_sum_ec_subgroups_items_by_project();
								$c 	= (float)$in['subgroupRatio'];
								$d 	= (float)$in['subgroupRatio'];
								$e 	= Build_value_pie::select_sum_soma_for_single_by_group($in['group_id']);
								$f 	= (float)$in['subgroupRatio'];
								$g 	= (float)$in['numbers_of_items'];
								$h 	= $b['b']*$b2['total'];
								
								if($go['method_for_quantifying'] == 1){
									$subgroup_as_percent_of_group = $c/100;
								}	
								
								if($go['method_for_quantifying'] == 2){
									$subgroup_as_percent_of_group = ($d/$e)*100;
								}	
								
								if($go['method_for_quantifying'] == 3){
									$subgroup_as_percent_of_group = (($f*$g)/$h)*100;
								}	
								
								$group_as_percent_of_asset = ($a/$b['b'])*100;
								
								$subgroup_as_percent_of_asset = ($group_as_percent_of_asset * $subgroup_as_percent_of_group)/100;
									?>
								<tr>
									<td><?php echo $tg['total']; ?></td>
									<td><?php echo $in['group_name']; ?></td>
									<td><?php echo $ts['total']; ?></td>
									<td><?php echo round($group_as_percent_of_asset,2); ?>%</td>
									<td><?php echo $in['subgroup_name']; ?></td>
									<td><?php echo $in['numbers_of_items']; ?></td>
									<td><?php echo round($subgroup_as_percent_of_asset,2); ?>%</td><!-- <------------ -->
									<td><?php echo /* round(($c*100)/$a2['a']) */ round($subgroup_as_percent_of_group,2); ?>%</td>
									<td><?php echo round(($subgroup_as_percent_of_asset/$g),2); ?>%</td>
								</tr>
							
								<?php
								
									$ins = Build_value_pie::insert_ec_value_pie_table($tg['total'],$in['group_name'],$ts['total'],round($group_as_percent_of_asset,2),$in['subgroup_name'],$in['numbers_of_items'],round($subgroup_as_percent_of_asset,2),round($subgroup_as_percent_of_group,2),round(($subgroup_as_percent_of_asset/$g),2));
								
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