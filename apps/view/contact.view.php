<?php session_start(); 
include_once '../controller/database.class.php';
include_once '../controller/userservice.class.php';

$pdo = Database::getConnection('write');

$userService = new UserService($pdo, '', '', '', '', '');

	if (isset($_POST['submit'])){
		// this is what will happen if the forum has been submitted.
		$from = $_POST['email'];
		
		// Location of administrator's email.
		$to = "neelan.joachimpillai@gmail.com";
		$subject = "JJobs Contact Us Message From ".$_POST['name'];
		$comment = $_POST['comments'];
		
		if($userService->sendEmail($to, $from, $subject, $comment)) {
			header('Location: message.view.php?message=Your comment has been successfully submitted.&mood=positive');	
		}
	} 
?>
<!DOCTYPE html>
<html>
<head>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-42805010-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-42805010-1');
</script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contact Us</title>
    <link rel="icon" type="image/ico" href="../../favicon.ico"></link> 
    <link rel="shortcut icon" href="../../favicon.ico"></link>    
    
    <!-- CSS File Library Includes -->
    <link rel="stylesheet" type="text/css" href="../../src/library/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../../src/library/bootstrap/css/bootstrap-responsive.css"/>
    
    <!-- JavaScript Library Includes -->
    <script language="JavaScript" type="text/javascript" src='../../src/library/jquery/jquery-1.9.1.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/library/bootstrap/js/bootstrap.js'></script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../../src/custom/css/page.css">
    
</head>
<body>
	<?php include("../view/headernav.inc.php"); ?>
    
    <div class="row-fluid">
          <div class="span12 text-center">    
                <div class="row-fluid">
                    <img src="../../src/custom/img/logo/Logo.png" />
                </div>
                <div class="row-fluid">
                    Contact Us.
                </div>
          </div>
    </div>
    <div class="row-fluid">
        <div class="span8 offset4 text-center">
                <div class="span6"><br/><br/><br/>
                    You can contact us either via the forum below or by phone. You have to be logged in to use this function.
                </div>            
        </div>
    </div>
 
 <!-- Beginning of the form -->
			<?php
			if (!isset($_POST['submit'])) {
			?>
            <form action="/wecare/contact" method="post">
            <div class="row-fluid">
            	<div class="span8 offset4 text-center">
                    <div class="row-fluid"><div id="main" class="span6 text-center"><br/><br/>Name:</div></div>
                    <div class="row-fluid">
                        <div id="main" class="span6"><input type="text" name="name" class="input-medium"/></div>
                    </div>
                    <div class="row-fluid"><div id="main" class="span6">Email:</div></div>
                    <div class="row-fluid">
                        <div id="main" class="span6"><input type="email" name="email" class="input-medium" /></div>
                    </div>
                    <div class="row-fluid"><div id="main" class="span6">Message:</div></div>
                    <div class="row-fluid">                
                        <div id="main" class="span6">
                        <textarea name="comments" rows="10"  class="input-medium"></textarea>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                        <input class="btn btn-primary" type="submit" name="submit" value="Submit" />
                        </div>
                    </div>
                </div>
            </div>
            </form>
			<?php
			}
			?>	
 
    <?php include("../view/footer.inc.php"); ?>
</body>
</html>
