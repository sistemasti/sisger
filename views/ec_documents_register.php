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
            <h1>Document Registration</h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>-->
			<a href="documents_report"><button type="button" class="btn btn-block btn-outline-success btn-xs">Return</button></a>
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
											
								if(isset($_POST['name'])){ 
									$name = removerCodigoMalicioso(trim($_POST['name'])); 
								}else{ 
									$name = ""; 
								}
																								
								if(isset($_POST['comment'])){ 
									$comment = removerCodigoMalicioso(trim($_POST['comment'])); 
								}else{ 
									$comment = ""; 
								}
								
								
								
								if(isset($_POST['link'])){ 
									$link = removerCodigoMalicioso(trim($_POST['link'])); 
								}else{ 
									$link = ""; 
								}
												
								 								
								if ( isset($_POST['cadastrar']) ){
									
									
									$pos = strpos($link, 'http://');
									$pos2 = strpos($link, 'https://');
									
									if(($pos == false && $pos2 == false) && $_FILES['att']['name']==""){
										
											$txterr .= "- Link inválido (use http ou https) <br>";		
										
										
									}	
									
									if($_FILES['att']['type'] != "" && $_FILES['att']['type'] != "image/png" && $_FILES['att']['type'] != "image/jpg" && $_FILES['att']['type'] != "image/jpeg"  && $_FILES['att']['type'] != "application/pdf" ){	
												$txterr .= "- File type not allowed; Type files only .jpg, .jpeg, .png and .pdf<br>";		
									}	
									
									if($link == "" && $_FILES['att']['name']==""){
												$txterr .= "- Please write a link or attach a document<br>";		
									}	
										
									if ( $txterr == "" ){
										
										
										//upload da logo
										if($_FILES['att']['name'] != ""){
											$uploaddir = './files/';												
											if(isset($_FILES['att']['name'])){
												
												$nomeimagem = $_FILES['att']['name'];  
												$ext = strrchr($nomeimagem, '.'); 
												
												$nname = uniqid();		
													
													$img = basename($nname.$ext);	
													$uploadfile = $uploaddir . $img  ;
													
													move_uploaded_file($_FILES['att']['tmp_name'], $uploadfile);
													/* echo "<pre>";
													print_r($_FILES);
													echo "</pre>"; */
												
											}
										}else{ 
											$nname="";
											$ext="";
										}
										/* $n_link = str_ireplace("http://","",$link);
										$n_link = str_ireplace("https://","",$n_link); */
										Documents::insert_document($name,$comment,$link,$nname.$ext,$_SESSION['institutions_id']);
										
										if($btn2 == "2"){
											
											echo'<script language= "JavaScript">alert("Registration successful.");location.href="documents_report"</script>';
											
										}
										$name = ""; 
										$comment = ""; 	
										$link = "";
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
			   <form name="frmDocuments" method="post" action="document_register"  enctype="multipart/form-data">
					  <input type="hidden" name="cadastrar" id="cadastrar" value="1">
					  
						<div class="form-group">
							<label for="Name">Document Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Enter document name" value="<?php echo $name; ?>" required>
						</div>
						  
						<div class="form-group">
							<label for="Name">Comment</label>
							<input type="text" class="form-control" id="comment" name="comment" placeholder="Enter comment" value="<?php echo $comment; ?>" >
						</div>
						  
						<div class="form-group">
							<label for="Name">Link</label>
							<input type="text" class="form-control" id="link" name="link" placeholder="Link to the file or web page" value="<?php echo $link; ?>" >
						</div>
						
						    
						<div class="form-group">
							<label for="Name">... or attachment</label>
							<input type="file" class="form-control" value="selecione" placeholder="selecione"  name="att" id="att" >
							<div ><em>Type files only .jpg, .jpeg, .png and .pdf</em></div>
						</div>
						  
						
						<button type="submit" name="btn1" class="btn btn-block bg-gradient-primary btn-sm" value="1">Save & Add New</button>
				
				<button type="submit" name="btn2" class="btn btn-block bg-gradient-info btn-sm" value="2">Save & Return</button>
					  </form>
              </div> 
			  <div class="col-sm-4 col-md-6">
               <div class="callout callout-info">
                  <h5>Document Registration</h5>

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