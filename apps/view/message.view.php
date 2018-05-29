<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link rel="icon" type="image/ico" href="../../favicon.ico"></link> 
    <link rel="shortcut icon" href="../../favicon.ico"></link>    
    
    <!-- CSS File Library Includes -->
    <link rel="stylesheet" type="text/css" href="../../src/library/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../../src/library/bootstrap/css/bootstrap-responsive.css"/>
    
    <!-- JavaScript Library Includes -->
    <script language="JavaScript" type="text/javascript" src='../../src/library/jquery/jquery-1.9.1.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/library/bootstrap/js/bootstrap.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/library/jquery-getUrlParam/jquery.getUrlParam.js'></script>    
    
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../../src/custom/css/page.css">
    
</head>
<body>
		<?php include("headernav.inc.php"); ?>
        
        <div class="row-fluid">
              <div class="span12 text-center">    
              		<div class="row-fluid">
                    	<img src="../../src/custom/img/logo/Logo.png" />
                    </div>
                    <div class="row-fluid">
                		<br/><br/><br/>
            		</div>
              </div>
        </div>
        <div class="row-fluid">
            <div class="span8 offset4 text-center">
                	<div class="span6" style="border-collapse:collapse; outline: 15px solid #999"><br/><br/><br/>

                        <img src="" id="mood">
                        <br/><br/>
                        <div id="message"></div>
                        <br/><br/> 
                    </div>            
            </div>
         </div>
        
		<?php include("footer.inc.php"); ?>
		<script language="JavaScript" type="text/javascript">
            if ($(document).getUrlParam("mood") == 'positive') {
                $("#mood").attr("src", "../../src/custom/img/positive.jpg");
            } else if ($(document).getUrlParam("mood") == 'negative'){
				$("#mood").attr("src", "../../src/custom/img/negative.jpg");
			}
            $("#message").text($(document).getUrlParam("message").replace(/%20/g," "));
        </script>
</body>
</html>
