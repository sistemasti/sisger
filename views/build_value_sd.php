<?php

require_once("header.php");
if($_SESSION['perfil_logado'] != "1" && $_SESSION['perfil_logado'] != "2" && $_SESSION['perfil_logado'] != "3"){ 

	echo'<script language= "JavaScript">alert("'.$_SESSION[$_SESSION['lang']]['You dont have permission to access this page'].'");location.href="index"</script>';

} 

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
            <h1><?php echo $_SESSION[$_SESSION['lang']]['Build the value pie']; ?></h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>-->
			
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

       
<div class="row">
	
		
			
			<!-- /.card-header -->
			
				<div class="col-sm-6 col-md-6">
				
				<div class="card">
					<div class="card-body">
					<h3><?php echo $_SESSION[$_SESSION['lang']]['Groups']; ?></h3>
						<div>
						<br>
							<table class="table table-sm">
								<thead>
									<tr>
									  <th><small><?php echo $_SESSION[$_SESSION['lang']]['Groups']; ?></small></th>
									  <th style="width:19%;"><small><?php echo $_SESSION[$_SESSION['lang']]['Value ratio between groups']; ?></small></th>                
									  <th><small><?php echo $_SESSION[$_SESSION['lang']]['Method for quantifying subgroups within each group']; ?></small></th>                
									  <th><small></small></th>                
									
									</tr>
								</thead>
								<tbody>
								
								<?php 
								
								$in = Build_value_pie::select_ec_groups_value();
								
								$x=0;
								$totalGrupos = $in['num'];
								if($in['num'] > 0){												
								foreach($in['dados'] as $in){
											
								?>
								<tr id="row_group<?php echo $in['id'];?>">
									
									<td >
									<div class="form-group">
											
									<input type="text" class="form-control" id="group_name<?php echo $in['id']; ?>" name="group_name<?php echo $in['id']; ?>" value="<?php echo $in['name']; ?>" onkeyup="
									if(this.value != ''){
										
										group_edit(this.value,document.getElementById('value_ratio_<?php echo $in['id']; ?>').value,document.getElementById('method_for_quantifying_<?php echo $in['id']; ?>').value,<?php echo $in['id']; ?>);
										
										$('#group_selected_for_all').val(<?php echo $in['id']; ?>); 
										atualiza_value_pie_table();
										$('#group_selected').val(<?php echo $in['id']; ?>); 
										}
										
										
										" 
										onclick="
										view_subgroup(<?php echo $in['id']; ?>);
										$('#groupOption').show();
										$('#group_selected_for_all').val(<?php echo $in['id']; ?>); 
										$('#group_selected').val(<?php echo $in['id']; ?>); 
										document.getElementById('scores_column').style.display='none';
										"
										onblur="
										if(this.value==''){ alert('Fill in the name field'); 
										}" 
										
										style="width:86%;display:inline-block" required> 
										
									 </div>
									</td>
									<td>							
										<input type="text" class="form-control" name="value_ratio_<?php echo $in['id']; ?>" id="value_ratio_<?php echo $in['id']; ?>" 
										
										value="<?php echo $in['value_ratio']; ?>"
										
										onkeyup="
										
										group_edit(document.getElementById('group_name<?php echo $in['id']; ?>').value,this.value,document.getElementById('method_for_quantifying_<?php echo $in['id']; ?>').value,<?php echo $in['id']; ?>); " 
										onkeypress="return keypressed( this , event );"
										
										onclick="
										
										view_subgroup(<?php echo $in['id']; ?>);	
										
										$('#groupOption').show();$('#group_selected_for_all').val(<?php echo $in['id']; ?>); 
										
										$('#group_selected').val(<?php echo $in['id']; ?>);
										
										
										
										
										
										"

										>
									
									</td>
									<td>
									
										<div class="form-group">
											
											 <select class="form-control" id="method_for_quantifying_<?php echo $in['id']; ?>"
											name="method_for_quantifying_<?php echo $in['id']; ?>" onchange="group_edit(document.getElementById('group_name<?php echo $in['id']; ?>').value,document.getElementById('value_ratio_<?php echo $in['id']; ?>').value,this.value,<?php echo $in['id']; ?>);" onclick="view_subgroup(<?php echo $in['id']; ?>);$('#groupOption').show();$('#group_selected_for_all').val(<?php echo $in['id']; ?>); $('#group_selected').val(<?php echo $in['id']; ?>); document.getElementById('scores_column').style.display='none';" >
												<option value="1" <?php if($in['method_for_quantifying'] == "1"){ echo "selected"; } ?>><?php echo $_SESSION[$_SESSION['lang']]['Percent of the group']; ?></option>
												<option value="2" <?php if($in['method_for_quantifying'] == "2"){ echo "selected"; } ?>><?php echo $_SESSION[$_SESSION['lang']]['Ratio between subgroups']; ?></option>
												<option value="3" <?php if($in['method_for_quantifying'] == "3"){ echo "selected"; } ?>><?php echo $_SESSION[$_SESSION['lang']]['Ratio between items']; ?></option>
											</select>
										  </div>
									</td>
									<td>
									
																			
										<a href="javascript:void(0)" onclick="if(confirm('Do you really want to delete?')){ group_delete(<?php echo $in['id'];?>)}">
									<button type="button" class="btn btn-danger btn-sm" style="margin-top:5px;">
<i class="fas fa-trash-alt"></i></button></a>
									
									</td>
									
									
								</tr>
								<?php 
								
								$x++;
										}
								}else{
									?>
								<tr>
									
									<td>
									<?php echo $_SESSION[$_SESSION['lang']]['no groups registered for this project']; ?>
									</td>
									
									
								</tr>	
									
								<?php 	
								}		
								?>
								</tbody>
							</table>
							
							
							
							<script>

								function group_delete(id) {			
								  var i = '#row_group'+id;
								  $.ajax({
									type: "POST",
									url: "ajax_process/group_delete.php",
									data: {
										id: id,
										status: status
									},
									success: function(data) {
									  //$(i).css({"display":"none"});
									  atualiza_value_pie_table();
									  location.reload();
									}
								  });
								}
								
								
								
								function group_edit(name,value_ratio,method_for_quantifying,id) {	
									
									//alert(name);	
									$.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/group_edit_sd.php?name="+name+"&value_ratio="+value_ratio+"&method_for_quantifying="+method_for_quantifying+"&id="+id,
									data: {
										name:name		
									},
									processData: false,
									contentType: false,
									success: function(data) {
										atualiza_value_pie_table();
										//location.reload();
									}
									});
								}
								
								
								function group_edit_name(name,id) {	
									
									//alert(name);	
									$.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/group_edit_name.php?name="+name+"&id="+id,
									data: {
										name:name		
									},
									processData: false,
									contentType: false,
									success: function(data) {
										atualiza_value_pie_table();
										//location.reload();
									}
									});
								}
							
							
								function subgroup_edit_name(name,id) {	
									
									//alert(name);	
									$.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/subgroup_edit_name.php?name="+name+"&id="+id,
									data: {
										name:name		
									},
									processData: false,
									contentType: false,
									success: function(data) {
										atualiza_value_pie_table();
										//location.reload();
									}
									});
								}
														
								function subgroup_edit_soma_for_single(soma_for_single,id) {	
									
									//alert(name);	
									$.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/subgroup_edit_soma_for_single.php?soma_for_single="+soma_for_single+"&id="+id,
									data: {
										name:name		
									},
									processData: false,
									contentType: false,
									success: function(data) {
										atualiza_value_pie_table();
										//location.reload();
									}
									});
								}
												
								function subgroup_edit_item(item,id) {	
									
									//alert(name);	
									$.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/subgroup_edit_itens.php?item="+item+"&id="+id,
									data: {
										name:name		
									},
									processData: false,
									contentType: false,
									success: function(data) {
										document.getElementById('totalNumberOfItens').innerHTML=data;
										atualiza_value_pie_table();
									}
									});
								}
							
								function view_subgroup(group_id,sid=0) {	
									//document.getElementById('subgroup_selected').value=group_id;
									//alert(name);	
									$.ajax({
									dataType: 'html',
									type: "POST",
									url: "ajax_process/subgroup_load_html_sd.php?group_id="+group_id+"&sid="+sid,
									data: {
										name:name,		
										sid:sid		
									},
									processData: false,
									contentType: false,
									success: function(data) {
										document.getElementById('subgroup_column').style.display='block';
										document.getElementById('subgroup_column').innerHTML=data;
										document.getElementById('btnChart').innerHTML="<button type='button' class='btn btn-block bg-gradient-secondary btn-sm'  data-toggle='modal' data-target='#modal-graph"+group_id+"'> "+<?php echo '"'.$_SESSION[$_SESSION['lang']]['Value Pie for the Group selected above'].'"'; ?>+" </button>";
										if(sid !=0){
											
											loadZoomSubgroup(sid);
											
										}
									}
									}); 
									
									
									
									
								}
																								
								function view_scores(subgroup_id) {	
									
									//alert(name);	
									$.ajax({
									dataType: 'html',
									type: "POST",
									url: "ajax_process/scores_load_html.php?subgroup_id="+subgroup_id,
									data: {
										name:name		
									},
									processData: false,
									contentType: false,
									success: function(data) {
										document.getElementById('scores_column').style.display='block'
										document.getElementById('scores_column').innerHTML=data;
									}
									});
								}
																	
								function calculate_scores(id) {	
									
									var score	= document.getElementById('ev_'+id).value;
									var prob	= document.getElementById('pb_'+id).value; 
									var total	= score*prob;
									
									document.getElementById('score_'+id).innerHTML  = score;
									document.getElementById('prob_'+id).innerHTML  = prob;
									document.getElementById('total_'+id).innerHTML  = total;

									$.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/scores_update.php?value_pie_value="+score+"&value_scale_value="+prob+"&result="+total+"&id="+id,
									data: {
										name:name		
									},
									processData: false,
									contentType: false,
									success: function(data) {
										//alert(data['total']);
										//alert(data['total_group']);
										//html_points_subgroup
										document.getElementById('html_points_subgroup').innerHTML=data['total'];
										document.getElementById('html_points_subgroup_subgroup').innerHTML=data['total_group'];
										atualiza_value_pie_table();
									}
									});

									
									
									}
															
								function subgroup_register(name,itens,soma_for_single,group_id) {	
									
									//alert(name);	
								/**/  $.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/subgroup_register_sd.php?name="+name+"&itens="+itens+"&soma_for_single="+soma_for_single+"&group_id="+group_id,
									data: {
										name:name		
									},
									processData: false,
									contentType: false,
									success: function(data) {
										
										view_subgroup(group_id);
										window.scrollTo(0,0);
										atualiza_value_pie_table();
									}
									});
								}
								
							
								function score_register(subgroup_id,new_ev,new_pb) {	
									
									//alert(name);	
								/**/  $.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/scores_register.php?subgroup_id="+subgroup_id+"&value_pie_value="+new_ev+"&value_scale_value="+new_pb,
									data: {
										name:name		
									},
									processData: false,
									contentType: false,
									success: function(data) {
										
										view_subgroup(document.getElementById('group_selected_for_all').value);
										view_scores(subgroup_id);
										document.getElementById('html_points_subgroup_subgroup').innerHTML=data;
										window.scrollTo(0,0);
										atualiza_value_pie_table();
									}
									});
								}
							</script>
							
							<small><em><?php echo $_SESSION[$_SESSION['lang']]['Numbers of Groups']; ?>: <strong><?php echo $x; ?></em></strong></small>
							
							
							<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="
							if(document.getElementById('fd_new_group').style.display=='none'){
								document.getElementById('fd_new_group').style.display='block'
							}else{
								document.getElementById('fd_new_group').style.display='none'
							}
							"><?php echo $_SESSION[$_SESSION['lang']]['insert a new group']; ?></button>
							<div id="fd_new_group" style="display:none">
							<input type="text" class="form-control" id="group_name"	name="group_name" value="" required placeholder="Group name">
							
							<input type="text" class="form-control" id="value_ratio" name="value_ratio" value="" required placeholder="Value ratio between groups" onkeypress="return keypressed( this , event );">
							
							
							<select class="form-control" id="method_for_quantifying"
											name="method_for_quantifying">
												<option value="1" ><?php echo $_SESSION[$_SESSION['lang']]['Percent of the group']; ?></option>
												<option value="2" ><?php echo $_SESSION[$_SESSION['lang']]['Ratio between subgroups']; ?></option>
												<option value="3" ><?php echo $_SESSION[$_SESSION['lang']]['Ratio between items']; ?></option>
											</select>
							<button type="button" class="btn btn-block bg-gradient-success btn-sm" onclick="if(document.getElementById('group_name').value=='' ){alert('fill in the name field')}else{group_register(document.getElementById('group_name').value,document.getElementById('value_ratio').value,document.getElementById('method_for_quantifying').value)}"><?php echo $_SESSION[$_SESSION['lang']]['save']; ?></button>
							</div>
							<script>


								function group_register(name,value_ratio,method_for_quantifying) {	
									
									//alert(name);	
									$.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/group_register_sd.php?name="+name+"&value_ratio="+value_ratio+"&method_for_quantifying="+method_for_quantifying,
									data: {
										name:name		
									},
									processData: false,
									contentType: false,
									success: function(data) {
										//document.getElementById('pb_'+id).value;
										atualiza_value_pie_table();										
										location.reload();
										
									}
									});
								}
							</script>
							
							<hr>
							
							
								<button type="button" class="btn btn-block bg-gradient-warning btn-sm" data-toggle="modal" data-target="#modal-lg" onclick="loadZoom(document.getElementById('group_selected_for_all').value)"><?php echo $_SESSION[$_SESSION['lang']]['Zoom Description']; ?></button>
						
