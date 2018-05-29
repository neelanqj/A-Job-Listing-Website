<?php
require('../apps/core.php');
require('../apps/controller/database.class.php');
require('../apps/controller/jobservice.class.php');

$pdo = Database::getConnection('write');

if ($_POST['ACTION'] == "jobpost") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));

	$jobservice = new JobService($pdo,$json->email, '',$_POST['SESSION'], $json->ipaddress, $json->passcode);
	$jobservice->createJob(
						   		$json->job->company
							   , $json->job->title
							   , $json->job->country
							   , $json->job->region
							   , $json->job->city
							   , $json->job->address1
							   , $json->job->address2
							   , $json->job->postalcode
							   , $json->job->contactname
							   , $json->job->contactphonenumber
							   , $json->job->contactemail
							   , $json->job->hidecontactemail
							   , $json->job->hidecontactphonenumber
							   , $json->job->expirationdate
							   , normalize_str($json->job->description)
							   , $json->job->category
							   , $json->job->education
							   , $json->job->careerlvl
							   , $json->job->minsalary
							   , $json->job->maxsalary);
	
	foreach($json->job->skillList as $item) {
		$jobservice->addSkill($item->skillname, $item->experience, $item->mandatory);
	}
	
}
?>