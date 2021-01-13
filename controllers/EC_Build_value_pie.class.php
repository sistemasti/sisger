<?php


/* 

select group 
select subgroup by group 
select their_scores by subgroup 

insert group 
insert subgroup 
insert their scores


update grupo
update grupo (name, definition, notes)
update subgrupo name 
update subgrupo number 
update their_scores

 */



	class Build_value_pie extends DB{
	
/*=================================================isset======================================================*/

		static function isset_documents(){
			
		

		}

/* ================================================= selects ====================================================== */




		static function select_ec_groups_value(){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_groups_value WHERE project_id="'.$_SESSION['project_id'].'" ORDER BY id DESC');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();
			return $d;
			
		}


		static function select_ar_zoom_list_items_affected($risk_id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ar_zoom_list_items_affected WHERE project_id="'.$_SESSION['project_id'].'" AND risk_id=? ORDER BY id DESC');
			$n1->execute(array($risk_id)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();
			return $d;
			
		}
		
		static function select_ar_zoom_list_items_affected_checked($risk_id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ir_risks WHERE  id=? ');
			$n1->execute(array($risk_id)); 
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();				
			return $d;
			
		}

		static function select_ar_zoom_list_items_affected_o($risk_id,$option_id){
			//echo 'SELECT * FROM ar_zoom_list_items_affected_o WHERE project_id="'.$_SESSION['project_id'].'" AND risk_id="'.$risk_id.'" AND option_id="'.$option_id.'"  ORDER BY id DESC';
			$n1 = self::getConn()->prepare('SELECT * FROM ar_zoom_list_items_affected_o WHERE project_id="'.$_SESSION['project_id'].'" AND risk_id=? AND option_id=? ORDER BY id DESC');
			$n1->execute(array($risk_id,$option_id)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();
			return $d;
			
		}
			
		static function select_ar_zoom_list_items_affected_checked_o($risk_id,$option_id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ar_zoom_list_items_affected_o WHERE project_id="'.$_SESSION['project_id'].'" AND risk_id=? AND option_id=? ORDER BY id DESC');
			$n1->execute(array($risk_id,$option_id)); 
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();				
			return $d;
			
		}

		static function select_ec_values_and_their_scores($subgroup_id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM  ec_values_and_their_scores WHERE subgroup_id=?');
			$n1->execute(array($subgroup_id)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();
			return $d;
			
		}


		static function select_ec_groups_value_id($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_groups_value WHERE id=?');
			$n1->execute(array($id)); 
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();				
			return $d;
			
		}

		static function select_ec_value_pie_table($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_value_pie_table WHERE project_id="'.$_SESSION['project_id'].'"');
			$n1->execute(array($id)); 
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();				
			return $d;
			
		}


		static function select_ec_value_pie_table_all(){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_value_pie_table WHERE project_id="'.$_SESSION['project_id'].'"');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
			
		}
		

		static function select_ec_value_pie_table_all_zoom_list($risk_id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_value_pie_table WHERE project_id="'.$_SESSION['project_id'].'" AND id NOT IN (SELECT id_ec_value_pie_table FROM ar_zoom_list_items_affected WHERE risk_id = "'.$risk_id.'" and project_id = "'.$_SESSION['project_id'].'")');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
			
		}
		
		static function select_ec_value_pie_table_all_zoom_list_o($o, $risk_id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_value_pie_table WHERE project_id="'.$_SESSION['project_id'].'" AND id NOT IN (SELECT id_ec_value_pie_table FROM ar_zoom_list_items_affected_o WHERE risk_id = "'.$risk_id.'" and project_id = "'.$_SESSION['project_id'].'" AND option_id=?)');
			$n1->execute(array($o)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
			
		}
		
		static function select_ar_zoom_list_items_affected_id($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ar_zoom_list_items_affected WHERE id=?');
			$n1->execute(array($id)); 
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();				
			return $d;
		}

		static function select_ec_value_pie_table_all_by_group($group_id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_value_pie_table WHERE project_id="'.$_SESSION['project_id'].'" and group_id=?');
			$n1->execute(array($group_id)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
			
		}

		static function select_ec_value_pie_table_all_by_subgroup($subgroup_id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_value_pie_table WHERE project_id="'.$_SESSION['project_id'].'" and subgroup_id=?');
			$n1->execute(array($subgroup_id)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
			
		}

		static function select_ec_value_pie_table_all_by_group_subgroup($group_id,$subgroup_id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_value_pie_table WHERE project_id="'.$_SESSION['project_id'].'" and group_id=? and subgroup_id=?');
			$n1->execute(array($group_id,$subgroup_id)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
			
		}

		
		static function select_ec_value_pie_table_id($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_value_pie_table WHERE id=?');
			$n1->execute(array($id)); 
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();				
			return $d;
		}

		static function select_ar_zoom_list_items_affected_by_id_ec_value_pie_table($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ar_zoom_list_items_affected WHERE id_ec_value_pie_table=?');
			$n1->execute(array($id)); 
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();				
			return $d;
		}

		static function select_sum_low_estimate_ec_value_pie_table($id){
			
			$n1 = self::getConn()->prepare('SELECT sum(low_estimate) as total FROM `ar_zoom_list_items_affected` WHERE project_id="'.$_SESSION['project_id'].'" AND risk_id=?');
			$n1->execute(array($id)); 
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();				
			return $d;
		}

		static function select_sum_low_estimate_ec_value_pie_table_o($risk_id,$option_id){
			//$_GET['risk_id'],
			$n1 = self::getConn()->prepare('SELECT sum(low_estimate) as total FROM `ar_zoom_list_items_affected_o` WHERE risk_id=? AND option_id=? ');
			$n1->execute(array($risk_id,$option_id)); 
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();				
			return $d;
		}


		static function select_sum_most_probable_ec_value_pie_table($id){
			
			$n1 = self::getConn()->prepare('SELECT sum(most_probable) as total FROM `ar_zoom_list_items_affected` WHERE project_id="'.$_SESSION['project_id'].'" AND risk_id=?');
			$n1->execute(array($id)); 
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();				
			return $d;
		}

		static function select_sum_most_probable_ec_value_pie_table_o($risk_id,$option_id){
			
			$n1 = self::getConn()->prepare('SELECT sum(most_probable) as total FROM `ar_zoom_list_items_affected_o` WHERE risk_id=? and option_id=?');
			$n1->execute(array($risk_id,$option_id)); 
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();				
			return $d;
		}

		static function select_sum_high_estimate_ec_value_pie_table($id){
			
			$n1 = self::getConn()->prepare('SELECT sum(high_estimate) as total FROM `ar_zoom_list_items_affected` WHERE project_id="'.$_SESSION['project_id'].'" AND risk_id=?');
			$n1->execute(array($id)); 
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();				
			return $d;
		}

		static function select_sum_high_estimate_ec_value_pie_table_o($risk_id,$option_id){
			
			$n1 = self::getConn()->prepare('SELECT sum(high_estimate) as total FROM `ar_zoom_list_items_affected_o` WHERE  risk_id=? and option_id=?');
			$n1->execute(array($risk_id,$option_id)); 
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();				
			return $d;
		}


		static function select_ec_groups_id($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_groups WHERE id=?');
			$n1->execute(array($id)); 
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();				
			return $d;
			
		}


		static function select_sum_itens_subgroup($group_id){
			
			$n1 = self::getConn()->prepare('SELECT SUM(numbers_of_items) as total FROM ec_subgroups_value WHERE group_id=?');
			$n1->execute(array($group_id)); 
			$d = $n1->fetch();							
			return $d;
			
		}
		
		static function select_soma_for_single_subgroup($group_id){
			
			$n1 = self::getConn()->prepare('SELECT SUM(soma_for_single) as total FROM ec_subgroups_value WHERE group_id=?');
			$n1->execute(array($group_id)); 
			$d = $n1->fetch();							
			return $d;
			
		}
//WHERE project_id="'.$_SESSION['project_id'].'"
		
		static function select_sum_points_group($group_id){
			
			$n1 = self::getConn()->prepare('SELECT SUM(points) as a FROM ec_subgroups_value WHERE project_id="'.$_SESSION['project_id'].'"');
			$n1->execute(array($group_id)); 
			$d = $n1->fetch();							
			return $d;
			
		}

		static function select_sum_value_ratio_value_group(){
			
			$n1 = self::getConn()->prepare('SELECT SUM(value_ratio) as b FROM ec_groups_value WHERE project_id="'.$_SESSION['project_id'].'"');
			$n1->execute(array()); 
			$d = $n1->fetch();							
			return $d;
			
		}

		static function select_sum_points_group_for_table($group_id){
			
			
			$n1 = self::getConn()->prepare('SELECT SUM(points) as a FROM ec_subgroups_value WHERE group_id=?');
			$n1->execute(array($group_id)); 
			$d = $n1->fetch();							
			return $d;
			
		}

		static function select_sum_points_group_for_table_by_project(){
			
			
			$n1 = self::getConn()->prepare('SELECT SUM(points) as a FROM ec_subgroups_value WHERE project_id="'.$_SESSION['project_id'].'"');
			$n1->execute(array()); 
			$d = $n1->fetch();							
			return $d;
			
		}

		static function select_sum_ec_values_and_their_scores ($subgroup_id){
			
			$n1 = self::getConn()->prepare('SELECT sum(result) as total FROM `ec_values_and_their_scores` WHERE subgroup_id=?');
			$n1->execute(array($subgroup_id)); 
			$d = $n1->fetch();							
			return $d;
			
		}
		static function select_sum_ec_values_and_their_scores_by_group ($group_id){
			
			$n1 = self::getConn()->prepare('SELECT sum(result) as total FROM `ec_values_and_their_scores` WHERE subgroup_id IN (SELECT id FROM  ec_subgroups_value WHERE group_id = ?)');
			$n1->execute(array($group_id)); 
			$d = $n1->fetch();							
			return $d;
			
		}
		
		static function select_sum_ec_subgroups_items ($id){
			
			$n1 = self::getConn()->prepare('SELECT sum(numbers_of_items) as total FROM `ec_subgroups_value` WHERE id=?');
			$n1->execute(array($id)); 
			$d = $n1->fetch();
			return $d;
			
		}

		static function select_sum_ec_subgroups_items_by_group ($group_id){
			
			$n1 = self::getConn()->prepare('SELECT sum(numbers_of_items) as total FROM `ec_subgroups_value` WHERE group_id=?');
			$n1->execute(array($group_id)); 
			$d = $n1->fetch();							
			return $d;
			
		}

		static function select_sum_soma_for_single_by_group ($group_id){
			
			$n1 = self::getConn()->prepare('SELECT sum(soma_for_single) as total FROM `ec_subgroups_value` WHERE group_id=?');
			$n1->execute(array($group_id)); 
			$d = $n1->fetch();							
			return $d;
			
		}

		static function select_sum_ec_subgroups_items_by_project (){
			
			$n1 = self::getConn()->prepare('SELECT sum(numbers_of_items) as total FROM `ec_subgroups_value` WHERE project_id="'.$_SESSION['project_id'].'"');
			$n1->execute(array()); 
			$d = $n1->fetch();							
			return $d;
			
		}

		static function select_sum_ec_subgroups_items_by_project_by_group ($group){
			
			$n1 = self::getConn()->prepare('SELECT sum(numbers_of_items * soma_for_single) as total FROM `ec_subgroups_value` WHERE project_id="'.$_SESSION['project_id'].'" AND group_id=?');
			$n1->execute(array($group)); 
			$d = $n1->fetch();							
			return $d;
			
		}

		static function select_ec_values_and_their_scores_by_id ($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM `ec_values_and_their_scores` WHERE id=?');
			$n1->execute(array($id)); 
			$d = $n1->fetch();							
			return $d;
			
		}

		static function select_count_itens_subgroup($group_id){
			
			$n1 = self::getConn()->prepare('SELECT count(id) as total FROM ec_subgroups_value WHERE group_id=?');
			$n1->execute(array($group_id)); 
			$d = $n1->fetch();							
			return $d;
			
		}


		static function select_ec_subgroups_value($group_id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_subgroups_value WHERE group_id="'.$group_id.'"');
			$n1->execute(array($group_id)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		static function select_ec_subgroups_value_id($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_subgroups_value WHERE id="'.$id.'"');
			$n1->execute(array($id)); 
			$d = $n1->fetch();							
			return $d;
			
		}


		
		static function select_ec_values_for_table(){
			
			$n1 = self::getConn()->prepare('SELECT 
												*, 
												g.id as group_id,
												g.name as group_name, 
												s.name as subgroup_name, 
												s.id as subgroup_id, 
												g.points as groupPoints, 
												g.value_ratio as groupRatio,
												s.points as subgroupPoints, 
												s.soma_for_single as subgroupRatio, 
												s.numbers_of_items as numbers_of_items 
											FROM `ec_groups_value` as g 											
											INNER JOIN ec_subgroups_value AS s ON 
											(g.id=s.group_id)
											WHERE g.project_id="'.$_SESSION['project_id'].'" AND g.points != ""
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		static function select_ec_values_for_table_order_by_size_of_the_slice(){
			
			$n1 = self::getConn()->prepare('SELECT 
												*, 
												(
													(s.points*100) / 
													(
														SELECT SUM(points) as a FROM ec_subgroups_value WHERE project_id="'.$_SESSION['project_id'].'"
													)
												) as data2,
												g.id as group_id,
												g.name as group_name, 
												s.name as subgroup_name, 
												s.id as subgroup_id, 
												g.points as groupPoints, 
												g.value_ratio as groupRatio,
												s.points as subgroupPoints, 
												s.soma_for_single as subgroupRatio, 
												s.numbers_of_items as numbers_of_items 
											FROM `ec_groups_value` as g 											
											INNER JOIN ec_subgroups_value AS s ON 
											(g.id=s.group_id)
											WHERE g.project_id="'.$_SESSION['project_id'].'" AND g.points != ""
											ORDER BY data2 DESC
											
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}	
		
		static function select_ec_values_for_table_order_by_item_value(){
			
			$n1 = self::getConn()->prepare('SELECT 
												*, 
												(
													(s.points*100) / 
													(
														SELECT SUM(points) as a FROM ec_subgroups_value WHERE project_id="'.$_SESSION['project_id'].'"
													)
												) as data2,
												g.id as group_id,
												g.name as group_name, 
												s.name as subgroup_name, 
												s.id as subgroup_id, 
												g.points as groupPoints, 
												g.value_ratio as groupRatio,
												s.points as subgroupPoints, 
												s.soma_for_single as subgroupRatio, 
												s.numbers_of_items as numbers_of_items 
											FROM `ec_groups_value` as g 											
											INNER JOIN ec_subgroups_value AS s ON 
											(g.id=s.group_id)
											WHERE g.project_id="'.$_SESSION['project_id'].'" AND g.points != ""
											ORDER BY numbers_of_items DESC
											
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		//Para grafico do build value (by group name)
		static function select_ec_values_for_table_order_by_group_name(){
			
			$n1 = self::getConn()->prepare('SELECT 
												*
											FROM `ec_value_pie_table`
											WHERE project_id="'.$_SESSION['project_id'].'"
											GROUP BY group_id
											ORDER BY group_value ASC
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		//Para grafico do build value (by size of group slice)
		static function select_ec_values_for_table_order_by_size_group_slice(){
			
			$n1 = self::getConn()->prepare('SELECT 
												*
											FROM `ec_value_pie_table`
											WHERE project_id="'.$_SESSION['project_id'].'"
											GROUP BY group_id
											ORDER BY group_as_percent_of_asset ASC
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
			
		//Para grafico do build value (by group name, then by item value )
		static function select_ec_values_for_table_order_by_group_name_item_value(){
			
			$n1 = self::getConn()->prepare('SELECT 
												*
											FROM `ec_value_pie_table`
											WHERE project_id="'.$_SESSION['project_id'].'"
											
											ORDER BY group_value ASC, items_value_as_percent_of_asset DESC
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
			
		//Para grafico do build value ( Sorted by size of the slicee )
		static function select_ec_values_for_table_order_by_size_of_the_slice_TABLE(){
			
			$n1 = self::getConn()->prepare('SELECT 
												*
											FROM `ec_value_pie_table`
											WHERE project_id="'.$_SESSION['project_id'].'"
											
											ORDER BY subgroup_as_percent_of_asset DESC
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}	
		
		//Para grafico do build value ( Sorted by size of the slicee )
		static function select_ec_values_for_table_order_by_name_subgroup_TABLE(){
			
			$n1 = self::getConn()->prepare('SELECT 
												*
											FROM `ec_value_pie_table`
											WHERE project_id="'.$_SESSION['project_id'].'"
											
											ORDER BY subgroup_value ASC
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		static function select_ec_values_for_table_order_by_name_subgroup(){
			
			$n1 = self::getConn()->prepare('SELECT 
												*, 
												(
													(s.points*100) / 
													(
														SELECT SUM(points) as a FROM ec_subgroups_value WHERE project_id="'.$_SESSION['project_id'].'"
													)
												) as data2,
												g.id as group_id,
												g.name as group_name, 
												s.name as subgroup_name, 
												s.id as subgroup_id, 
												g.points as groupPoints, 
												g.value_ratio as groupRatio,
												s.points as subgroupPoints, 
												s.soma_for_single as subgroupRatio, 
												s.numbers_of_items as numbers_of_items 
											FROM `ec_groups_value` as g 											
											INNER JOIN ec_subgroups_value AS s ON 
											(g.id=s.group_id)
											WHERE g.project_id="'.$_SESSION['project_id'].'" AND g.points != ""
											ORDER BY subgroup_name 
											
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		static function select_ec_values_for_table_sd(){
			
			$n1 = self::getConn()->prepare('SELECT 
												*, 
												g.id as group_id,
												g.name as group_name, 
												s.name as subgroup_name, 
												s.id as subgroup_id, 
												g.value_ratio as groupRatio,
												g.points as groupPoints, 
												s.points as subgroupPoints, 
												s.soma_for_single as subgroupRatio, 
												s.numbers_of_items as numbers_of_items 
											FROM `ec_groups_value` as g 											
											INNER JOIN ec_subgroups_value AS s ON 
											(g.id=s.group_id)
											WHERE g.project_id="'.$_SESSION['project_id'].'"
											
											
											
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}	
		
		static function select_ec_values_for_table_size_of_the_sliece_sd(){
			
			$n1 = self::getConn()->prepare('SELECT 
												*, 
												g.id as group_id,
												g.name as group_name, 
												s.name as subgroup_name, 
												s.id as subgroup_id, 
												g.value_ratio as groupRatio,
												g.points as groupPoints, 
												s.points as subgroupPoints, 
												s.soma_for_single as subgroupRatio, 
												s.numbers_of_items as numbers_of_items 
											FROM `ec_groups_value` as g 											
											INNER JOIN ec_subgroups_value AS s ON 
											(g.id=s.group_id)
											WHERE g.project_id="'.$_SESSION['project_id'].'"
											
											
											
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}	
		
		static function select_ec_values_for_table_size_of_the_sliece_sd_TABLE(){
			
			$n1 = self::getConn()->prepare('SELECT 
												*
											FROM `ec_value_pie_table`
											WHERE project_id="'.$_SESSION['project_id'].'"
											
											ORDER BY subgroup_as_percent_of_asset ASC
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}	
		
		static function select_ec_values_for_table_by_name_of_the_subgroup_sd(){
			
			$n1 = self::getConn()->prepare('SELECT 
												*
											FROM `ec_value_pie_table`
											WHERE project_id="'.$_SESSION['project_id'].'"
											
											ORDER BY subgroup_value ASC
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}	
		
		
		static function select_ec_values_for_table_by_size_of_the_slize_group_sd(){
			
			$n1 = self::getConn()->prepare('SELECT 
												*, 
												g.id as group_id,
												g.name as group_name, 
												s.name as subgroup_name, 
												s.id as subgroup_id, 
												g.value_ratio as groupRatio,
												g.points as groupPoints, 
												s.points as subgroupPoints, 
												s.soma_for_single as subgroupRatio, 
												s.numbers_of_items as numbers_of_items 
											FROM `ec_groups_value` as g 											
											INNER JOIN ec_subgroups_value AS s ON 
											(g.id=s.group_id)
											WHERE g.project_id="'.$_SESSION['project_id'].'"
											
											
											
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}	
		
		static function select_ec_values_for_table_by_size_of_the_slize_group_sd_TABLE(){
			
				
			$n1 = self::getConn()->prepare('SELECT 
												*
											FROM `ec_value_pie_table`
											WHERE project_id="'.$_SESSION['project_id'].'"
											GROUP BY group_value
											ORDER BY group_as_percent_of_asset DESC
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
			
		}	
		
		static function select_ec_values_for_table_by_group_name_item_value_sd(){
			
				
			$n1 = self::getConn()->prepare('SELECT 
												*
											FROM `ec_value_pie_table`
											WHERE project_id="'.$_SESSION['project_id'].'"
											
											ORDER BY group_value ASC, items_value_as_percent_of_asset DESC
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}	
		
		static function select_ec_values_for_table_by_group_name_sd(){
			
				
			$n1 = self::getConn()->prepare('SELECT 
												*
											FROM `ec_value_pie_table`
											WHERE project_id="'.$_SESSION['project_id'].'"
											GROUP BY group_value
											ORDER BY group_value ASC, items_value_as_percent_of_asset DESC
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
			
		}	
		
		
		static function select_ec_values_for_table_by_assuming_all_sd(){
			
			$n1 = self::getConn()->prepare('SELECT 
												*, 
												g.id as group_id,
												g.name as group_name, 
												s.name as subgroup_name, 
												s.id as subgroup_id, 
												g.value_ratio as groupRatio,
												g.points as groupPoints, 
												s.points as subgroupPoints, 
												s.soma_for_single as subgroupRatio, 
												s.numbers_of_items as numbers_of_items 
											FROM `ec_groups_value` as g 											
											INNER JOIN ec_subgroups_value AS s ON 
											(g.id=s.group_id)
											WHERE g.project_id="'.$_SESSION['project_id'].'"
											
											
											
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}	
		
		static function select_ec_values_for_table_by_assuming_all_sd_TABLE(){
				
			$n1 = self::getConn()->prepare('SELECT 
												*
											FROM `ec_value_pie_table`
											WHERE project_id="'.$_SESSION['project_id'].'"
											
											ORDER BY items_ind_subgroup DESC
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
			
		}	
		
		
		static function select_ec_values_for_table_order_by_item_values_sd(){
			
			$n1 = self::getConn()->prepare('SELECT 
												*, 
												g.id as group_id,
												g.name as group_name, 
												s.name as subgroup_name, 
												s.id as subgroup_id, 
												g.value_ratio as groupRatio,
												g.points as groupPoints, 
												s.points as subgroupPoints, 
												s.soma_for_single as subgroupRatio, 
												s.numbers_of_items as numbers_of_items 
											FROM `c_value_pie_table` as g 											
											INNER JOIN ec_subgroups_value AS s ON 
											(g.id=s.group_id)
											WHERE g.project_id="'.$_SESSION['project_id'].'"
											
											ORDER BY numbers_of_items ASC
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		
		static function select_ec_values_for_table_order_by_item_values_sd_TABLE(){
			
			$n1 = self::getConn()->prepare('SELECT 
												*
											FROM `ec_value_pie_table`
											WHERE project_id="'.$_SESSION['project_id'].'"
											
											ORDER BY items_value_as_percent_of_asset DESC
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		
		static function select_ec_values_for_table_order_by_item_values_sd_TABLE_2B(){
			
			$n1 = self::getConn()->prepare('SELECT 
												*
											FROM `ec_value_pie_table`
											WHERE project_id="'.$_SESSION['project_id'].'"
											
											ORDER BY subgroup_as_percent_of_asset ASC
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		static function select_ec_values_for_table_order_by_item_values_sd_TABLE_2(){
			
			$n1 = self::getConn()->prepare('SELECT 
												*
											FROM `ec_value_pie_table`
											WHERE project_id="'.$_SESSION['project_id'].'"
											
											ORDER BY items_ind_subgroup DESC
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		
		
		static function select_ec_values_for_table_by_group_id($group_id){
			
			$n1 = self::getConn()->prepare('SELECT 
												*, 
												g.name as group_name, 
												s.name as subgroup_name, 
												s.id as subgroup_id, 
												g.points as groupPoints, 
												s.points as subgroupPoints, 
												g.value_ratio as groupRatio,
												s.soma_for_single as subgroupRatio, 
												s.numbers_of_items as numbers_of_items 
											FROM `ec_groups_value` as g 											
											INNER JOIN ec_subgroups_value AS s ON 
											(g.id=s.group_id)
											WHERE g.id=?
											');
			$n1->execute(array($group_id)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}

		static function select_ec_values_for_table_by_group_id_TABLE($group_id){
			
			$n1 = self::getConn()->prepare('SELECT 
												*
											FROM `ec_value_pie_table`
											WHERE project_id="'.$_SESSION['project_id'].'"
											AND group_id=?
											ORDER BY subgroup_value ASC
											');
			$n1->execute(array($group_id)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}

		static function select_ec_values_for_table_by_item_value_TABLE($group_id){
			
			$n1 = self::getConn()->prepare('SELECT 
												*
											FROM `ec_value_pie_table`
											WHERE project_id="'.$_SESSION['project_id'].'"
											AND group_id=?
											ORDER BY items_value_as_percent_of_asset DESC
											');
			$n1->execute(array($group_id)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}

		static function select_ec_values_for_table_by_group(){
			
			$n1 = self::getConn()->prepare('
											SELECT *, 
													g.name as group_name, 
													s.name as subgroup_name, 
													s.id as subgroup_id, 
													g.points as groupPoints, 
													s.points as subgroupPoints, 
													g.value_ratio as groupRatio,
													s.soma_for_single as subgroupRatio, 
													s.numbers_of_items as numbers_of_items 
											FROM `ec_groups_value` as g 											
											INNER JOIN ec_subgroups_value 
												AS s ON (g.id=s.group_id) 
											WHERE g.project_id="'.$_SESSION['project_id'].'"	
											GROUP BY g.name
											ORDER BY g.id DESC
											');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		static function select_ec_values_for_table_by_group_in_id($group_id){
			
			$n1 = self::getConn()->prepare('
											SELECT *, 
													g.name as group_name, 
													s.name as subgroup_name, 
													s.id as subgroup_id, 
													g.points as groupPoints, 
													s.points as subgroupPoints,
													g.value_ratio as groupRatio,
													s.soma_for_single as subgroupRatio, 													
													s.numbers_of_items as numbers_of_items 
											FROM `ec_groups_value` as g 											
											INNER JOIN ec_subgroups_value 
												AS s ON (g.id=s.group_id) 
											WHERE g.id=?	
											GROUP BY g.name
											ORDER BY g.id DESC
											');
			$n1->execute(array($group_id)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		
		static function select_ec_values_for_table_by_group_in_id_TABLE($group_id){
			
				
			$n1 = self::getConn()->prepare('SELECT 
												*
											FROM `ec_value_pie_table`
											WHERE project_id="'.$_SESSION['project_id'].'"
											AND group_id=?
											ORDER BY subgroup_as_percent_of_asset DESC
											');
			$n1->execute(array($group_id)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}

		
		static function select_ec_values_for_table_by_group_in_id_order_by_name($group_id){
			
			$n1 = self::getConn()->prepare('
											SELECT *, 
													g.name as group_name, 
													s.name as subgroup_name, 
													s.id as subgroup_id, 
													g.points as groupPoints, 
													s.points as subgroupPoints,
													g.value_ratio as groupRatio,
													s.soma_for_single as subgroupRatio,
													s.numbers_of_items as numbers_of_items 
											FROM `ec_groups_value` as g 											
											INNER JOIN ec_subgroups_value 
												AS s ON (g.id=s.group_id) 
											WHERE g.id=?	
											
											ORDER BY subgroup_name
											');
			$n1->execute(array($group_id)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}

		static function select_ec_values_for_table_by_group_in_id_order_by_item_value($group_id){
			
			$n1 = self::getConn()->prepare('
											SELECT *, 
													g.name as group_name, 
													s.name as subgroup_name, 
													s.id as subgroup_id, 
													g.points as groupPoints, 
													s.points as subgroupPoints,
													g.value_ratio as groupRatio,
													s.soma_for_single as subgroupRatio,
													s.numbers_of_items as numbers_of_items 
											FROM `ec_groups_value` as g 											
											INNER JOIN ec_subgroups_value 
												AS s ON (g.id=s.group_id) 
											WHERE g.id=?	
											
											ORDER BY numbers_of_items ASC
											');
			$n1->execute(array($group_id)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}

		
		static function select_ec_values_for_table_by_group_in_id_order_by_size_of_the_slice($group_id,$group_id2){
			
			$n1 = self::getConn()->prepare('
											SELECT *, 
												(
													(s.points*100) / 
													(
														SELECT SUM(points) as a FROM ec_subgroups_value WHERE group_id=?
													)
												) as data2, 
													g.name as group_name, 
													s.name as subgroup_name, 
													s.id as subgroup_id, 
													g.points as groupPoints, 
													s.points as subgroupPoints,
													g.value_ratio as groupRatio,
													s.soma_for_single as subgroupRatio,
													s.numbers_of_items as numbers_of_items 
											FROM `ec_groups_value` as g 											
											INNER JOIN ec_subgroups_value 
												AS s ON (g.id=s.group_id) 
											WHERE g.id=?	
											
											ORDER BY data2 DESC
											');
			$n1->execute(array($group_id,$group_id2)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}

		
		
/*=================================================insert======================================================*/
		
		static function insert_ec_groups_value($name,$definition,$notes){
			
			$n = self::getConn()->prepare('INSERT INTO `ec_groups_value` SET 
											name=?,
											definition=?,
											notes=?,											
											project_id="'.$_SESSION['project_id'].'"	
										  ');											
			$n->execute(array($name,$definition,$notes));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
			
		}
		
		static function insert_ec_groups_value_sd($name,$value_ratio,$method_for_quantifying){
			
			$n = self::getConn()->prepare('INSERT INTO `ec_groups_value` SET 
											name=?,
											value_ratio=?,
											method_for_quantifying=?,											
											project_id="'.$_SESSION['project_id'].'"	
										  ');											
			$n->execute(array($name,$value_ratio,$method_for_quantifying));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
			
		}
		
		
		static function insert_ec_value_pie_table($group_id,$subgroup_id,$items_in_asset,$group_value,$items_in_group,$group_as_percent_of_asset,$subgroup_value,$items_ind_subgroup,$subgroup_as_percent_of_asset,$subgroup_as_percent_of_group,$items_value_as_percent_of_asset){
			
			$n = self::getConn()->prepare('INSERT INTO `ec_value_pie_table` SET 
											project_id="'.$_SESSION['project_id'].'",	
											group_id=?,	
											subgroup_id=?,	
											items_in_asset=?,
											group_value=?,
											items_in_group=?,
											group_as_percent_of_asset=?,
											subgroup_value=?,
											items_ind_subgroup=?,
											subgroup_as_percent_of_asset=?,
											subgroup_as_percent_of_group=?,
											items_value_as_percent_of_asset=?
										  ');											
			$n->execute(array($group_id,$subgroup_id,$items_in_asset,$group_value,$items_in_group,$group_as_percent_of_asset,$subgroup_value,$items_ind_subgroup,$subgroup_as_percent_of_asset,$subgroup_as_percent_of_group,$items_value_as_percent_of_asset));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
			
		}
		
		
		static function insert_ar_zoom_list_items_affected($risk_id,$id_ec_value_pie_table,$identification,$number_subgroups,$low_estimate,$most_probable,$high_estimate){
			
			
			$n1 = self::getConn()->prepare( 'SELECT * FROM ar_zoom_list_items_affected WHERE risk_id = "'.$risk_id.'"' );
			$n1->execute();
			$d = $n1->fetch();	
			
			$n = self::getConn()->prepare('INSERT INTO `ar_zoom_list_items_affected` SET 
											risk_id=?,
											id_ec_value_pie_table=?,
											identification=?,
											number_subgroups=?,
											low_estimate=?,
											most_probable=?,
											high_estimate=?,
											low_estimate_general="'.$d['low_estimate_general'].'",
											most_probable_general="'.$d['most_probable_general'].'",
											high_estimate_general="'.$d['high_estimate_general'].'",
											project_id="'.$_SESSION['project_id'].'"	
										  ');											
			$n->execute(array($risk_id,$id_ec_value_pie_table,$identification,$number_subgroups,$low_estimate,$most_probable,$high_estimate));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
			
		}
		
		static function insert_ar_zoom_list_items_affected_o($risk_id,$option_id,$id_ec_value_pie_table,$identification,$number_subgroups,$low_estimate,$most_probable,$high_estimate){
			
			$n1 = self::getConn()->prepare( 'SELECT * FROM ar_zoom_list_items_affected_o WHERE risk_id = "'.$risk_id.'" AND  option_id="'.$option_id.'"' );
			$n1->execute();
			$d = $n1->fetch();	
			
			$n = self::getConn()->prepare('INSERT INTO `ar_zoom_list_items_affected_o` SET 
											risk_id=?,
											option_id=?,
											id_ec_value_pie_table=?,
											identification=?,
											number_subgroups=?,
											low_estimate=?,
											most_probable=?,
											high_estimate=?,
											low_estimate_general="'.$d['low_estimate_general'].'",
											most_probable_general="'.$d['most_probable_general'].'",
											high_estimate_general="'.$d['high_estimate_general'].'",
											project_id="'.$_SESSION['project_id'].'"	
										  ');											
			$n->execute(array($risk_id,$option_id,$id_ec_value_pie_table,$identification,$number_subgroups,$low_estimate,$most_probable,$high_estimate));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
			
		}
		
		
		static function insert_ec_subgroups_value($group_id,$name,$numbers_of_items,$soma_for_single,$notes){
			
			$n = self::getConn()->prepare('INSERT INTO `ec_subgroups_value` SET 
											group_id=?,
											name=?,
											numbers_of_items=?,
											soma_for_single=?,
											notes=?,
											project_id="'.$_SESSION['project_id'].'"	
										  ');											
			$n->execute(array($group_id,$name,$numbers_of_items,$soma_for_single,$notes));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
			
		}
		
		
		static function insert_ec_values_and_their_scores($subgroup_id,$value_pie_type,$value_pie_value,$value_scale_value,$result){
			
			$n = self::getConn()->prepare('INSERT INTO `ec_values_and_their_scores` SET 
											subgroup_id=?,										
											value_pie_type=?,	
											value_pie_value=?,	
											value_scale_value=?,
											result=?
										  ');											
			$n->execute(array($subgroup_id,$value_pie_type,$value_pie_value,$value_scale_value,$result));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
			
		}
		
		
		
/*=================================================update======================================================*/
		
		static function update_ar_zoom_list_items_affected($low_estimate, $most_probable, $high_estimate, $id){
					$n = self::getConn()->prepare('
													UPDATE `ar_zoom_list_items_affected` SET 														   
														   `low_estimate` =?,
														   `most_probable` =?,
														   `high_estimate` =?
													WHERE  `id` =? ');
											
					$n->execute(array($low_estimate, $most_probable, $high_estimate, $id));
		}
		
		
		static function update_analyze_risk_by_zoom_ia($C_min_score,$C_pro_score,$C_max_score,$C_unc_range, $id_risk){
			
					/* echo 'UPDATE `ar_analyze_risks` SET 
														   `C_min_score` ="'.$C_min_score.'",
														   `C_pro_score` ="'.$C_pro_score.'",
														   `C_max_score` ="'.$C_max_score.'",
														   `C_unc_range` ="'.$C_unc_range.'"
													WHERE  `id_risk` ="'.$id_risk.'" '; */
			
					$n = self::getConn()->prepare('
													UPDATE `ar_analyze_risks` SET 
														   `C_min_score` =?,
														   `C_pro_score` =?,
														   `C_max_score` =?,
														   `C_unc_range` =?
													WHERE  `id_risk` =? ');
											
					$n->execute(array($C_min_score,$C_pro_score,$C_max_score,$C_unc_range, $id_risk));
		}
		
		
		static function update_analyze_risk_by_zoom_ia_o($C_min_score,$C_pro_score,$C_max_score,$C_unc_range, $id_risk, $id_option){
			
					/* echo 'UPDATE `ar_analyze_risks` SET 
														   `C_min_score` ="'.$C_min_score.'",
														   `C_pro_score` ="'.$C_pro_score.'",
														   `C_max_score` ="'.$C_max_score.'",
														   `C_unc_range` ="'.$C_unc_range.'"
													WHERE  `id_risk` ="'.$id_risk.'" '; */
			
					$n = self::getConn()->prepare('
													UPDATE `tr_analyze_options` SET 
														   `C_min_score` =?,
														   `C_pro_score` =?,
														   `C_max_score` =?,
														   `C_unc_range` =?
													WHERE  
															`id_risk` =? AND
															`id_option` =? 
													
													');
											
					$n->execute(array($C_min_score,$C_pro_score,$C_max_score,$C_unc_range, $id_risk, $id_option));
		}
		
		
		static function update_ar_zoom_list_items_affected_o($low_estimate, $most_probable, $high_estimate, $id){
					$n = self::getConn()->prepare('
													UPDATE `ar_zoom_list_items_affected_o` SET 														   
														   `low_estimate` =?,
														   `most_probable` =?,
														   `high_estimate` =?
													WHERE  `id` =? ');
											
					$n->execute(array($low_estimate, $most_probable, $high_estimate, $id));
		}
		
		static function update_ar_zoom_list_items_affected_top($low_estimate_general, $most_probable_general, $high_estimate_general, $risk_id){
					$n = self::getConn()->prepare('
													UPDATE `ar_zoom_list_items_affected` SET 														   
														   `low_estimate_general` =?,
														   `most_probable_general` =?,
														   `high_estimate_general` =?
													WHERE  risk_id=? AND project_id="'.$_SESSION['project_id'].'" ');
											
					$n->execute(array($low_estimate_general, $most_probable_general, $high_estimate_general, $risk_id));
		}
			
		static function update_ar_zoom_list_items_affected_top_o($low_estimate_general, $most_probable_general, $high_estimate_general, $risk_id, $option_id){
					$n = self::getConn()->prepare('
													UPDATE `ar_zoom_list_items_affected_o` SET 														   
														   `low_estimate_general` =?,
														   `most_probable_general` =?,
														   `high_estimate_general` =?
													WHERE   risk_id=? AND option_id=? AND project_id="'.$_SESSION['project_id'].'" ');
											
					$n->execute(array($low_estimate_general, $most_probable_general, $high_estimate_general, $risk_id, $option_id));
		}
			
		static function update_zoom_fr_save($fr_zoom_link,$fr_zoom_obs,$fr_zoom_explanation_fields, $fr_zoom_notes_explanation, $fr_zoom_document_name, $fr_zoom_comment, $fr_zoom_document_file, $id){
					$n = self::getConn()->prepare('
													UPDATE `ar_analyze_risks` SET 
														   `fr_zoom_link` =?,
														   `fr_zoom_obs` =?,
														   `fr_zoom_explanation_fields` =?,
														   `fr_zoom_notes_explanation` =?,
														   `fr_zoom_document_name` =?,
														   `fr_zoom_comment` =?,
														   `fr_zoom_document_file` =?
													WHERE  `id_risk` =? ');
											
					$n->execute(array($fr_zoom_link,$fr_zoom_obs, $fr_zoom_explanation_fields, $fr_zoom_notes_explanation, $fr_zoom_document_name, $fr_zoom_comment, $fr_zoom_document_file, $id));
		}
			
		
		
		
		static function update_zoom_ia_save($ia_zoom_link, $ia_zoom_obs, $ia_zoom_explanation_fields, $ia_zoom_notes_explanation, $ia_zoom_document_name, $ia_zoom_comment, $ia_zoom_document_file, $id){
					$n = self::getConn()->prepare('
													UPDATE `ar_analyze_risks` SET 
														   `ia_zoom_link` =?,
														   `ia_zoom_obs` =?,
														   `ia_zoom_explanation_fields` =?,			  
														   `ia_zoom_notes_explanation` =?,
														   `ia_zoom_document_name` =?,
														   `ia_zoom_comment` =?,
														   `ia_zoom_document_file` =?
													WHERE  `id_risk` =? ');
											
					$n->execute(array($ia_zoom_link, $ia_zoom_obs, $ia_zoom_explanation_fields, $ia_zoom_notes_explanation, $ia_zoom_document_name, $ia_zoom_comment, $ia_zoom_document_file, $id));
		}
		
		static function update_zoom_le_save($le_zoom_link, $le_zoom_obs, $le_zoom_explanation_fields, $le_zoom_notes_explanation, $le_zoom_document_name, $le_zoom_comment, $le_zoom_document_file, $id){
					$n = self::getConn()->prepare('
													UPDATE `ar_analyze_risks` SET 
														   `le_zoom_link` =?,
														   `le_zoom_obs` =?,
														   `le_zoom_explanation_fields` =?,
														   `le_zoom_notes_explanation` =?,
														   `le_zoom_document_name` =?,
														   `le_zoom_comment` =?,
														   `le_zoom_document_file` =?
													WHERE  `id_risk` =? ');
											
					$n->execute(array($le_zoom_link, $le_zoom_obs, $le_zoom_explanation_fields, $le_zoom_notes_explanation, $le_zoom_document_name, $le_zoom_comment, $le_zoom_document_file, $id));
		}
		
		static function update_ec_value_pie_table($items_in_asset, $group_value, $items_in_group, $group_as_percent_of_asset, $subgroup_value, $items_ind_subgroup, $subgroup_as_percent_of_asset, $subgroup_as_percent_of_group, $items_value_as_percent_of_asset, $group_id, $subgroup_id){
					$n = self::getConn()->prepare('
													UPDATE `ec_value_pie_table` SET 
														   `items_in_asset` =?,
														   `group_value` =?,
														   `items_in_group` =?,
														   `group_as_percent_of_asset` =?,
														   `subgroup_value` =?,
														   `items_ind_subgroup` =?,
														   `subgroup_as_percent_of_asset` =?,
														   `subgroup_as_percent_of_group` =?,
														   `items_value_as_percent_of_asset` =?
														   
													WHERE  `group_id` =? AND
														   `subgroup_id` =? 
														   
														   ');
											
					$n->execute(array($items_in_asset, $group_value, $items_in_group, $group_as_percent_of_asset, $subgroup_value, $items_ind_subgroup, $subgroup_as_percent_of_asset, $subgroup_as_percent_of_group, $items_value_as_percent_of_asset, $group_id, $subgroup_id));
		}
		
		static function update_group_name($name, $id){
					$n = self::getConn()->prepare('
													UPDATE  `ec_groups_value` SET 
												   `name` =?
													WHERE  `id` =? ');
											
					$n->execute(array($name, $id));
		}
		
		static function update_group_sd($name,$value_ratio,$method_for_quantifying, $id){
					$n = self::getConn()->prepare('
													UPDATE  `ec_groups_value` SET 
												   `name` =?,
												   `value_ratio` =?,
												   `method_for_quantifying` =?
													WHERE  `id` =? ');
											
					$n->execute(array($name,$value_ratio,$method_for_quantifying, $id));
		}
		
		static function update_group_points($points, $id){
					$n = self::getConn()->prepare('
													UPDATE  `ec_groups_value` SET 
												   `points` =?
													WHERE  `id` =? ');
											
					$n->execute(array($points, $id));
		}

		static function update_subgroup_points($points, $id){
					$n = self::getConn()->prepare('
													UPDATE  `ec_subgroups_value` SET 
												   `points` =?
													WHERE  `id` =? ');
											
					$n->execute(array($points, $id));
		}

		static function update_subgroup_name($name, $id){
					$n = self::getConn()->prepare('
													UPDATE  `ec_subgroups_value` SET 
												   `name` =?
													WHERE  `id` =? ');
											
					$n->execute(array($name, $id));
		}

		static function update_subgroup_numbers_of_items($numbers_of_items, $id){
					$n = self::getConn()->prepare('
													UPDATE  `ec_subgroups_value` SET 
												   `numbers_of_items` =?
													WHERE  `id` =? ');
											
					$n->execute(array($numbers_of_items, $id));
		}
		
		static function update_subgroup_soma_for_single($soma_for_single, $id){
					$n = self::getConn()->prepare('
													UPDATE  `ec_subgroups_value` SET 
												   `soma_for_single` =?
													WHERE  `id` =? ');
											
					$n->execute(array($soma_for_single, $id));
		}

		static function update_zoom_list_type_list($type_list, $id){
					$n = self::getConn()->prepare('
													UPDATE  `ir_risks` SET 
												   `type_list_zoom` =?
													WHERE  `id` =? ');
											
					$n->execute(array($type_list, $id));
		}

		static function update_zoom_list_type_list_o($type_list, $id, $option_id){
					$n = self::getConn()->prepare('
													UPDATE  `ar_zoom_list_items_affected_o` SET 
												   `type_list` =?
													WHERE  `risk_id` =? AND option_id=? ');
											
					$n->execute(array($type_list, $option_id, $id));
		}

		static function update_group($name,$definition,$notes,$id){
					$n = self::getConn()->prepare('
													UPDATE  `ec_groups_value` SET 
												   `name` =?,
												   `definition` =?,
												   `notes` =?
													WHERE  `id` =? ');
											
					$n->execute(array($name,$definition,$notes,$id));
		}
		
		static function update_subgroup($name,$definition,$notes,$id){
					$n = self::getConn()->prepare('
													UPDATE  `ec_subgroups_value` SET 
												   `name` =?,
												   `definition` =?,
												   `notes` =?
													WHERE  `id` =? ');
											
					$n->execute(array($name,$definition,$notes,$id));
		}

				
		static function update_ec_values_and_their_scores($value_pie_value, $value_pie_type, $value_scale_value, $result, $id){
					$n = self::getConn()->prepare('
													UPDATE  `ec_values_and_their_scores` SET  
												   `value_pie_value` =?,	 
												   `value_pie_type` =?,	 
												   `value_scale_value` =?,
												   `result` =?
													WHERE  `id` =? ');
											
					$n->execute(array($value_pie_value,$value_pie_type, $value_scale_value, $result, $id));
		}

		
		
/*=================================================delete======================================================*/		
		
		static function delete_ec_mixed_values($id){
				$n1 = self::getConn()->prepare('DELETE FROM `ec_mixed_values` WHERE id=?');		
				$n1->execute(array($id));	
		}
			
		static function delete_ec_value_pie_table(){
				$n1 = self::getConn()->prepare('DELETE FROM `ec_value_pie_table` WHERE project_id="'.$_SESSION['project_id'].'"');		
				$n1->execute(array());	
		}
		
		static function delete_ec_value_pie_table_by_group($id){
				$n1 = self::getConn()->prepare('DELETE FROM `ec_value_pie_table` WHERE group_id=?');		
				$n1->execute(array($id));	
		}
			
		static function delete_ec_value_pie_table_by_subgroup($id){
				$n1 = self::getConn()->prepare('DELETE FROM `ec_value_pie_table` WHERE subgroup_id=?');		
				$n1->execute(array($id));	
		}
			
		static function delete_ec_groups_value($id){
				$n1 = self::getConn()->prepare('DELETE FROM `ec_groups_value` WHERE id=?');
				$n1->execute(array($id));	
		}
			
		static function delete_ec_subgroups_value_by_id($id){
				$n1 = self::getConn()->prepare('DELETE FROM `ec_subgroups_value` WHERE id=?');
				$n1->execute(array($id));	
		}
		
		static function delete_ec_subgroups_value_by_group($id){
				$n1 = self::getConn()->prepare('DELETE FROM `ec_subgroups_value` WHERE group_id=?');
				$n1->execute(array($id));	
		}
		
		static function delete_ec_values_and_their_scores($id){
				$n1 = self::getConn()->prepare('DELETE FROM `ec_values_and_their_scores` WHERE id=?');		
				$n1->execute(array($id));	
		}
		
		static function delete_ec_values_and_their_scores_by_subgroup($id){
				$n1 = self::getConn()->prepare('DELETE FROM `ec_values_and_their_scores` WHERE subgroup_id=?');		
				$n1->execute(array($id));	
		}
		
		static function delete_ar_zoom_list_items_affected($id){
				$n1 = self::getConn()->prepare('DELETE FROM `ar_zoom_list_items_affected` WHERE id=?');		
				$n1->execute(array($id));	
		}
		
		static function delete_ar_zoom_list_items_affected_by_table($id){
				$n1 = self::getConn()->prepare('DELETE FROM `ar_zoom_list_items_affected` WHERE id_ec_value_pie_table=?');		
				$n1->execute(array($id));	
		}
		
		static function delete_ar_zoom_list_items_affected_o($id){
				$n1 = self::getConn()->prepare('DELETE FROM `ar_zoom_list_items_affected_o` WHERE id=?');		
				$n1->execute(array($id));	
		}
		
		
		
}

?>