<script>
								function loadZoom(id) {	
									
									//alert(name);	
									$.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/select_group_info.php?id="+id,
									data: {
										name:name		
									},
									processData: false,
									contentType: false,
									success: function(data) {
										$("#nameGroup").val(data['name']);
										$("#definition").html(data['definition']);
										$("#note").html(data['notes']);
										
										//location.reload();
									}
									});
								}

								function loadZoomSubgroup(id) {	
									
									//alert(name);	
									$.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/select_subgroup_info.php?id="+id,
									data: {
										name:name
									},
									processData: false,
									contentType: false,
									success: function(data) {
										$("#nameSubgroup").val(data['name']);
										$("#definitioSubgroup").html(data['definition']);
										$("#noteSubgroup").html(data['notes']);
										
										//location.reload();
									}
									});
								}
							

								function subgroup_delete(id,group_id) {	
										//alert(group_id);								
								  var i = '#row_group'+id;
								  $.ajax({
									type: "POST",
									url: "ajax_process/subgroup_delete.php",
									data: {
										id: id,
										status: status
									},
									success: function(data) {
									  //$(i).css({"display":"none"});
									  atualiza_value_pie_table();
									  view_subgroup(group_id);
									}
								  });
								}

								function value_their_delete(id, subgroup) {			
								  var i = '#row_group'+id;
								  $.ajax({
									type: "POST",
									url: "ajax_process/value_their_delete.php",
									data: {
										id: id,
										status: status
									},
									success: function(data) {
									  //$(i).css({"display":"none"});
									  view_subgroup(document.getElementById('group_selected_for_all').value);
									  atualiza_value_pie_table();
									  view_scores(subgroup);
									}
								  });
								}
								
				</script>
							
								<button type="button" class="btn btn-block bg-gradient-secondary btn-sm" data-toggle="modal" data-target="#modal-graph" style="margin-top:4px;" onclick="$('#btnSBNTS').show();
							$('#btnSBNTS2').hide();"><?php echo $_SESSION[$_SESSION['lang']]['Value Pie for all the groups']; ?></button>
							<div id="groupOption" style="display:none;margin-top:4px;">
								
								<div id="btnChart" style="margin-top:4px;">
								<button type="button" class="btn btn-block bg-gradient-secondary btn-sm"  data-toggle="modal" data-target="#modal-graph2"><?php echo $_SESSION[$_SESSION['lang']]['Value Pie for the Group selected above']; ?></button>
								</div>
								
							</div>
								
								<button type="button" class="btn btn-block bg-gradient-secondary btn-sm" data-toggle="modal" data-target="#modal-table" onclick="view_value_type(document.getElementById('group_selected_for_all').value)" style="margin-top:4px;"><?php echo $_SESSION[$_SESSION['lang']]['Value Pie as a table']; ?></button>
								
								<script>
								function view_value_type(id) {	
									
									
									$.ajax({
									dataType: 'html',
									type: "POST",
									url: "ajax_process/value_pie_as_table_html_sd.php?id="+id,
									data: {
										name:name		
									},
									processData: false,
									contentType: false,
									success: function(data) {
										atualiza_value_pie_table();
										document.getElementById('valueTable').innerHTML=data;
									}
									});
								}
								</script>
								
							
							
						</div>	
					</div>	
				</div>	
				</div>
				<!--########################################-->
				<!--########################################-->
				
				<input type="hidden" class="form-control" id="group_selected_for_all" name="group_selected_for_all" value="" >
				
				<div class="modal fade" id="modal-lg">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title"><?php echo $_SESSION[$_SESSION['lang']]['Group description']; ?></h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
							<form id="frmUpdateGroup"  name="frmUpdateGroup" method="post">
							<input type="hidden" class="form-control" id="group_selected" name="group_selected" value="" required>
								<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Name of this group']; ?></label>
								<input type="text" class="form-control" id="nameGroup" name="nameGroup" placeholder="" value="" required>
								</div>
								
								
								<div class="form-group">
								<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Definition']; ?></label>
								<textarea name="definition" id="definition" class="form-control" ></textarea>
								</div>
							
								<div class="form-group">
								<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Notes']; ?></label>
								<textarea name="note" id="note" class="form-control" ></textarea>
								</div>
							
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $_SESSION[$_SESSION['lang']]['Close']; ?></button>
							<button type="button" class="btn btn-primary" onclick="if(document.getElementById('nameGroup').value==''){ alert('Fill the group name');  }else{group_update();location.reload();}" ><?php echo $_SESSION[$_SESSION['lang']]['Save changes']; ?></button>
						</div>
						</form>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
					</div>	
					<script>	

						function group_update() {	
	   
							var formulario = document.getElementById('frmUpdateGroup');
							var dados = new FormData(formulario);
						  
							  $.ajax({
								dataType: 'json',
								type: "POST",
								url: "ajax_process/group_update.php",
								data: dados,
								processData: false,
								contentType: false,
								success: function(data) {
									
									atualiza_value_pie_table();
									
								},
								error: function(){
									
									
								}	
							  });
							  alert('data updated successfully');
						}
					
					</script>			
			
					<script>	

						function subgroup_update() {	
	   
							var formulario = document.getElementById('frmUpdateSubGroup');
							var dados = new FormData(formulario);
						  
							  $.ajax({
								dataType: 'json',
								type: "POST",
								url: "ajax_process/subgroup_update.php",
								data: dados,
								processData: false,
								contentType: false,
								success: function(data) {
									
									atualiza_value_pie_table();
									
								},
								error: function(){
									
									
								}	
							  });
							  alert(<?php echo "'".$_SESSION[$_SESSION['lang']]['data updated successfully']."'"; ?>);
							  
						}
					
					</script>					
						
							
				<div class="modal fade" id="modal-table">
					<div class="modal-dialog modal-xl">
						<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title"><?php echo $_SESSION[$_SESSION['lang']]['Value Pie as a Table']; ?></h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" id="valueTable">
							
							
						</div>
						<!--
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div>-->
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
					</div>	
													
				
				<!--########################################-->
				<!--########################################-->
				
				
				
				
				
				<div class="col-sm-6 col-md-6" id="subgroup_column" style="display:none">
				
				</div>
				
				</div>
			
		
	
