<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");

/* echo  "<pre>";
print_r($_POST);
echo  "</pre>";

echo  "<pre>";
print_r($_GET);
echo  "</pre>"; */

	//upload da foto 1
	/* $uploaddir = '../files/';											
	if($_FILES['ia_zoom_document_file']['name'] != ""){
		
		$nomeimagem = $_FILES['ia_zoom_document_file']['name'];  
		$ext = strrchr($nomeimagem, '.'); 
		
		$nname = uniqid();		
			
			$img = basename($nname.$ext);	
			$uploadfile = $uploaddir . $img  ;
			
			$file = $nname.$ext;
			
			move_uploaded_file($_FILES['ia_zoom_document_file']['tmp_name'], $uploadfile);
			
		
	}else{
			$file = '';
	} */
	/* echo "<pre>";
	print_r($_POST);
	echo "</pre>"; */

	Build_value_pie::update_zoom_ia_save($_POST['ia_zoom_link'], $_POST['ia_zoom_obs'], $_POST['ia_zoom_explanation_fields'], $_POST['ia_zoom_notes_explanation'], $_POST['ia_zoom_document_name'], $_POST['ia_zoom_comment'], $_POST['ia_zoom_document_file'], $_GET['id']);

echo 1;

?>








