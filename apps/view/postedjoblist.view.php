<?php 
	session_start(); 
	if(!isset($_COOKIE["passcode"])) {
		echo '<meta http-equiv="expired cookie" content="logout.view.php?msg=expired">';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jobs Posted</title>
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
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/viewmodels/postedjoblist.viewmodel.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/page/postedjoblist.page.js' defer="defer"></script>
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
                		Posted Jobs List<br/><br/>
            		</div>
              </div>
        </div>
        <div class="row-fluid">
        	<div class="span12" style="text-align: center">
            	<a class="btn btn-large btn-primary" href="postjob.view.php">Create New Job</a><br/><br/>
            </div>
        </div>
		<div class="row-fluid">
        	<div class="span12">
                <table class="table table-striped table-bordered table-hover">
                    <thead><th>Job Title</th><th>Expire Date</th><th>Applicants</th><th></th><th></th><th></th></thead>
                    <tbody data-bind="template: { name: 'job-row', foreach: jobsList() }"></tbody>
                </table>
            </div>
        </div>
                  
        <!-- Modal -->
        <div id="delModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="delModal" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Confirm Delete</h3>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete this job requirement?</p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" data-bind="click:removeJob">Yes</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">No</button>
          </div>
        </div>
        
        <!-- Templates -->
		<script type="text/html" id="job-row">
			   <tr>
			   		<td><a data-bind="text: title, attr: { href: 'profilejob.view.php?id='+jid }"></a></td>
					<td data-bind="text: expiredate"></td>
					<td data-bind="text: applicants"></td>
					<td><a data-bind="attr: { href: 'jobapplicantbucket.view.php?id='+jid }"><i class="icon-shopping-cart"></i> Review Applications</a></td>
					<td><i class="icon-edit"></i> Edit Job</td>
					<td><a role="button" data-bind="click: $root.selectJob"><i class="icon-trash"></i> Delete</a></td>
				</tr>
        </script>
  
        <?php include("../view/footer.inc.php"); 
		} ?>
        
</body>
</html>