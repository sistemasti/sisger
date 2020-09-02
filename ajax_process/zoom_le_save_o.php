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
	if($_FILES['le_zoom_document_file']['name'] != ""){
		
		$nomeimagem = $_FILES['le_zoom_document_file']['name'];  
		$ext = strrchr($nomeimagem, '.'); 
		
		$nname = uniqid();		
			
			$img = basename($nname.$ext);	
			$uploadfile = $uploaddir . $img  ;
			
			$file = $nname.$ext;
			
			move_uploaded_file($_FILES['le_zoom_document_file']['tmp_name'], $uploadfile);
			
		
	}else{
			$file = '';
	}	 */
	/* echo "<pre>";
	print_r($_POST);
	echo "</pre>"; */


	$i = Analyze_options::select_analyse_risk_id_risk_id_option($_REQUEST['id_risk'],$_REQUEST['id_option']);
	
	if($i['num'] > 0){
		
		Analyze_options::update_zoom_le_save($_POST['le_zoom_link_o'], $_POST['le_zoom_obs_o'], $_POST['le_zoom_explanation_fields_o'], $_POST['le_zoom_notes_explanation_o'], $_POST['le_zoom_document_name_o'], $_POST['le_zoom_comment_o'], $_POST['le_zoom_document_file_o'], $_REQUEST['id_risk'], $_REQUEST['id_option']);
		
	}else{
		
		Analyze_options::insert_zoom_le_save($_POST['le_zoom_link_o'], $_POST['le_zoom_obs_o'],$_POST['le_zoom_explanation_fields_o'], $_POST['le_zoom_notes_explanation_o'], $_POST['le_zoom_document_name_o'], $_POST['le_zoom_comment_o'], $_POST['le_zoom_document_file_o'], $_REQUEST['id_risk'], $_REQUEST['id_option']);

	}	

	/* Analyze_options::update_zoom_le_save($_POST['le_zoom_link'], $_POST['le_zoom_obs'], $_POST['le_zoom_explanation_fields'], $_POST['le_zoom_notes_explanation'], $_POST['le_zoom_document_name'], $_POST['le_zoom_comment'], $_POST['le_zoom_document_file'], $_GET['id']); */

echo 1;

?>








