<?php
require('../apps/controller/database.class.php');
require('../apps/controller/userservice.class.php');

$pdo = Database::getConnection('write');

if ($_POST['ACTION'] == "activateEmployee") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$userservice = new UserService($pdo,$json->email,'','','','');
	$userservice->activateEmployee($json->vcode);
	
} elseif ($_POST['ACTION'] == "activateEmployer") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$userservice = new UserService($pdo, $json->email,'','','','');
	$userservice->activateEmployer($json->vcode);
	
}
?>