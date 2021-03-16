<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Select_values.class.php");

			
											
								
								if(isset($_POST['ratio'])){ 
									$ratio = removerCodigoMalicioso(trim($_POST['ratio'])); 
								}else{ 
									$ratio = ""; 
								}
																
								if(isset($_POST['v_none'])){ 
									$none = removerCodigoMalicioso(trim($_POST['v_none'])); 
								}else{ 
									$none = ""; 
								}	
																
								if(isset($_POST['v_very_small'])){ 
									$very_small = removerCodigoMalicioso(trim($_POST['v_very_small'])); 
								}else{ 
									$very_small = ""; 
								}	
								
																	
								if(isset($_POST['v_small'])){ 
									$small = removerCodigoMalicioso(trim($_POST['v_small'])); 
								}else{ 
									$small = ""; 
								}	
																
								if(isset($_POST['v_medium'])){ 
									$medium = removerCodigoMalicioso(trim($_POST['v_medium'])); 
								}else{ 
									$medium = ""; 
								}	
																
								if(isset($_POST['v_large'])){ 
									$large = removerCodigoMalicioso(trim($_POST['v_large'])); 
								}else{ 
									$large = ""; 
								}	
								
																	
								if(isset($_POST['v_very_large'])){ 
									$very_large = removerCodigoMalicioso(trim($_POST['v_very_large'])); 
								}else{ 
									$very_large = ""; 
								}	
								
															
								if(isset($_POST['v_exceptional'])){ 
									$excepitional = removerCodigoMalicioso(trim($_POST['v_exceptional'])); 
								}else{ 
									$excepitional = ""; 
								}
																
															
								$txterr="";
															
								
								if ( $txterr == "" ){
								
									$i = Select_values_scale::select_ec_values_scale_for_report();
									
									if($i['num'] > 0){
										
										Select_values_scale::update_ec_mixed_values($ratio,$none,$very_small,$small,$medium,$large,$very_large,$excepitional, $_SESSION['project_id']);
										
									}else{ 
										
										Select_values_scale::insert_ec_values_scale($ratio,$none,$very_small,$small,$medium,$large,$very_large,$excepitional);
										
									}	
									
									
									$return[0] = 1;
									$return[1] = $_SESSION[$_SESSION['pt-br']]['Register save successful'];
									
								}else{ 
									
									$return[0] = 0;
									$return[1] = $txterr;
								
								}

echo json_encode($return);
echo 1;

?>








