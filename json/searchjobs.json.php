<?php
require('../apps/controller/database.class.php');
require('../apps/controller/jobservice.class.php');

$pdo = Database::getConnection('read');

if ($_POST['ACTION'] == "search") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$jobservice = new JobService($pdo,'','','','','');
	$jobservice->search($json->skills
					   , $json->location
					   , $json->filter
					   , $json->pagenum
					   , $json->perpage);
} elseif($_POST['ACTION'] == "count"){
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$jobservice = new JobService($pdo,'','','','','');
	$jobservice->searchCount($json->skills
					   , $json->location
					   , $json->filter
					   , $json->pagenum
					   , $json->perpage);
}
?>