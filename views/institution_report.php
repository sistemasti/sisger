<?php

require_once("header.php");
if($_SESSION['perfil_logado'] != "1"){ 

	echo'<script language= "JavaScript">alert("you dont have permission to access this page");location.href="index"</script>';

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
            <h1>Report Institution</h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>-->
			<a href="instituicao"><button type="button" class="btn btn-block btn-outline-success btn-xs">Register a new institution</button></a>
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
                  <!--<th>ID</th>-->
                  <th>Name</th>
                  <th>Code</th>
                  <th>Acronym</th>
                
                  <th>Description</th>
                 <!-- <th>Type</th>
                  <th>Hierarquie</th>-->
                 <!-- <th>Date register</th>-->
				   <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				
					<?php 
							$in = Institutions::select_institutions_for_report();												
							foreach($in['dados'] as $in){
								
					?>
							  
					<tr id="row<?php echo $in['id'];?>">
					  <!--<td><?php echo $in['id']; ?></td>-->
					  <td><?php echo $in['name']; ?></td>
					  <td><?php echo $in['code']; ?></td>
					  <td><?php echo $in['sigla']; ?></td>
					  
					  <td><?php echo utf8_encode($in['description']); ?></td>
					 <!-- <td><?php 
								if($in['type']=="10"){
									echo "Institution";
								}elseif($in['type']=="20"){	
									echo "Unity";
								}else{
									echo "Sector";
								}		
							?>	</td>
					  <td><?php 
					  if($in['hierarquie'] != "0"){
						  $nn = Institutions::select_institutions_id($in['hierarquie']);
						  echo $nn['name']; 
					  }else{
						  echo "-";
					  }		
					  ?></td>-->
					  <!--<td><?php echo $in['date_register']; ?></td>-->
					  <td>	<?php 
								if($in['status']=="1"){
							?>
							<center>
								<a href="javascript:void(0)" onclick="if(confirm('Do you really want to disable?')){institution_active(<?php echo $in['id'];?>,0)}"><button type="button" class="btn btn-outline-success btn-sm">active</button></a><br>
								<small><em>click to disable</em></small>
							</center>
							<?php		
								}else{	
							?>	
							<center>
								<a href="javascript:void(0)" onclick="if(confirm('Do you really want to activate?')){institution_active(<?php echo $in['id'];?>,1)}"><button type="button" class="btn btn-block btn-default btn-sm">inactive</button></a><br>
								<small><em>click to activate</em></small>
							</center>
							<?php		
								}	
							?>	
							
					  </td>
					  <td>
					  <a href="institution_edit?id=<?php echo $in['id'];?>"><button type="button" class="btn btn-block btn-info btn-sm">Edit</button></a>
					 <!-- --><br>
					  
							<a href="javascript:void(0)" onclick="if(confirm('Do you really want to delete?')){ institution_delete(<?php echo $in['id'];?>)}"><button type="button" class="btn btn-block btn-danger btn-sm" style="margin-top:2px;">
<i class="fas fa-trash-alt"></i> Delete</button></a>
					 
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
  function institution_active(id,status) {			
	  var i = '#row'+id;
	  $.ajax({
		type: "POST",
		url: "ajax_process/institutuion_active.php",
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
	
	function institution_delete(id) {			
	  var i = '#row'+id;
	  $.ajax({
		type: "POST",
		url: "ajax_process/institution_delete.php",
		data: {
			id: id
		},
		success: function(data) {
		  $(i).css({"display":"none"});
		}
	  });
	}
  </script>
<?php

require_once("footer.php");

?>