<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/TR_Analyze_options.class.php");

/* echo  "<pre>";
print_r($_POST);
echo  "</pre>";

echo  "<pre>";
print_r($_GET);
echo  "</pre>"; */

	//upload da foto 1
	/* $uploaddir = '../files/';											
	if($_FILES['fr_zoom_document_file']['name'] != ""){
		
		$nomeimagem = $_FILES['fr_zoom_document_file']['name'];  
		$ext = strrchr($nomeimagem, '.'); 
		
		$nname = uniqid();		
			
			$img = basename($nname.$ext);	
			$uploadfile = $uploaddir . $img  ;
			
			$file = $nname.$ext;
			
			move_uploaded_file($_FILES['fr_zoom_document_file']['tmp_name'], $uploadfile);
			
		
	}else{
		$file="";
	} */
	/**/ 
	$i = Analyze_options::select_analyse_risk_id_risk_id_option($_REQUEST['id_risk'],$_REQUEST['id_option']);
	
	if($i['num'] > 0){
		
		Analyze_options::update_zoom_fr_save($_POST['fr_zoom_link_o'], $_POST['fr_zoom_obs_o'], $_POST['fr_zoom_explanation_fields_o'], $_POST['fr_zoom_notes_explanation_o'], $_POST['fr_zoom_document_name_o'], $_POST['fr_zoom_comment_o'], $_POST['fr_zoom_document_file_o'], $_REQUEST['id_risk'], $_REQUEST['id_option']);
		
	}else{
		
		Analyze_options::insert_zoom_fr_save($_POST['fr_zoom_link_o'], $_POST['fr_zoom_obs_o'],$_POST['fr_zoom_explanation_fields_o'], $_POST['fr_zoom_notes_explanation_o'], $_POST['fr_zoom_document_name_o'], $_POST['fr_zoom_comment_o'], $_POST['fr_zoom_document_file_o'], $_REQUEST['id_risk'], $_REQUEST['id_option']);

	}	

	

echo 1;

?>








