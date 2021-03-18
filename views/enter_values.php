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
            <h1><?php echo $_SESSION[$_SESSION['lang']]['Enter the values']; ?></h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>-->
			<a href="values_register"><button type="button" class="btn btn-block btn-success"><?php echo $_SESSION[$_SESSION['lang']]['Register a new value']; ?></button></a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

       <div class="row">
								  <div class="col-md-12">
									<div class="card">
									  
									  <!-- /.card-header -->
									<div class="card-body">
									  <table id="example1" class="table table-bordered table-striped">
									   <thead>
																<tr>
																  
																  <th><?php echo $_SESSION[$_SESSION['lang']]['Name']; ?></th>                
																  <th><?php echo $_SESSION[$_SESSION['lang']]['Weight']; ?></th>                
																  <th><?php echo $_SESSION[$_SESSION['lang']]['Definition']; ?></th>                
																  <th><?php echo $_SESSION[$_SESSION['lang']]['Notes']; ?></th>                
																  <th></th>                
																 
																</tr>
															</thead>
										<tbody>
										
											<?php 
													$in = Enter_values::select_mixed_values_for_report($_SESSION['project_id']);			
													
													foreach($in['dados'] as $in){
														
											?>
													  
																<tr id="row<?php echo $in['id']; ?>">
																
																  <td><?php echo $in['name_value']; ?></td>
																  <td><?php echo $in['weight']; ?></td>							 				  
																  <td><?php echo $in['definition']; ?></td>
																  <td><?php echo $in['notes']; ?></td>
																  
																
																  <td>

																			<a href="values_edit?id=<?php echo $in['id']; ?>"><button type="button" class="btn btn-block btn-info btn-sm"><?php echo $_SESSION[$_SESSION['lang']]['Edit']; ?></button></a>
																			
																<a href="javascript:void(0)"><button type="button" class="btn btn-block btn-danger btn-sm" style="margin-top:4px"  onclick="if(confirm('<?php echo $_SESSION[$_SESSION['lang']]['Do you really want to delete']; ?>?')){ enter_values_delete(<?php echo $in['id'];?>)}"><?php echo $_SESSION[$_SESSION['lang']]['Delete']; ?></button></a>
																	
																  </td>
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
	
  function enter_values_delete(id) {			
	  var i = '#row'+id;
	  $.ajax({
		type: "POST",
		url: "ajax_process/enter_values_delete.php",
		data: {
			id: id
		},
		success: function(data) {
			
			if(data == 1){		
				alert(<?php echo "'".$_SESSION[$_SESSION['lang']]['It is not possible to delete values that are in the build value pie']."'"; ?>);
				 //alert('');
			}else{
				
			  $(i).css({"display":"none"});
			  alert(<?php echo "'".$_SESSION[$_SESSION['lang']]['Record deleted successfully']."'"; ?>);
			 // alert('');
			  location.reload();
				
			}
		  
		}
	  });
	}
	
	
  </script>
<?php

require_once("footer.php");

?>