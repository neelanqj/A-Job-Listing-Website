<?php
require('../apps/controller/database.class.php');
require('../apps/controller/jobservice.class.php');

$pdo = Database::getConnection('write');

if ($_POST['ACTION'] == "jobapplicants") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));

	$jobservice = new JobService($pdo,$json->email, '',$_POST['SESSION'], $json->ipaddress, $json->passcode);
	$jobservice->listJobApplicants($json->jobID);
}

?>