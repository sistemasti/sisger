<?php

require_once("header.php");

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
            <h1><?php echo $_SESSION[$_SESSION['lang']]['Report Agents']; ?></h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>-->
			<a href="ir_agents_register"><button type="button" class="btn btn-block btn-outline-success btn-xs"><?php echo $_SESSION[$_SESSION['lang']]['Register a new agent']; ?></button></a>
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
                  <th><?php echo $_SESSION[$_SESSION['lang']]['Agent']; ?></th>
                  <th style="width:45%;"><?php echo $_SESSION[$_SESSION['lang']]['Description']; ?></th>
                                 
				   
                  <th><?php echo $_SESSION[$_SESSION['lang']]['Action']; ?></th>
                </tr>
                </thead>
                <tbody>
				
					<?php 
							$in = Agents::select_ir_agents();												
							foreach($in['dados'] as $in){
								
					?>
							  
					<tr id="row<?php echo $in['id'];?>">
					  <!--<td><?php echo $in['id']; ?></td>-->
					  <td><?php echo $in['agent']; ?></td>
					  <td><?php echo $in['description']; ?></td>
					  
					  <td>	
							 <a href="ir_agents_edit?id=<?php echo $in['id'];?>"><button type="button" class="btn btn-block btn-info btn-sm"><i class="fas fa-pencil-alt"></i> <?php echo $_SESSION[$_SESSION['lang']]['Edit']; ?></button></a>
							
							 
							<a href="javascript:void(0)" onclick="if(confirm('<?php echo $_SESSION[$_SESSION['lang']]['Do you really want to delete']; ?>?')){ agent_delete(<?php echo $in['id'];?>)}"><button type="button" class="btn btn-block btn-danger btn-sm" style="margin-top:2px;">
<i class="fas fa-trash-alt"></i> <?php echo $_SESSION[$_SESSION['lang']]['Delete']; ?></button></a>
					 
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
	
	function agent_delete(id) {			
	  var i = '#row'+id;
	  $.ajax({
		type: "POST",
		url: "ajax_process/agent_delete.php",
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