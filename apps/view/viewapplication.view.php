<?php session_start(); 
	if(!isset($_COOKIE["passcode"])) {
		echo '<meta http-equiv="expired cookie" content="logout.view.php?msg=expired">';
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Application Profile</title>
	<link rel="icon" type="image/ico" href="../../favicon.ico"></link> 
    <link rel="shortcut icon" href="../../favicon.ico"></link>
    
    <!-- CSS File Library Includes -->
    <link rel="stylesheet" type="text/css" href="../../src/library/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../../src/library/bootstrap/css/bootstrap-responsive.css"/>
    
    <!-- JavaScript Library Includes -->
    <script language="JavaScript" type="text/javascript" src='../../src/library/jquery/jquery-1.9.1.js'></script>    
    <script language="JavaScript" type="text/javascript" src='../../src/library/jquery-cookie/jquery.cookie.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/library/bootstrap/js/bootstrap.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/library/knockoutjs/knockout-2.2.1.js'></script>  
    
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../../src/custom/css/page.css">
    
    <!-- JavaScript -->
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/page.js'></script> 
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/viewmodels/viewapplication.viewmodel.js' defer="defer"></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/page/viewapplication.page.js' defer="defer"></script>
</head>

<body data-bind="with: application">
	<?php include("../view/headernav.inc.php"); ?>

    <div class="row-fluid">
          <div class="span12 text-center">    
                <div class="row-fluid">
                    <img src="../../src/custom/img/logo/Logo.png" />
                </div>
                <div class="row-fluid">
                    Application ID <span id="appID"><?php echo $_GET['id']; ?></span><br/><br/>
                    <a class="btn btn-success" data-bind="visible: !(firstName == 'Non-Registered'),attr: { href: 'profileperson.view.php?id='+uid }">View Skills Profile</a>
                    <br/><br/>
                </div>
          </div>
    </div>
    
    <div class="row-fluid">
          <div class="span12 text-center">    
                <div class="row-fluid">
                    <span data-bind="text: firstName"></span> <span data-bind="text: lastName"></span><br/><br/>
                    <b>Education:</b> <span data-bind="text: education"></span>, <b>Career Level:</b> <span data-bind="text: careerLvl"></span>
                    <br/><br/>
                    <b>Phone Number:</b> <span data-bind="text: phone1"></span>
                    <br/><br/>
                </div>
          </div>
    </div>
    
    <div class="span10 offset2">
        <div class="accordion" id="accordion2">
            <div class="accordion-group" data-bind="visible: !!coverletter">
                <div class="accordion-heading text-center">
                    <h3><a class="accordion-toggle" data-toggle="collapse"  href="#coverletter">COVER LETTER</a></h3>
                </div>
                <div id="coverletter" class="accordion-body collapse in">
                  <div class="accordion-inner">
                    <p data-bind="html: coverletter"></p><br/><br/><br/>
                  </div>
                </div>
            </div>
    
            <div class="accordion-group">
                <div class="accordion-heading text-center">
                    <h3><a class="accordion-toggle" data-toggle="collapse" href="#resume">RESUME</a></h3>
                </div>
                <div id="resume" class="accordion-body collapse in">
                    <div class="accordion-inner">
                        <p data-bind="html: resume"></p><br/><br/><br/>
                    </div>
                </div>
             </div>
        </div> 
    </div>
<?php include("../view/footer.inc.php"); ?>

</body>
</html>