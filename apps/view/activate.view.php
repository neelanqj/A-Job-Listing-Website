<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Verification Page</title>
    <link rel="icon" type="image/ico" href="../../favicon.ico"></link> 
    <link rel="shortcut icon" href="../../favicon.ico"></link>    
    
    <!-- CSS File Library Includes -->
    <link rel="stylesheet" type="text/css" href="../../src/library/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../../src/library/bootstrap/css/bootstrap-responsive.css"/>
    
    <!-- JavaScript Library Includes -->
    <script language="JavaScript" type="text/javascript" src='../../src/library/jquery/jquery-1.9.1.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/library/bootstrap/js/bootstrap.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/library/knockoutjs/knockout-2.2.1.js'></script>     
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../../src/custom/css/page.css">
    
    <!-- JavaScript -->
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/page.js'></script> 
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/viewmodels/activate.viewmodel.js' defer="defer"></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/page/activate.page.js' defer="defer"></script>
        
</head>
<body>
	<?php include("../view/headernav.inc.php"); ?>
    
    <div class="row-fluid">
          <div class="span12 text-center">    
                <div class="row-fluid">
                    <img src="../../src/custom/img/logo/Logo.png" />
                </div>
                <div class="row-fluid">
                    Verification Page.
                </div>
          </div>
    </div>
    <div class="row-fluid">
        <div class="span8 offset4 text-center">
                <div class="span6"><br/><br/><br/>
                    Please enter your email and the verification code you were sent along with your email in order to activate your account.
                </div>
        </div>
    </div>
 
     <div class="row-fluid">
        <div class="span8 offset4 text-center"><br/><br/>
        		<div class="row-fluid">
                    <div class="span2">
                        <b>Your Email Address:</b>
                    </div>
                    <div class="span3">     
                    	<input id="email" type="email" data-bind="value: email"/>
                    </div>
                    <div class="span3"><a class="btn btn-danger" data-bind="click: resendVerification">Resend Verification Code</a></div>
                </div>        
        		<div class="row-fluid">
                    <div class="span2">
                        <b>Verification Code:</b>
                    </div>
                    <div class="span3"> 
                    	<input id="code" type="text" data-bind="value: vCode"/>
                    </div>
                    <div class="span3"></div>
                </div>
                
         		<div class="row-fluid">
                    <div class="span6"><br/><br/>
                        <b>Are you an Job Employeer or Job Seeker? (This will be used when Setting up your Account)</b>
                    </div>
                </div>
            	<div class="row-fluid">
                    <div class="span6 text-center">
                        <select id="accountType" data-bind="value: accountType">
                            <option value="1" selected="selected">Job Seeker</option>
                            <option value="2">Employeer</option>        
                        </select>
                    </div>
                </div>             
                
                
                <div class="row-fluid">
                	<div class="span6 text-center"><br/><br/><br/>
                    	<a class="btn btn-primary" data-bind="click: (accountType()==2)?activateEmployer : activateEmployee">Submit Verification</a>
                    </div>
                </div>
        </div>
    </div>
    <?php include("../view/footer.inc.php"); ?>
</body>
</html>
