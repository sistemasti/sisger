<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");

?>
<div class="card">
	<div class="card-body">
		<h3><?php echo $_SESSION[$_SESSION['lang']]['Subgroups']; ?></h3>
		<div>
		<br>
		<div style="padding: 5px;background-color:#f4fbcd">
		<small><strong><?php echo $_SESSION[$_SESSION['lang']]['Group']; ?>:</strong> <?php 
					$g_name = "";
					$g = Build_value_pie::select_ec_groups_value_id($_GET['group_id']);
					echo $g['name'];
					
					?></small>
		</div>
		<br>
			<table class="table table-sm">
				<thead>
			
				<tr>
					<td style="width: 10px"></td>
					<td><?php echo $_SESSION[$_SESSION['lang']]['Subgroup']; ?></td>
					<td><small><?php echo $_SESSION[$_SESSION['lang']]['Number of items in this subgroup']; ?></small></td>
					<td>
					
					<?php if($g['method_for_quantifying'] == "1"){ ?>
					<small><?php echo $_SESSION[$_SESSION['lang']]['Percentage of the group']; ?></small>
					<?php } ?>
					
					<?php if($g['method_for_quantifying'] == "2"){ ?>
					<small><?php echo $_SESSION[$_SESSION['lang']]['Ratio between value categories']; ?></small>
					<?php } ?>
					
					<?php if($g['method_for_quantifying'] == "3"){ ?>
					<small><?php echo $_SESSION[$_SESSION['lang']]['Ratio between items']; ?></small>
					<?php } ?>
					
					</td>
					
				</tr>
				
				</thead>
				<tbody>
				<?php 
				$totalvalueunites = 0;
				$_SESSION['group_id'] = $_GET['group_id'];																	
				$in = Build_value_pie::select_ec_subgroups_value($_GET['group_id']);
				if($in['num']>0){
				foreach($in['dados'] as $in){
				
				?>
				<tr>
					<td style="width: 10px"></td>
					
					<td><input type="text" class="form-control" id="group_name<?php echo $in['id']; ?>" 
					name="group_name<?php echo $in['id']; ?>" 
					value="<?php echo $in['name']; ?>" 
					onkeyup="if(this.value!=''){subgroup_edit_name(this.value,<?php echo $in['id']; ?>)}" required 
					onclick="view_scores(<?php echo $in['id']; ?>,<?php echo $_GET['group_id']; ?>);$('#zoomSubgroup').show();" 
					onblur="this.style.backgroundColor='#fff';loadZoomSubgroup(<?php echo $in['id']; ?>);document.getElementById('subgroup_selected').value=<?php echo $in['id']; ?>;if(this.value==''){ alert('<?php echo $_SESSION[$_SESSION['lang']]['Fill in the name field']; ?>'); }"></td>
					
					<td><input 
						type="text" 
						class="form-control" 
						id="numbers_of_items<?php echo $in['id']; ?>" 
						name="numbers_of_items<?php echo $in['id']; ?>" 
						value="<?php echo $in['numbers_of_items']; ?>" 
						onkeyup="
						Mascara(this,Integer);
						
						"  
						required 
						onclick="
						view_scores(<?php echo $in['id']; ?>,<?php echo $_GET['group_id']; ?>);
						
						$('#zoomSubgroup').show();
						loadZoomSubgroup(<?php echo $in['id']; ?>);
						
						document.getElementById('subgroup_selected').value=<?php echo $in['id']; ?>;" 
						onblur="if(this.value==0 || this.value ==  ''){ alert('<?php echo $_SESSION[$_SESSION['lang']]['Invalid value']; ?>'); }else{ subgroup_edit_item(this.value,<?php echo $in['id']; ?>); }document.getElementById('group_name<?php echo $in['id']; ?>').style.backgroundColor='#fff'" 
						style="display:inline-block;width:70%" 
						onKeyDown="Mascara(this,Integer);subgroup_edit_item(this.value,<?php echo $in['id']; ?>);" 
						onKeyPress="Mascara(this,Integer);" >
					</td>
					
					<td>
					<input 
						type="text" 
						class="form-control" 
						name="soma_for_single<?php echo $in['id']; ?>" 
						id="soma_for_single<?php echo $in['id']; ?>" 
						value="<?php echo $in['soma_for_single']; ?>"  
						onkeyup="if(this.value!=''){subgroup_edit_soma_for_single(this.value,<?php echo $in['id']; ?>)};" 
						onkeypress="return keypressed( this , event );"
						onclick="view_scores(<?php echo $in['id']; ?>,<?php echo $_GET['group_id']; ?>);$('#zoomSubgroup').show();
						loadZoomSubgroup(<?php echo $in['id']; ?>);" 
						onblur="view_subgroup(<?php echo $_GET['group_id']; ?>,<?php echo $in['id']; ?>)">
					</td>
					
					<td>
					<a href="javascript:void(0)" onclick="if(confirm('Do you really want to delete?')){ subgroup_delete(<?php echo $in['id'];?>,<?php echo $_GET['group_id']; ?>)}">
									<button type="button" class="btn btn-danger btn-sm" style="float:right;">
<i class="fas fa-trash-alt"></i></button></a>
					</td>
					
				</tr>
				<?php 
					$totalvalueunites = $totalvalueunites+($in['numbers_of_items']*$in['soma_for_single']);
				}
				}else{
				?>
					<tr><td colspan="3"><center><?php echo $_SESSION[$_SESSION['lang']]['no subgroups registered']; ?></center></td></tr>
			<?php		
					
					
				}	
				?>
				
								
				<!--
				<tr>
					<td><input type="radio"></td>
					<td><a href="#">Value subgroup A</a></td>
					
					<td>2423
					
					</td>
				</tr>
				
				</tbody> 
				<tbody>
				<tr>
					<td><input type="radio"></td>
					<td><a href="#">Value subgroup B</a></td>
					
					<td>9800
					
					
				</tr>
				-->
				</tbody>
			</table>
			<br>
			<br>
			<br>
			<strong> <?php echo $_SESSION[$_SESSION['lang']]['Total numbers of items in this Group']; ?>: </strong> <span class="btn btn-block btn-outline-success btn-xs" id="totalNumberOfItens">
			<?php
				
				$s = Build_value_pie::select_sum_itens_subgroup($_GET['group_id']);
				if($s['total'] !=""){
				echo $s['total'];
				}else{ 
				echo "0";
				}

			?>
			</span>
			<br>
			<?php if($g['method_for_quantifying'] == "1"){ ?>
			<div id="mustTotal">
			<?php }else{ ?>
			<div id="mustTotal" style="display:none">
			<?php }?>
			
			<strong> <?php echo $_SESSION[$_SESSION['lang']]['Must total 100%']; ?>: </strong> <span class="btn btn-block btn-outline-info btn-xs">
			<?php
				
				$t = Build_value_pie::select_soma_for_single_subgroup($_GET['group_id']);
				if($t['total'] !=""){
				echo $t['total'];
				}else{ 
				echo "0";
				}

			?>
			</span>
			</div>
			
			
			<?php if($g['method_for_quantifying'] == "3"){ ?>
			<div id="totalValueUnites">
			<?php }else{ ?>
			<div id="totalValueUnites" style="display:none">
			<?php }?>
			
				<strong> <?php echo $_SESSION[$_SESSION['lang']]['Total value units']; ?>: </strong> <span class="btn btn-block btn-outline-info btn-xs">
				<?php
					
					echo $totalvalueunites;
					//Build_value_pie::update_group_points($totalvalueunites, $_GET['group_id']);
				?>
				</span>
			</div>
			
			<br>
			<br>
			<?php
			//print_r($_GET['sid']);
			if(isset($_GET['sid']) && $_GET['sid'] !=0){ ?>
			<div  id="zoomSubgroup">
			<?php }else{ ?>
			<div  id="zoomSubgroup" style="display:none">
			<?php } ?>
			<button type="button" class="btn btn-block bg-gradient-warning btn-sm" data-toggle="modal" data-target="#modal-sub"><?php echo $_SESSION[$_SESSION['lang']]['Zoom Description']; ?></button>
			</div>
			
			<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="
			if(document.getElementById('fd_new_subgroup').style.display=='none'){
				document.getElementById('fd_new_subgroup').style.display='block'
			}else{
				document.getElementById('fd_new_subgroup').style.display='none'
			}
			"><?php echo $_SESSION[$_SESSION['lang']]['insert a new subgroup']; ?></button>
			<div id="fd_new_subgroup" style="display:none">
			<input type="text" class="form-control" id="subgroup_name"	name="subgroup_name" value="" required placeholder="Subgroup name">
			<input type="text" class="form-control" id="subgroup_itens"	name="subgroup_itens" value="" required placeholder="Number of itemns" onKeyDown="Mascara(this,Integer);" onKeyPress="Mascara(this,Integer);" onKeyUp="Mascara(this,Integer);">
			
			
			<?php if($g['method_for_quantifying'] == "1"){ ?>
			<input type="text" class="form-control" name="soma_for_single" id="soma_for_single" value="" placeholder="Percent of the group" onkeypress="return keypressed( this , event );">
			<?php }?>
			
			
			<?php if($g['method_for_quantifying'] == "2"){ ?>
			<input type="text" class="form-control" name="soma_for_single" id="soma_for_single" value="" placeholder="Ratio between value categories" onkeypress="return keypressed( this , event );">
			<?php }?>
			
			
			<?php if($g['method_for_quantifying'] == "3"){ ?>
			<input type="text" class="form-control" name="soma_for_single" id="soma_for_single" value="" placeholder="Ratio between items" onkeypress="return keypressed( this , event );">
			<?php }?>
			
			<button type="button" class="btn btn-block bg-gradient-success btn-sm" onclick="if(document.getElementById('subgroup_name').value==''){alert('fill in the name field')}else{subgroup_register(document.getElementById('subgroup_name').value,document.getElementById('subgroup_itens').value,document.getElementById('soma_for_single').value,<?php echo $_GET['group_id']; ?>)}">save</button>
			</div>
			
					<!--#################### MODAL SUBGROUP-->
				<div class="modal fade" id="modal-sub">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title"><?php echo $_SESSION[$_SESSION['lang']]['Subgroup description']; ?></h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
						<form id="frmUpdateSubGroup"  name="frmUpdateSubGroup" method="post">
						<input type="hidden" class="form-control" id="subgroup_selected" name="subgroup_selected" value="" required>
							<div class="form-group">
								<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Name of this subgroups']; ?></label>
								<input type="text" class="form-control" id="nameSubgroup" name="nameSubgroup" placeholder="" value="<?PHP echo $g_name; ?>" required>
								</div>
								
								
								<div class="form-group">
								<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Definition']; ?></label>
								<textarea name="definitioSubgroup" id="definitioSubgroup" class="form-control" ></textarea>
								</div>
							
								<div class="form-group">
									<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Notes']; ?></label>
									<textarea name="noteSubgroup" id="noteSubgroup" class="form-control" ></textarea>
								</div>
							
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $_SESSION[$_SESSION['lang']]['Close']; ?></button>
							<button type="button" class="btn btn-primary" onclick="if(document.getElementById('nameSubgroup').value==''){ alert('Fill the subgroup name');  }else{subgroup_update();view_subgroup(document.getElementById('group_selected_for_all').value); $('#modal-sub').modal('hide');}"><?php echo $_SESSION[$_SESSION['lang']]['Save changes']; ?></button>
						</div>
						</form>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
					</div>	
			
			<!--
			<hr>
			<button type="button" class="btn btn-block bg-gradient-secondary btn-sm">Value Pie for all the asset</button>																<button type="button" class="btn btn-block bg-gradient-secondary btn-sm">Value Pie for the select group</button>													<button type="button" class="btn btn-block bg-gradient-secondary btn-sm">Value Pie as table</button>-->
			<br>
			
		</div>	
	</div>
</div>