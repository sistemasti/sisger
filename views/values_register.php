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
            <h1>Enther the values</h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>-->
			<a href="enter_values"><button type="button" class="btn btn-block btn-outline-success btn-xs">return</button></a>
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
								
								if(isset($_POST['btn2'])){ 
									$btn2 = removerCodigoMalicioso(trim($_POST['btn2'])); 
								}else{ 
									$btn2 = ''; 
								}
									
								if(isset($_POST['btn1'])){ 
									$btn1 = removerCodigoMalicioso(trim($_POST['btn1'])); 
								}else{ 
									$btn1 = ''; 
								}
											
								
								if(isset($_POST['name_value'])){ 
									$name_value = removerCodigoMalicioso(trim($_POST['name_value'])); 
								}else{ 
									$name_value = ''; 
								}
								
								if(isset($_POST['weight'])){ 
									$weight = removerCodigoMalicioso(trim($_POST['weight'])); 
								}else{ 
									$weight = ''; 
								}
									
								if(isset($_POST['definition'])){ 
									$definition	 = removerCodigoMalicioso(trim($_POST['definition'])); 
								}else{ 
									$definition	 = ''; 
								}
									
								if(isset($_POST['notes'])){ 
									$notes = removerCodigoMalicioso(trim($_POST['notes'])); 
								}else{ 
									$notes = ''; 
								}
												
								
								if ( isset($_POST['cadastrar']) ){
									
										
									if ( $txterr == "" ){
										
										Enter_values::insert_ec_mixed_values($name_value,str_replace(",",".",$weight),$definition,$notes);
										
										if($btn2 == "2"){
											
											echo'<script language= "JavaScript">alert("Registration successful.");location.href="enter_values"</script>';
											
										}
										
										
										
										unset($_POST);
										
									?>	
										<div class="alert alert-success">
											Registration successful.
										</div>
										
									<?php	
										
										$name_value = '';
										$weight = '';
										$definition = ''; 
										$notes = ''; 

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
			  <form name="frmProject" method="post" action="values_register">
			  <input type="hidden" name="cadastrar" id="cadastrar" value="1">
			  
			      <div class="form-group">
                    <label for="Name">Name of this value</label>
                    <input type="text" class="form-control" id="name_value" name="name_value" placeholder="" value="<?php echo $name_value; ?>" required>
                  </div>
				  
				  <div class="form-group">
                    <label for="Name">Weight</label>
                    <input type="text" class="form-control" id="weight" name="weight" placeholder="" value="<?php echo $weight; ?>" maxlength="10" required onkeypress="return keypressed( this , event );">
                  </div>
				  
				  
				  
				  <div class="form-group">
                    <label for="Name">Definition</label>
                    <textarea name="definition" id="definition" class="form-control" ><?php echo $definition; ?></textarea>
                  </div>
				  
				  <div class="form-group">
                    <label for="Name">Notes</label>
                    <textarea name="notes" id="notes" class="form-control" ><?php echo $notes; ?></textarea>
                  </div>
				  
				 
				
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
					</script>
					


				
				<button type="submit" name="btn1" class="btn btn-block bg-gradient-primary btn-sm" value="1">Save & Add New</button>
				
				<button type="submit" name="btn2" class="btn btn-block bg-gradient-info btn-sm" value="2">Save & Return</button>
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