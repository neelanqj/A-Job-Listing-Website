<?php
require('../apps/controller/database.class.php');
require('../apps/controller/userservice.class.php');

$pdo = Database::getConnection('write');

if ($_POST['ACTION'] == "createmessage") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$userservice = new UserService($pdo,$json->email,'',$_POST['SESSION'],$json->ipaddress,$json->passcode);
	$userservice->createStoredMessage($json->userid, $json->title, $json->message);
	
} elseif ($_POST['ACTION'] == "deletemessage") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$userservice = new UserService($pdo,$json->email,'',$_POST['SESSION'],$json->ipaddress,$json->passcode);
	$userservice->deleteStoredMessage($json->userid, $json->messageid);
	
} elseif ($_POST['ACTION'] == "viewmessage") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$userservice = new UserService($pdo,$json->email,'',$_POST['SESSION'],$json->ipaddress,$json->passcode);
	$userservice->viewStoredMessage($json->userid, $json->messageid);
	
}  elseif ($_POST['ACTION'] == "getmessagelist") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$userservice = new UserService($pdo,$json->email,'',$_POST['SESSION'],$json->ipaddress,$json->passcode);
	$userservice->listStoredMessages($json->userid);
	
} elseif ($_POST['ACTION'] == "editmessage") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$userservice = new UserService($pdo,$json->email,'',$_POST['SESSION'],$json->ipaddress,$json->passcode);
	$userservice->editStoredMessage($json->userid, $json->messageid, $json->title, $json->message);
	
} elseif ($_POST['ACTION'] == "sendmessage") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$userservice = new UserService($pdo,$json->email,'',$_POST['SESSION'],$json->ipaddress,$json->passcode);
	$userservice->sendMessage($json->userid, $json->recieverid, $json->title, $json->message);
}
?>