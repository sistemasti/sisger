<?php

require_once("header.php");

?>
	<style>
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	</style>
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
            <h1>Magnitude of Risk and Uncertainty matrix</h1>
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
             
			 
			  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Magnitude of Risk and Uncertainty matrix</h3>

                <div class="card-tools">

                </div>
              </div>
              <div class="card-body">
                <center><em>Enter different values of thereshold to see how the risks partition into the four quadrants</em></center>
				<br>
				<br>
				
				
				<?php 
					$i = AR_Analyse_risks::select_ar_magnitudes_risk();


					if($i['num'] > 0){
						$expected_scores 	= $i['expected_scores'];
						$uncertainty_range 	= $i['uncertainty_range'];
					}else{
						$expected_scores 	= 8.0;
						$uncertainty_range 	= 1.0;
					}		
				?>
				<div class="row">
             
				<div class="col-sm-4 col-md-11">
					
					
					<div style="display: inline-block; background-color:#fff;width:50%;border-left-width: 5px;border-left-color: #7b0606;border-left-style: solid;border-bottom-width: 5px;border-bottom-color: #7b0606;border-bottom-style: solid;overflow: auto;">
					
					<!-- ############# INPUT ############# cidades_incosistentes.xls-->
					
					<div style=" position:absolute; top:37.2%; right:-5%; width:65px;background-color:#fff;"><small>Magnitude threshould:</small> <br><span style="padding:4px; color:#fff;"><strong>
					<input type="text" name="expected_scores" id="expected_scores" style="width:82%;"  onblur="
					
					if( this.value != '' && (this.value < 8.0 || this.value > 14.0)){ 
					
							alert('Enter a number between 8.0 and 14.0'); 
							
					}else{
						
						loadMatrix(document.getElementById('uncertainty_range').value,this.value);
						ar_magnitudes_risk();	
						
					}
					
					" value="<?php echo $expected_scores; ?>" maxlength="5" required onkeypress="return keypressed( this , event );">
					</strong></span>&nbsp;</div>
					
					<!-- ############# END INPUT #############-->
					
						<div style="width:95%;height:260px; background-color:#ffac9c;padding:12px;float:left;margin-top:30px;"> 
						
						<!-- ############# INPUT #############-->
						<div style="float:left; position:static; right:30.2%;margin-top:-48px;"><input type="text" name="uncertainty_range" id="uncertainty_range" style="width:14%;" onblur="
						
							if(this.value !='' && (this.value < 0.1 || this.value > 4.0)){ 
						
							alert('Enter a number between 0.1 and 4.0'); 
							
							}else{
								
								loadMatrix(this.value,document.getElementById('expected_scores').value);	
								ar_magnitudes_risk();
							}; " value="<?php echo $uncertainty_range; ?>" maxlength="5" onkeypress="return keypressed( this , event );"> <small>Uncertainty threshold</small> <span style="padding:4px; color:#fff" required ><strong>
						</strong></span>&nbsp;</div>
						<!-- ############# END INPUT #############-->
						
						<center>High magnitude + Hight uncertainty =  Research now</center>
						<br>
							<table class="table-sm">
							  <thead>
								<tr>
								 
								  <th style="width: 82%"></th>
								  <th style="width: 8%">MR Exp</th>
								  <th style="width: 8%">Unc</th>
								</tr>
							  </thead>
							</table>
							
							<div id="matrix_r_t"></div>	
						</div> 
					</div>
					<div style="display: inline-block; background-color:#fff;width:50%;float:left;"> 
					
						<div style="float:left; position:absolute; right:30.2%;"> <span style="padding:4px; color:#fff"><strong>
						
						<!-- ############# INPUT #############-->
						<!--<input type="text" name="uncertainty_range" id="uncertainty_range" style="width:12%;" onblur="if(this.value !='' && (this.value < 0.1 || this.value > 5.0)){ alert('Enter a number between 0.1 and 5.0'); }else{loadMatrix(this.value,document.getElementById('expected_scores').value);	}; ar_magnitudes_risk();" value="<?php echo $uncertainty_range; ?>" maxlength="5" onKeyPress="return(moeda(this,'.','.',event))">-->
						
						</strong></span>&nbsp;</div>

						<div style="width:95%;height:260px; background-color:#ff775c;margin-right:0px;right:0px;margin-bottom:0px;padding:12px;float:right;margin-top:30px;border-right-color:#731c0e;border-bottom-color:#731c0e;overflow: auto;"> 
						
						
						
						<center>High magnitude + Low uncertainty =  Treat now</center>
						<br>
						<table class="table-sm">
							  <thead>
								<tr>
								 
								  <th style="width: 82%"></th>
								  <th style="width: 8%">MR Exp</th>
								  <th style="width: 8%">Unc</th>
								</tr>
							  </thead>
								  
							</table>
							<div id="matrix_l_t"></div>
						
						</div>
					</div>
					<br>
					<div style="display: inline-block; background-color:#fff;width:50%;
					
					border-left-width: 5px;
					border-left-color: #7b0606;
					border-left-style: solid;
					
					border-top-width: 5px;
					border-top-color: #7b0606;
					border-top-style: solid;
					
					margin-top: -6px;">
						<div style="width:95%;height:260px;background-color:#ffe6e1;margin-left:0px;left:0px;margin-bottom:0px;padding:12px;float:left;margin-bottom:30px;overflow: auto;"> 
						<center>Low magnitude + High uncertainty =  Research later</center>
						<br>
							<table class="table-sm">
							  <thead>
								<tr>
								 
								  <th style="width: 82%"></th>
								  <th style="width: 8%">MR Exp</th>
								  <th style="width: 8%">Unc</th>
								</tr>
							
								
							  </thead>
							 
							</table>
							
							 <div id="matrix_r_b"></div>
							
						</div>
					</div>
					<div style="display: inline-block; background-color:#fff;width:50%;float:left;">
					
						<div style="width:95%;height:260px;; background-color:#ececff;margin-left:0px;left:0px;margin-bottom:0px;padding:12px;float:right;margin-bottom:30px;margin-top: -6px;overflow: auto;
						
							
					border-top-width: 5px;
					border-top-color: #7b0606;
					border-top-style: solid;
						"> 
						<center>Low magnitude + Low uncertainty =  Lowest priority</center>
							<br>
							<table class="table-sm">
							  <thead>
								<tr>
								 
								  <th style="width: 82%"></th>
								  <th style="width: 8%">MR Exp</th>
								  <th style="width: 8%">Unc</th>
								</tr>
							  </thead>
							  
							</table>
							<div id="matrix_l_b"></div>
							
						</div>
					
					</div>
					
				</div>
				             
				
					
					
				
				</div>
              </div>
              <!-- /.card-body -->
            </div>
			 
			 
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
											
											function keypressed( obj , e ) {
												 var tecla = ( window.event ) ? e.keyCode : e.which;
												 var texto = obj.value
												// var indexvir = texto.indexOf(",")
												 var indexpon = texto.indexOf(".")
												
												if ( tecla == 8 || tecla == 0 )
													return true;
												if ( tecla != 46 && tecla < 48 || tecla > 57 )
													return false;
												
												if (tecla == 46) { if ( indexpon !== -1) {return false} }
											}
											
											function formataAnyDecimal (value,id){
												
												var d1 = value.substring(0,1);
												var d2 = value.substring(1,10);
												
												document.getElementById(id).value = d1+','+d2;
												
												
											}
											
											</script>
  
 <script>
															function ar_magnitudes_risk() {			
															 
															  $.ajax({
																type: "POST",
																url: "ajax_process/ar_magnitudes_risk.php?uncertainty_range="+document.getElementById('uncertainty_range').value+"&expected_scores="+document.getElementById('expected_scores').value,
																
																dataType: 'json',
																success: function(data) {
																	
																	//alert('ok');
																  
																	
																}
															  });
															}
														
														
														</script>
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

