<?php require_once("header.php");
if($_SESSION['perfil_logado'] != "1" && $_SESSION['perfil_logado'] != "2" && $_SESSION['perfil_logado'] != "3"){ 

	echo'<script language= "JavaScript">alert("You dont have permission to access this page");location.href="index"</script>';

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
            <h1>Identify Options</h1>
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
			
				<div class="col-sm-4 col-md-4">
				
				<div class="card" style="background-color:#dee0e4;height:700px;overflow: auto;">
					<div class="card-body">
					
					<h4>Identify Options</h4>
						<div>
						<br>
							<?php 
							/* echo "<pre>";
							print_r($_SESSION);
							echo "</pre>"; */
																				
							$in = Risks::select_risks();
							
							foreach($in['dados'] as $in){
							
							?>
							
							
							
							<div style="padding:7px;background-color:#f5f5f5;-webkit-box-shadow: 2px 2px 4px 1px rgba(0,0,0,0.3);
-moz-box-shadow: 2px 2px 4px 1px rgba(0,0,0,0.3);
box-shadow: 2px 2px 4px 1px rgba(0,0,0,0.3);cursor:pointer"  onclick="$( '#subgroup_column' ).show('slow');identify_option_html(<?php echo $in['id']; ?>)"><strong> <?php echo $in['name']; ?></strong>
<br>
<em><?php echo databr($in['data_analyzed']); ?> </em>
</div>
		
							<hr>
							<?php } 
							
							?>
							
							
							
						</div>	
					</div>	
				</div>	
				</div>
				
				
				<div class="col-sm-8 col-md-8" id="subgroup_column" style="display:none">asd</div>
				
				</div>
				<script>
				function identify_option_html(id) {	
									
									//alert(name);	
									$.ajax({
									dataType: 'html',
									type: "POST",
									url: "ajax_process/identify_options_html.php?id="+id,								
									processData: false,
									contentType: false,
									success: function(data) {
										
										document.getElementById('subgroup_column').innerHTML=data;
										
										
									}
									}); 
								}
				</script>
				<script>	

						function insert_option() {	
	   
							var formulario = document.getElementById('tr_risk_options_register');
							var dados = new FormData(formulario);
						  
							  $.ajax({
								dataType: 'json',
								type: "POST",
								url: "ajax_process/identify_options_register.php",
								data: dados,
								processData: false,
								contentType: false,
								success: function(data) {
									
									alert("successfully registered");
									document.getElementById('fd_scores').style.display='none';
									identify_option_html(data);
									
								},
								error: function(){
									
									
									
								}	
							  });
							  //alert('data updated successfully');
						}
					
					</script>	
	<script>	

						function update_id_option(id_option,id) {	
									
									//alert(name);	
									$.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/update_id_option.php?id_option="+id_option+"&id="+id,
									data: {
										id_option:id_option		
									},
									processData: false,
									contentType: false,
									success: function(data) {
										
										//location.reload();
									}
									});
								}
					
						function update_data(datas,id) {	
									
									//alert(name);	
									$.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/update_data.php?datas="+datas+"&id="+id,
									data: {
										datas:datas	
									},
									processData: false,
									contentType: false,
									success: function(data) {
										
										//location.reload();
									}
									});
								}
					
						function update_summary(summary,id) {	
									
									//alert(name);	
									$.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/update_summary.php?summary="+summary+"&id="+id,
									data: {
										summary:summary		
									},
									processData: false,
									contentType: false,
									success: function(data) {
										
										//location.reload();
									}
									});
								}
					
						function update_one_time_cost(one_time_cost,id) {	
									
									//alert(name);	
									$.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/update_one_time_cost.php?one_time_cost="+one_time_cost+"&id="+id,
									data: {
										one_time_cost:one_time_cost		
									},
									processData: false,
									contentType: false,
									success: function(data) {
										
										//location.reload();
									}
									});
								}
					
						function update_annual_cost(annual_cost,id) {	
									
									//alert(name);	
									$.ajax({
									dataType: 'json',
									type: "POST",
									url: "ajax_process/update_annual_cost.php?annual_cost="+annual_cost+"&id="+id,
									data: {
										annual_cost:annual_cost		
									},
									processData: false,
									contentType: false,
									success: function(data) {
										
										//location.reload();
									}
									});
								}
					
						function delete_tr_identify_options(id,option_id) {	
										//alert(group_id);								
								  var i = '#row_group'+id;
								  $.ajax({
									type: "POST",
									url: "ajax_process/delete_tr_identify_options.php",
									data: {
										id: id,
										status: status
									},
									success: function(data) {
									  //$(i).css({"display":"none"});
									  
									  identify_option_html(option_id);
									}
								  });
								}
					
					</script>	
	
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
  <script>
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
	
	
  </script>
  
  <!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<?php

require_once("footer.php");

?>