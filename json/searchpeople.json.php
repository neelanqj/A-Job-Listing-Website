<?php
require('../src/library/custom/jsonToXML.php');
require('../apps/controller/database.class.php');
require('../apps/controller/userservice.class.php');

$pdo = Database::getConnection('read');

if ($_POST['ACTION'] == "search") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$userservice = new UserService($pdo, $json->email, '', $_POST['SESSION'], $json->ipaddress, $json->passcode);
	//echo jsonToXML(json_encode($json->skillList));

	$userservice->search($json->careerLvl
					   , $json->education
					   , jsonToXML(json_encode($json->skillList))
					   , '' //location
					   , '' //filter
					   , $json->pagenum
					   , $json->perpage);
} elseif ($_POST['ACTION'] == "count") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$userservice = new UserService($pdo, $json->email, '', $_POST['SESSION'], $json->ipaddress, $json->passcode);
	//echo jsonToXML(json_encode($json->skillList));

	$userservice->searchCount($json->careerLvl
					   , $json->education
					   , jsonToXML(json_encode($json->skillList))
					   , '' //location
					   , '' //filter
					   , $json->pagenum
					   , $json->perpage);
}
?>