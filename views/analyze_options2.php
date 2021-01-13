<?php require_once("header.php");
if($_SESSION['perfil_logado'] != "1" && $_SESSION['perfil_logado'] != "2" && $_SESSION['perfil_logado'] != "3"){ 

	echo'<script language= "JavaScript">alert("You dont have permission to access this page");location.href="index"</script>';

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
            <h1><?php echo $_SESSION[$_SESSION['lang']]['Analyze Options']; ?></h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>
			<a href="institution_report"><button type="button" class="btn btn-block btn-outline-success btn-xs">Report</button></a>
          --></div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
			  
			  
			  
			  <?php 
						
						
					$displayBXALL = "none";	
						echo $arquivo=""; 
						echo $agent=""; 
						echo $description=""; 
						echo $id_risk =""; 
						echo $displayHierarquie=""; 
						echo $type=""; 
						//A
								$type_risk 		= "";
								$fdLow 			= "0.0"; 
								$fdProbable 	= "0.0"; 
								$fdHigh 		= "0.0";
								$fdUncert 		= "0.0"; 
								$bxHigh 		= "0.0"; 
								$bxProbable 	= "0.0"; 
								$bxLow 			= "0.0"; 
								$bxUncert 		= "0.0"; 
								$explain 		= "";
								$ley 			= ""; 
								$abey 			= ""; 
								$hey 			= ""; 
								
								$fr_zoom_explanation_fields 	= ''; 
								$fr_zoom_notes_explanation 		= ''; 
								$fr_zoom_document_name 			= ''; 
								$fr_zoom_comment 				= ''; 
								$fr_zoom_document_file 			= ''; 
								
								$fr_zoom_obs 			= ''; 
								$fr_zoom_link 			= ''; 
							
							//B	
								$B_fdLow		= "0.0"; 
								$B_fdProbable	= "0.0";
								$B_fdHigh 		= "0.0"; 
								$B_fdUncert 	= "0.0";
								$B_bxLow 		= "0.0";
								$B_bxProbable 	= "0.0";
								$B_bxHigh 		= "0.0";
								$B_fdUncert 	= "0.0";
								$explain_le 	= "";
								$steps 			= "1"; 
								
								$he 			= "0.0";
								$pl 			= "0.0";
								$le 			= "0.0"; 
								
								$he2 			= "0.0";
								$pl2 			= "0.0";
								$le2 			= "0.0";
								
								$he3 			= "0.0"; 
								$pl3 			= "0.0"; 
								$le3 			= "0.0"; 
								
								$he4 			= "0.0";
								$pl4 			= "0.0"; 
								$le4 			= "0.0"; 
								
								$he5 			= "0.0"; 
								$pl5 			= "0.0";
								$le5 			= "0.0";
								
								$le_zoom_explanation_fields 	= ''; 
								$le_zoom_notes_explanation 		= ''; 
								$le_zoom_document_name 			= ''; 
								$le_zoom_comment 				= ''; 
								$le_zoom_document_file 			= ''; 
								$le_zoom_obs 			= ''; 
								$le_zoom_link 			= ''; 
								
							//C	
								$ia_Inp_Min 	= "0.0";
								$ia_Div_Min 	= "0.0"; 
								$ia_Inp_Med 	= "0.0"; 
								$ia_Div_Med 	= "0.0";
								$ia_Inp_Max 	= "0.0";
								$ia_Div_Max 	= "0.0";
								$ia_Inp_Range 	= "0.0";
								$ia_Div_Range 	= "0.0";
								$explain_ia 	= ""; 
								$type_score 	= "";
								$heia 			= "0.0";
								$plia 			= "0.0";
								$leia 			= "0.0"; 
								
								$ia_zoom_explanation_fields 	= ''; 
								$ia_zoom_notes_explanation 		= ''; 
								$ia_zoom_document_name 			= ''; 
								$ia_zoom_comment 				= ''; 
								$ia_zoom_document_file 			= ''; 
								$ia_zoom_obs 			= ''; 
								$ia_zoom_link 			= ''; 
								
							//Magnitude	
								$magnitude_FR_Low 			= "0.0";  
								$magnitude_FR_Probable 		= "0.0";  
								$magnitude_FR_High 			= "0.0";  
								$magnitude_FR_MEDIA 		= "0.0";  
								$magnitude_LE_Min 			= "0.0";  
								$magnitude_LE_Med 			= "0.0";  
								$magnitude_LE_Max 			= "0.0";  
								$magnitude_LE_MEDIA 		= "0.0";  
								$magnitude_IA_Min 			= "0.0";  
								$magnitude_IA_Med 			= "0.0"; 
								$magnitude_IA_Max 			= "0.0";  
								$magnitude_IA_MEDIA 		= "0.0";  
								$magnitude_SOMA_L 			= "0.0";  
								$magnitude_SOMA_P 			= "0.0"; 
								$magnitude_SOMA_H 			= "0.0";  
								$magnitude_SOMA_RANGE 		= "0.0"; 
								$magnitude_SOMA_MEDIA 		= "0.0";  
						
						if(isset($_GET['view'])){
							
							$status = Risks::select_risk_id($_GET['id']);
							$agente = Agents::select_ir_agents_id($status['ir_agents_id']);
							$ar 	= AR_Analyse_risks::select_analyse_risk_id_risk($_REQUEST['id']);
							
							$id_risk 		= $_GET['id'];
							$displayBXALL = "block";	
							$agent 			= $agente['agent'];
							$description 	= $status['summary'];
							$risk_name 		= $status['name'];
							
							if($ar['num'] > 0)
								
							//A
								$type_risk 		= $ar['A_type_risk']; 
								$fdLow 			= $ar['A_min_score']; 
								$fdProbable 	= $ar['A_pro_score']; 
								$fdHigh 		= $ar['A_max_score']; 
								$fdUncert 		= $ar['A_unc_range']; 
								$bxHigh 		= ($ar['A_max_score'] != '')?$ar['A_max_score']:'0.0';
								$bxProbable 	= ($ar['A_pro_score'] != '')?$ar['A_pro_score']:'0.0'; 
								$bxLow 			= ($ar['A_min_score'] != '')?$ar['A_min_score']:'0.0'; 
								$bxUncert 		= ($ar['A_unc_range'] != '')?$ar['A_unc_range']:'0.0'; 
								$explain 		= ($ar['A_explain'] != '')?$ar['A_explain']:''; 
								$ley 			= $ar['A_field_value_1']; 
								$abey 			= $ar['A_field_value_2']; 
								$hey 			= $ar['A_field_value_3']; 
								
								$fr_zoom_explanation_fields 	= $explain; 
								$fr_zoom_notes_explanation 		= $ar['fr_zoom_notes_explanation']; 
								$fr_zoom_document_name 			= $ar['fr_zoom_document_name']; 
								$fr_zoom_comment 				= $ar['fr_zoom_comment']; 
								$fr_zoom_document_file 			= $ar['fr_zoom_document_file']; 
								
								$fr_zoom_obs 			= $ar['fr_zoom_obs']; 
								$fr_zoom_link 			= $ar['fr_zoom_link']; 
							
							//B	
								$B_fdLow		= $ar['B_min_score']; 
								$B_fdProbable	= $ar['B_pro_score']; 
								$B_fdHigh 		= $ar['B_max_score']; 
								$B_fdUncert 	= $ar['B_unc_range']; 
								$B_bxLow 		= ($ar['B_min_score'] != '')?$ar['B_min_score']:'0.0'; 
								$B_bxProbable 	= ($ar['B_pro_score'] != '')?$ar['B_pro_score']:'0.0';
								$B_bxHigh 		= ($ar['B_max_score'] != '')?$ar['B_max_score']:'0.0';
								$B_fdUncert 	= $ar['B_unc_range']; 
								$explain_le 	= $ar['B_explain']; 
								$steps 			= $ar['B_steps']; 
								
								$he 			= $ar['B_field_value_1']; 
								$pl 			= $ar['B_field_value_2']; 
								$le 			= $ar['B_field_value_3']; 
								
								$he2 			= $ar['B_field_value_1']; 
								$pl2 			= $ar['B_field_value_2']; 
								$le2 			= $ar['B_field_value_3'];
								
								$he3 			= $ar['B_field_value_1']; 
								$pl3 			= $ar['B_field_value_2']; 
								$le3 			= $ar['B_field_value_3']; 
								
								$he4 			= $ar['B_field_value_1']; 
								$pl4 			= $ar['B_field_value_2']; 
								$le4 			= $ar['B_field_value_3']; 
								
								$he5 			= $ar['B_field_value_1']; 
								$pl5 			= $ar['B_field_value_2']; 
								$le5 			= $ar['B_field_value_3']; 
								
								$le_zoom_explanation_fields 	= $explain_le; 
								$le_zoom_notes_explanation 		= $ar['le_zoom_notes_explanation']; 
								$le_zoom_document_name 			= $ar['le_zoom_document_name']; 
								$le_zoom_comment 				= $ar['le_zoom_comment']; 
								$le_zoom_document_file 			= $ar['le_zoom_document_file']; 
								
							//C	
								$ia_Inp_Min 	= $ar['C_min_score']; 
								$ia_Div_Min 	= ($ar['C_min_score'] != '')?$ar['C_min_score']:'0.0';
								$ia_Inp_Med 	= $ar['C_pro_score']; 
								$ia_Div_Med 	= ($ar['C_pro_score'] != '')?$ar['C_pro_score']:'0.0';
								$ia_Inp_Max 	= $ar['C_max_score']; 
								$ia_Div_Max 	= ($ar['C_max_score'] != '')?$ar['C_max_score']:'0.0';
								$ia_Inp_Range 	= $ar['C_unc_range']; 
								$ia_Div_Range 	= ($ar['C_unc_range'] != '')?$ar['C_unc_range']:'0.0';
								$explain_ia 	= $ar['C_explain']; 
								$type_score 	= $ar['C_type_score']; 
								$heia 			= $ar['C_field_value_1']; 
								$plia 			= $ar['C_field_value_2']; 
								$leia 			= $ar['C_field_value_3']; 
								//echo $ar['C_pro_score'];
								$ia_zoom_explanation_fields 	= $explain_ia; 
								$ia_zoom_notes_explanation 		= $ar['ia_zoom_notes_explanation']; 
								$ia_zoom_document_name 			= $ar['ia_zoom_document_name']; 
								$ia_zoom_comment 				= $ar['ia_zoom_comment']; 
								$ia_zoom_document_file 			= $ar['ia_zoom_document_file']; 
								
							//Magnitude	
								$magnitude_FR_Low 			= ($ar['A_min_score'] != '')?$ar['A_min_score']:'0.0'; 
								$magnitude_FR_Probable 		= ($ar['A_pro_score'] != '')?$ar['A_pro_score']:'0.0'; 
								$magnitude_FR_High 			= ($ar['A_max_score'] != '')?$ar['A_max_score']:'0.0'; 
								$magnitude_FR_MEDIA 		= ($ar['Expected_Scores_FR'] != '')?$ar['Expected_Scores_FR']:'0.0'; 
								$magnitude_LE_Min 			= ($ar['B_min_score'] != '')?$ar['B_min_score']:'0.0'; 
								$magnitude_LE_Med 			= ($ar['B_pro_score'] != '')?$ar['B_pro_score']:'0.0'; 
								$magnitude_LE_Max 			= ($ar['B_max_score'] != '')?$ar['B_max_score']:'0.0'; 
								$magnitude_LE_MEDIA 		= ($ar['Expected_Scores_LE'] != '')?$ar['Expected_Scores_FR']:'0.0'; 
								$magnitude_IA_Min 			= ($ar['C_min_score'] != '')?$ar['C_min_score']:'0.0'; 
								$magnitude_IA_Med 			= ($ar['C_pro_score'] != '')?$ar['C_pro_score']:'0.0';
								$magnitude_IA_Max 			= ($ar['C_max_score'] != '')?$ar['C_max_score']:'0.0'; 
								$magnitude_IA_MEDIA 		= ($ar['Expected_Scores_IA'] != '')?$ar['Expected_Scores_IA']:'0.0'; 
								$magnitude_SOMA_L 			= ($ar['MR_low'] != '')?$ar['MR_low']:'0.0'; 
								$magnitude_SOMA_P 			= ($ar['MR_Probable'] != '')?$ar['MR_Probable']:'0.0'; 
								$magnitude_SOMA_H 			= ($ar['MR_High'] != '')?$ar['MR_High']:'0.0'; 
								$magnitude_SOMA_RANGE 		= ($ar['MR_U_Range'] != '')?$ar['MR_U_Range']:'0.0'; 
								$magnitude_SOMA_MEDIA 		= ($ar['magnitude_of_risk'] != '')?$ar['magnitude_of_risk']:'0.0'; 
								
								
							
						}	
							
						
						?>
			
				<script>
				
				function selectElement(id, valueToSelect) {    
    let element = document.getElementById(id);
    element.value = valueToSelect;
}
					
				function select_risk(id) {		
						
					  if($("#risk").val() == "" || $("#risk").val() == null){	
					  document.getElementById('bxAll').style.display='none';							
						document.getElementById('bxFrm1').style.display = 'none';
						document.getElementById('type_risk').value = 6;	
					  }
					  	
					  var i = '#row'+id;
					  $.ajax({
						type: "POST",
						url: "ajax_process/select_risk.php",
						data: {
							id: id
						},
						dataType: 'json',
						success: function(data) {
							//Magnitude
							
							$("#magnitude_FR_Low").html(data['fdLow']);
							$("#magnitude_FR_Probable").html(data['fdProbable']);
							$("#magnitude_FR_High").html(data['fdHigh']);
							
							$("#magnitude_LE_Min").html(data['B_fdLow']);
							$("#magnitude_LE_Med").html(data['B_fdProbable']);
							$("#magnitude_LE_Max").html(data['B_fdHigh']);
							
							$("#magnitude_IA_Min").html(data['ia_Inp_Min']);
							$("#magnitude_IA_Med").html(data['ia_Inp_Med']);
							$("#magnitude_IA_Max").html(data['ia_Inp_Max']);
							
							$("#magnitude_SOMA_L").html(data['magnitude_SOMA_L']);
							$("#magnitude_SOMA_P").html(data['magnitude_SOMA_P']);
							$("#magnitude_SOMA_H").html(data['magnitude_SOMA_H']);
							//$("#magnitude_SOMA_RANGE").html(data['magnitude_SOMA_RANGE']);
							
							$("#magnitude_FR_MEDIA").html(data['magnitude_FR_MEDIA']);
							$("#magnitude_LE_MEDIA").html(data['magnitude_LE_MEDIA']);
							$("#magnitude_IA_MEDIA").html(data['magnitude_IA_MEDIA']);
							
							$("#magnitude_SOMA_MEDIA").html(data['magnitude_SOMA_MEDIA']);
							
						    $("#agent").val(data['agent']);
						    $("#description").val(data['summary']);						
						    $("#explain_le").val('testeeeeeeeeeeee');						
						    $("#zoomRisk").html("<strong>"+data['risk']+"</strong>");						
						    $("#zoomRisk_le").html("<strong>"+data['risk']+"</strong>");						
						    $("#zoomRisk_ia").html("<strong>"+data['risk']+"</strong>");	
							//alert(data['type_calc']);
						 	if(data['type_calc'] == 3){
								var x = document.querySelectorAll("#bdgTOTAL");
								x[0].style.setProperty("background-color", "#ffc107", "important");
							}
							
							if(data['type_calc'] == 2){
								var x = document.querySelectorAll("#bdgTOTAL");
								x[0].style.setProperty("background-color", "#17a2b8", "important");
							}
							
							if(data['type_calc'] == 1){
								var x = document.querySelectorAll("#bdgTOTAL");
								x[0].style.setProperty("background-color", "#48b461", "important");
							}
							
							if(data['type_calc'] == ''){
								var x = document.querySelectorAll("#bdgTOTAL");
								x[0].style.setProperty("background-color", "#ccc", "important");
							}		 			
							
							//A
							//document.getElementById('leia').options[0]=new Option("Selected by zoom", ca_low, true, true);
							//alert(data['type_risk']);
						    $("#type_risk").val(data['type_risk']);	
							//ley
							if(data['type_risk'] == 3){
								
								document.getElementById("ley").readOnly = true;
								document.getElementById("hey").readOnly = true;
							}
							
							if(data['type_risk'] == 4){
								
								document.getElementById("ley").readOnly = true;
								document.getElementById("hey").readOnly = true;
								document.getElementById("abey").readOnly = true;
							}
							
							if(data['type_risk'] == 6 || data['type_risk'] == null){
								
								document.getElementById('bxFrm1').style.display = 'none';
								
							}else{
								
								document.getElementById('bxFrm1').style.display = 'block';
								
							}	
								
							carregaFormulario(data['type_risk']);
							
						    $("#fdLow").val(data['fdLow']);
						    $("#bxLow").html(data['fdLow']);
							
						    $("#fdProbable").val(data['fdProbable']);
						    $("#bxProbable").html(data['fdProbable']);
							
						    $("#fdUncert").val(data['fdUncert']);							
						    $("#bxUncert").html(data['fdUncert']);
							
						    $("#fdHigh").html(data['fdHigh']);
						    $("#bxHigh").html(data['fdHigh']);
							
						    $("#fr_zoom_obs").html(data['fr_zoom_obs']);
														
							document.getElementById('type_risk').value = data['type_risk'];						 
							
						    $("#explain").val(data['explain']);
						    $("#ley").val(data['ley']);
						    $("#abey").val(data['abey']);
						    $("#hey").val(data['hey']);						
						   
							if(data['type_risk'] == "" || data['type_risk'] == null){
								document.getElementById('type_risk').value = 6;								
							}	
						   
						    $("#fr_zoom_explanation_fields").val(data['explain']);
						    $("#fr_zoom_notes_explanation").val(data['fr_zoom_notes_explanation']);
						    $("#fr_zoom_document_name").val(data['fr_zoom_document_name']);
						    $("#fr_zoom_comment").val(data['fr_zoom_comment']);						
						    $("#fr_zoom_obs").val(data['fr_zoom_obs']);						
						    $("#fr_zoom_link").val(data['fr_zoom_link']);						
						    //$("#fr_zoom_document_file").val(data['fr_zoom_document_file']);						
						    //alert(data['fr_zoom_document_file']);				
							//$("#fr_zoom_document_file_bx").html("<a href='"+data['fr_zoom_document_file']+"' target='_blank'>"+data['fr_zoom_document_file']+"</a>");				   
							 				
							$("#fr_zoom_link_bx").html("<a href='"+data['fr_zoom_link']+"' target='_blank'>"+data['fr_zoom_link']+"</a>");				   
							
							//B							
							$("#B_fdLow").val(data['B_fdLow']);
							$("#B_fdProbable").val(data['B_fdProbable']);
							$("#B_fdHigh").val(data['B_fdHigh']);
							$("#B_fdUncert").val(data['B_fdUncert']);
														
							$("#B_bxLow").html(data['B_fdLow']);
							$("#B_bxProbable").html(data['B_fdProbable']);
							$("#B_bxHigh").html(data['B_fdHigh']);
							$("#lei_Div_Range").html(data['B_fdUncert']);
							
							$("#explain_le").val(data['explain_le']);
							
							$("#le_zoom_obs").val(data['le_zoom_obs']);						
						    $("#le_zoom_link").val(data['le_zoom_link']);	
							$("#le_zoom_explanation_fields").val(data['explain_le']);
						    $("#le_zoom_notes_explanation").val(data['le_zoom_notes_explanation']);
						    $("#le_zoom_document_name").val(data['le_zoom_document_name']);
						    $("#le_zoom_comment").val(data['le_zoom_comment']);						
							// $("#le_zoom_document_file").val(data['le_zoom_document_file']);
							
							if(data['steps'] == "1"){
								document.getElementById("steps1").checked = true;
								
								document.getElementById('bxWords').style.display='block';
								document.getElementById('bxFraction').style.display='none';
								document.getElementById('bxPercentage').style.display='none';
								document.getElementById('bxDecimals').style.display='none';
								document.getElementById('bxAnyDecimals').style.display='none';
								
								$("#he").val(data['he']);
								$("#pl").val(data['pl']);
								$("#le").val(data['le']);
								
							}	
							
							if(data['steps'] == "2"){
								document.getElementById("steps2").checked = true;
								
								document.getElementById('bxWords').style.display='none';
								document.getElementById('bxFraction').style.display='block';
								document.getElementById('bxPercentage').style.display='none';
								document.getElementById('bxDecimals').style.display='none';
								document.getElementById('bxAnyDecimals').style.display='none';
								
								$("#he2").val(data['he2']);
								$("#pl2").val(data['pl2']);
								$("#le2").val(data['le2']);
								
							}	
							
							if(data['steps'] == "3"){
								document.getElementById("steps3").checked = true;
								
								document.getElementById('bxWords').style.display='none';
								document.getElementById('bxFraction').style.display='none';
								document.getElementById('bxPercentage').style.display='block';
								document.getElementById('bxDecimals').style.display='none';
								document.getElementById('bxAnyDecimals').style.display='none';
								
								selectElement('he3', data['he3']);
								selectElement('pl3', data['pl3']);
								selectElement('le3', data['le3']);
								//alert(data['le3']);
								//document.getElementById('he3').options[0]=new Option(<?php echo "'~0.1%  loss of value in each item affected.'"; ?>, data['he3'], true, true);
								/* $("#he3").val(data['he3']);
								$("#pl3").val(data['pl3']);
								$("#le3").val(data['le3']);
								 */
							}	
							
							if(data['steps'] == "4"){
								
								document.getElementById("steps4").checked = true;								
								
								document.getElementById('bxWords').style.display='none';
								document.getElementById('bxFraction').style.display='none';
								document.getElementById('bxPercentage').style.display='none';
								document.getElementById('bxDecimals').style.display='block';
								document.getElementById('bxAnyDecimals').style.display='none';
								
								$("#he4").val(data['he4']);
								$("#pl4").val(data['pl4']);
								$("#le4").val(data['le4']);
								
							}	
							
							if(data['steps'] == "5"){
								
								document.getElementById("steps5").checked = true;
								
								document.getElementById('bxWords').style.display='none';
								document.getElementById('bxFraction').style.display='none';
								document.getElementById('bxPercentage').style.display='none';
								document.getElementById('bxDecimals').style.display='none';
								document.getElementById('bxAnyDecimals').style.display='block';
								
								$("#he5").val(data['he5']);
								$("#pl5").val(data['pl5']);
								$("#le5").val(data['le5']);
								
							}	
							 
							if(data['steps'] == ""){
								
								document.getElementById("steps1").checked = true;
								
								document.getElementById('bxWords').style.display='block';
								document.getElementById('bxFraction').style.display='none';
								document.getElementById('bxPercentage').style.display='none';
								document.getElementById('bxDecimals').style.display='none';
								document.getElementById('bxAnyDecimals').style.display='none';
								
								$("#B_bxLow").html("0.0");
								$("#B_bxProbable").html("0.0");
								$("#B_bxHigh").html("0.0");
								$("#lei_Div_Range").html("0.0");
								
								$("#he").val("");
								$("#pl").val("");
								$("#le").val("");
							}	
							
						//	$("#le_zoom_document_file_bx").html("<a href='"+data['le_zoom_document_file']+"' target='_blank'>"+data['le_zoom_document_file']+"</a>");
							
							//$("#le_zoom_document_file").val(data['le_zoom_document_file']);
							
							$("#le_zoom_link_bx").html("<a href='"+data['le_zoom_link']+"' target='_blank'>"+data['le_zoom_link']+"</a>");	
							
							
							
							
							//C
							$("#ia_Inp_Min").val(data['ia_Inp_Min']);
							$("#ia_Inp_Med").val(data['ia_Inp_Med']);
							$("#ia_Inp_Max").val(data['ia_Inp_Max']);
							$("#ia_Inp_Range").val(data['ia_Inp_Range']);
							$("#explain_ia").val(data['explain_ia']);
							//alert(data['explain_ia']);
							$("#ia_Div_Min").html(data['ia_Inp_Min']);
							$("#ia_Div_Med").html(data['ia_Inp_Med']);
							$("#ia_Div_Max").html(data['ia_Inp_Max']);
							$("#ia_Div_Range").html(data['ia_Inp_Range']);
						
							
							$("#type_score").val(data['type_score']);
							
							if(data['type_score'] == 1){
								
								document.getElementById("type_score_1").checked = true;
								document.getElementById("type_score_2").checked = false;
								document.getElementById('bxFractionAffected').style.display='block';
								/* */document.getElementById('bxFractionAffected_o').style.display='block';
								document.getElementById('bxValuePieAffected_o').style.display='none'; 
							}	
							
							if(data['type_score'] == 2){
								document.getElementById("type_score_2").checked = true;
								document.getElementById("type_score_1").checked = false;
								document.getElementById('bxFractionAffected').style.display='none';
								/* */
								document.getElementById('bxFractionAffected_o').style.display='none';
								document.getElementById('bxValuePieAffected_o').style.display='block'; 
								
							}	
							
							if(data['C_type_list'] == 1){
							//	document.getElementById("type_list_1").checked = true;
								//document.getElementById("type_list_2").checked = false;
								
							}	
							if(data['C_type_list'] == 2){
								//document.getElementById("type_list_1").checked = false;
								//document.getElementById("type_list_2").checked = true;
								
							}	
							
							/* $("#heia").val(data['heia']);
							$("#plia").val(data['plia']);
							$("#leia").val(data['leia']); */
							
							if(data['leia'] == "0.5"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/30 000, ".$_SESSION[$_SESSION['lang']]['Less than a trace of the whole asset value but not zero']."'"; ?>, data['leia'], true, true);
							}
							
							if(data['leia'] == "1.0"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/10 000, ".$_SESSION[$_SESSION['lang']]['A trace of the whole asset value']."'"; ?>, data['leia'], true, true);
							}
							
							if(data['leia'] == "1.5"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/3 000, ".$_SESSION[$_SESSION['lang']]['Between a tiny fraction and a trace of the whole asset value']."'"; ?>, data['leia'], true, true);
							}
							
							if(data['leia'] == "2.0"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/1000, ".$_SESSION[$_SESSION['lang']]['A tiny fraction of the whole asset value']."'"; ?>, data['leia'], true, true);
							}
							
							if(data['leia'] == "2.5"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/300, ".$_SESSION[$_SESSION['lang']]['Between small and tiny fraction of the whole asset value']."'"; ?>, data['leia'], true, true);
							}
							
							if(data['leia'] == "3.0"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/100, ".$_SESSION[$_SESSION['lang']]['A small fraction of the whole asset value']."'"; ?>, data['leia'], true, true);
							}
							
							if(data['leia'] == "3.5"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/30, ".$_SESSION[$_SESSION['lang']]['Between large and small fraction of the whole asset value']."'"; ?>, data['leia'], true, true);
							}
							
							if(data['leia'] == "4.0"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/10, ".$_SESSION[$_SESSION['lang']]['A large fraction of the whole asset value']."'"; ?>, data['leia'], true, true);
							}
							
							if(data['leia'] == "4.5"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/3, ".$_SESSION[$_SESSION['lang']]['Between most and a large fraction of the whole asset value']."'"; ?>, data['leia'], true, true);
							}
							
							if(data['leia'] == "5.0"){
								document.getElementById('leia').options[0]=new Option(<?php echo "'~1/1, ".$_SESSION[$_SESSION['lang']]['All or most of the whole asset value']."'"; ?>, data['leia'], true, true);
							}
							
							//plia
							if(data['plia'] == "0.5"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/30 000, ".$_SESSION[$_SESSION['lang']]['Less than a trace of the whole asset value but not zero']."'"; ?>, data['plia'], true, true);
							}
							
							if(data['plia'] == "1.0"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/10 000, ".$_SESSION[$_SESSION['lang']]['A trace of the whole asset value']."'"; ?>, data['plia'], true, true);
							}
							
							if(data['plia'] == "1.5"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/3 000, ".$_SESSION[$_SESSION['lang']]['Between a tiny fraction and a trace of the whole asset value']."'"; ?>, data['plia'], true, true);
							}
							
							if(data['plia'] == "2.0"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/1000, ".$_SESSION[$_SESSION['lang']]['A tiny fraction of the whole asset value']."'"; ?>, data['plia'], true, true);
							}
							
							if(data['plia'] == "2.5"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/300, ".$_SESSION[$_SESSION['lang']]['Between small and tiny fraction of the whole asset value']."'"; ?>, data['plia'], true, true);
							}
							
							if(data['plia'] == "3.0"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/100, ".$_SESSION[$_SESSION['lang']]['A small fraction of the whole asset value']."'"; ?>, data['plia'], true, true);
							}
							
							if(data['plia'] == "3.5"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/30, ".$_SESSION[$_SESSION['lang']]['Between large and small fraction of the whole asset value']."'"; ?>, data['plia'], true, true);
							}
							
							if(data['plia'] == "4.0"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/10, ".$_SESSION[$_SESSION['lang']]['A large fraction of the whole asset value']."'"; ?>, data['plia'], true, true);
							}
							
							if(data['plia'] == "4.5"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/3, ".$_SESSION[$_SESSION['lang']]['Between most and a large fraction of the whole asset value']."'"; ?>, data['plia'], true, true);
							}
							
							if(data['plia'] == "5.0"){
								document.getElementById('plia').options[0]=new Option(<?php echo "'~1/1, ".$_SESSION[$_SESSION['lang']]['All or most of the whole asset value']."'"; ?>, data['plia'], true, true);
							}
							
							//heia
							//alert(data['heia']);
							if(data['heia'] == "0.5"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/30 000, ".$_SESSION[$_SESSION['lang']]['Less than a trace of the whole asset value but not zero']."'"; ?>, data['heia'], true, true);
							}
							
							if(data['heia'] == "1.0"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/10 000, ".$_SESSION[$_SESSION['lang']]['A trace of the whole asset value']."'"; ?>, data['heia'], true, true);
							}
							
							if(data['heia'] == "1.5"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/3 000, ".$_SESSION[$_SESSION['lang']]['Between a tiny fraction and a trace of the whole asset value']."'"; ?>, data['heia'], true, true);
							}
							
							if(data['heia'] == "2.0"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/1000, ".$_SESSION[$_SESSION['lang']]['A tiny fraction of the whole asset value']."'"; ?>, data['heia'], true, true);
							}
							
							if(data['heia'] == "2.5"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/300, ".$_SESSION[$_SESSION['lang']]['Between small and tiny fraction of the whole asset value']."'"; ?>, data['heia'], true, true);
							}
							
							if(data['heia'] == "3.0"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/100, ".$_SESSION[$_SESSION['lang']]['A small fraction of the whole asset value']."'"; ?>, data['heia'], true, true);
							}
							
							if(data['heia'] == "3.5"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/30, ".$_SESSION[$_SESSION['lang']]['Between large and small fraction of the whole asset value']."'"; ?>, data['heia'], true, true);
							}
							
							if(data['heia'] == "4.0"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/10, ".$_SESSION[$_SESSION['lang']]['A large fraction of the whole asset value']."'"; ?>, data['heia'], true, true);
							}
							
							if(data['heia'] == "4.5"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/3, ".$_SESSION[$_SESSION['lang']]['Between most and a large fraction of the whole asset value']."'"; ?>, data['heia'], true, true);
							}
							
							if(data['heia'] == "5.0"){
								document.getElementById('heia').options[0]=new Option(<?php echo "'~1/1, ".$_SESSION[$_SESSION['lang']]['All or most of the whole asset value']."'"; ?>, data['heia'], true, true);
							}
							
							/* document.getElementById('plia').options[0] = new Option("Selected by zoom", ca_media, true, true);
							document.getElementById('heia').options[0] = new Option("Selected by zoom", ca_high, true, true);	 */
							//alert(data['ia_zoom_explanation_fields']);
							$("#ia_zoom_explanation_fields").val(data['explain_ia']);
						    $("#ia_zoom_notes_explanation").val(data['ia_zoom_notes_explanation']);
						    $("#ia_zoom_document_name").val(data['ia_zoom_document_name']);
						    $("#ia_zoom_comment").val(data['ia_zoom_comment']);			
							$("#ia_zoom_obs").val(data['ia_zoom_obs']);						
						    $("#ia_zoom_link").val(data['ia_zoom_link']);			
						   // $("#ia_zoom_document_file").val(data['ia_zoom_document_file']);			
						    //$("#ia_zoom_document_file").val(data['ia_zoom_document_file']);
							
						//	$("#ia_zoom_document_file_bx").html("<a href='"+data['ia_zoom_document_file']+"' target='_blank'>"+data['ia_zoom_document_file']+"</a>");
							
							$("#ia_zoom_link_bx").html("<a href='"+data['ia_zoom_link']+"' target='_blank'>"+data['ia_zoom_link']+"</a>");	
							
							
						}
					  });
					}
					
					
					
					
					
				function select_risk_option(id_option,id_risk,v=0) {			
				 //var i = '#row'+id;
				 
				 if(document.getElementById('risk').value != "#" && document.getElementById('id_option').value != "#"){
					  document.getElementById('bxAll').style.display='block';
				 }else{
					 document.getElementById('bxAll').style.display='none';
				 } 
				 
				  /* alert(document.getElementById('risk').value);
				  alert(document.getElementById('id_option').value); */
				 
				  $.ajax({
					type: "POST",
					url: "ajax_process/select_risk_option.php",
					data: {
						id_option: id_option,
						id_risk: id_risk
					},
					dataType: 'json',
					success: function(data) {
						
							//alert('1');
							//Magnitude
							
							$("#magnitude_FR_Low_o").html(data['fdLow_o']);
							$("#magnitude_FR_Probable_o").html(data['fdProbable_o']);
							$("#magnitude_FR_High_o").html(data['fdHigh_o']);
							
							$("#magnitude_LE_Min_o").html(data['B_fdLow_o']);
							$("#magnitude_LE_Med_o").html(data['B_fdProbable_o']);
							$("#magnitude_LE_Max_o").html(data['B_fdHigh_o']);
							
							if(data['ia_Inp_Min_o'] == undefined || data['ia_Inp_Min_o'] == 'INF'  || data['ia_Inp_Min_o'] == '-INF'  ){
								$("#magnitude_IA_Min_o").html('0.0');	
							}else{
								$("#magnitude_IA_Min_o").html(data['ia_Inp_Min_o']);	
							}
							
							if(data['ia_Inp_Med_o'] == undefined || data['ia_Inp_Med_o'] == 'INF'  || data['ia_Inp_Med_o'] == '-INF' ){
								$("#magnitude_IA_Med_o").html('0.0');	
							}else{
								$("#magnitude_IA_Med_o").html(data['ia_Inp_Med_o']);	
							}
							
							if(data['ia_Inp_Max_o'] == undefined || data['ia_Inp_Max_o'] == 'INF'  || data['ia_Inp_Max_o'] == '-INF' ){
								$("#magnitude_IA_Max_o").html('0.0');	
							}else{
								$("#magnitude_IA_Max_o").html(data['ia_Inp_Max_o']);	
							}
							
							//$("#magnitude_IA_Med_o").html(data['ia_Inp_Med_o']);
							//$("#magnitude_IA_Max_o").html(data['ia_Inp_Max_o']);
							
							$("#magnitude_SOMA_L_o").html(data['magnitude_SOMA_L_o']);
							$("#magnitude_SOMA_P_o").html(data['magnitude_SOMA_P_o']);
							$("#magnitude_SOMA_H_o").html(data['magnitude_SOMA_H_o']);
							//$("#magnitude_SOMA_RANGE").html(data['magnitude_SOMA_RANGE']);
							
							$("#magnitude_FR_MEDIA_o").html(data['magnitude_FR_MEDIA_o']);
							$("#magnitude_LE_MEDIA_o").html(data['magnitude_LE_MEDIA_o']);
							$("#magnitude_IA_MEDIA_o").html(data['magnitude_IA_MEDIA_o']);
							
							$("#magnitude_SOMA_MEDIA_o").html(data['magnitude_SOMA_MEDIA_o']);
							//alert('3');
						    $("#agent_o").val(data['agent_o']);
						    $("#description_o").val(data['summary_o']);						
						    //alert(data['risk']);					
						    $("#zoomRisk_o").html("<strong>"+data['risk']+"</strong>");						
						    $("#zoomRisk_le_o").html("<strong>"+data['risk']+"</strong>");						
						    $("#zoomRisk_ia_o").html("<strong>"+data['risk']+"</strong>");						
							//alert('2');
							
							//alert(data['type_calc']);
							if(data['type_calc'] == 3){
								var x = document.querySelectorAll("#bdgTOTAL_o");
								x[0].style.setProperty("background-color", "#ffc107", "important");
							}
							
							if(data['type_calc'] == 2){
								var x = document.querySelectorAll("#bdgTOTAL_o");
								x[0].style.setProperty("background-color", "#17a2b8", "important");
							}
							
							if(data['type_calc'] == 1){
								var x = document.querySelectorAll("#bdgTOTAL_o");
								x[0].style.setProperty("background-color", "#48b461", "important");
							}
							
							if(data['type_calc'] == ''){
								var x = document.querySelectorAll("#bdgTOTAL_o");
								x[0].style.setProperty("background-color", "#ccc", "important");
							}
							
							if(typeof data['type_calc'] === 'undefined'){
								var x = document.querySelectorAll("#bdgTOTAL_o");
								x[0].style.setProperty("background-color", "#17a2b8", "important");
							}
							
							
							
							//A
							//document.getElementById('leia').options[0]=new Option("Selected by zoom", ca_low, true, true);
							
						  //  $("#type_risk").val(data['type_risk']);	
							//ley
						/* 	if(data['type_risk'] == 3){
								
								document.getElementById("ley_o").readOnly = true;
								document.getElementById("hey_o").readOnly = true;
							}
							
							if(data['type_risk'] == 4){
								
								document.getElementById("ley_o").readOnly = true;
								document.getElementById("hey_o").readOnly = true;
								document.getElementById("abey_o").readOnly = true;
							}
							
							if(data['type_risk'] == 6 || data['type_risk'] == null){
								
								document.getElementById('bxFrm1').style.display = 'none';
								
							}else{
								
								document.getElementById('bxFrm1').style.display = 'block';
								
							} */	
								//alert('3');
							
						    $("#fdLow_o").val(data['fdLow_o']);
						    $("#bxLow_o").html(data['fdLow_o']);
							
						    $("#fdProbable_o").val(data['fdProbable_o']);
						    $("#bxProbable_o").html(data['fdProbable_o']);
							
						    $("#fdUncert_o").val(data['fdUncert_o']);							
						    $("#bxUncert_o").html(data['fdUncert_o']);
							
						    $("#fdHigh_o").val(data['fdHigh_o']);
						    $("#bxHigh_o").html(data['fdHigh_o']);
							
							//alert("fdHigh_o "+data['fdHigh_o']);
							
						    $("#fr_zoom_obs_o").html(data['fr_zoom_obs_o']);
														
							//document.getElementById('type_risk').value = data['type_risk'];						 
							
						    $("#explain_o").val(data['explain_o']);
						    $("#ley_o").val(data['ley_o']);
						    $("#abey_o").val(data['abey_o']);
						    $("#hey_o").val(data['hey_o']);						
						   
							/* if(data['type_risk'] == "" || data['type_risk'] == null){
								document.getElementById('type_risk').value = 6;								
							} */	
						   
						    $("#fr_zoom_explanation_fields_o").val(data['explain_o']);
						    $("#fr_zoom_notes_explanation_o").val(data['fr_zoom_notes_explanation_o']);
						    $("#fr_zoom_document_name_o").val(data['fr_zoom_document_name_o']);
						    $("#fr_zoom_comment_o").val(data['fr_zoom_comment_o']);						
						    $("#fr_zoom_obs_o").val(data['fr_zoom_obs_o']);						
						    $("#fr_zoom_link_o").val(data['fr_zoom_link_o']);						
						   // $("#fr_zoom_document_file_o").val(data['fr_zoom_document_file_o']);						
						    //alert(data['fr_zoom_document_file']);				
							//$("#fr_zoom_document_file_bx_o").html("<a href='"+data['fr_zoom_document_file_o']+"' target='_blank'>"+data['fr_zoom_document_file_o']+"</a>");				   
							 				
							$("#fr_zoom_link_bx_o").html("<a href='"+data['fr_zoom_link_o']+"' target='_blank'>"+data['fr_zoom_link_o']+"</a>");				   
							
							//B							
							$("#B_fdLow_o").val(data['B_fdLow_o']);
							//alert(data['B_fdLow_o']);
							$("#B_fdProbable_o").val(data['B_fdProbable_o']);
							$("#B_fdHigh_o").val(data['B_fdHigh_o']);
							$("#B_fdUncert_o").val(data['B_fdUncert_o']);
														
							$("#B_bxLow_o").html(data['B_fdLow_o']);
							$("#B_bxProbable_o").html(data['B_fdProbable_o']);
							$("#B_bxHigh_o").html(data['B_fdHigh_o']);
							$("#lei_Div_Range_o").html(data['B_fdUncert_o']);
							
							$("#explain_le_o").val(data['explain_le_o']);
							
							$("#le_zoom_obs_o").val(data['le_zoom_obs_o']);						
						    $("#le_zoom_link_o").val(data['le_zoom_link_o']);	
							$("#le_zoom_explanation_fields_o").val(data['explain_le_o']);
						    $("#le_zoom_notes_explanation_o").val(data['le_zoom_notes_explanation_o']);
						    $("#le_zoom_document_name_o").val(data['le_zoom_document_name_o']);
						    $("#le_zoom_comment_o").val(data['le_zoom_comment_o']);						
							// $("#le_zoom_document_file").val(data['le_zoom_document_file']);
							
							
							//alert($("#steps1").prop("checked"));
							if($("#steps1").prop("checked")){
								//document.getElementById("steps1_o").checked = true;
								
								document.getElementById('bxWords_o').style.display='block';
								document.getElementById('bxFraction_o').style.display='none';
								document.getElementById('bxPercentage_o').style.display='none';
								document.getElementById('bxDecimals_o').style.display='none';
								document.getElementById('bxAnyDecimals_o').style.display='none';
								
								document.getElementById('stepSelected').value='1';
								
								$("#he_o").val(data['he_o']);
								$("#pl_o").val(data['pl_o']);
								$("#le_o").val(data['le_o']);
								
							}	
							
							if($("#steps2").prop("checked")){
								//document.getElementById("steps2_o").checked = true;
								
								document.getElementById('bxWords_o').style.display='none';
								document.getElementById('bxFraction_o').style.display='block';
								document.getElementById('bxPercentage_o').style.display='none';
								document.getElementById('bxDecimals_o').style.display='none';
								document.getElementById('bxAnyDecimals_o').style.display='none';
								
								document.getElementById('stepSelected').value='2';
								
								$("#he2_o").val(data['he2_o']);
								$("#pl2_o").val(data['pl2_o']);
								$("#le2_o").val(data['le2_o']);
								
							}	
							
							if($("#steps3").prop("checked")){
								//document.getElementById("steps3_o").checked = true;
								
								document.getElementById('bxWords_o').style.display='none';
								document.getElementById('bxFraction_o').style.display='none';
								document.getElementById('bxPercentage_o').style.display='block';
								document.getElementById('bxDecimals_o').style.display='none';
								document.getElementById('bxAnyDecimals_o').style.display='none';
								
								document.getElementById('stepSelected').value='3';
								
								$("#he3_o").val(data['he3_o']);
								$("#pl3_o").val(data['pl3_o']);
								$("#le3_o").val(data['le3_o']);
								
							}	
							
							if($("#steps4").prop("checked")){
								
								//document.getElementById("steps4_o").checked = true;								
								
								document.getElementById('bxWords_o').style.display='none';
								document.getElementById('bxFraction_o').style.display='none';
								document.getElementById('bxPercentage_o').style.display='none';
								document.getElementById('bxDecimals_o').style.display='block';
								document.getElementById('bxAnyDecimals_o').style.display='none';
								
								document.getElementById('stepSelected').value='4';
								
								$("#he4_o").val(data['he4_o']);
								$("#pl4_o").val(data['pl4_o']);
								$("#le4_o").val(data['le4_o']);
								
							}	
							
							if($("#steps5").prop("checked")){
								
								//document.getElementById("steps5_o").checked = true;
								
								document.getElementById('bxWords_o').style.display='none';
								document.getElementById('bxFraction_o').style.display='none';
								document.getElementById('bxPercentage_o').style.display='none';
								document.getElementById('bxDecimals_o').style.display='none';
								document.getElementById('bxAnyDecimals_o').style.display='block';
								
								document.getElementById('stepSelected').value='5';
								
								$("#he5_o").val(data['he5_o']);
								$("#pl5_o").val(data['pl5_o']);
								$("#le5_o").val(data['le5_o']);
								
							}	
							 
							/* if($("#steps4").prop("checked")){
								
								//document.getElementById("steps1_o").checked = true;
								
								document.getElementById('bxWords_o').style.display='block';
								document.getElementById('bxFraction_o').style.display='none';
								document.getElementById('bxPercentage_o').style.display='none';
								document.getElementById('bxDecimals_o').style.display='none';
								document.getElementById('bxAnyDecimals_o').style.display='none';
								
								$("#B_bxLow_o").html("0.0");
								$("#B_bxProbable_o").html("0.0");
								$("#B_bxHigh_o").html("0.0");
								$("#lei_Div_Range_o").html("0.0");
								
								$("#he_o").val("");
								$("#pl_o").val("");
								$("#le_o").val("");
							}	 */
							
							//$("#le_zoom_document_file_bx_o").html("<a href='"+data['le_zoom_document_file_o']+"' target='_blank'>"+data['le_zoom_document_file_o']+"</a>");
							
						//	$("#le_zoom_document_file_o").val(data['le_zoom_document_file_o']);
							
							$("#le_zoom_link_bx_o").html("<a href='"+data['le_zoom_link_o']+"' target='_blank'>"+data['le_zoom_link_o']+"</a>");	
							
							
							
							
							//C
							
							if(v==0){
								
								if(data['ia_Inp_Min_o'] == 'INF' || data['ia_Inp_Min_o'] == '-INF' ){
									$("#ia_Inp_Min_o").val('0');
									$("#ia_Div_Min_o").html('0');
								}else{
									$("#ia_Inp_Min_o").val(data['ia_Inp_Min_o']);
									$("#ia_Div_Min_o").html(data['ia_Inp_Min_o']);
								}
								
								if(data['ia_Inp_Med_o'] == 'INF' || data['ia_Inp_Med_o'] == '-INF'){
									$("#ia_Inp_Med_o").val('0');
									$("#ia_Div_Med_o").html('0');
								}else{
									$("#ia_Inp_Med_o").val(data['ia_Inp_Med_o']);
									$("#ia_Div_Med_o").html(data['ia_Inp_Med_o']);
								}
								//alert($("#ia_Div_Med_o").html());
								
								if(data['ia_Inp_Max_o'] == 'INF' || data['ia_Inp_Max_o'] == '-INF' ){
									$("#ia_Inp_Max_o").val('0');
									$("#ia_Div_Max_o").html('0');
								}else{
									$("#ia_Inp_Max_o").val(data['ia_Inp_Max_o']);
									$("#ia_Div_Max_o").html(data['ia_Inp_Max_o']);
								}
								
							
								
								
								if(data['ia_Inp_Range_o'] == 0){
									$("#ia_Inp_Range_o").val(0);									
									$("#ia_Div_Range_o").html(0);
								}else{
									$("#ia_Inp_Range_o").val(data['ia_Inp_Range_o']);
									var range = (data['ia_Inp_Max_o'])-(data['ia_Inp_Min_o']);	
									$("#ia_Div_Range_o").html(range.toFixed(1));

								}
								$("#explain_ia_o").val(data['explain_ia_o']);
							}
							//alert(data['ia_Inp_Range_o']);

							//alert(range.toFixed(data['ia_Inp_Range_o']));
							//$("#type_score_o").val(data['type_score_o']);
							//alert(data['type_score_o']);
							
							/* if(data['C_type_list_o'] == 1){
								
								
								document.getElementById('bxFractionAffected_o').style.display='block';
								document.getElementById('bxValuePieAffected_o').style.display='none';
								document.getElementById("type_score_2").checked = false;
								document.getElementById("type_score_1").checked = true;
							}	
							
							if(data['C_type_list_o'] == 2){
							
								document.getElementById('bxFractionAffected_o').style.display='none';
								document.getElementById('bxValuePieAffected_o').style.display='block'; 
								document.getElementById("type_score_2").checked = true;
								document.getElementById("type_score_1").checked = false;
							}	 */
							
							if(data['C_type_list'] == 1){
							//	document.getElementById("type_list_1").checked = true;
								//document.getElementById("type_list_2").checked = false;
								
							}	
							if(data['C_type_list'] == 2){
								//document.getElementById("type_list_1").checked = false;
								//document.getElementById("type_list_2").checked = true;
								
							}	
							
							/* $("#heia").val(data['heia']);
							$("#plia").val(data['plia']);
							$("#leia_o").val(data['leia_o']); */
							
							if(data['leia_o'] == "0.5"){
								document.getElementById('leia_o').options[0]=new Option(<?php echo "'~1/30 000, ".$_SESSION[$_SESSION['lang']]['Less than a trace of the whole asset value but not zero']."'"; ?>, data['leia_o'], true, true);
							}
							
							if(data['leia_o'] == "1.0"){
								document.getElementById('leia_o').options[0]=new Option(<?php echo "'~1/10 000, ".$_SESSION[$_SESSION['lang']]['A trace of the whole asset value']."'"; ?>, data['leia_o'], true, true);
							}
							
							if(data['leia_o'] == "1.5"){
								document.getElementById('leia_o').options[0]=new Option(<?php echo "'~1/3 000, ".$_SESSION[$_SESSION['lang']]['Between a tiny fraction and a trace of the whole asset value']."'"; ?>, data['leia_o'], true, true);
							}
							
							if(data['leia_o'] == "2.0"){
								document.getElementById('leia_o').options[0]=new Option(<?php echo "'~1/1000, ".$_SESSION[$_SESSION['lang']]['A tiny fraction of the whole asset value']."'"; ?>, data['leia_o'], true, true);
							}
							
							if(data['leia_o'] == "2.5"){
								document.getElementById('leia_o').options[0]=new Option(<?php echo "'~1/300, ".$_SESSION[$_SESSION['lang']]['Between small and tiny fraction of the whole asset value']."'"; ?>, data['leia_o'], true, true);
							}
							
							if(data['leia_o'] == "3.0"){
								document.getElementById('leia_o').options[0]=new Option(<?php echo "'~1/100, ".$_SESSION[$_SESSION['lang']]['A small fraction of the whole asset value']."'"; ?>, data['leia_o'], true, true);
							}
							
							if(data['leia_o'] == "3.5"){
								document.getElementById('leia_o').options[0]=new Option(<?php echo "'~1/30, ".$_SESSION[$_SESSION['lang']]['Between large and small fraction of the whole asset value']."'"; ?>, data['leia_o'], true, true);
							}
							
							if(data['leia_o'] == "4.0"){
								document.getElementById('leia_o').options[0]=new Option(<?php echo "'~1/10, ".$_SESSION[$_SESSION['lang']]['A large fraction of the whole asset value']."'"; ?>, data['leia_o'], true, true);
							}
							
							if(data['leia_o'] == "4.5"){
								document.getElementById('leia_o').options[0]=new Option(<?php echo "'~1/3, ".$_SESSION[$_SESSION['lang']]['Between most and a large fraction of the whole asset value']."'"; ?>, data['leia_o'], true, true);
							}
							
							if(data['leia_o'] == "5.0"){
								document.getElementById('leia_o').options[0]=new Option(<?php echo "'~1/1, ".$_SESSION[$_SESSION['lang']]['All or most of the whole asset value']."'"; ?>, data['leia_o'], true, true);
							}
							
							//plia_o
							if(data['plia_o'] == "0.5"){
								document.getElementById('plia_o').options[0]=new Option(<?php echo "'~1/30 000, ".$_SESSION[$_SESSION['lang']]['Less than a trace of the whole asset value but not zero']."'"; ?>, data['plia_o'], true, true);
							}
							
							if(data['plia_o'] == "1.0"){
								document.getElementById('plia_o').options[0]=new Option(<?php echo "'~1/10 000, ".$_SESSION[$_SESSION['lang']]['A trace of the whole asset value']."'"; ?>, data['plia_o'], true, true);
							}
							
							if(data['plia_o'] == "1.5"){
								document.getElementById('plia_o').options[0]=new Option(<?php echo "'~1/3 000, ".$_SESSION[$_SESSION['lang']]['Between a tiny fraction and a trace of the whole asset value']."'"; ?>, data['plia_o'], true, true);
							}
							
							if(data['plia_o'] == "2.0"){
								document.getElementById('plia_o').options[0]=new Option(<?php echo "'~1/1000, ".$_SESSION[$_SESSION['lang']]['A tiny fraction of the whole asset value']."'"; ?>, data['plia_o'], true, true);
							}
							
							if(data['plia_o'] == "2.5"){
								document.getElementById('plia_o').options[0]=new Option(<?php echo "'~1/300, ".$_SESSION[$_SESSION['lang']]['Between small and tiny fraction of the whole asset value']."'"; ?>, data['plia_o'], true, true);
							}
							
							if(data['plia_o'] == "3.0"){
								document.getElementById('plia_o').options[0]=new Option(<?php echo "'~1/100, ".$_SESSION[$_SESSION['lang']]['A small fraction of the whole asset value']."'"; ?>, data['plia_o'], true, true);
							}
							
							if(data['plia_o'] == "3.5"){
								document.getElementById('plia_o').options[0]=new Option(<?php echo "'~1/30, ".$_SESSION[$_SESSION['lang']]['Between large and small fraction of the whole asset value']."'"; ?>, data['plia_o'], true, true);
							}
							
							if(data['plia_o'] == "4.0"){
								document.getElementById('plia_o').options[0]=new Option(<?php echo "'~1/10, ".$_SESSION[$_SESSION['lang']]['A large fraction of the whole asset value']."'"; ?>, data['plia_o'], true, true);
							}
							
							if(data['plia_o'] == "4.5"){
								document.getElementById('plia_o').options[0]=new Option(<?php echo "'~1/3, ".$_SESSION[$_SESSION['lang']]['Between most and a large fraction of the whole asset value']."'"; ?>, data['plia_o'], true, true);
							}
							
							if(data['plia_o'] == "5.0"){
								document.getElementById('plia_o').options[0]=new Option(<?php echo "'~1/1, ".$_SESSION[$_SESSION['lang']]['All or most of the whole asset value']."'"; ?>, data['plia_o'], true, true);
							}
							
							//heia_o
							if(data['heia_o'] == "0.5"){
								document.getElementById('heia_o').options[0]=new Option(<?php echo "'~1/30 000, ".$_SESSION[$_SESSION['lang']]['Less than a trace of the whole asset value but not zero']."'"; ?>, data['heia_o'], true, true);
							}
							
							if(data['heia_o'] == "1.0"){
								document.getElementById('heia_o').options[0]=new Option(<?php echo "'~1/10 000, ".$_SESSION[$_SESSION['lang']]['A trace of the whole asset value']."'"; ?>, data['heia_o'], true, true);
							}
							
							if(data['heia_o'] == "1.5"){
								document.getElementById('heia_o').options[0]=new Option(<?php echo "'~1/3 000, ".$_SESSION[$_SESSION['lang']]['Between a tiny fraction and a trace of the whole asset value']."'"; ?>, data['heia_o'], true, true);
							}
							
							if(data['heia_o'] == "2.0"){
								document.getElementById('heia_o').options[0]=new Option(<?php echo "'~1/1000, ".$_SESSION[$_SESSION['lang']]['A tiny fraction of the whole asset value']."'"; ?>, data['heia_o'], true, true);
							}
							
							if(data['heia_o'] == "2.5"){
								document.getElementById('heia_o').options[0]=new Option(<?php echo "'~1/300, ".$_SESSION[$_SESSION['lang']]['Between small and tiny fraction of the whole asset value']."'"; ?>, data['heia_o'], true, true);
							}
							
							if(data['heia_o'] == "3.0"){
								document.getElementById('heia_o').options[0]=new Option(<?php echo "'~1/100, ".$_SESSION[$_SESSION['lang']]['A small fraction of the whole asset value']."'"; ?>, data['heia_o'], true, true);
							}
							
							if(data['heia_o'] == "3.5"){
								document.getElementById('heia_o').options[0]=new Option(<?php echo "'~1/30, ".$_SESSION[$_SESSION['lang']]['Between large and small fraction of the whole asset value']."'"; ?>, data['heia_o'], true, true);
							}
							
							if(data['heia_o'] == "4.0"){
								document.getElementById('heia_o').options[0]=new Option(<?php echo "'~1/10, ".$_SESSION[$_SESSION['lang']]['A large fraction of the whole asset value']."'"; ?>, data['heia_o'], true, true);
							}
							
							if(data['heia_o'] == "4.5"){
								document.getElementById('heia_o').options[0]=new Option(<?php echo "'~1/3, ".$_SESSION[$_SESSION['lang']]['Between most and a large fraction of the whole asset value']."'"; ?>, data['heia_o'], true, true);
							}
							
							if(data['heia_o'] == "5.0"){
								document.getElementById('heia_o').options[0]=new Option(<?php echo "'~1/1, ".$_SESSION[$_SESSION['lang']]['All or most of the whole asset value']."'"; ?>, data['heia_o'], true, true);
							}
							
							/* document.getElementById('plia').options[0] = new Option("Selected by zoom", ca_media, true, true);
							document.getElementById('heia_o').options[0] = new Option("Selected by zoom", ca_high, true, true);	 */
							//alert(data['ia_zoom_explanation_fields']);
							$("#ia_zoom_explanation_fields_o").val(data['explain_ia_o']);
						    $("#ia_zoom_notes_explanation_o").val(data['ia_zoom_notes_explanation_o']);
						    $("#ia_zoom_document_name_o").val(data['ia_zoom_document_name_o']);
						    $("#ia_zoom_comment_o").val(data['ia_zoom_comment_o']);			
							$("#ia_zoom_obs_o").val(data['ia_zoom_obs_o']);						
						    $("#ia_zoom_link_o").val(data['ia_zoom_link_o']);			
						   // $("#ia_zoom_document_file_o").val(data['ia_zoom_document_file_o']);			
						    //$("#ia_zoom_document_file").val(data['ia_zoom_document_file']);
							
							//$("#ia_zoom_document_file_bx_o").html("<a href='"+data['ia_zoom_document_file_o']+"' target='_blank'>"+data['ia_zoom_document_file_o']+"</a>");
							
							$("#ia_zoom_link_bx_o").html("<a href='"+data['ia_zoom_link_o']+"' target='_blank'>"+data['ia_zoom_link_o']+"</a>");	
							
							
						
					}
				  });
				}
					
					
				function select_option(id_option,id_risk) {			
					 // var i = '#row'+id;
					  $.ajax({
						type: "POST",
						url: "ajax_process/select_options.php",
						data: {
							id_option: id_option,
							id_risk: id_risk
						},
						dataType: 'json',
						success: function(data) {
							//alert(data['summary']);
							$("#data").val(data['data']);
							$("#summary").val(data['summary']);
							$("#one_time_cost").val(data['one_time_cost']);
							$("#annual_cost").val(data['annual_cost']);
						
						}
					  });
					}
				
			
				
				</script>
			 <script>
							function magnitudeRisk(){
								
								//alert(document.getElementById('magnitude_FR_Low').innerHTML);
								var magnitude_FR_Low = document.getElementById('magnitude_FR_Low').innerHTML=='' ? 0.0 : document.getElementById('magnitude_FR_Low').innerHTML; 

								var magnitude_LE_Min = document.getElementById('magnitude_LE_Min').innerHTML=='' ? 0.0 : document.getElementById('magnitude_LE_Min').innerHTML;
								
								var magnitude_IA_Min = document.getElementById('magnitude_IA_Min').innerHTML=='' ? 0.0 : document.getElementById('magnitude_IA_Min').innerHTML;
								
								
								
								var sumLow = parseFloat(magnitude_FR_Low)+parseFloat(magnitude_LE_Min)+parseFloat(magnitude_IA_Min);
								
								document.getElementById('magnitude_SOMA_L').innerHTML = sumLow.toFixed(1);
								

								///////
								var magnitude_FR_Probable = document.getElementById('magnitude_FR_Probable').innerHTML=='' ? 0.0 : document.getElementById('magnitude_FR_Probable').innerHTML; 

								var magnitude_LE_Med = document.getElementById('magnitude_LE_Med').innerHTML=='' ? 0.0 : document.getElementById('magnitude_LE_Med').innerHTML;
								
								var magnitude_IA_Med = document.getElementById('magnitude_IA_Med').innerHTML=='' ? 0.0 : document.getElementById('magnitude_IA_Med').innerHTML;	

								var sumP = parseFloat(magnitude_FR_Probable)+parseFloat(magnitude_LE_Med)+parseFloat(magnitude_IA_Med);								
								
								document.getElementById('magnitude_SOMA_P').innerHTML = sumP.toFixed(1);
								
								//
								var magnitude_FR_High = document.getElementById('magnitude_FR_High').innerHTML=='' ? 0.0 : document.getElementById('magnitude_FR_High').innerHTML; 

								var magnitude_LE_Max = document.getElementById('magnitude_LE_Max').innerHTML=='' ? 0.0 : document.getElementById('magnitude_LE_Max').innerHTML;
								
								var magnitude_IA_Max = document.getElementById('magnitude_IA_Max').innerHTML=='' ? 0.0 : document.getElementById('magnitude_IA_Max').innerHTML;		

								var sumH = parseFloat(magnitude_FR_High)+parseFloat(magnitude_LE_Max)+parseFloat(magnitude_IA_Max);								
								
								document.getElementById('magnitude_SOMA_H').innerHTML = sumH.toFixed(1);
								
								//
								var un_range = document.getElementById('magnitude_SOMA_H').innerHTML - document.getElementById('magnitude_SOMA_L').innerHTML;								
								
								//document.getElementById('magnitude_SOMA_RANGE').innerHTML = un_range.toFixed(1);
								
								//
								var somaTotal = parseFloat(document.getElementById('magnitude_FR_MEDIA').innerHTML) + parseFloat(document.getElementById('magnitude_LE_MEDIA').innerHTML) + parseFloat(document.getElementById('magnitude_IA_MEDIA').innerHTML);
								
								document.getElementById('magnitude_SOMA_MEDIA').innerHTML = somaTotal.toFixed(1);
								
								
							}		
							
							function magnitudeRisk_o(){
								
								//alert(document.getElementById('magnitude_FR_Low').innerHTML);
								var magnitude_FR_Low = document.getElementById('magnitude_FR_Low_o').innerHTML=='' ? 0.0 : document.getElementById('magnitude_FR_Low_o').innerHTML; 

								var magnitude_LE_Min = document.getElementById('magnitude_LE_Min_o').innerHTML=='' ? 0.0 : document.getElementById('magnitude_LE_Min_o').innerHTML;
								
								var magnitude_IA_Min = document.getElementById('magnitude_IA_Min_o').innerHTML=='' ? 0.0 : document.getElementById('magnitude_IA_Min_o').innerHTML;
								
								
								
								var sumLow = parseFloat(magnitude_FR_Low)+parseFloat(magnitude_LE_Min)+parseFloat(magnitude_IA_Min);
								
								document.getElementById('magnitude_SOMA_L_o').innerHTML = sumLow.toFixed(1);
								

								///////
								var magnitude_FR_Probable = document.getElementById('magnitude_FR_Probable_o').innerHTML=='' ? 0.0 : document.getElementById('magnitude_FR_Probable_o').innerHTML; 

								var magnitude_LE_Med = document.getElementById('magnitude_LE_Med_o').innerHTML=='' ? 0.0 : document.getElementById('magnitude_LE_Med_o').innerHTML;
								
								var magnitude_IA_Med = document.getElementById('magnitude_IA_Med_o').innerHTML=='' ? 0.0 : document.getElementById('magnitude_IA_Med_o').innerHTML;	

								var sumP = parseFloat(magnitude_FR_Probable)+parseFloat(magnitude_LE_Med)+parseFloat(magnitude_IA_Med);								
								
								document.getElementById('magnitude_SOMA_P_o').innerHTML = sumP.toFixed(1);
								
								//
								var magnitude_FR_High = document.getElementById('magnitude_FR_High_o').innerHTML=='' ? 0.0 : document.getElementById('magnitude_FR_High_o').innerHTML; 

								var magnitude_LE_Max = document.getElementById('magnitude_LE_Max_o').innerHTML=='' ? 0.0 : document.getElementById('magnitude_LE_Max_o').innerHTML;
								
								var magnitude_IA_Max = document.getElementById('magnitude_IA_Max_o').innerHTML=='' ? 0.0 : document.getElementById('magnitude_IA_Max_o').innerHTML;		

								var sumH = parseFloat(magnitude_FR_High)+parseFloat(magnitude_LE_Max)+parseFloat(magnitude_IA_Max);								
								
								document.getElementById('magnitude_SOMA_H_o').innerHTML = sumH.toFixed(1);
								
								//
								var un_range = document.getElementById('magnitude_SOMA_H_o').innerHTML - document.getElementById('magnitude_SOMA_L_o').innerHTML;								
								
								//document.getElementById('magnitude_SOMA_RANGE').innerHTML = un_range.toFixed(1);
								
								//
								var somaTotal = parseFloat(document.getElementById('magnitude_FR_MEDIA_o').innerHTML) + parseFloat(document.getElementById('magnitude_LE_MEDIA_o').innerHTML) + parseFloat(document.getElementById('magnitude_IA_MEDIA_o').innerHTML);
								
								document.getElementById('magnitude_SOMA_MEDIA_o').innerHTML = somaTotal.toFixed(1);
								
								
								
							}	
							</script>
                <div class="row">
				<div class="col-sm-4 col-md-12">
			  <!--Select options that haven been identified in the Identify Option form-->
					<div class="form-group">
							<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Risk']; ?></label>
							<select class="form-control" id="risk" name="risk" onchange="list_options_html(this.value);select_risk(this.value);select_option(document.getElementById('id_option').value,this.value);select_risk_option(document.getElementById('id_option').value,this.value,0);document.getElementById('bxAll').style.display='none';">
							<option value="#" > <?php echo $_SESSION[$_SESSION['lang']]['select']; ?> </option>
							   <?php 
								$in = Risks::select_risks();												
								foreach($in['dados'] as $in){
									
									if($in['id'] == $id_risk){
									
							  ?>
									<option value="<?php echo $in['id']; ?>" selected><?php echo $in['name']; ?></option>
							  <?php 
							  
									}else{
												
							  ?>
									<option value="<?php echo $in['id']; ?>"><?php echo $in['name']; ?></option>
							  <?php
									}	
								}
							  ?>
							  
							 
							</select>
							</div>
                </div>
                </div>  
				<div class="row">
				<div class="col-sm-4 col-md-12">
			  <!--Select options that haven been identified in the Identify Option form-->
					<div class="form-group" id="bxOptions">
							
							<?php if(isset($_GET['id_option'])){ ?>
							
							<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Options']; ?></label>
							<select class="form-control" id="id_option" name="id_option" onchange="select_option(this.value,document.getElementById('risk').value);select_risk_option(this.value,document.getElementById('risk').value,0)">
							<option value="#" > <?php echo $_SESSION[$_SESSION['lang']]['select']; ?> </option>
							   <?php 
								$op = Analyze_options::select_options_by_risk($_REQUEST['id']);												
								foreach($op['dados'] as $op){
									
									if($op['id_option'] == $_GET['id_option']){
									
							  ?>
									<option value="<?php echo $op['id_option']; ?>" Selected><?php echo $op['option']; ?></option>
							  <?php 
							  
									}else{
												
							  ?>
									<option value="<?php echo $op['id_option']; ?>"><?php echo $op['option']; ?></option>
							  <?php
									}	
								}
							  ?>
							  
							 
							</select>
							<?php } ?>
							
							</div>
                </div>
                </div>
				<script>
								function list_options_html(id) {	
									
									
									$.ajax({
									dataType: 'html',
									type: "POST",
									url: "ajax_process/list_options_html.php?id="+id,
									data: {
										id:id		
									},
									processData: false,
									contentType: false,
									success: function(data) {
										if(data != 1){
											document.getElementById('bxOptions').innerHTML=data;
										}else{
											document.getElementById('bxOptions').innerHTML='No options registered for this risk';
											document.getElementById('bxAll').style.display='none';
										}
											
									}
									});
								}
								</script>
                <div class="row" style="display:<?php echo $displayBXALL; ?>;" id="bxAll">
             
              <div class="col-sm-4 col-md-12">
				<div class="col-12 col-sm-6 col-lg-12">
					<div class="card card-primary card-outline card-outline-tabs">
					  <div class="card-header p-0 border-bottom-0">
						<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
						  <li class="nav-item">
							<a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true"><?php echo $_SESSION[$_SESSION['lang']]['Frequency o Rate (A)']; ?></a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false"><?php echo $_SESSION[$_SESSION['lang']]['Loss to each item (B)']; ?></a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false"><?php echo $_SESSION[$_SESSION['lang']]['Items Affected(C)']; ?></a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false" ><?php echo $_SESSION[$_SESSION['lang']]['Magnitude of Risk']; ?></a>
						  </li>
						</ul>
					  </div>
					  <div class="card-body">
						<div class="tab-content" id="custom-tabs-three-tabContent"> 
							
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->
						  <!-- #################### FREQUENCY OR RATE ###################### -->
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->
						
						 <?php include("analyze_risks_frequency_or_rate2.php"); ?>
						  
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->
						  <!-- #################### LOSS TO EACH ITEM ###################### -->
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->
						  
						 <?php include("analyze_risks_loss_to_each2.php"); ?>
						  
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->
						  <!-- #################### ITEMS AFFECTED ###################### -->
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->
						  
						  <?php include("analyze_risks_items_affecteds2.php"); ?>
						  
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->
						  <!-- #################### MAGNITUDE OF RISK ###################### -->
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->

						 <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab" onchange="range_I_A('Max',this.value)">
							 
<div class="row">
	<div class="col-sm-4 col-md-6" style="padding:15px;">
							 
							 <!-- 
								$("#magnitude_SOMA_L").html(data['magnitude_SOMA_L']);
								$("#magnitude_SOMA_P").html(data['magnitude_SOMA_P']);
								$("#magnitude_SOMA_H").html(data['magnitude_SOMA_H']);
								$("#magnitude_SOMA_RANGE").html(data['magnitude_SOMA_RANGE']);
								$("#magnitude_FR_MEDIA").html(data['magnitude_FR_MEDIA']);
								$("#magnitude_LE_MEDIA").html(data['magnitude_LE_MEDIA']);
								$("#magnitude_IA_MEDIA").html(data['magnitude_IA_MEDIA']);
								$("#magnitude_SOMA_MEDIA").html(data['magnitude_SOMA_MEDIA']);		
							 -->
							 
							  <table class="table table-sm">
								  <thead>
									<tr>
									  <th ></th>
									  <th style="width: 40px"><?php echo $_SESSION[$_SESSION['lang']]['Low']; ?></th>
									  <th style="width: 40px"><?php echo $_SESSION[$_SESSION['lang']]['Probable']; ?></th>
									  <th style="width: 40px"><?php echo $_SESSION[$_SESSION['lang']]['High']; ?></th>
									  <!--<th style="width: 40px">Uncertainty range</th>-->
									  <th style="width: 80px"><?php echo $_SESSION[$_SESSION['lang']]['Expected Scores (average)']; ?></th>
									</tr>
								  </thead>
								  <tbody>
									<tr>
									  <td><?php echo $_SESSION[$_SESSION['lang']]['Frequency or Rate']; ?></td>
									  <td><div id="magnitude_FR_High"><?php echo $magnitude_FR_High; ?></div></td>
									  <td><div id="magnitude_FR_Probable"><?php echo $magnitude_FR_Probable; ?></div></td>
									  <td><div id="magnitude_FR_Low"><?php echo $magnitude_FR_Low; ?></div></td>
									  <!--<td></td>-->
									  <td style="text-align:center;"><span class="badge bg-secondary"><div id="magnitude_FR_MEDIA"><?php echo $magnitude_FR_MEDIA; ?></div></span></td>
									</tr>
									<tr>
									  <td><?php echo $_SESSION[$_SESSION['lang']]['Loss to each item affected']; ?></td>
									  <td><div id="magnitude_LE_Min"><?php echo $magnitude_LE_Min; ?></div></td>
									  <td><div id="magnitude_LE_Med"><?php echo $magnitude_LE_Med; ?></div></td>
									  <td><div id="magnitude_LE_Max"><?php echo $magnitude_LE_Max; ?></div></td>
									 <!-- <td></td>-->
									  <td style="text-align:center;"><span class="badge bg-secondary"><div id="magnitude_LE_MEDIA"><?php echo $magnitude_LE_MEDIA; ?></div></span></td>
									</tr>
									<tr>
									  <td><?php echo $_SESSION[$_SESSION['lang']]['Items affected']; ?></td>
									  <td><div id="magnitude_IA_Min"><?php echo $magnitude_IA_Min; ?></div></td>
									  <td><div id="magnitude_IA_Med"><?php echo $magnitude_IA_Med; ?></div></td>
									  <td><div id="magnitude_IA_Max"><?php echo $magnitude_IA_Max; ?></div></td>
									  <!--<td></td>-->
									  <td style="text-align:center;"><span class="badge bg-secondary"><div id="magnitude_IA_MEDIA"><?php echo $magnitude_IA_MEDIA; ?></a></span></td>
									</tr>
									<tr>
									  <td><?php echo $_SESSION[$_SESSION['lang']]['Magnitude of risk']; ?></td>
									  <td><div id="magnitude_SOMA_L" style="display:none"><?php echo $magnitude_SOMA_L; ?></div></td>
									  <td><div id="magnitude_SOMA_P" style="display:none"><?php echo $magnitude_SOMA_P; ?></div></td>
									  <td><div id="magnitude_SOMA_H" style="display:none"><?php echo $magnitude_SOMA_H; ?></div></td>
									  <!--<td><div id="magnitude_SOMA_RANGE"><?php echo $magnitude_SOMA_RANGE; ?></div><br></td>-->
									  <td style="text-align:center;"><span class="badge bg-success" style="font-size:20px;" id="bdgTOTAL"><div id="magnitude_SOMA_MEDIA"><?php echo $magnitude_SOMA_MEDIA; ?></div></span></td>
									</tr>
								  </tbody>
								</table>
								
								</div>
								
								<!---- ##################################### --->
								<!---- OPTION --->
								<!---- ##################################### --->
								<div class="col-sm-4 col-md-6" style="padding:7px;background-color:#f9f2d2">
							 
							   <table class="table table-sm">
								  <thead>
									<tr>
									  <th ></th>
									  <th style="width: 40px"><?php echo $_SESSION[$_SESSION['lang']]['Low']; ?></th>
									  <th style="width: 40px"><?php echo $_SESSION[$_SESSION['lang']]['Probable']; ?></th>
									  <th style="width: 40px"><?php echo $_SESSION[$_SESSION['lang']]['High']; ?></th>
									  <!--<th style="width: 40px">Uncertainty range</th>-->
									  <th style="width: 80px"><?php echo $_SESSION[$_SESSION['lang']]['Expected Scores (average)']; ?></th>
									</tr>
								  </thead>
								  <tbody>
									<tr>
									  <td><?php echo $_SESSION[$_SESSION['lang']]['Frequency or Rate']; ?></td>
									  <td><div id="magnitude_FR_Low_o"><?php echo $magnitude_FR_Low_o; ?></div></td>
									  <td><div id="magnitude_FR_Probable_o"><?php echo $magnitude_FR_Probable_o; ?></div></td>
									  <td><div id="magnitude_FR_High_o"><?php echo $magnitude_FR_High_o; ?></div></td>
									  <!--<td></td>-->
									  <td style="text-align:center;"><span class="badge bg-secondary"><div id="magnitude_FR_MEDIA_o"><?php echo $magnitude_FR_MEDIA_o; ?></div></span></td>
									</tr>
									<tr>
									  <td><?php echo $_SESSION[$_SESSION['lang']]['Loss to each item affected']; ?></td>
									  <td><div id="magnitude_LE_Min_o"><?php echo $magnitude_LE_Min_o; ?></div></td>
									  <td><div id="magnitude_LE_Med_o"><?php echo $magnitude_LE_Med_o; ?></div></td>
									  <td><div id="magnitude_LE_Max_o"><?php echo $magnitude_LE_Max_o; ?></div></td>
									 <!-- <td></td>-->
									  <td style="text-align:center;"><span class="badge bg-secondary"><div id="magnitude_LE_MEDIA_o"><?php echo $magnitude_LE_MEDIA_o; ?></div></span></td>
									</tr>
									<tr>
									  <td><?php echo $_SESSION[$_SESSION['lang']]['Items affected']; ?></td>
									  <td><div id="magnitude_IA_Min_o"><?php echo $magnitude_IA_Min_o; ?></div></td>
									  <td><div id="magnitude_IA_Med_o"><?php echo $magnitude_IA_Med_o; ?></div></td>
									  <td><div id="magnitude_IA_Max_o"><?php echo $magnitude_IA_Max_o; ?></div></td>
									  <!--<td></td>-->
									  <td style="text-align:center;"><span class="badge bg-secondary"><div id="magnitude_IA_MEDIA_o"><?php echo $magnitude_IA_MEDIA_o; ?></a></span></td>
									</tr>
									<tr>
									  <td><?php echo $_SESSION[$_SESSION['lang']]['Magnitude of risk']; ?></td>
									  <td><div id="magnitude_SOMA_L_o" style="display:none"><?php echo $magnitude_SOMA_L_o; ?></div></td>
									  <td><div id="magnitude_SOMA_P_o" style="display:none"><?php echo $magnitude_SOMA_P_o; ?></div></td>
									  <td><div id="magnitude_SOMA_H_o" style="display:none"><?php echo $magnitude_SOMA_H_o; ?></div></td>
									  <!--<td><div id="magnitude_SOMA_RANGE"><?php echo $magnitude_SOMA_RANGE_o; ?></div><br></td>-->
									  <td style="text-align:center;"><span class="badge bg-success" style="font-size:20px;" id="bdgTOTAL_o"><div id="magnitude_SOMA_MEDIA_o"><?php echo $magnitude_SOMA_MEDIA_o; ?></div></span></td>
									</tr>
								  </tbody>
								</table>
							<div class="row" style="padding:7px;">	
								<div class="col-sm-4 col-md-4">
								<button type="button" class="btn btn-block  bg-gradient-info btn-xs" onclick="changeTypeCalc(2)">Linear triangle distribution <br>(default) </button>
									
								</div>
								<div class="col-sm-4 col-md-4">
									<button type="button" class="btn btn-block bg-gradient-success btn-xs" onclick="changeTypeCalc(1)">Log triangle <br>distribution </button>
								</div>
								<div class="col-sm-4 col-md-4">
									<button type="button" class="btn btn-block bg-gradient-warning btn-xs" onclick="changeTypeCalc(3)">Simple use of <br>problable value</button>
								</div>
								
							</div>	
											&nbsp; <small><?php echo $_SESSION[$_SESSION['lang']]['Type of calculation used for expected values (used for the risk and any associated options)']; ?></small>
								</div>
								</div>
								</div>
								</div>
								
								<script>
							 
								 function registraMR(){
									
									//alert(document.getElementById('magnitude_SOMA_L').innerHTML);	
									
									$.ajax({
										type: "POST",
										url: "ajax_process/magnitude_of_risk.php",
										data: {
											id_risk: document.getElementById('risk').value,
											MR_low: document.getElementById('magnitude_SOMA_L').innerHTML,
											MR_Probable: document.getElementById('magnitude_SOMA_P').innerHTML,
											MR_High: document.getElementById('magnitude_SOMA_H').innerHTML,
											MR_U_Range: 0,
											Expected_Scores_FR: document.getElementById('magnitude_FR_MEDIA').innerHTML,
											Expected_Scores_LE: document.getElementById('magnitude_LE_MEDIA').innerHTML,
											Expected_Scores_IA: document.getElementById('magnitude_IA_MEDIA').innerHTML,
											magnitude_of_risk: document.getElementById('magnitude_SOMA_MEDIA').innerHTML
										},
										success: function(data) {
										  //$(i).css({"display":"none"});
										  //location.reload();
										}
									  });
									 
								 }	 
								 
								 function registraMR_o(){
									
									//alert(document.getElementById('magnitude_SOMA_L').innerHTML);	
									
									$.ajax({
										type: "POST",
										url: "ajax_process/magnitude_of_risk_o.php",
										data: {
											id_risk: document.getElementById('risk').value,
											id_option: document.getElementById('id_option').value,
											MR_low: document.getElementById('magnitude_SOMA_L_o').innerHTML,
											MR_Probable: document.getElementById('magnitude_SOMA_P_o').innerHTML,
											MR_High: document.getElementById('magnitude_SOMA_H_o').innerHTML,
											//MR_U_Range: document.getElementById('magnitude_SOMA_RANGE_o').innerHTML,
											Expected_Scores_FR: document.getElementById('magnitude_FR_MEDIA_o').innerHTML,
											Expected_Scores_LE: document.getElementById('magnitude_LE_Med_o').innerHTML,
											Expected_Scores_IA: document.getElementById('magnitude_IA_MEDIA_o').innerHTML,
											magnitude_of_risk: document.getElementById('magnitude_SOMA_MEDIA_o').innerHTML
										},
										success: function(data) {
										  //$(i).css({"display":"none"});
										  //location.reload();
										}
									  });
									 
								 }	 
								 
								 
							function refreshDataByZoom(ca_high,ca_media,ca_low){
								//alert('debug');
								document.getElementById('magnitude_IA_Max_o').innerHTML = ca_high;document.getElementById('magnitude_IA_Med_o').innerHTML = ca_media;
								document.getElementById('magnitude_IA_Min_o').innerHTML = ca_low;
								
								document.getElementById('leia_o').options[0]=new Option("Selected by zoom", ca_low, true, true);
								document.getElementById('plia_o').options[0] = new Option("Selected by zoom", ca_media, true, true);
								document.getElementById('heia_o').options[0] = new Option("Selected by zoom", ca_high, true, true);							
								
								
								var base = parseFloat(ca_high) + parseFloat(ca_media) + parseFloat(ca_low);
								var media = base / 3;		
													
								document.getElementById('magnitude_IA_MEDIA_o').innerHTML = media.toFixed(1);
								 
								$("#ia_Div_Max_o").html('ca_high_o');
								document.getElementById('ia_Div_Max_o').innerHTML = ca_high;
								document.getElementById('ia_Inp_Max_o').value = ca_high;
								
								document.getElementById('ia_Div_Med_o').innerHTML = ca_media;
								document.getElementById('ia_Inp_Med_o').value = ca_media;
								
								document.getElementById('ia_Div_Min_o').innerHTML = ca_low;
								document.getElementById('ia_Inp_Min_o').value = ca_low;
								
								var range = (ca_high)-(ca_low);		
								document.getElementById('ia_Div_Range_o').innerHTML = range.toFixed(1);
								document.getElementById('ia_Inp_Range_o').value = range.toFixed(1);
							
						
							
							magnitudeRisk_o();
							//alert(document.getElementById('ia_Inp_Med_o').value);

						}
						
						
						
							 
								 function changeTypeCalc(t){
									
									
									if(t==3){
										
										/* document.getElementById('magnitude_FR_MEDIA').innerHTML=document.getElementById('magnitude_FR_Probable').innerHTML;
										
										document.getElementById('magnitude_LE_MEDIA').innerHTML=document.getElementById('magnitude_LE_Med').innerHTML;
										
										document.getElementById('magnitude_IA_MEDIA').innerHTML=document.getElementById('magnitude_IA_Med').innerHTML;
										
										var total = parseFloat((document.getElementById('magnitude_FR_MEDIA').innerHTML))+parseFloat((document.getElementById('magnitude_LE_MEDIA').innerHTML))+parseFloat((document.getElementById('magnitude_IA_MEDIA').innerHTML));
										
										document.getElementById('magnitude_SOMA_MEDIA').innerHTML=parseFloat(total.toFixed(1)); */
										
										
										/////////// OPTIONS
										document.getElementById('magnitude_FR_MEDIA_o').innerHTML=document.getElementById('magnitude_FR_Probable_o').innerHTML;
										
										document.getElementById('magnitude_LE_MEDIA_o').innerHTML=document.getElementById('magnitude_LE_Med_o').innerHTML;
										
										document.getElementById('magnitude_IA_MEDIA_o').innerHTML=document.getElementById('magnitude_IA_Med_o').innerHTML;
										
										var total = parseFloat((document.getElementById('magnitude_FR_MEDIA_o').innerHTML))+parseFloat((document.getElementById('magnitude_LE_MEDIA_o').innerHTML))+parseFloat((document.getElementById('magnitude_IA_MEDIA_o').innerHTML));
										
										document.getElementById('magnitude_SOMA_MEDIA_o').innerHTML=parseFloat(total.toFixed(1));
										
										var x = document.querySelectorAll("#bdgTOTAL_o");
										x[0].style.setProperty("background-color", "#ffc107", "important");
										
										
									}else if(t==2){
										//Math.pow(base, expoente)
										
										//A
										/* var a_h_p = Math.pow(10, (document.getElementById('magnitude_FR_High').innerHTML)-5);
										var a_p_p = Math.pow(10, (document.getElementById('magnitude_FR_Probable').innerHTML)-5);
										var a_l_p = Math.pow(10, (document.getElementById('magnitude_FR_Low').innerHTML)-5);
										
										var total_a_p = 5-(Math.log10((a_l_p + a_p_p + a_h_p)/3)*-1);
										document.getElementById('magnitude_FR_MEDIA').innerHTML = Math.round10(total_a_p,-1);
										//alert(a_h_p);
										
										
										//B
										var b_h_p = Math.pow(10, (document.getElementById('magnitude_LE_Max').innerHTML)-5);
										var b_p_p = Math.pow(10, (document.getElementById('magnitude_LE_Med').innerHTML)-5);
										var b_l_p = Math.pow(10, (document.getElementById('magnitude_LE_Min').innerHTML)-5);
										
										var total_b_p = 5-(Math.log10((b_l_p + b_p_p + b_h_p)/3)*-1);
										document.getElementById('magnitude_LE_MEDIA').innerHTML = Math.round10(total_b_p,-1);
										//alert(Math.round10(10.24, -1));
										
										//C
										var c_h_p = Math.pow(10, (document.getElementById('magnitude_IA_Max').innerHTML)-5);
										var c_p_p = Math.pow(10, (document.getElementById('magnitude_IA_Med').innerHTML)-5);
									 	var c_l_p = Math.pow(10, (document.getElementById('magnitude_IA_Min').innerHTML)-5);
										
										var total_c_p = 5-(Math.log10((c_l_p + c_p_p + c_h_p)/3)*-1);
										document.getElementById('magnitude_IA_MEDIA').innerHTML = Math.round10(total_c_p,-1); 
										
										
										var total = parseFloat((document.getElementById('magnitude_FR_MEDIA').innerHTML))+parseFloat((document.getElementById('magnitude_LE_MEDIA').innerHTML))+parseFloat((document.getElementById('magnitude_IA_MEDIA').innerHTML));
										
										document.getElementById('magnitude_SOMA_MEDIA').innerHTML=parseFloat(total.toFixed(1));  */
										
										
										/////////////////////////////////////////////// OPTIONS
										//A
										var a_h_p = Math.pow(10, (document.getElementById('magnitude_FR_High_o').innerHTML)-5);
										var a_p_p = Math.pow(10, (document.getElementById('magnitude_FR_Probable_o').innerHTML)-5);
										var a_l_p = Math.pow(10, (document.getElementById('magnitude_FR_Low_o').innerHTML)-5);
										
										var total_a_p = 5-(Math.log10((a_l_p + a_p_p + a_h_p)/3)*-1);
										document.getElementById('magnitude_FR_MEDIA_o').innerHTML = Math.round10(total_a_p,-1);
										//alert(a_h_p);
										
										
										//B
										var b_h_p = Math.pow(10, (document.getElementById('magnitude_LE_Max_o').innerHTML)-5);
										var b_p_p = Math.pow(10, (document.getElementById('magnitude_LE_Med_o').innerHTML)-5);
										var b_l_p = Math.pow(10, (document.getElementById('magnitude_LE_Min_o').innerHTML)-5);
										
										var total_b_p = 5-(Math.log10((b_l_p + b_p_p + b_h_p)/3)*-1);
										document.getElementById('magnitude_LE_MEDIA_o').innerHTML = Math.round10(total_b_p,-1);
										//alert(Math.round10(10.24, -1));
										
										//C
										var c_h_p = Math.pow(10, (document.getElementById('magnitude_IA_Max_o').innerHTML)-5);
										var c_p_p = Math.pow(10, (document.getElementById('magnitude_IA_Med_o').innerHTML)-5);
									 	var c_l_p = Math.pow(10, (document.getElementById('magnitude_IA_Min_o').innerHTML)-5);
										
										var total_c_p = 5-(Math.log10((c_l_p + c_p_p + c_h_p)/3)*-1);
										document.getElementById('magnitude_IA_MEDIA_o').innerHTML = Math.round10(total_c_p,-1); 
										
										
										var total = parseFloat((document.getElementById('magnitude_FR_MEDIA_o').innerHTML))+parseFloat((document.getElementById('magnitude_LE_MEDIA_o').innerHTML))+parseFloat((document.getElementById('magnitude_IA_MEDIA_o').innerHTML));
										
										document.getElementById('magnitude_SOMA_MEDIA_o').innerHTML=parseFloat(total.toFixed(1)); 
										
										var x = document.querySelectorAll("#bdgTOTAL_o");
										x[0].style.setProperty("background-color", "#17a2b8", "important");
										
										
										
									}else{
										
										 var medFR = ( 
														parseFloat(document.getElementById('magnitude_FR_High_o').innerHTML) + 
														parseFloat(document.getElementById('magnitude_FR_Probable_o').innerHTML)+
														parseFloat(document.getElementById('magnitude_FR_Low_o').innerHTML)
														
														)/3; 
														
										 var medLE = ( 
														parseFloat(document.getElementById('magnitude_LE_Max_o').innerHTML) +
														parseFloat(document.getElementById('magnitude_LE_Med_o').innerHTML) +
														parseFloat(document.getElementById('magnitude_LE_Min_o').innerHTML)
														
														)/3;
										 
										 var medIA = ( 
														parseFloat(document.getElementById('magnitude_IA_Max_o').innerHTML) +
														parseFloat(document.getElementById('magnitude_IA_Med_o').innerHTML) +
														parseFloat(document.getElementById('magnitude_IA_Min_o').innerHTML)
														
														)/3;
														
										document.getElementById('magnitude_FR_MEDIA_o').innerHTML = Math.round10(medFR,-1);
										document.getElementById('magnitude_LE_MEDIA_o').innerHTML = Math.round10(medLE,-1);
										document.getElementById('magnitude_IA_MEDIA_o').innerHTML = Math.round10(medIA,-1);
										
										var total = parseFloat((document.getElementById('magnitude_FR_MEDIA_o').innerHTML))+parseFloat((document.getElementById('magnitude_LE_MEDIA_o').innerHTML))+parseFloat((document.getElementById('magnitude_IA_MEDIA_o').innerHTML));
										
										document.getElementById('magnitude_SOMA_MEDIA_o').innerHTML=parseFloat(total.toFixed(1)); 
										
										
										var x = document.querySelectorAll("#bdgTOTAL_o");
										x[0].style.setProperty("background-color", "#48b461", "important");
									
									} 		
									
									$.ajax({
										type: "POST",
										url: "ajax_process/update_expected_scores_o.php",
										data: {
											id_risk: document.getElementById('risk').value,
											id_option: document.getElementById('id_option').value,
											type_calc: t,
											Expected_Scores_FR: document.getElementById('magnitude_FR_MEDIA_o').innerHTML,
											Expected_Scores_LE: document.getElementById('magnitude_LE_MEDIA_o').innerHTML,
											Expected_Scores_IA: document.getElementById('magnitude_IA_MEDIA_o').innerHTML,
											magnitude_of_risk: document.getElementById('magnitude_SOMA_MEDIA_o').innerHTML
										},
										success: function(data) {
										  //$(i).css({"display":"none"});
										  //location.reload();
										}
									  });
									
									 
								 }	 
								 
								 
								  
								 // Closure
								(function(){

									/**
									 * Decimal adjustment of a number.
									 *
									 * @param	{String}	type	The type of adjustment.
									 * @param	{Number}	value	The number.
									 * @param	{Integer}	exp		The exponent (the 10 logarithm of the adjustment base).
									 * @returns	{Number}			The adjusted value.
									 */
									function decimalAdjust(type, value, exp) {
										// If the exp is undefined or zero...
										if (typeof exp === 'undefined' || +exp === 0) {
											return Math[type](value);
										}
										value = +value;
										exp = +exp;
										// If the value is not a number or the exp is not an integer...
										if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
											return NaN;
										}
										// Shift
										value = value.toString().split('e');
										value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
										// Shift back
										value = value.toString().split('e');
										return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
									}

									// Decimal round
									if (!Math.round10) {
										Math.round10 = function(value, exp) {
											return decimalAdjust('round', value, exp);
										};
									}
									// Decimal floor
									if (!Math.floor10) {
										Math.floor10 = function(value, exp) {
											return decimalAdjust('floor', value, exp);
										};
									}
									// Decimal ceil
									if (!Math.ceil10) {
										Math.ceil10 = function(value, exp) {
											return decimalAdjust('ceil', value, exp);
										};
									}

								})();
								 
								 
								 </script>	
							 
							 <!--<button type="button" class="btn btn-block bg-gradient-success btn-sm">Refresh calculations</button>-->
							 
						  </div>
						  
						</div>
					  </div>
					  <!-- /.card -->
					</div>
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
  <script>
  
  function atualiza_type_score(type_score,id_risk) {			
	
	  $.ajax({
		type: "POST",
		url: "ajax_process/atualiza_type_score.php",
		data: {
			id_risk: id_risk,
			type_score: type_score
		},
		success: function(data) {
		  //$(i).css({"display":"none"});
		  //location.reload();
		}
	  });
	}
	
	
	function atualizaFileField (id,value) {
		
		document.getElementById(id).innerHTML ="Link: <a href='"+value+"' target='_blank'>"+value+"</a>";
		
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



if(isset($_GET['id_option'])){
?>
	
	<script>
	
	
	
	//alert(1);
	select_risk(<?php echo $_GET['id']; ?>);
	//alert(2);
	

	select_risk_option(<?php echo $_GET['id_option']; ?>,<?php echo $_GET['id']; ?>,1);
	//alert(3);

	select_option(<?php echo $_GET['id_option']; ?>,<?php echo $_GET['id']; ?>);
	//alert(4);

	items_affecteds_register_o(0);
			
	
	
	
	refreshDataByZoom(<?php echo $_GET['ca_high']; ?>,<?php echo $_GET['ca_media']; ?>,<?php echo $_GET['ca_low']; ?>);

	</script>
	
<?php
}	
?>
<SCRIPT>
//refreshDataByZoom(<?php echo $_GET['ca_high']; ?>,<?php echo $_GET['ca_media']; ?>,<?php echo $_GET['ca_low']; ?>);


document.getElementById('ia_Div_Max_o').innerHTML = <?php echo $_GET['ca_high']; ?>;
document.getElementById('ia_Inp_Max_o').value = <?php echo $_GET['ca_high']; ?>;

document.getElementById('ia_Div_Med_o').innerHTML = <?php echo $_GET['ca_media']; ?>;
document.getElementById('ia_Inp_Med_o').value = <?php echo $_GET['ca_media']; ?>;

document.getElementById('ia_Div_Min_o').innerHTML = <?php echo $_GET['ca_low']; ?>;
document.getElementById('ia_Inp_Min_o').value = <?php echo $_GET['ca_low']; ?>;


</SCRIPT>