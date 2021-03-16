<!-- PG: identify_options_html -->

<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/IR_Risks.class.php");
include("../controllers/TR_Analyze_options.class.php");

?>
<div class="card" >
					<div class="card-body">
					
					<h4><?php 
							$in = Risks::select_risk_id($_GET['id']);
							echo $in['name'];
					?></h4>
					<strong><?php echo $_SESSION[$_SESSION['lang']]['Reduction risk option for the selected risk']; ?></strong>
						<div>
						<br>
							
							<div class="row">
							
								<div class="col-sm-3 col-md-3" ><h6><?php echo $_SESSION[$_SESSION['lang']]['Option name / Date implemented']; ?></h6></div>
								<div class="col-sm-4 col-md-4" ><h6><?php echo $_SESSION[$_SESSION['lang']]['Options summary sentence']; ?></h6></div>
								<div class="col-sm-4 col-md-4" ><h6><?php echo $_SESSION[$_SESSION['lang']]['Cost, One Time / Cost, Annual']; ?></h6></div>
								<div class="col-sm-1 col-md-1" ><h6>&nbsp;</h6></div>
							</div>
							
							
							
							<?php

								$ti= Analyze_options::select_tr_identify_options($_GET['id']);
								
								if($ti['num'] > 0){
								foreach($ti['dados'] as $ti){ 
											
								
							?>
							
								<div class="row" style="margin:10px;background-color:#e8f9e7;padding:7px;">
							
								<div class="col-sm-3 col-md-3" >
								
								
									<select class="form-control" id="id_option" name="ec_groups_id"onchange="update_id_option(this.value,<?php echo $ti['id'];?>)" >
									<option value="0"><?php echo $_SESSION[$_SESSION['lang']]['select option']; ?></option>
									<?php 
											
											$in = Analyze_options::select_options();
											foreach($in['dados'] as $in){ 
											
											if($in['id'] == $ti['id_option']){
									?>
											<option value="<?php echo $in['id'];?>" selected><?php echo $in['option']; ?></option>
									<?php }else{ ?>	
											<option value="<?php echo $in['id'];?>" ><?php echo $in['option']; ?></option>
									<?php } ?>	
									
									<?php	} ?>
										
                         
									</select>
									<input type="text" class="form-control col-sm-7" id="data" name="data"  value="<?php echo databr($ti['data']);?>" style="margin-top:4px; float:right" onKeyDown="Mascara(this,Data);" onKeyPress="Mascara(this,Data);" onKeyUp="Mascara(this,Data);update_data(this.value,<?php echo $ti['id'];?>)" maxlength="10"   required>
								</div>
								
								<div class="col-sm-4 col-md-4" >
								
									<textarea class="form-control " id="summary" name="summary" onkeyup="update_summary(this.value,<?php echo $ti['id'];?>)"><?php echo $ti['summary'];?></textarea>
								</div>
								
								<div class="col-sm-4 col-md-4" >
									
										<div class="input-group">
										<div class="input-group-prepend">
										  <span class="input-group-text">$</span>
										</div>
										<input type="text" name="one_time_cost" id="one_time_cost" class="form-control"  onKeyPress="return(moeda(this,'.',',',event))" value="<?php echo $ti['one_time_cost'];?>" onkeyup="update_one_time_cost(this.value,<?php echo $ti['id'];?>)">
										</div>
									
										<div class="input-group" style="margin-top:4px;">
										<div class="input-group-prepend">
										  <span class="input-group-text">$</span>
										</div>
										<input type="text" name="annual_cost" id="annual_cost"  class="form-control"  onKeyPress="return(moeda(this,'.',',',event))"  value="<?php echo $ti['annual_cost'];?>"  onkeyup="update_annual_cost(this.value,<?php echo $ti['id'];?>)">
										</div>
									
								</div>
								<div class="col-sm-1 col-md-1" >
										<a href="javascript:void(0)" onclick="if(confirm('Do you really want to delete?')){ delete_tr_identify_options(<?php echo $ti['id'];?>,<?php echo $_GET['id']; ?>)}"><button type="button" class="btn btn-block btn-danger btn-sm" style="margin-top:2px;">
<i class="fas fa-trash-alt"></i></button></a>
								</div>
								
							</div>
							<br><?php //echo $_SESSION[$_SESSION['lang']]['select option']; ?>
							<?php }
								}else{
										echo $_SESSION[$_SESSION['lang']]['no data recorded'];
								}	
							?>
							<br>
							<hr>
							<br>
							
			
			<?php $in_v = Analyze_options::select_options_by_id_risk($_GET['id']); 
			
			
			if($in_v['num'] >0 ){
			?>
			
			<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="
			if(document.getElementById('fd_scores').style.display=='none'){
				document.getElementById('fd_scores').style.display='block'
			}else{
				document.getElementById('fd_scores').style.display='none'
			}
			"><?php echo $_SESSION[$_SESSION['lang']]['insert a new data']; ?></button>
			
			<?php }else{ ?>
			<center><em><?php echo $_SESSION[$_SESSION['lang']]['You have already filled in the number of options available']; ?>. <br><?php echo $_SESSION[$_SESSION['lang']]['To register more options']; ?>, <a href="tr_risk_option"><?php echo $_SESSION[$_SESSION['lang']]['click here']; ?></a>.</em></center>
			<?php } ?>
			
			
			<div id="fd_scores" style="display:none">
			
			<form name="frmDocuments" method="post" id="tr_risk_options_register"  enctype="multipart/form-data">
			<input type="hidden" class="form-control" id="id_risk"	name="id_risk" value="<?php echo $_GET['id']; ?>" required placeholder="Data option" style="margin-top:2px;">
					<select class="form-control" id="id_option" name="id_option" style="margin-top:2px;">
						<option value="0" ><?php echo $_SESSION[$_SESSION['lang']]['select a option']; ?></option>
							<?php 
											
								$in = Analyze_options::select_options_by_id_risk($_GET['id']);
								foreach($in['dados'] as $in){ 
											
										
									?>
											<option value="<?php echo $in['id'];?>" ><?php echo $in['option']; ?></option>
											
									<?php	} ?>
					</select>
					<input type="text" class="form-control" id="data"	name="data" value="" required placeholder="<?php echo $_SESSION[$_SESSION['lang']]['Data implemented']; ?>" style="margin-top:2px;" onKeyDown="Mascara(this,Data);" onKeyPress="Mascara(this,Data);" onKeyUp="Mascara(this,Data);" maxlength="10">
					<input type="text" class="form-control" id="summary" name="summary" value="" required placeholder="<?php echo $_SESSION[$_SESSION['lang']]['Options summary sentence']; ?>" style="margin-top:2px;">
					<div class="input-group" style="margin-top:2px;">
										<div class="input-group-prepend">
										  <span class="input-group-text">$</span>
										</div>
										<input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" name="one_time_cost" id="one_time_cost" onKeyPress="return(moeda(this,'.',',',event))" placeholder="<?php echo $_SESSION[$_SESSION['lang']]['Cost, One Time']; ?>">
					</div>
					<div class="input-group" style="margin-top:2px;">
										<div class="input-group-prepend">
										  <span class="input-group-text">$</span>
										</div>
										<input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" name="annual_cost" id="annual_cost"  onKeyPress="return(moeda(this,'.',',',event))" placeholder="<?php echo $_SESSION[$_SESSION['lang']]['Cost, Annual']; ?>">
					</div>
					<!input type="text" class="form-control" id="annual_cost" name="annual_cost" value="" required placeholder="Annual cost" style="margin-top:2px;">
			
			<button type="button" class="btn btn-block bg-gradient-success btn-sm" onclick="
			
			if(document.getElementById('data').value==''){
				alert(<?php echo "'".$_SESSION[$_SESSION['lang']]['Please, insert a data']."'"; ?>);
		  
				
				
			}else if(document.getElementById('one_time_cost').value=='') { 
				alert(<?php echo "'".$_SESSION[$_SESSION['lang']]['Please, insert a one time cost']."'"; ?>);
				
			
			}else if(document.getElementById('annual_cost').value=='') { 
				alert(<?php echo "'".$_SESSION[$_SESSION['lang']]['Please, insert a annual cost']."'"; ?>);
				
			
			}else if(document.getElementById('id_option').value=='' || document.getElementById('id_option').value=='0' ) { 
				alert(<?php echo "'".$_SESSION[$_SESSION['lang']]['Please, select a option']."'"; ?>);
				
			
			}else{
				
				insert_option();
				
			}
			
			" style="margin-top:2px;"><?php echo $_SESSION[$_SESSION['lang']]['save']; ?></button>
			</form>
			</div>
					</div>
							
						</div>	
					</div>	
				</div>	
</div>