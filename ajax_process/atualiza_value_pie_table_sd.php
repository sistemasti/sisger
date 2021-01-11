<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");

echo json_encode('1');
								
								$in = Build_value_pie::select_ec_values_for_table_sd();
								if($in['num'] > 0){			
								
									foreach($in['dados'] as $in){
										
											$tg = Build_value_pie::select_sum_ec_subgroups_items_by_project();	
											
											$ts = Build_value_pie::select_sum_ec_subgroups_items_by_group($in['group_id']);	
											
											$go = Build_value_pie::select_ec_groups_value_id($in['group_id']);
											
											
										/* 	
											$a = Build_value_pie::select_sum_points_group($in['group_id']);
											$a2 = Build_value_pie::select_sum_points_group_for_table($in['group_id']);
											$b = (float)$in['groupPoints'];
											$c = (float)$in['subgroupPoints'];
											$d = (float)$in['numbers_of_items']; */
											
											$a 	= (float)$in['groupRatio'];
											$b 	= Build_value_pie::select_sum_value_ratio_value_group();
											$b2 = Build_value_pie::select_sum_ec_subgroups_items_by_project();
											$h 	= Build_value_pie::select_sum_ec_subgroups_items_by_project_by_group($in['group_id']);
											
											$c 	= (float)$in['subgroupRatio'];
											$d 	= (float)$in['subgroupRatio'];
											$e 	= Build_value_pie::select_sum_soma_for_single_by_group($in['group_id']);
											$f 	= (float)$in['subgroupRatio'];
											$g 	= (float)$in['numbers_of_items'];
											//$h 	= $b['b']*$b2['total'];
											
											// Percent of the group
											if($go['method_for_quantifying'] == 1){
												//$subgroup_as_percent_of_group = $c/100;
												$subgroup_as_percent_of_group = $c;
											}	
											
											// Ratio between subgroups
											if($go['method_for_quantifying'] == 2){
												
												/* echo "<br>oi".$d;
												echo "<br>oi".$e; */
												
												$subgroup_as_percent_of_group = ($d/$e['total'])*100;
											}	
											
											//Ratio between items
											if($go['method_for_quantifying'] == 3){
												$subgroup_as_percent_of_group = (($f*$g)/(int)$h['total'])*100;
											}	
											
											/* echo "<hr>";
											echo "<br>f: ".$f;
											echo "<br>g: ".$g;
											echo "<br>h: ".(int)$h['total'];
											echo "<hr>";
											 */
											
											$group_as_percent_of_asset = ($a/$b['b'])*100;
											
											$subgroup_as_percent_of_asset = ($group_as_percent_of_asset * $subgroup_as_percent_of_group)/100;
											
											
											$st = Build_value_pie::select_ec_value_pie_table_all_by_group_subgroup($in['group_id'],$in['subgroup_id']);
											
											
											
											
											
										
												
											if($st['num'] > 0){
												
												/* LEGENDA:
													
													update_ec_value_pie_table(
													
													$items_in_asset, 
													$group_value, 
													$items_in_group, 
													$group_as_percent_of_asset, 
													$subgroup_value, 
													$items_ind_subgroup, 
													$subgroup_as_percent_of_asset, 
													$subgroup_as_percent_of_group, 
													$items_value_as_percent_of_asset, 
													$group_id, 
													$subgroup_id
													
													){

												*/
												
												
												$up = Build_value_pie::update_ec_value_pie_table(
												
												$tg['total'],
												$in['group_name'], 
												$ts['total'], 
												round($group_as_percent_of_asset,2), 
												$in['subgroup_name'], 
												$in['numbers_of_items'], 
												round($subgroup_as_percent_of_asset,2), 
												round($subgroup_as_percent_of_group,2), 
												sprintf( '%f', (float)round(($subgroup_as_percent_of_asset/$g),6) ), 
												$in['group_id'], 
												$in['subgroup_id']
												);
												
											}else{
												
												/* 
														
														LEGENDA:
														
														insert_ec_value_pie_table(
														
														$group_id,
														$subgroup_id,
														$items_in_asset,
														$group_value,
														$items_in_group,
														
														$group_as_percent_of_asset,
														$subgroup_value,
														$items_ind_subgroup,
														$subgroup_as_percent_of_asset,
														$subgroup_as_percent_of_group,
														$items_value_as_percent_of_asset
														
														)
													
												*/
												
												$ins = Build_value_pie::insert_ec_value_pie_table(
												$in['group_id'],
												$in['subgroup_id'],
												$tg['total'],
												$in['group_name'],
												$ts['total'],
												round($group_as_percent_of_asset,2),
												$in['subgroup_name'],
												$in['numbers_of_items'],
												round($subgroup_as_percent_of_asset,2),
												round($subgroup_as_percent_of_group,2),
												round(($subgroup_as_percent_of_asset/$g),2));
											}
											
											
									}
								
								}

?>








