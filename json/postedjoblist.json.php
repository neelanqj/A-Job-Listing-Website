<?php
require('../apps/controller/database.class.php');
require('../apps/controller/jobservice.class.php');

$pdo = Database::getConnection('write');

if ($_POST['ACTION'] == "listjobs") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));

	$jobservice = new JobService($pdo,$json->email, '',$_POST['SESSION'], $json->ipaddress, $json->passcode);
	$jobservice->myJobList($json->userID);
}  elseif ($_POST['ACTION'] == "removejob") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$jobservice = new JobService($pdo,$json->email, '',$_POST['SESSION'], $json->ipaddress, $json->passcode);
	$jobservice->removeJob($json->userID, $json->jobID);
}
?>