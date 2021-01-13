<?php session_start();
include("functions.php");
include("models/DB.class.php");
include("controllers/EC_Build_value_pie.class.php");
include("controllers/AR_Analyse_risks.class.php");
include("controllers/IR_Risks.class.php");
include("controllers/IR_Agents.class.php");
include("controllers/TR_Analyze_options.class.php");

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);



$riscos = Risks::select_risks();
foreach($riscos['dados'] as $riscos){
				$dados = array();			
				$ar = AR_Analyse_risks::select_analyse_risk_id_risk($riscos['id']);
				$r = AR_Analyse_risks::select_risk_by_id($riscos['id']);
				$ag = Agents::select_ir_agents_id($r['ir_agents_id']);
				
				
				$html = '<body >
			
						
						<div class="card-body" style="text-align: justify">
						<div style="padding:10px; background-color:#FAF4E0;text-align:center;">
							<h3>'.mb_strtoupper($riscos['name']).'
							<br><small>'.$ag['agent'].' | <span style="color:#cd0722"><strong>'.$ar['magnitude_of_risk'].'</strong></span></small>
							</h3>
							
							'.$riscos['summary'].'
						</div>
<br>						
							
							<h4>Explanation of the frenquency or rate (A)</h4>
							';
							
							if($ar['A_explain'] != ""){
								
								$html .= $ar['A_explain'];
								
							}else{
								$html .= '<em>No informed explanations</em>';	
							}
							
							$html .='
							&nbsp;
							&nbsp;
							<div style="padding:9px; background-color:#E8F3F6;float:right;width:15%; text-align:center;margin-top:0px;">
							 '.$ar['A_min_score'].' | 
							 <strong>'.$ar['A_pro_score'].'</strong> | 
							 '.$ar['A_max_score'].'
							 </div>
							 <br>
							<hr style="margin-top:17px;color:#E8F3F6">
							<br>
							<br>
							<br>
							<h4>Explanation of the loss to each item affected (B)</h4>
							';
							
							if($ar['B_explain'] != ""){
								
								$html .= $ar['B_explain'];
								
							}else{
								$html .= '<em>No informed explanations</em>';	
							}
							
							$html .='
							
								<div style="padding:9px; background-color:#E8F3F6;float:right;width:15%; text-align:center;margin-top:0px;">
							 '.$ar['B_min_score'].' | 
							 <strong>'.$ar['B_pro_score'].'</strong> | 
							 '.$ar['B_max_score'].'
							 
							 </div>
							 <br>
							<hr style="margin-top:17px;color:#E8F3F6">
							<br>
							<br>
							<br>
							<h4>Explanation of wich items are affected (C)</h4>
							';
							
							if($ar['C_explain'] != ""){
								
								$html .= $ar['C_explain'];
								
							}else{
								$html .= '<em>No informed explanations</em>';	
							}
							
							$html .='
							&nbsp;
							&nbsp;
							<div style="padding:9px; background-color:#E8F3F6;float:right;width:15%; text-align:center;margin-top:0px;">
								<div style="z-index:999"> '.$ar['C_min_score'].' | 
								 <strong>'.$ar['C_pro_score'].'</strong> | 
								 '.$ar['C_max_score'].'
								 </div>
							  </div>
							 
							<hr style="margin-top:0px;color:#E8F3F6">
							<br>
							<br>
						</div>

					</body>';
					
					$mpdf->AddPage();
					$mpdf->WriteHTML($html);
}










$mpdf->Output(); 

//<img src="1b.jpg">
?>

