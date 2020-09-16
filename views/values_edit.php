<?php

require_once("header.php");

if($_SESSION['perfil_logado'] != "1" && $_SESSION['perfil_logado'] != "2"){ 

	echo'<script language= "JavaScript">alert("you dont have permission to access this page");location.href="index"</script>';

} 

?>
 
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
            <h1>Project Edit</h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>-->
			<a href="enter_values"><button type="button" class="btn btn-block btn-outline-success btn-xs">Report</button></a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
			  <div class="row">
								<div class="col-lg-12">
									
								<?php
									
									
									
								$txterr 	= '';
								
								$i = Enter_values::select_ec_mixed_values_id($_REQUEST['id']);
								
								
								if($i['status'] != "1") {
									$readonly = "readonly='readonly'";
								}else{
									$readonly = "";
								}		
								
								if(isset($_POST['name_value'])){ 
									$name_value = removerCodigoMalicioso(trim($_POST['name_value'])); 
								}else{ 
									$name_value = $i['name_value']; 
								}
											
								if(isset($_POST['notes'])){ 
									$notes = removerCodigoMalicioso(trim($_POST['notes'])); 
								}else{ 
									$notes = $i['notes']; 
								}
								
								
								if(isset($_POST['weight'])){ 
									$weight = removerCodigoMalicioso(trim($_POST['weight'])); 
								}else{ 
									$weight = $i['weight']; 
								}
								
								if(isset($_POST['definition'])){ 
									$definition = removerCodigoMalicioso(trim($_POST['definition'])); 
								}else{ 
									$definition = $i['definition']; 
								}
								

								
								
								if ( isset($_POST['cadastrar']) ){
									
									
									
										
									if ( $txterr == "" ){
										
										Enter_values::update_ec_mixed_values($name_value, str_replace(",",".",$weight), $definition, $notes, $_REQUEST['id']);
										
										echo'<script language= "JavaScript">alert("Registration successful.");location.href="enter_values"</script>';
										unset($_POST);
										
									?>	
										<div class="alert alert-success">
											Registration successful.
										</div>
										
									<?php	
									}else{
									?>
										<div class="alert alert-danger">
											<?php echo $txterr; ?>
										</div>
									<?php
									}
										
								}
								?>
									
									</div>
							    </div>
			  
			  
                <div class="row">
             
              <div class="col-sm-4 col-md-6">
			  <form name="frmInstitution" method="post" action="values_edit">
			  <input type="hidden" name="cadastrar" id="cadastrar" value="1">
			  <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>">
			      <div class="form-group">
                    <label for="Name">Name of this value</label>
                    <input type="text" class="form-control" id="name_value" name="name_value" placeholder="" value="<?php echo $name_value; ?>" required>
                  </div>
				  
				  <div class="form-group">
                    <label for="Name">Weight</label>
                    <input type="text" class="form-control" id="weight" name="weight" placeholder="" value="<?php echo $weight; ?>" maxlength="10" onKeyUp="maskIt(this,event,'##########',true)"  required>
                  </div>
				  
				  
				  <div class="form-group">
                    <label for="Name">Definition</label>
                    <textarea name="definition" id="definition" class="form-control" ><?php echo $definition; ?></textarea>
                  </div>
				  
				  <div class="form-group">
                    <label for="Name">Notes</label>
                    <textarea name="notes" id="notes" class="form-control" ><?php echo $notes; ?></textarea>
                  </div>
				  
				  
				  
				<button type="submit" class="btn btn-block bg-gradient-primary btn-sm">Register</button>
              </form>
              </div> 
			  <div class="col-sm-4 col-md-6">
               <div class="callout callout-info">
                  <h5>Value register</h5>

                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum est id elit auctor consequat. In mattis massa nibh, et scelerisque ipsum molestie sit amet. Nulla sagittis consectetur odio non eleifend. </p>
                </div>
              </div>
              <!-- /.col -->
              <!-- /.col -->              
			  <!--<div class="col-sm-4 col-md-4">
                

               
                <select class="form-control">
                          <option>Select a project</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
              </div>-->
              <!-- /.col -->
            
            </div>
                <!-- /.row -->
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

<?php

require_once("footer.php");

?>

<script type="text/javascript">
 function maskIt(w,e,m,r,a){
  // Cancela se o evento for Backspace
  if (!e) var e = window.event
  if (e.keyCode) code = e.keyCode;
  else if (e.which) code = e.which;
  // Variáveis da função
  var txt  = (!r) ? w.value.replace(/[^\d]+/gi,'') : w.value.replace(/[^\d]+/gi,'').reverse();
  var mask = (!r) ? m : m.reverse();
  var pre  = (a ) ? a.pre : "";
  var pos  = (a ) ? a.pos : "";
  var ret  = "";
  if(code == 9 || code == 8 || txt.length == mask.replace(/[^#]+/g,'').length) return false;
  // Loop na máscara para aplicar os caracteres
  for(var x=0,y=0, z=mask.length;x<z && y<txt.length;){
  if(mask.charAt(x)!='#'){
  ret += mask.charAt(x); x++; } 
  else {
  ret += txt.charAt(y); y++; x++; } }
  // Retorno da função
  ret = (!r) ? ret : ret.reverse() 
  w.value = pre+ret+pos; }
  // Novo método para o objeto 'String'
  String.prototype.reverse = function(){
 return this.split('').reverse().join(''); };
</script>