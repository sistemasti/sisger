<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/ADM_Institutions.class.php");
include("../controllers/EC_Documents.class.php");
include("../controllers/IR_Risks.class.php");
include("../controllers/ADM_Projects.class.php");
include("../controllers/ADM_Users.class.php");

/**/ 
/**/ 
$deld = Documents::delete_document_by_institutions_id($_REQUEST['id']);
$deli = Institutions::delete_institution($_REQUEST['id']);
$delr1 = Risks::delete_risk_institutions_id($_REQUEST['id']);
$delr2 = Risks::delete_risk_group_institutions_id($_REQUEST['id']);
$delp = Projects::delete_project_by_institutions_id($_REQUEST['id']);
$delu = Users::delete_user_by_institutions_id($_REQUEST['id']);  

$spr = Projects::select_projects_for_report_id($_REQUEST['id']);

if($spr['num']>0){
	foreach($spr['dados'] as $spr){
		
		$deps = Projects::delete_system_by_project_id($spr['id']);
		
	}
}
//return dados

?>








