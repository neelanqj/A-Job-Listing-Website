<?php
require('../apps/controller/database.class.php');
require('../apps/controller/userservice.class.php');

$pdo = Database::getConnection('read');


if ($_POST['ACTION'] == "messagehistory") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$userservice = new UserService($pdo,$json->email,'',$_POST['SESSION'],$json->ipaddress,$json->passcode);	
	$userservice->messageHistory($json->userID, $json->perpage, $json->pagenum);
	
} elseif ($_POST['ACTION'] == "messagehistorycount") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$userservice = new UserService($pdo,$json->email,'',$_POST['SESSION'],$json->ipaddress,$json->passcode);
	$userservice->messageHistoryCount($json->userID, $json->perpage, $json->pagenum);
} elseif ($_POST['ACTION'] == "viewmessage") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$userservice = new UserService($pdo,$json->email,'',$_POST['SESSION'],$json->ipaddress,$json->passcode);
	$userservice->viewMessage($json->userid, $json->messageid);
	
}

?>