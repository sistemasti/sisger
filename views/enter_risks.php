<?php

require_once("header.php");
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
				
				<div class="card">
					<div class="card-body">
					<h3>Original riscs</h3>
						<div>
						<br>
							
							<input type="text" class="form-control" id="group_name" name="group_name" value="" onkeyup="group_edit_name(this.value,)" onclick="view_subgroup();$('#groupOption').show();$('#group_selected_for_all').val(); this.style.backgroundColor='#f5f2c9'" onblur="this.style.backgroundColor='#fff'" required>
							
							
						
							
							
						</div>	
					</div>	
				</div>	
				</div>
				<!--########################################-->
				<!--########################################-->
				
			
				
				<!--########################################-->
				<!--########################################-->
				
				
				
				
				
				<div class="col-sm-8 col-md-8" id="subgroup_column" style="display:block">
				<h3>Reduction rsk option for he selected risk</h3>
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