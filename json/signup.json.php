<?php
require('../apps/controller/database.class.php');
require('../apps/controller/userservice.class.php');

$pdo = Database::getConnection('write');

if ($_POST['ACTION'] == "signup") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$userservice = new UserService($pdo,'','','','','');
	
	$userservice->signupUser(
							   $json->email
							   , $json->password
							   , $json->password2
							   , $json->phone
							   , $json->firstName
							   , $json->lastName
							   , $json->region
							   , $json->city
							   , $json->country
							   , $json->postalCode
							   , $json->careerLvl
							   , $json->education
							   );
	
} elseif ($_POST['ACTION'] == "verificationcode") {
	$unformatted_json = $_POST['JSON'];
	$json = json_decode(stripslashes($unformatted_json));
	
	$userservice = new UserService($pdo,$json->email,'','','','');
	$userservice->generateActivationCode();
}
?>