<script>
					function loadMatrix(x,y){
						
							$('#matrix_l_b').html('');
							$('#matrix_l_t').html('');
							$('#matrix_r_b').html('');
							$('#matrix_r_t').html('');
							var htmler1 = '';
							var htmler2 = '';
							var htmler3 = '';
							var htmler4 = '';
							var posicao = '';
							<?php 
							
							$go = AR_Analyse_risks::select_analyse_risk_by_project(); 
							foreach($go['dados'] as $go){
							$r = Risks::select_risk_id($go['id_risk']);
							?>
							
							
							
							var label<?php echo $go['id']; ?> 	= <?php echo "'".$r['name']."'"; ?>;
							var mrExp<?php echo $go['id']; ?> 	= <?php echo $go['magnitude_of_risk']; ?>;
							var unc<?php echo $go['id']; ?> 	= <?php echo $go['MR_U_Range'];?>;
							
							
							if(unc<?php echo $go['id']; ?> > x){
									var pos_x<?php echo $go['id']; ?>	= 'r';
							}else{
									var pos_x<?php echo $go['id']; ?>	= 'l';
							}	
							
							if(mrExp<?php echo $go['id']; ?> > y){
									var pos_y<?php echo $go['id']; ?>	= 't';
							}else{
									var pos_y<?php echo $go['id']; ?>	= 'b';
							}		
							
							posicao<?php echo $go['id']; ?> = pos_x<?php echo $go['id']; ?>+'_'+pos_y<?php echo $go['id']; ?>;
							//alert(posicao<?php echo $go['id']; ?>);
							if(posicao<?php echo $go['id']; ?> == 'l_b'){
								
								htmler1 += "<table class='table table-sm'><tbody><tr><td style='width: 82%'>"+label<?php echo $go['id']; ?>+"</td><td style='width: 8%'>"+mrExp<?php echo $go['id']; ?>+"</td><td style='width: 8%'><span class='badge bg-info'>"+unc<?php echo $go['id']; ?>+"</span></td></tr></tbody></table>";								
								$('#matrix_'+posicao<?php echo $go['id']; ?>).html(htmler1);
							}	
							
							if(posicao<?php echo $go['id']; ?> == 'l_t'){
								
								htmler2 += "<table class='table table-sm'><tbody><tr><td style='width: 82%'>"+label<?php echo $go['id']; ?>+"</td><td style='width: 8%'>"+mrExp<?php echo $go['id']; ?>+"</td><td style='width: 8%'><span class='badge bg-info'>"+unc<?php echo $go['id']; ?>+"</span></td></tr></tbody></table>";								
								$('#matrix_'+posicao<?php echo $go['id']; ?>).html(htmler2);
							}	
								
							if(posicao<?php echo $go['id']; ?> == 'r_b'){
								
								htmler3 += "<table class='table table-sm'><tbody><tr><td style='width: 82%'>"+label<?php echo $go['id']; ?>+"</td><td style='width: 8%'>"+mrExp<?php echo $go['id']; ?>+"</td><td style='width: 8%'><span class='badge bg-info'>"+unc<?php echo $go['id']; ?>+"</span></td></tr></tbody></table>";								
								$('#matrix_'+posicao<?php echo $go['id']; ?>).html(htmler3);
							}	
									
							if(posicao<?php echo $go['id']; ?> == 'r_t'){
								
								htmler4 += "<table class='table table-sm'><tbody><tr><td style='width: 82%'>"+label<?php echo $go['id']; ?>+"</td><td style='width: 8%'>"+mrExp<?php echo $go['id']; ?>+"</td><td style='width: 8%'><span class='badge bg-info'>"+unc<?php echo $go['id']; ?>+"</span></td></tr></tbody></table>";								
								$('#matrix_'+posicao<?php echo $go['id']; ?>).html(htmler4);
							}	
								
							<?php 
							
							}
							
							?>
							
						
					}

					loadMatrix(<?php echo $uncertainty_range; ?>,	<?php echo $expected_scores; ?>);
					
					
				
					
					
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

<script language="javascript">
 function number_format( number, decimals, dec_point, thousands_sep ) {
  var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
  var d = dec_point == undefined ? "," : dec_point;
  var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
  var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
  return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 }
</script>

<script> 
  function calcula(operacion){ 
  var operando1 = parseFloat( document.calc.operando1.value.replace(/\./g, "").replace(",", ".") );
  var operando2 = parseFloat( document.calc.operando2.value.replace(/\./g, "").replace(",", ".") );
  var result = eval(operando1 + operacion + operando2);
  document.calc.resultado.value = number_format(result,2, ',', '.');
 } 
</script> 
				