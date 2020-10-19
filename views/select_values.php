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
            <h1>Select the values scale</h1>
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

       	<script>	
									
									function valueScale(){
									
									var ratio = document.getElementById('ratio').value;
									
									document.getElementById('v_none').value = 0;
									document.getElementById('v_very_small').value = 1;
									document.getElementById('v_small').value = ratio;
									document.getElementById('v_medium').value = document.getElementById('v_small').value * ratio;
									document.getElementById('v_large').value = document.getElementById('v_medium').value * ratio;
									document.getElementById('v_very_large').value = document.getElementById('v_large').value * ratio;
									document.getElementById('v_exceptional').value = document.getElementById('v_very_large').value * ratio;
									
									select_value_register();
										
									}	
									
									</script>	
									<?php 
									$i = Select_values_scale::select_ec_values_scale_for_report();
									
									if($i['num'] > 0 ){
										
										$ratio 			= $i['ratio']; 										
										$none  			= $i['none']; 										
										$very_small 	= $i['very_small']; 										
										$small 			= $i['small']; 										
										$medium 		= $i['medium']; 										
										$large	 		= $i['large']; 										
										$very_large 	= $i['very_large']; 										
										$excepitional 	= $i['excepitional']; 
										
									}else{


										$ratio 			= ""; 										
										$none  			= ""; 										
										$very_small 	= ""; 										
										$small 			= ""; 										
										$medium 		= ""; 										
										$large	 		= ""; 										
										$very_large 	= ""; 										
										$excepitional 	= ""; 		
									
									}
									
									?>
									
									
									<form id="frmRegister"  action="" enctype="multipart/form-data">
									<div class="row">
										<div class="col-sm-4 col-md-6" style="text-align:right; ">
											<div style="margin-top:6px;">
												The items do not possess this contributing value
											</div>	
										</div>
										<div class="col-sm-4 col-md-1">
											<input type="text" class="form-control" id="ratio" name="ratio" value="<?php echo $ratio; ?>" required  onKeyUp="maskIt(this,event,'##########',true)" maxlength="5">
										</div>
										<div class="col-sm-4 col-md-5">
											<div style="margin-top:6px;">
												<button type="button" class="btn btn-block btn-info btn-sm" style="width:40%" onclick="
													if(document.getElementById('ratio').value == ''){
														alert('fill in the field');
													}else{
														valueScale();
													}
													">save & refresh</button>
											</div>	
										</div>
									</div>
									
									<br>
									<br>
									<br>
									<div class="row">
										<div class="col-sm-4 col-md-6" style="text-align:right; ">
											<div style="margin-top:6px;">
												The items do not possess this contributing value <strong> None </strong>
											</div>	
										</div>
										<div class="col-sm-4 col-md-1">
											<input type="text" class="form-control" id="v_none" name="v_none" value="<?php echo $none; ?>" required readonly>
										</div>
										<div class="col-sm-4 col-md-5">
											<div style="margin-top:6px;">
												The items do not possess this contributing value
											</div>	
										</div>
									</div><br>
										<div class="row">
										<div class="col-sm-4 col-md-6" style="text-align:right; ">
											<div style="margin-top:6px;">
												The occurrence of this contributing value in the items is <strong> very small </strong>
											</div>	
										</div>
										<div class="col-sm-4 col-md-1">
											<input type="text" class="form-control" id="v_very_small" name="v_very_small" value="<?php echo $very_small; ?>" required readonly>
										</div>
										<div class="col-sm-4 col-md-5">
											<div style="margin-top:6px;">
												(This is the benchmark step, assigned 1 point)
											</div>	
										</div>
									</div><br>
									
										<div class="row">
										<div class="col-sm-4 col-md-6" style="text-align:right; ">
											<div style="margin-top:6px;">
												The occurrence of this contributing value in the items is <strong> small </strong>
											</div>	
										</div>
										<div class="col-sm-4 col-md-1">
											<input type="text" class="form-control" id="v_small" name="v_small" value="<?php echo $small; ?>" required readonly>
										</div>
										<div class="col-sm-4 col-md-5">
											<div style="margin-top:6px;">
												times greater than that corresponding to the score “1”
											</div>	
										</div>
									</div><br>
									
										<div class="row">
										<div class="col-sm-4 col-md-6" style="text-align:right; ">
											<div style="margin-top:6px;">
												The occurrence of this contributing value in the items is <strong> medium </strong>
											</div>	
										</div>
										<div class="col-sm-4 col-md-1">
											<input type="text" class="form-control" id="v_medium" name="v_medium" value="<?php echo $medium; ?>" required readonly>
										</div>
										<div class="col-sm-4 col-md-5">
											<div style="margin-top:6px;">
												times greater than that corresponding to the score “1”
											</div>	
										</div>
									</div><br>
									
										<div class="row">
										<div class="col-sm-4 col-md-6" style="text-align:right; ">
											<div style="margin-top:6px;">
												The occurrence of this contributing value in the items is <strong> large </strong>
											</div>	
										</div>
										<div class="col-sm-4 col-md-1">
											<input type="text" class="form-control" id="v_large" name="v_large" value="<?php echo $large; ?>" required readonly>
										</div>
										<div class="col-sm-4 col-md-5">
											<div style="margin-top:6px;">
												times greater than that corresponding to the score “1”
											</div>	
										</div>
									</div><br>
									
										<div class="row">
										<div class="col-sm-4 col-md-6" style="text-align:right; ">
											<div style="margin-top:6px;">
												The occurrence of this contributing value in the items is <strong> very large </strong>
											</div>	
										</div>
										<div class="col-sm-4 col-md-1">
											<input type="text" class="form-control" id="v_very_large" name="v_very_large" value="<?php echo $very_large; ?>" required readonly>
										</div>
										<div class="col-sm-4 col-md-5">
											<div style="margin-top:6px;">
												times greater than that corresponding to the score “1”
											</div>	
										</div>
									</div><br>
									
										<div class="row">
										<div class="col-sm-4 col-md-6" style="text-align:right; ">
											<div style="margin-top:6px;">
												The occurrence of this contributing value in the items is <strong> exceptional </strong>
											</div>	
										</div>
										<div class="col-sm-4 col-md-1">
											<input type="text" class="form-control" id="v_exceptional" name="v_exceptional" value="<?php echo $excepitional; ?>" required readonly>
										</div>
										<div class="col-sm-4 col-md-5">
											<div style="margin-top:6px;">
												times greater than that corresponding to the score “1”
											</div>	
										</div>
									</div>
        <!-- /.row -->			</form>
<script>


	function select_value_register(go) {	
	   
		var formulario = document.getElementById('frmRegister');
		var dados = new FormData(formulario);
	  
	  $.ajax({
		dataType: 'json',
		type: "POST",
		url: "ajax_process/select_values_register.php",
		data: dados,
		processData: false,
		contentType: false,
		success: function(data) {
			if(data[0]==1){
					//document.getElementById('bxError').style.display='none';
					/*document.getElementById('bxSucess').style.display='block';
					document.getElementById('bxSucess').innerHTML=data[1]; */
					
					alert("registro realizado com sucesso");
					
			}else{ 
				//	document.getElementById('bxError').style.display='block';
				/* 	document.getElementById('bxSucess').style.display='none';*/
				///	document.getElementById('bxError').innerHTML=data[1]; 
				
					alert("erro no servidor, tente novaente mais tarde");
	
			}	
			window.scrollTo(0, 0);
		}
	  });
	}
</script>
       
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
<?php

require_once("footer.php");

?>