<?php session_start(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Apply For Job</title>
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
<script type="text/javascript" src="../../src/custom/js/knockout.bindings.js"></script>
<script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/viewmodels/applyjob.viewmodel.js' defer="defer"></script>
<script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/page/applyjob.page.js' defer="defer"></script>


</head>

<body>
<!-- Text Editor -->
<script type="text/javascript" src="../../src/library/nicedit/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>

	<input type="hidden" id="jobID" value="<?php echo $_GET['id']; ?>" />
    <?php include("../view/headernav.inc.php"); ?>
    <div class="row-fluid">
     <div class="span12 text-center">
        <div class="row-fluid">
           <img src="../../src/custom/img/logo/Logo.png" />
        </div>
        <div class="row-fluid">
           Apply for a job.<br/><br/><br/>
        </div>
     </div>
    </div>
    
    <div class="row-fluid">
    	<div class="span12">
            <div class="row-fluid">
				<div class="span12 text-center">
                Cut and paste your tailored resume here. If the employer wants to see all your skills, <br/>
                they'll look at your skills page. Tailor this to the job you are applying to.
                </div>
            </div>
        	<div class="row-fluid">
            	<div class="offset2 span8">
                	<textarea id="resume" rows="21" class="span12" data-bind="nicedit: resume"></textarea>
                    <br/><br/>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row-fluid">
    	<div class="span12">
            <div class="row-fluid">
				<div class="span12 text-center">
                Cut and paste your tailored cover letter here (not manditory).
                </div>
            </div>
        	<div class="row-fluid">
            	<div class="offset2 span8">
                    <textarea id="coverletter" rows="21" class="span12" data-bind="nicedit: coverletter"></textarea>
                    <br/><br/><br/>
                </div>
            </div>
        </div>    
    </div>    
    
    <div class="row-fluid">
    	<div class="span12 text-center">
            <a data-bind="click: apply" type="button" class="btn btn-primary" id="apply-btn" data-loading-text="Loading...">Submit Resume</a>
        </div>
    </div>
    
	<?php include("../view/footer.inc.php"); ?>
    
    <div id="regModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myRegModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myRegModalLabel">Why Register?</h3>
      </div>
      <div class="modal-body">
        <p>		By creating an account, you will have the ability to have employers find YOU, keep track of the jobs you applied to, and even withdraw job applications within a given time frame. This will increase your chances of landing a job and allow for you to more carefully tailor your application.</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
      </div>
    </div>
              
        <!-- Page Initialization Scripts-->
        <script language="JavaScript" type="text/javascript">
            //<![CDATA[ 
            $(document).ready(function(){
					if ($('#userID').val() == "") $('#regModal').modal('show');
                });		
            //]]>  
        </script>        
  
</body>
</html>