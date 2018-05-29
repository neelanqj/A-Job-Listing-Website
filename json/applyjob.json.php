<?php
error_reporting(E_ALL);
require('../apps/controller/database.class.php');
require('../apps/controller/jobservice.class.php');

$pdo = Database::getConnection('write');

if ($_POST['ACTION'] == "apply") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode($unformatted_json);

	$jobservice = new JobService($pdo,$json->email, '',$_POST['SESSION'], $json->ipaddress, $json->passcode);
	
	$jobservice->applyJob(		$json->userID
							   , $json->resume
							   , $json->coverletter
							   , $json->jobID);
	
}
?>