<?php session_start(); 
	if(!isset($_COOKIE["passcode"])) {
		echo '<meta http-equiv="expired cookie" content="logout.view.php?msg=expired">';
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Job Applications</title>
      <link rel="icon" type="image/ico" href="../../favicon.ico">
      </link> 
      <link rel="shortcut icon" href="../../favicon.ico">
      </link>
      <!-- CSS File Library Includes -->
      <link rel="stylesheet" type="text/css" href="../../src/library/bootstrap/css/bootstrap.css"/>
      <link rel="stylesheet" type="text/css" href="../../src/library/bootstrap/css/bootstrap-responsive.css"/>
      
      <!-- JavaScript Library Includes -->
      <script language="JavaScript" type="text/javascript" src='../../src/library/jquery/jquery-1.9.1.js'></script>
      <script language="JavaScript" type="text/javascript" src='../../src/library/jquery-cookie/jquery.cookie.js'></script>
      <script language="JavaScript" type="text/javascript" src='../../src/library/bootstrap/js/bootstrap.js'></script>
      <script language="JavaScript" type="text/javascript" src='../../src/library/knockoutjs/knockout-2.2.1.js'></script>  
      <script language="JavaScript" type="text/javascript" src='../../src/library/jquery-ui-1.10.2.custom/js/jquery-ui-1.10.2.custom.min.js'></script>
          
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../../src/custom/css/page.css">
    
      <!-- JavaScript Includes -->
      <script language="JavaScript" type="text/javascript" src='../../src/custom/js/page.js'></script> 
      
      <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/viewmodels/jobapplicationlist.viewmodel.js' defer="defer"></script>
      <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/page/jobapplicationlist.page.js' defer="defer"></script>
</head>

<body>
      <?php 
	  if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
	  include("../view/headernav.inc.php"); ?>
      <div class="row-fluid">
         <div class="span12 text-center">
            <div class="row-fluid">
               <img src="../../src/custom/img/logo/Logo.png" />
            </div>
            <div class="row-fluid">
               Below are the jobs you applied to.<br/><br/><br/>
            </div>
         </div>
      </div>
      
    <div class="row-fluid">
        <div class="span12">
            <table class="table table-striped table-bordered table-hover">
                <thead><th>Job Title</th><th>Application Date</th><th></th></thead>
                <tbody data-bind="template: { name: 'application-row', foreach: jobsList() }"></tbody>
            </table>
        </div>
    </div>

        <!-- Templates -->
		<script type="text/html" id="application-row">
			   <tr>
			   		<td><a data-bind="text: title, attr: { href: 'profilejob.view.php?id='+jid }"></a></td>
					<td data-bind="text: applydate"></td>
					<td><a class="btn" data-bind="attr: { href: 'viewapplication.view.php?id='+jaid }">View Application</a></td>
				</tr>
        </script>
        
      <?php include("../view/footer.inc.php"); 
	  } ?>
</body>
</html>