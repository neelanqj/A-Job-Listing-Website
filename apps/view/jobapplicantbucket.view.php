<?php session_start(); 
	if(!isset($_COOKIE["passcode"])) {
		echo '<meta http-equiv="expired cookie" content="logout.view.php?msg=expired">';
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Job Applicant Bucket</title>
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
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/viewmodels/jobapplicantbucket.viewmodel.js' defer="defer"></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/page/jobapplicantbucket.page.js' defer="defer"></script>
</head>

<body>
    <input type="hidden" id="jobID" value="<?php echo $_GET['id']; ?>" />
	<?php include("../view/headernav.inc.php"); ?>

    <div class="row-fluid">
          <div class="span12 text-center">    
                <div class="row-fluid">
                    <img src="../../src/custom/img/logo/Logo.png" />
                </div>
                <div class="row-fluid">
                    Applications For The Job Position<br/><br/>
                </div>
          </div>
    </div>
      
    <div class="row-fluid">
        <div class="span12">
            <table class="table table-striped table-bordered table-hover">
                <thead><th>First Name</th><th>Last Name</th><th>Career Level</th><th>Education</th><th>Total Jobs Applied To</th><th>Applied In Last Month</th><th>Applied In Last Week</th><th></th></thead>
                <tbody data-bind="visible: applicantList().length > 0, template: { name: 'application-row', foreach: applicantList() }">
                </tbody>
               	<tbody data-bind="visible: applicantList().length == 0">  
                	<tr>
			   		<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
                    <td>-</td>
                    </tr>
				</tr>
            </table>
        </div>
    </div>

<?php include("../view/footer.inc.php"); ?>

<!-- Templates -->
<script type="text/html" id="application-row">
       <tr>
            <td data-bind="text: firstName"></td>
            <td data-bind="text: lastName"></td>
            <td data-bind="text: careerLvl"></td>
            <td data-bind="text: education"></td>
            <td data-bind="text: total"></td>
            <td data-bind="text: month"></td>
            <td data-bind="text: week"></td>
            <td><a class="btn btn-primary" data-bind="attr: { href: 'viewapplication.view.php?id='+jaid }">View Job Application</a></td>
        </tr>
</script>
</body>
</html>