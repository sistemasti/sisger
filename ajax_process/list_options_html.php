<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/IR_Risks.class.php");
include("../controllers/TR_Analyze_options.class.php");

?>
<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Options']; ?></label>
							<select class="form-control" id="id_option" name="id_option" onchange="select_option(this.value,document.getElementById('risk').value);select_risk_option(this.value,document.getElementById('risk').value)">
							<option value="#" > <?php echo $_SESSION[$_SESSION['lang']]['select']; ?> </option>
							   <?php 
								$op = Analyze_options::select_options_by_risk($_REQUEST['id']);												
								foreach($op['dados'] as $op){
									
									if($op['id'] == $id_option){
									
							  ?>
									<option value="<?php echo $op['id_option']; ?>" ><?php echo $op['option']; ?></option>
							  <?php 
							  
									}else{
												
							  ?>
									<option value="<?php echo $op['id_option']; ?>"><?php echo $op['option']; ?></option>
							  <?php
									}	
								}
							  ?>
							  
							 
							</select>