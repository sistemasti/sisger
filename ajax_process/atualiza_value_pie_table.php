<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");



								
								/* $st = Build_value_pie::select_ec_value_pie_table_all();
								$update = 0;
								
								if($st['num'] > 0){									
									$update = 1;									
								}	 */
								
								$in = Build_value_pie::select_ec_values_for_table();
								if($in['num'] > 0){			
								
									foreach($in['dados'] as $in){
										
											$tg = Build_value_pie::select_sum_ec_subgroups_items_by_project();	
											
											$ts = Build_value_pie::select_sum_ec_subgroups_items_by_group($in['group_id']);	
											
											$a = Build_value_pie::select_sum_points_group($in['group_id']);
											$a2 = Build_value_pie::select_sum_points_group_for_table($in['group_id']);
											$b = (float)$in['groupPoints'];
											$c = (float)$in['subgroupPoints'];
											$d = (float)$in['numbers_of_items'];
											
											$st = Build_value_pie::select_ec_value_pie_table_all_by_group_subgroup($in['group_id'],$in['subgroup_id']);
											
											if($st['num'] > 0){
												
												$up = Build_value_pie::update_ec_value_pie_table($tg['total'],$in['group_name'], $ts['total'], round(($b*100)/$a['a'],2), $in['subgroup_name'], $in['numbers_of_items'], round(($c*100)/$a['a'],2), round(($c*100)/$a2['a'],2), round((($c*100)/$a['a'])/$d,6), $in['group_id'], $in['subgroup_id']);
												
											}else{
												
												
												
												$ins = Build_value_pie::insert_ec_value_pie_table($in['group_id'],$in['subgroup_id'],$tg['total'],$in['group_name'],$ts['total'],round(($b*100)/$a['a'],2),$in['subgroup_name'],$in['numbers_of_items'],round(($c*100)/$a['a'],2),round(($c*100)/$a2['a'],2),round((($c*100)/$a['a'])/$d,6));
											}
											
											
									}
								
								}

?>