</div>
									
        <!-- /.row -->

       
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
  
  
  <!-- TODO: transformar em include essas modais -->
  
   
  
  <div class="modal fade" id="modal-graph">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title"><?php echo $_SESSION[$_SESSION['lang']]['Value Pie for all the Groups']; ?></h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
									<div class="col-sm-6 col-md-6">
									<?php 
							if($totalGrupos > 1){
							?>
									<em><?php echo $_SESSION[$_SESSION['lang']]['Show Group sorted by']; ?>:</em>
											<button type="button" class="btn btn-block bg-gradient-info btn-sm" onclick="
											$('#bxPieChart1').hide();
											$('#bxPieChart2').hide();
											$('#bxPieChart3').hide();
											$('#bxPieChart4').hide();
											$('#bxPieChart5').show();
											$('#bxPieChart6').hide();
											$('#bxPieChart7').hide();
											" ><?php echo $_SESSION[$_SESSION['lang']]['sorted by group name']; ?></button>
											
											<button type="button" class="btn btn-block bg-gradient-info btn-sm" onclick="
											$('#bxPieChart1').hide();
											$('#bxPieChart2').hide();
											$('#bxPieChart3').hide();
											$('#bxPieChart4').hide();
											$('#bxPieChart5').hide();
											$('#bxPieChart6').show();
											$('#bxPieChart7').hide();
											" ><?php echo $_SESSION[$_SESSION['lang']]['By size of the group slice']; ?></button>
										
											
											<?php 
											}else{
											?>
											<span style="color: #4b6e80"><em><?php echo $_SESSION[$_SESSION['lang']]['Since there is only one group entered, the Group related buttons have been removed']; ?>.</em></span>
											<br>
											<?php	
											}	
											?><br>
											<button type="button" class="btn btn-block bg-gradient-secondary btn-sm" onclick="
											$('#bxPieChart1').hide();
											$('#bxPieChart2').hide();
											$('#bxPieChart3').hide();
											$('#bxPieChart4').hide();
											$('#bxPieChart5').hide();
											$('#bxPieChart6').hide();
											$('#bxPieChart7').show();
											" ><?php echo $_SESSION[$_SESSION['lang']]['sorted by size of the slice, ASSUMING ALL ITEMS EQUAL']; ?></button>	
											
										
									</div>
									<div class="col-sm-6 col-md-6"  >	
												<em><?php echo $_SESSION[$_SESSION['lang']]['Show Subgroup sorted by']; ?>:</em>
											<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="
											$('#bxPieChart1').hide();
											$('#bxPieChart2').show();
											$('#bxPieChart3').hide();
											$('#bxPieChart4').hide();
											$('#bxPieChart5').hide();
											$('#bxPieChart6').hide();
											$('#bxPieChart7').hide();
											" ><?php echo $_SESSION[$_SESSION['lang']]['sorted by item value']; ?></button>
											
											<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="
											$('#bxPieChart1').hide();
											$('#bxPieChart2').hide();
											$('#bxPieChart3').show();
											$('#bxPieChart4').hide();
											$('#bxPieChart5').hide();
											$('#bxPieChart6').hide();
											$('#bxPieChart7').hide();
											/* $('#btnSBNTS').hide();
											$('#btnSBNTS2').show(); */
											"><?php echo $_SESSION[$_SESSION['lang']]['sorted by size of the slice']; ?></button>
											
											<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="
											$('#bxPieChart1').hide();
											$('#bxPieChart2').hide();
											$('#bxPieChart3').hide();
											$('#bxPieChart4').show();
											$('#bxPieChart5').hide();
											$('#bxPieChart6').hide();
											$('#bxPieChart7').hide();
											"  id="btnSBNTS" ><?php echo $_SESSION[$_SESSION['lang']]['sorted by name of the subgroup']; ?></button>
											
											<?php 
											if($totalGrupos > 1){
											?>
											<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="
											$('#bxPieChart1').show();
											$('#bxPieChart2').hide();
											$('#bxPieChart3').hide();
											$('#bxPieChart4').hide();
											$('#bxPieChart5').hide();
											$('#bxPieChart6').hide();
											$('#bxPieChart7').hide();
											"  id="btnSBNTS" ><?php echo $_SESSION[$_SESSION['lang']]['sorted by group name, then by item value']; ?></button>
											<?php 
											}
											?>
									
													
									</div>		
							</div>		
							<br>
							
							<hr>
							
							<br>
							
							<div class="card card-danger" id="bxPieChart1">
								<div class="card-header">
								<h3 class="card-title"><?php echo $_SESSION[$_SESSION['lang']]['Pie chart by group name, then by item value']; ?></h3>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
									</button>
									<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
								</div>
								</div>
								<div class="card-body">
								<canvas id="pieChart1" ></canvas>
								</div>
								<!-- /.card-body -->
							</div>
							
							<div class="card card-danger" id="bxPieChart2" style="display:none">
								<div class="card-header">
								<h3 class="card-title"><?php echo $_SESSION[$_SESSION['lang']]['Pie chart by Item Value']; ?></h3>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
									</button>
									<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
								</div>
								</div>
								<div class="card-body">
								<canvas id="pieChart2b" ></canvas>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
							<div class="card card-danger" id="bxPieChart3" style="display:none">
								<div class="card-header">
								<h3 class="card-title"><?php echo $_SESSION[$_SESSION['lang']]['Pie chart by size of the slice']; ?></h3>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
									</button>
									<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
								</div>
								</div>
								<div class="card-body">
								<canvas id="pieChart3b" ></canvas>
								</div>
								<!-- /.card-body -->
							</div>
							<div class="card card-danger" id="bxPieChart4" style="display:none">
								<div class="card-header">
								<h3 class="card-title"><?php echo $_SESSION[$_SESSION['lang']]['Pie chart by name of the subgroup']; ?></h3>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
									</button>
									<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
								</div>
								</div>
								<div class="card-body">
								<canvas id="pieChart4b" ></canvas>
								
								</div>
								<!-- /.card-body -->
								
							</div>
							<div class="card card-danger" id="bxPieChart5" style="display:none">
								<div class="card-header">
								<h3 class="card-title"><?php echo $_SESSION[$_SESSION['lang']]['Pie chart by sorted by group name']; ?></h3>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
									</button>
									<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
								</div>
								</div>
								<div class="card-body">
								<canvas id="pieChart5b" ></canvas>
								
								</div>
								<!-- /.card-body -->
								
							</div>
							<div class="card card-danger" id="bxPieChart6" style="display:none">
								<div class="card-header">
								<h3 class="card-title"><?php echo $_SESSION[$_SESSION['lang']]['Pie chart size of the group slice']; ?></h3>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
									</button>
									<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
								</div>
								</div>
								<div class="card-body">
								<canvas id="pieChart6b" ></canvas>
								
								</div>
								<!-- /.card-body -->
								
							</div>
							<div class="card card-danger" id="bxPieChart7" style="display:none">
								<div class="card-header">
								<h3 class="card-title"><?php echo $_SESSION[$_SESSION['lang']]['Pie chart by size of the slice, ASSUMING ALL ITEMS EQUAL']; ?></h3>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
									</button>
									<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
								</div>
								</div>
								<div class="card-body">
								<canvas id="pieChart7b" ></canvas>
								
								</div>
								<!-- /.card-body -->
								
							</div><a href="javascript:void(0)" onclick="document.location.reload(true);"><center><button type="button" class="btn btn-success"><?php echo $_SESSION[$_SESSION['lang']]['close & refresh calculations']; ?></button></center></a>
							
						</div>
						<!--<div class="modal-footer justify-content-between">
							
						</div>-->
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
					</div>	
				

				<!-- 
				####################
				MODAL FOR GROUP 
				###################
				-->	
				
				
					<?php 
					
					$in = Build_value_pie::select_ec_groups_value();
					
					if($in['num'] > 0){												
					foreach($in['dados'] as $in){
								
					?>
								<div class="modal fade" id="modal-graph<?PHP echo $in['id'] ?>">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">	
						<div class="modal-header">
							<h4 class="modal-title"><?php echo $_SESSION[$_SESSION['lang']]['Value Pie for the group selected above']; ?> (<?php echo $in['name'];  ?>)</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
								<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="
							$('#bxPieChartGroup1_<?PHP echo $in['id'] ?>').hide();
							$('#bxPieChartGroup2_<?PHP echo $in['id'] ?>').show();
							$('#bxPieChartGroup3_<?PHP echo $in['id'] ?>').hide();
							
							"><?php echo $_SESSION[$_SESSION['lang']]['sorted by item value']; ?></button>
							
							<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="
							$('#bxPieChartGroup1_<?PHP echo $in['id'] ?>').hide();
							$('#bxPieChartGroup2_<?PHP echo $in['id'] ?>').hide();
							$('#bxPieChartGroup3_<?PHP echo $in['id'] ?>').show();
							
							"><?php echo $_SESSION[$_SESSION['lang']]['sorted by size of the slice']; ?></button>
							
							<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="
							$('#bxPieChartGroup1_<?PHP echo $in['id'] ?>').show();
							$('#bxPieChartGroup2_<?PHP echo $in['id'] ?>').hide();
							$('#bxPieChartGroup3_<?PHP echo $in['id'] ?>').hide();
							
							"><?php echo $_SESSION[$_SESSION['lang']]['sorted by name of the subgroup']; ?></button>
							
							
							
							<br>
							
							<hr>
							
							<br>
							
							<div class="card card-danger" id="bxPieChartGroup1_<?PHP echo $in['id'] ?>">
								<div class="card-header">
								<h3 class="card-title"><?php echo $_SESSION[$_SESSION['lang']]['Pie chart by name of the subgroup']; ?></h3>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
									</button>
									<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
								</div>
								</div>
								<div class="card-body">
								<canvas id="pieChartGroup_itemValue_<?PHP echo $in['id'] ?>" ></canvas>
								</div>
								<!-- /.card-body -->
							</div>
							
							<div class="card card-danger" id="bxPieChartGroup2_<?PHP echo $in['id'] ?>" style="display:none">
								<div class="card-header">
								<h3 class="card-title"><?php echo $_SESSION[$_SESSION['lang']]['Pie chart by item value']; ?></h3>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
									</button>
									<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
								</div>
								</div>
								<div class="card-body">
								<canvas id="pieChartGroup_sizeSlice_<?PHP echo $in['id'] ?>" ></canvas>
								</div>
								<!-- /.card-body -->
							</div>
							
							<div class="card card-danger" id="bxPieChartGroup3_<?PHP echo $in['id'] ?>"  style="display:none">
								<div class="card-header">
								<h3 class="card-title"><?php echo $_SESSION[$_SESSION['lang']]['Pie chart by size of the slice']; ?></h3>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
									</button>
									<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
								</div>
								</div>
								<div class="card-body">
								<canvas id="pieChartGroup_NameOfGroup_<?PHP echo $in['id'] ?>" ></canvas>
								</div>
								<!-- /.card-body -->
							</div>
							
							
							
							<a href="javascript:void(0)" onclick="document.location.reload(true);"><center><button type="button" class="btn btn-success"><?php echo $_SESSION[$_SESSION['lang']]['close & refresh calculations']; ?></button></center></a>
							<!-- /.card -->
						</div><!--
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div>-->
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
					
					</div>	
								<?php 
										}
								}
									?>
								
								
  
  
  <script>

					
											
					function keypressed( obj , e ) {
												 var tecla = ( window.event ) ? e.keyCode : e.which;
												 var texto = obj.value
												 var indexvir = texto.indexOf(",")
												 var indexpon = texto.indexOf(".")
												
												if ( tecla == 8 || tecla == 0 )
													return true;
												if ( tecla != 44 && tecla != 46 && tecla < 48 || tecla > 57 )
													return false;
												if (tecla == 44) { if (indexvir !== -1 || indexpon !== -1) {return false} }
												if (tecla == 46) { if (indexvir !== -1 || indexpon !== -1) {return false} }
											}
					
					
					
					
					
  function project_active(id,status) {			
	  var i = '#row'+id;
	  $.ajax({
		type: "POST",
		url: "ajax_process/project_active.php",
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
	
  function project_delete(id) {			
	  var i = '#row'+id;
	  $.ajax({
		type: "POST",
		url: "ajax_process/project_delete.php",
		data: {
			id: id
		},
		success: function(data) {
		  $(i).css({"display":"none"});
		  alert('Record deleted successfully');
		  location.reload();
		}
	  });
	}
	
	function atualiza_value_pie_table() {			
	  //var i = '#row'+id;
	  $.ajax({
		type: "POST",
		dataType: 'json',
		url: "ajax_process/atualiza_value_pie_table_sd.php",
		data: {
			
		},
		success: function(data) {
			//alert('1');
		 
		},
		error: function(){
			//alert('2');						
									
		}
	  });
	}
	
  </script>
  
  <!-- ChartJS 
<script src="../../plugins/chart.js/Chart.min.js"></script>-->
<?php

require_once("footer.php");

?>
<script>
 
		
		window.randomScalingFactor = function() {
			return Math.round(Samples.utils.rand(0, 100));
		};
		
		<?php 
				$bgColors = "";
				$name = "";
				$data = "";
				$in = Build_value_pie::select_ec_values_for_table_by_group();
				foreach($in['dados'] as $in){
						
						$a = Build_value_pie::select_sum_soma_for_single_by_group($in['group_id']);
						$b = (float)$in['groupRatio'];
						$c = (float)$in['subgroupRatio'];
						$d = (float)$in['numbers_of_items'];
						
						$bgColors 	.= "'".random_color()."',";
						$name 		.= "'".$in['group_name']."',";
						$data 		.= ($b*100)/$a['total'].",";
						
						
				}	
		?>
		var barChartData = {
			datasets: [{
				backgroundColor: [
				<?php echo substr($bgColors,0,-1); ?>			
				
				],
				data: [<?php echo substr($data,0,-1); ?>]
			}],
			
			

			
			labels: [
				<?php echo substr($name,0,-1); ?>
			]

		};
		
		
		
		///VALUE PIE FOR ALL THE GROUPS: PIE BY ITEM VALUE
		<?php 
				$bgColors2 = "";
				$name2 = "";
				$data2 = "";
				$in2 = Build_value_pie::select_ec_values_for_table_order_by_item_values_sd_TABLE();
				foreach($in2['dados'] as $in2){
						
						/* $a = Build_value_pie::select_sum_soma_for_single_by_group($in2['group_id']);
						$b = (float)$in2['groupRatio'];
						$c = (float)$in2['subgroupRatio'];
						$d = (float)$in2['numbers_of_items']; */
						
						$bgColors2 	.= "'".random_color()."',";
						$name2 		.= "'".$in2['group_value'].";".$in2['subgroup_value']."',";
						$data2 		.= $in2['subgroup_as_percent_of_asset'].",";
						
						
						
				}	
		?>
		var barChartData1b = {
			datasets: [{
				backgroundColor: [
				<?php echo substr($bgColors2,0,-1); ?>
				],
				data: [<?php echo substr($data2,0,-1); ?>]
			}],
			
			

			
			labels: [
				<?php echo substr($name2,0,-1); ?>
			]

		};
		
		
		
		
		///VALUE PIE FOR ALL THE GROUPS: Pie chart by size of the slice
		<?php 
				$bgColors2 = "";
				$name2 = "";
				$data2 = "";
				$in2 = Build_value_pie::select_ec_values_for_table_size_of_the_sliece_sd_TABLE();
				foreach($in2['dados'] as $in2){
						
						$bgColors2 	.= "'".random_color()."',";
						$name2 		.= "'".$in2['group_value'].";".$in2['subgroup_value']."',";
						$data2 		.= $in2['subgroup_as_percent_of_asset'].",";
				}	
		?>
		var barChartData1c = {
			datasets: [{
				backgroundColor: [
				<?php echo substr($bgColors2,0,-1); ?>
				],
				data: [<?php echo substr($data2,0,-1); ?>]
			}],
			
			

			
			labels: [
				<?php echo substr($name2,0,-1); ?>
			]

		};
		
		
		
		///VALUE PIE FOR ALL THE GROUPS: Pie Chart by name of the subgroup
		<?php 
				$bgColors2 = "";
				$name2 = "";
				$data2 = "";
				$in2 = Build_value_pie::select_ec_values_for_table_by_name_of_the_subgroup_sd();
				foreach($in2['dados'] as $in2){
						
						
						
						$bgColors2 	.= "'".random_color()."',";
						$name2 		.= "'".$in2['group_value'].";".$in2['subgroup_value']."',";
						$data2 		.= $in2['subgroup_as_percent_of_asset'].",";
				}	
		?>
		/**/ 
		var barChartData1d = {
			datasets: [{
				backgroundColor: [
				<?php echo substr($bgColors2,0,-1); ?>
				],
				data: [<?php echo substr($data2,0,-1); ?>]
			}],
			
			

			
			labels: [
				<?php echo substr($name2,0,-1); ?>
			]

		}; 
		
		
		
		///VALUE PIE FOR ALL THE GROUPS: Pie Chart by group name, then by item value
		<?php 
				$bgColors2 = "";
				$name2 = "";
				$data2 = "";
				$in2 = Build_value_pie::select_ec_values_for_table_by_group_name_item_value_sd();
				foreach($in2['dados'] as $in2){
						
						$bgColors2 	.= "'".random_color()."',";
						$name2 		.= "'".$in2['group_value'].";".$in2['subgroup_value']."',";
						$data2 		.= $in2['subgroup_as_percent_of_asset'].",";
				}	
		?>
		/**/ 
		var barChartData1e = {
			datasets: [{
				backgroundColor: [
				<?php echo substr($bgColors2,0,-1); ?>
				],
				data: [<?php echo substr($data2,0,-1); ?>]
			}],
			
			

			
			labels: [
				<?php echo substr($name2,0,-1); ?>
			]

		}; 
		
		
		
		///VALUE PIE FOR ALL THE GROUPS: Pie chart by size of the slice, ASSUMING ALL ITEMS EQUAL
		<?php 
				$bgColors2 = "";
				$name2 = "";
				$data2 = "";
				$in2 = Build_value_pie::select_ec_values_for_table_by_assuming_all_sd_TABLE();
				foreach($in2['dados'] as $in2){
						
						$bgColors2 	.= "'".random_color()."',";
						$name2 		.= "'".$in2['group_value'].";".$in2['subgroup_value']."',";
						$data2 		.= $in2['items_ind_subgroup'].",";
						
						/* if($in['numbers_of_items'] != ""){
								$data2 		.= $in['numbers_of_items'].",";
						}else{
								$data2 		.= "0,";
						} */
				}	
		?>
		/**/ 
		var barChartData1f = {
			datasets: [{
				backgroundColor: [
				<?php echo substr($bgColors2,0,-1); ?>
				],
				data: [<?php echo substr($data2,0,-1); ?>]
			}],
			
			

			
			labels: [
				<?php echo substr($name2,0,-1); ?>
			]

		}; 
		
		
		///VALUE PIE FOR ALL THE GROUPS: Pie Chart by sorted by group name 
		<?php 
				$bgColors2 = "";
				$name2 = "";
				$data2 = "";
				$in2 = Build_value_pie::select_ec_values_for_table_by_group_name_sd();
				foreach($in2['dados'] as $in2){
					
						
						$bgColors2 	.= "'".random_color()."',";
						$name2 		.= "'".$in2['group_value']."',";
						$data2 		.= $in2['group_as_percent_of_asset'].",";
						
				}	
		?>
		/**/ 
		var barChartData1g = {
			datasets: [{
				backgroundColor: [
				<?php echo substr($bgColors2,0,-1); ?>
				],
				data: [<?php echo substr($data2,0,-1); ?>]
			}],
			
			

			
			labels: [
				<?php echo substr($name2,0,-1); ?>
			]

		}; 
		
		
		///VALUE PIE FOR ALL THE GROUPS: Pie size of the group slice 
		<?php 
				$bgColors2 = "";
				$name2 = "";
				$data2 = "";
				$in2 = Build_value_pie::select_ec_values_for_table_by_size_of_the_slize_group_sd_TABLE();
				foreach($in2['dados'] as $in2){
						
						
						
						$bgColors2 	.= "'".random_color()."',";
						$name2 		.= "'".$in2['group_value'].";".$in2['subgroup_value']."',";
						$data2 		.= $in2['group_as_percent_of_asset'].",";
						
				}	
		?>
		/**/ 
		var barChartData1h = {
			datasets: [{
				backgroundColor: [
				<?php echo substr($bgColors2,0,-1); ?>
				],
				data: [<?php echo substr($data2,0,-1); ?>]
			}],
			
			

			
			labels: [
				<?php echo substr($name2,0,-1); ?>
			]

		}; 
		
	
		//////////////////////////////////////////////////////
		
		//////////////////////////////////////////////////////
		//////////////////////////////////////////////////////
		///////// CHAT POR GRUPO
		//////////////////////////////////////////////////////		
		//////////////////////////////////////////
			<?php 
					
					///CARREGA TODOS OS GRUPO
					$in = Build_value_pie::select_ec_groups_value();
					
					if($in['num'] > 0){												
					foreach($in['dados'] as $in){
					?>
					
					
					
					// VALUE PIE FOR THE SELECTED GROUP:  Pie Chart by size of the slice 
					<?php	
					$bgColors2 = "";
					$name2 = "";
					$data2 = "";
					$in2 = Build_value_pie::select_ec_values_for_table_by_group_in_id_TABLE($in['id']);
					foreach($in2['dados'] as $in2){
							
							
							
							$bgColors2 	.= "'".random_color()."',";
							$name2 		.= "'".$in2['group_value'].";".$in2['subgroup_value']."',";
							$data2 		.= $in2['subgroup_as_percent_of_asset'].",";
							
							
					}
						
					?>
						var barChartData2_<?php echo $in['id']; ?> = {
							datasets: [{
								backgroundColor: [
								<?php echo substr($bgColors2,0,-1); ?>			
								
								],
								data: [<?php echo substr($data2,0,-1); ?>]
							}],
							
							

							
							labels: [
								<?php echo substr($name2,0,-1); ?>
							]

						};
					
					
					
					
						// VALUE PIE FOR THE SELECTED GROUP: Pie Chart by name of the subgroup 
						<?php	
						$bgColors2 = "";
						$name2 = "";
						$data2 = "";
						$in2 = Build_value_pie::select_ec_values_for_table_by_group_id_TABLE($in['id']);
						foreach($in2['dados'] as $in2){
								
							$bgColors2 	.= "'".random_color()."',";
							$name2 		.= "'".$in2['group_value'].";".$in2['subgroup_value']."',";
							$data2 		.= $in2['subgroup_as_percent_of_asset'].",";
						}	
							
						?>
												
						var barChartData3_<?php echo $in['id']; ?> = {
							datasets: [{
								backgroundColor: [
								<?php echo substr($bgColors2,0,-1); ?>			
								
								],
								data: [<?php echo substr($data2,0,-1); ?>]
							}],
							
							

							
							labels: [
								<?php echo substr($name2,0,-1); ?>
							]

						};
					
						
						
						// VALUE PIE FOR THE SELECTED GROUP:  Pie Chart by item value 
						<?php	
						$bgColors2 = "";
						$name2 = "";
						$data2 = "";
						$in2 = Build_value_pie::select_ec_values_for_table_by_item_value_TABLE($in['id']);
						foreach($in2['dados'] as $in2){
																
								$bgColors2 	.= "'".random_color()."',";
								$name2 		.= "'".$in2['group_value'].";".$in2['subgroup_value']."',";
								$data2 		.= $in2['subgroup_as_percent_of_asset'].",";
						}	
							
						?>
						
						var barChartData4_<?php echo $in['id']; ?> = {
								datasets: [{
									backgroundColor: [
									<?php echo substr($bgColors2,0,-1); ?>			
									
									],
									data: [<?php echo substr($data2,0,-1); ?>]
								}],
								
								

								
								labels: [
									<?php echo substr($name2,0,-1); ?>
								]

						};
					
		
			<?php 
										}
								}
		?>



		//////////////////////////////////////////////////////
		///////// FIM CHAT POR GRUPO /////////
		//////////////////////////////////////////////////////
		//////////////////////////////////////////////////////
	
		
		window.onload = function() {
			
			
			////
			/* var ctx2 = document.getElementById('pieChart1').getContext('2d');
			
			var options = {
				cutoutPercentage: 50
			};
			
			window.myBar = new Chart(ctx2, {
				type: 'pie',
				data: barChartData,
				options: options
			}); */
			
			/////
			var ctx3 = document.getElementById('pieChart2b').getContext('2d');
			
			var options = {
				cutoutPercentage: 0,
							legend: {
									onClick: (e) => e.stopPropagation()
								}
			};
			
			window.myBar = new Chart(ctx3, {
				type: 'pie',
				data: barChartData1b,
				options: options
			});
			
			///////
			/////
			var ctx4 = document.getElementById('pieChart3b').getContext('2d');
			
			var options = {
				cutoutPercentage: 0,
							legend: {
									onClick: (e) => e.stopPropagation()
								}
			};
			
			window.myBar = new Chart(ctx4, {
				type: 'pie',
				data: barChartData1c,
				options: options
			});
			
			///////
			/////
			var ctx5 = document.getElementById('pieChart4b').getContext('2d');
			
			var options = {
				cutoutPercentage: 0,
							legend: {
									onClick: (e) => e.stopPropagation()
								}
			};
			
			window.myBar = new Chart(ctx5, {
				type: 'pie',
				data: barChartData1d,
				options: options
			});
			
			///////
		
			/////
			var ctx7 = document.getElementById('pieChart5b').getContext('2d');
			
			var options = {
				cutoutPercentage: 0,
							legend: {
									onClick: (e) => e.stopPropagation()
								}
			};
			
			window.myBar = new Chart(ctx7, {
				type: 'pie',
				data: barChartData1g,
				options: options
			});
			
			///////	/////
			var ctx8 = document.getElementById('pieChart6b').getContext('2d');
			
			var options = {
				cutoutPercentage: 0,
							legend: {
									onClick: (e) => e.stopPropagation()
								}
			};
			
			window.myBar = new Chart(ctx8, {
				type: 'pie',
				data: barChartData1h,
				options: options
			});
			
			///////
			///////	/////
			var ctx9 = document.getElementById('pieChart7b').getContext('2d');
			
			var options = {
				cutoutPercentage: 0,
							legend: {
									onClick: (e) => e.stopPropagation()
								}
			};
			
			window.myBar = new Chart(ctx9, {
				type: 'pie',
				data: barChartData1f,
				options: options
			});
			
			///////
			/* var ctx = document.getElementById('pieChart1').getContext('2d');
			
			var options = {
				cutoutPercentage: 50
			};
			
			window.myBar = new Chart(ctx, {
				type: 'pie',
				data: barChartData,
				options: options
			}); */
			/////
			
			
			///////
			var ctx = document.getElementById('pieChart1').getContext('2d');
			
			var options = {
				cutoutPercentage: 0,
							legend: {
									onClick: (e) => e.stopPropagation()
								}
			};
			
			window.myBar = new Chart(ctx, {
				type: 'pie',
				data: barChartData1e,
				options: options
			});
			/////
			
			



//////////////////////////////////////////
			//////////////////////////////////////////
			//////////// CHART POR GRUPO /////////////
			//////////////////////////////////////////
			//////////////////////////////////////////
			<?php 
					
					///CARREGA TODOS OS GRUPO
					$in = Build_value_pie::select_ec_groups_value();
					
					if($in['num'] > 0){												
					foreach($in['dados'] as $in){
						
						?>
						
						//// by name of group
						var ctx_g<?PHP echo $in['id'] ?> = document.getElementById('pieChartGroup_NameOfGroup_'+''+<?PHP echo $in['id'] ?>+'').getContext('2d');
						
						var options = {
							cutoutPercentage: 0,
							legend: {
									onClick: (e) => e.stopPropagation()
								}
						};
						
						window.myBar = new Chart(ctx_g<?PHP echo $in['id'] ?>, {
							type: 'pie',
							data: barChartData2_<?php echo $in['id']; ?>,
							options: options
						});
						
						
						
						/// by item value
						var ctx_h<?PHP echo $in['id'] ?> = document.getElementById('pieChartGroup_itemValue_'+''+<?PHP echo $in['id'] ?>+'').getContext('2d');
						
						var options = {
							cutoutPercentage: 0,
							legend: {
									onClick: (e) => e.stopPropagation()
								}
						};
						
						window.myBar = new Chart(ctx_h<?PHP echo $in['id'] ?>, {
							type: 'pie',
							data: barChartData3_<?php echo $in['id']; ?>,
							options: options
						});
						
						
						
						/// by size of slice
						var ctx_i<?PHP echo $in['id'] ?> = document.getElementById('pieChartGroup_sizeSlice_'+''+<?PHP echo $in['id'] ?>+'').getContext('2d');
						
						var options = {
							cutoutPercentage: 0,
							legend: {
									onClick: (e) => e.stopPropagation()
								}
						};
						
						window.myBar = new Chart(ctx_i<?PHP echo $in['id'] ?>, {
							type: 'pie',
							data: barChartData4_<?php echo $in['id']; ?>,
							options: options
						});
			
			<?php 
					}
					}
						
						?>
			/////
			
			
			
			
		};

		
	</script>
	
<script>
											
											function keypressed( obj , e ) {
												 var tecla = ( window.event ) ? e.keyCode : e.which;
												 var texto = obj.value
												// var indexvir = texto.indexOf(",")
												 var indexpon = texto.indexOf(".")
												
												if ( tecla == 8 || tecla == 0 )
													return true;
												if ( tecla != 46 && tecla < 48 || tecla > 57 )
													return false;
												
												if (tecla == 46) { if (indexvir !== -1 || indexpon !== -1) {return false} }
											}
											
											function formataAnyDecimal (value,id){
												
												var d1 = value.substring(0,1);
												var d2 = value.substring(1,10);
												
												document.getElementById(id).value = d1+','+d2;
												
												
											}
											
											</script>	