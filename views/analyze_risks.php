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
            <h1><?php echo $_SESSION[$_SESSION['lang']]['Analyze Risks']; ?></h1>
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
								$ia_Inp_med 	= $ar['C_pro_score']; 
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
              <!-- /.card-header -->
              <div class="card-body">
			  <div class="row">
			  
					<div class="col-lg-6">
						
							<div class="form-group">
							<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Risk Name']; ?></label>
							<select class="form-control" id="risk" name="risk" onchange="select_risk(this.value)">
							<option value="" > <?php echo $_SESSION[$_SESSION['lang']]['select']; ?> </option>
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

							<div class="form-group">
							<label for="Sigla"><?php echo $_SESSION[$_SESSION['lang']]['Agent']; ?></label>
							<input type="text" class="form-control" id="agent" name="agent" placeholder="" value="<?php echo $agent; ?>" required readonly>
							
							</div>
						
					</div>
					<div class="col-lg-6">
						
							<div class="form-group">
							<label for="Name"><?php echo $_SESSION[$_SESSION['lang']]['Description']; ?></label>
							<textarea class="form-control" name="description" id="description" readonly><?php echo $description; ?></textarea>
							</div>

							
						
					</div>
				</div>
				<script>
				
					
					function select_risk(id) {		
						document.getElementById('bxAll').style.display='block';
					  if($("#risk").val() == "" || $("#risk").val() == null){	document.getElementById('bxAll').style.display='none';							
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
							
							//A
							//document.getElementById('leia').options[0]=new Option("Selected by zoom", ca_low, true, true);
							
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
						    $("#fr_zoom_document_file").val(data['fr_zoom_document_file']);						
						    //alert(data['fr_zoom_document_file']);				
							$("#fr_zoom_document_file_bx").html("<a href='"+data['fr_zoom_document_file']+"' target='_blank'>"+data['fr_zoom_document_file']+"</a>");				   
							 				
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
								
								$("#he3").val(data['he3']);
								$("#pl3").val(data['pl3']);
								$("#le3").val(data['le3']);
								
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
							
							$("#le_zoom_document_file_bx").html("<a href='"+data['le_zoom_document_file']+"' target='_blank'>"+data['le_zoom_document_file']+"</a>");
							
							$("#le_zoom_document_file").val(data['le_zoom_document_file']);
							
							$("#le_zoom_link_bx").html("<a href='"+data['le_zoom_link']+"' target='_blank'>"+data['le_zoom_link']+"</a>");	
							
							
							
							
							//C
							$("#ia_Inp_Min").val(data['ia_Inp_Min']);
							$("#ia_Inp_Med").val(data['ia_Inp_Med']);
							$("#ia_Inp_Max").val(data['ia_Inp_Max']);
							$("#ia_Inp_Range").val(data['ia_Inp_Range']);
							$("#explain_ia").val(data['explain_ia']);
							
							$("#ia_Div_Min").html(data['ia_Inp_Min']);
							$("#ia_Div_Med").html(data['ia_Inp_Med']);
							$("#ia_Div_Max").html(data['ia_Inp_Max']);
							$("#ia_Div_Range").html(data['ia_Inp_Range']);
							$("#ia_Div_Range").html(data['ia_Inp_Range']);
							
							$("#type_score").val(data['type_score']);
							
							if(data['type_score'] == 1){
								
								document.getElementById("type_score_1").checked = true;
								document.getElementById("type_score_2").checked = false;
								document.getElementById('bxFractionAffected').style.display='block';
								document.getElementById('bxValuePieAffected').style.display='none';
							}	
							
							if(data['type_score'] == 2){
								document.getElementById("type_score_2").checked = true;
								document.getElementById("type_score_1").checked = false;
								document.getElementById('bxFractionAffected').style.display='none';
								document.getElementById('bxValuePieAffected').style.display='block';
							}	
							
							if(data['C_type_list'] == 1){
							//	document.getElementById("type_list_1").checked = true;
								//document.getElementById("type_list_2").checked = false;
								
							}	
							if(data['C_type_list'] == 2){
								//document.getElementById("type_list_1").checked = false;
								//document.getElementById("type_list_2").checked = true;
								
							}	
							
							$("#heia").val(data['heia']);
							$("#plia").val(data['plia']);
							$("#leia").val(data['leia']);
							//alert(data['ia_zoom_explanation_fields']);
							$("#ia_zoom_explanation_fields").val(data['explain_ia']);
						    $("#ia_zoom_notes_explanation").val(data['ia_zoom_notes_explanation']);
						    $("#ia_zoom_document_name").val(data['ia_zoom_document_name']);
						    $("#ia_zoom_comment").val(data['ia_zoom_comment']);			
							$("#ia_zoom_obs").val(data['ia_zoom_obs']);						
						    $("#ia_zoom_link").val(data['ia_zoom_link']);			
						    $("#ia_zoom_document_file").val(data['ia_zoom_document_file']);			
						    //$("#ia_zoom_document_file").val(data['ia_zoom_document_file']);
							
							$("#ia_zoom_document_file_bx").html("<a href='"+data['ia_zoom_document_file']+"' target='_blank'>"+data['ia_zoom_document_file']+"</a>");
							
							$("#ia_zoom_link_bx").html("<a href='"+data['ia_zoom_link']+"' target='_blank'>"+data['ia_zoom_link']+"</a>");	
							
							
						}
					  });
					}
				
				
				function refreshDataByZoom(ca_high,ca_media,ca_low){
								
								document.getElementById('magnitude_IA_Max').innerHTML = ca_high;document.getElementById('magnitude_IA_Med').innerHTML = ca_media;
								document.getElementById('magnitude_IA_Min').innerHTML = ca_low;
								
								document.getElementById('leia').options[0]=new Option("Selected by zoom", ca_low, true, true);
								document.getElementById('plia').options[0] = new Option("Selected by zoom", ca_media, true, true);
								document.getElementById('heia').options[0] = new Option("Selected by zoom", ca_high, true, true);							
								
								
								var base = parseFloat(ca_high) + parseFloat(ca_media) + parseFloat(ca_low);
								var media = base / 3;		
													
								document.getElementById('magnitude_IA_MEDIA').innerHTML = media.toFixed(1);
								 
								//$("#ia_Div_Max").html('ca_high');
								document.getElementById('ia_Div_Max').innerHTML = ca_high;
								document.getElementById('ia_Inp_Max').value = ca_high;
								
								document.getElementById('ia_Div_Med').innerHTML = ca_media;
								document.getElementById('ia_Inp_Med').value = ca_media;
								
								document.getElementById('ia_Div_Min').innerHTML = ca_low;
								document.getElementById('ia_Inp_Min').value = ca_low;
								
								var range = (ca_high)-(ca_low);		
								document.getElementById('ia_Div_Range').innerHTML = range.toFixed(1);
								document.getElementById('ia_Inp_Range').value = range.toFixed(1);
							

							
							magnitudeRisk();

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
							<a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false"  ><?php echo $_SESSION[$_SESSION['lang']]['Magnitude of Risk']; ?></a>
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
						
						 <?php include("analyze_risks_frequency_or_rate.php"); ?>
						  
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->
						  <!-- #################### LOSS TO EACH ITEM ###################### -->
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->
						  
						 <?php include("analyze_risks_loss_to_each.php"); ?>
						  
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->
						  <!-- #################### ITEMS AFFECTED ###################### -->
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->
						  
						  <?php include("analyze_risks_items_affecteds.php"); ?>
						  
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->
						  <!-- #################### MAGNITUDE OF RISK ###################### -->
						  <!-- ############################################################# -->
						  <!-- ############################################################# -->

						 <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab" onchange="range_I_A('Max',this.value)">
							 
							 
							 
							 
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
									  <td style="text-align:center;"><span class="badge bg-info"><div id="magnitude_FR_MEDIA"><?php echo $magnitude_FR_MEDIA; ?></div></span></td>
									</tr>
									<tr>
									  <td><?php echo $_SESSION[$_SESSION['lang']]['Loss to each item affected']; ?></td>
									  <td><div id="magnitude_LE_Min"><?php echo $magnitude_LE_Min; ?></div></td>
									  <td><div id="magnitude_LE_Med"><?php echo $magnitude_LE_Med; ?></div></td>
									  <td><div id="magnitude_LE_Max"><?php echo $magnitude_LE_Max; ?></div></td>
									 <!-- <td></td>-->
									  <td style="text-align:center;"><span class="badge bg-info"><div id="magnitude_LE_MEDIA"><?php echo $magnitude_LE_MEDIA; ?></div></span></td>
									</tr>
									<tr>
									  <td><?php echo $_SESSION[$_SESSION['lang']]['Items affected']; ?></td>
									  <td><div id="magnitude_IA_Min"><?php echo $magnitude_IA_Min; ?></div></td>
									  <td><div id="magnitude_IA_Med"><?php echo $magnitude_IA_Med; ?></div></td>
									  <td><div id="magnitude_IA_Max"><?php echo $magnitude_IA_Max; ?></div></td>
									  <!--<td></td>-->
									  <td style="text-align:center;"><span class="badge bg-info"><div id="magnitude_IA_MEDIA"><?php echo $magnitude_IA_MEDIA; ?></a></span></td>
									</tr>
									<tr>
									  <td><?php echo $_SESSION[$_SESSION['lang']]['Magnitude of risk']; ?></td>
									  <td><div id="magnitude_SOMA_L"><?php echo $magnitude_SOMA_L; ?></div></td>
									  <td><div id="magnitude_SOMA_P"><?php echo $magnitude_SOMA_P; ?></div></td>
									  <td><div id="magnitude_SOMA_H"><?php echo $magnitude_SOMA_H; ?></div></td>
									  <!--<td><div id="magnitude_SOMA_RANGE"><?php echo $magnitude_SOMA_RANGE; ?></div><br></td>-->
									  <td style="text-align:center;"><span class="badge bg-success" style="font-size:20px;"><div id="magnitude_SOMA_MEDIA"><?php echo $magnitude_SOMA_MEDIA; ?></div></span></td>
									</tr>
								  </tbody>
								</table>
								
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
								 
								 
								/*  magnitude_SOMA_MEDIA
								magnitude_IA_MEDIA
								magnitude_LE_MEDIA
								magnitude_FR_MEDIA */
								 
								 function changeTypeCalc(t){
									
									
									if(t==3){
										
										document.getElementById('magnitude_FR_MEDIA').innerHTML=document.getElementById('magnitude_FR_Probable').innerHTML;
										
										document.getElementById('magnitude_LE_MEDIA').innerHTML=document.getElementById('magnitude_LE_Med').innerHTML;
										
										document.getElementById('magnitude_IA_MEDIA').innerHTML=document.getElementById('magnitude_IA_Med').innerHTML;
										
										var total = parseFloat((document.getElementById('magnitude_FR_MEDIA').innerHTML))+parseFloat((document.getElementById('magnitude_LE_MEDIA').innerHTML))+parseFloat((document.getElementById('magnitude_IA_MEDIA').innerHTML));
										
										document.getElementById('magnitude_SOMA_MEDIA').innerHTML=parseFloat(total.toFixed(1));
										
									}else if(t==2){
										//Math.pow(base, expoente)
										
										//A
										var a_h_p = Math.pow(10, ((document.getElementById('magnitude_FR_High').innerHTML)-5)*-1);
										var a_p_p = Math.pow(10, ((document.getElementById('magnitude_FR_Probable').innerHTML)-5)*-1);
										var a_l_p = Math.pow(10, ((document.getElementById('magnitude_FR_Low').innerHTML)-5)*-1);
										
										var total_a_p = 5-Math.log10((a_l_p + a_p_p + a_h_p)/3);
										document.getElementById('magnitude_FR_MEDIA').innerHTML = Math.round10(total_a_p,-1);
										//alert(a_h_p);
										
										
										//B
										var b_h_p = Math.pow(10, ((document.getElementById('magnitude_LE_Max').innerHTML)-5)*-1);
										var b_p_p = Math.pow(10, ((document.getElementById('magnitude_LE_Med').innerHTML)-5)*-1);
										var b_l_p = Math.pow(10, ((document.getElementById('magnitude_LE_Min').innerHTML)-5)*-1);
										
										var total_b_p = 5-Math.log10((b_l_p + b_p_p + b_h_p)/3);
										document.getElementById('magnitude_LE_MEDIA').innerHTML = Math.round10(total_b_p,-1);
										//alert(Math.round10(10.24, -1));
										
										//C
										var c_h_p = Math.pow(10, ((document.getElementById('magnitude_IA_Max').innerHTML)-5)*-1);
										var c_p_p = Math.pow(10, ((document.getElementById('magnitude_IA_Med').innerHTML)-5)*-1);
									 	var c_l_p = Math.pow(10, ((document.getElementById('magnitude_IA_Min').innerHTML)-5)*-1);
										
										var total_c_p = 5-Math.log10((c_l_p + c_p_p + c_h_p)/3);
										document.getElementById('magnitude_IA_MEDIA').innerHTML = Math.round10(total_c_p,-1); 
										
										
										var total = parseFloat((document.getElementById('magnitude_FR_MEDIA').innerHTML))+parseFloat((document.getElementById('magnitude_LE_MEDIA').innerHTML))+parseFloat((document.getElementById('magnitude_IA_MEDIA').innerHTML));
										
										document.getElementById('magnitude_SOMA_MEDIA').innerHTML=parseFloat(total.toFixed(1)); 
										
									}else{
										
										 select_risk(document.getElementById('risk').value);
									} 		
									
									 
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
								 <script>	
								 </script>	
							<div class="row">	
								<div class="col-sm-4 col-md-4">
								<button type="button" class="btn btn-block  bg-gradient-info btn-sm" onclick="changeTypeCalc(2)">Linear triangle distribution </button>
									
								</div>
								<div class="col-sm-4 col-md-4">
									<button type="button" class="btn btn-block bg-gradient-success btn-sm" onclick="changeTypeCalc(1)">Log triangle distribution  (default)</button>
								</div>
								<div class="col-sm-4 col-md-4">
									<button type="button" class="btn btn-block bg-gradient-warning btn-sm" onclick="changeTypeCalc(3)">Simple use of problable value</button>
								</div>
								
							</div>	
											&nbsp; <small><?php echo $_SESSION[$_SESSION['lang']]['Type of calculation used for expected values (used for the risk and any associated options)']; ?></small>
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
 
							
</script>		<?php if(isset($_GET['ca_high']) ){ ?>
<SCRIPT>
							
									  
refreshDataByZoom(<?php echo $_GET['ca_high']; ?>,<?php echo $_GET['ca_media']; ?>,<?php echo $_GET['ca_low']; ?>);
</SCRIPT>
<?php } ?>
<?php

require_once("footer.php");

?>
