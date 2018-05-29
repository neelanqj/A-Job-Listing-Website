<?php

require('../apps/controller/database.class.php');
require('../apps/controller/jobservice.class.php');

$pdo = Database::getConnection('read');


if ($_POST['ACTION'] == "jobprofile") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));

	$jobservice = new JobService($pdo,'','','','','');
	$jobservice->getProfile($json->jobID);
	
} elseif ($_POST['ACTION'] == "jobskills") {

	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));

	$jobservice = new JobService($pdo,'','','','','');
	$jobservice->getJobSkills($json->jobID);
}

?>