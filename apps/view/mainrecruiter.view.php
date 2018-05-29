<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Recruiters</title>
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
                		Recruiters, choose your objective.
            		</div>
              </div>
        </div>
        <div class="row-fluid">
            <div class="span8 offset4 text-center">
                	<div class="span6"><br/><br/><br/>
	                	Currently with our system, recruiters are considered the same as Employers contacts. Thus, employers and recruiters follow the same processes.<br/><br/><br/>
                    </div>
            </div>
         </div>
         
         <!-- Employer Gateway -->
        <div class="row-fluid">
            <div class="span8 offset4 text-center">
                <div class="span3">
                    <div class="row-fluid">
                        <a href="postjob.view.php" class="btn btn-primary" id="job-btn" data-loading-text="Loading...">Post Job</a>
                    </div>
                </div>
                <div class="span3">
                    <div class="row-fluid">
                        <a href="searchpeople.view.php" class="btn btn-primary" id="search-btn" data-loading-text="Loading...">Find Resume</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span12 text-center"><br/><br/>
            	In order to improve the quality of our system, we require job posters verify they are real people.
            </div>
        </div>
    
        
		<?php include("../view/footer.inc.php"); ?>
        <!-- Page Initialization Scripts-->
		<script language="JavaScript" type="text/javascript">
		//<![CDATA[ 
		$(document).ready(function(){
				$('#job-btn').button();
				$('#search-btn').button();

				$('#job-btn').click(function () {
						$(this).button('loading');
					});
				$('#search-btn').click(function () {
						$(this).button('loading');
					});
				
				$('.dropdown-menu input, .dropdown-menu label').click(function(e) {
					e.stopPropagation();
					});
			});		
		//]]>  
    	</script>    
</body>
</html>
