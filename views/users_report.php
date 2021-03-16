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
            <h1><?php echo $_SESSION[$_SESSION['lang']]['Report Users']; ?></h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>-->
			<a href="user_register"><button type="button" class="btn btn-block btn-outline-success btn-xs"><?php echo $_SESSION[$_SESSION['lang']]['Register a new user']; ?></button></a>
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
                  <!--<th>ID</th>-->
                  <th><?php echo $_SESSION[$_SESSION['lang']]['Name']; ?></th>
                 
                  <th><?php echo $_SESSION[$_SESSION['lang']]['Contact']; ?></th>
                 <!-- <th>SSN / CPF</th>
                
                  <th>Matriculation</th>-->
                 
                  <th><?php echo $_SESSION[$_SESSION['lang']]['Institution']; ?></th>
               
				   <th>Status</th>
                  <th><?php echo $_SESSION[$_SESSION['lang']]['Action']; ?></th>
                </tr>
                </thead>
                <tbody>
				
					<?php 
							$us = Users::select_users_for_report();												
							foreach($us['dados'] as $us){
								
					?>
							  
					<tr id="row<?php echo $us['id'];?>">
					  <!--<td><?php echo $us['id']; ?></td>-->
					  <td>
					  <?php echo $us['name']; ?>
					  <br>
					  <?php 
							  if($us['profiles_id'] != "0"){
								  $pr = Users::select_profile_id($us['profiles_id']);
								  echo "<em>".$pr['profile']."</em>"; 
							  }else{
								  echo "-";
							  }		
					  ?>
					  </td>
					 
					  <td>
					  <?php echo "E-mail: <br>".$us['email']; ?><hr>
					  <?php echo "Telefone: <br>".$us['telephone']; ?>
					  </td>
					  <!--<td><?php echo $us['cpf']; ?></td>
					  <td><?php echo $us['matriculation']; ?></td>-->
					  <td><?php 
					  if($us['institutions_id'] != "0"){
						  $nn = Institutions::select_institutions_id($us['institutions_id']);
						  echo $nn['name']; 
					  }else{
						  echo "-";
					  }		
					  ?></td>
					 
					  <td>	<?php 
								if($us['status']=="1"){
							?>
							<center>
								<a href="javascript:void(0)" onclick="if(confirm('Do you really want to disable?')){users_active(<?php echo $us['id'];?>,0)}"><button type="button" class="btn btn-outline-success btn-sm"><?php echo $_SESSION[$_SESSION['lang']]['active']; ?></button></a><br>
								<small><em><?php echo $_SESSION[$_SESSION['lang']]['click to disable']; ?></em></small>
							</center>
							<?php		
								}else{	
							?>	
							<center>
								<a href="javascript:void(0)" onclick="if(confirm('Do you really want to activate?')){users_active(<?php echo $us['id'];?>,1)}"><button type="button" class="btn btn-block btn-default btn-sm"><?php echo $_SESSION[$_SESSION['lang']]['inactive']; ?></button></a><br>
								<small><em><?php echo $_SESSION[$_SESSION['lang']]['click to activate']; ?></em></small>
							</center>
							<?php		
								}	
							?>	
							
					  </td>
					  <td>
					  <a href="users_edit?id=<?php echo $us['id'];?>"><button type="button" class="btn btn-block btn-info btn-sm"><?php echo $_SESSION[$_SESSION['lang']]['Edit']; ?></button></a>
					  
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
  function users_active(id,status) {			
	  var i = '#row'+id;
	  $.ajax({
		type: "POST",
		url: "ajax_process/users_active.php",
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
	
  </script>
<?php

require_once("footer.php");

?>