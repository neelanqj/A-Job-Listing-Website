<?php
require('../apps/controller/database.class.php');
require('../apps/controller/userservice.class.php');

$pdo = Database::getConnection('write');


if ($_POST['ACTION'] == "load") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$userservice = new UserService($pdo,$json->email,'',$_POST['SESSION'],$json->ipaddress,$json->passcode);
	
	$userservice->userSkills($json->ui);
	
} elseif ($_POST['ACTION'] == "setSkills") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$userservice = new UserService($pdo,$json->email,'',$_POST['SESSION'],$json->ipaddress,$json->passcode);
	
	foreach($json->skillList as $item) {
		$userservice->addSkill($item->skillname, $item->experience, $item->lastused);
	}
	
	foreach($json->removeList as $item) {
		$userservice->removeSkill($item->skillname);
	}
	echo '[{"message": "success"}]';
}

?>