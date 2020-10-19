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
            <h1>List of treatment options and teis Cost-Effectveness</h1>
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
          <div class="col-md-12">
            <div class="card">
              
              <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Risk</th>
                   <th>MR Original</th>                
                   <th>MR Remaining</th>                
                   <th>Option Sumary</th>                
                   <th>Initial cost</th>                
                   <th>Annual cost</th>                
                   <th>Annual cost total</th>                
                   <th>Magnitude of cost-effectness</th>                
                 
                </tr>
                </thead>
                <tbody>
					<?php 
							$in = Analyze_options::select_tr_analyze_options_by_project();
							
							foreach($in['dados'] as $in){
							
							$ri = Risks::select_risk_id($in['id_risk']);
							
							$ar = AR_Analyse_risks::select_analyse_risk_id_risk($in['id_risk']);
							
							$op = Analyze_options::select_tr_identify_options_id_by_option($in['id_option']);
								
					?>
					
							  
					<tr id="row1">
					  <td><?php echo $ri['name']; ?>(<?php echo $in['id']; ?>)</td>
					  <td><?php echo $ar['magnitude_of_risk']; ?></td>
					  <td><?php echo $in['magnitude_of_risk']; ?></td>
					  <td><?php echo $op['summary']; ?></td>
					  <td><?php echo $op['one_time_cost']; ?></td>
					  <td><?php echo $op['annual_cost']; ?></td>
					  <td><?php echo number_format(round(($op['annual_cost']/12),2)+$op['annual_cost'], 2, ',', '.'); ?></td>
					  <td><?php echo number_format((round(($op['annual_cost']/12),2)), 2, ',', '.'); ?></td>
					</tr>
					
					<?php 
							}
								
					?>		  
				
					
					
              </table>
            </div>
              <!-- ./card-body -->
           
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
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
  function document_active(id,status) {			
	  var i = '#row'+id;
	  $.ajax({
		type: "POST",
		url: "ajax_process/documents_active.php",
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
	
	function document_delete(id) {			
	  var i = '#row'+id;
	  $.ajax({
		type: "POST",
		url: "ajax_process/document_delete.php",
		data: {
			id: id
		},
		success: function(data) {
		  $(i).css({"display":"none"});
		  //location.reload();
		}
	  });
	}
	
	
  </script>
<?php

require_once("footer.php");

?>