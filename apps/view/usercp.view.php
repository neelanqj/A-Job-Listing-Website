<?php 
	session_start() ;
	if(!isset($_COOKIE["passcode"])) {
		echo '<meta http-equiv="expired cookie" content="logout.view.php?msg=expired">';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-42805010-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-42805010-1');
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control Panel</title>
    <title>Control Panel</title>
    <link rel="icon" type="image/ico" href="../../favicon.ico"></link> 
    <link rel="shortcut icon" href="../../favicon.ico"></link>
    
    <!-- CSS File Library Includes -->
    <link rel="stylesheet" type="text/css" href="../../src/library/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../../src/library/bootstrap/css/bootstrap-responsive.css"/>
    <link rel="stylesheet" type="text/css" href="../../src/library/infinite-ajax-scroll/src/css/jquery.ias.css"/>    
    
    <!-- JavaScript Library Includes -->
    <script language="JavaScript" type="text/javascript" src='../../src/library/jquery/jquery-1.9.1.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/library/jquery-cookie/jquery.cookie.js'></script>
    <script type="text/javascript" src="../../src/library/infinite-ajax-scroll/src/jquery-ias.js"></script>
    <script language="JavaScript" type="text/javascript" src='../../src/library/bootstrap/js/bootstrap.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/library/knockoutjs/knockout-2.2.1.js'></script>  
    
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../../src/custom/css/page.css">
    
    <!-- JavaScript Includes -->
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/page.js'></script> 
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/viewmodels/usercp.viewmodel.js' defer="defer"></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/page/usercp.page.js' defer="defer"></script>
    
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
                		Control Panel<br/><br/>
            		</div>
              </div>
        </div>
        <div class="row-fluid">
            <div class="span8 offset4 text-center">
                	<div class="span6">
                    	<div class="row-fluid">
                        	<div class="span12">
                        		<hr/>General Control Panel<hr/>
                        	</div>
                        </div>
	      				<div class="row-fluid">                      	
                            <div class="span6">
                            	<a href="/wecare/accountsettings"><i class="icon-user"></i> Account Settings</a>
                            </div>
                            <div class="span6">
                            	<a href="/wecare/changepassword"><i class="icon-user"></i> Change Password</a>
                            </div>           
                        </div>
                        <div class="row-fluid" >
                        	<div class="span6">
                            	<a href="/wecare/messagehistory"><i class="icon-list-alt"></i> My Messages</a>
                            </div>
                        	<div class="span6">
                            	
                            </div>
                        </div>                                                
                 
                          
	      				<div id="UCP" class="row-fluid" data-bind="visible: employeevisibility()">
                        	<div class="span12">
                            <br/><br/>
                        		<hr/>User Control Panel<hr/>
                        	</div>
                        </div>

 	      				<div id="UCP" class="row-fluid" data-bind="visible: employeevisibility()">
                        	<div class="span6">
                            	<a href="/wecare/jobapplicationlist"><i class="icon-folder-open"></i> Job Application List</a>
                            </div>
                        	<div class="span6">
                            	<a href="/wecare/myskills"><i class="icon-circle-arrow-up"></i> My Skills List</a>
                            </div>
                        </div> 

                        <div id="ECP" class="row-fluid" data-bind="visible: employervisibility()">
	                        <div class="span12">
	                            <br/><br/>
                        		<hr/>Employer Control Panel<hr/>
                        	</div>
                        </div>
                        
	      				<div id="ECP" class="row-fluid" data-bind="visible: employervisibility()">
                        	<div class="span6">
                            	<a href="/wecare/postjob"><i class="icon-circle-arrow-up"></i> Post Job</a>
                            </div>
                            <div class="span6"><a href="/wecare/postedjoblist"><i class="icon-briefcase"></i> My Jobs Status</a></div>
                        </div>                             
	      				<div id="ECP" class="row-fluid" data-bind="visible: employervisibility()">
                        	<div class="span6"><a href="/wecare/messagecp"><i class="icon-envelope"></i> My Stored Messages</a></div>
                            <div class="span6"><!-- <i class="icon-bookmark"></i> Bookmarked People --></div>
                        </div>                                               
                    </div>        
                               
            </div>
         </div>


     </div>
     
    <?php include("../view/footer.inc.php"); 
	}?>

</body>
</html>