<?php 
	session_start(); 
	if(!isset($_COOKIE["passcode"])) {
		echo '<meta http-equiv="expired cookie" content="logout.view.php?msg=expired">';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control Panel</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width">
    <title>My Skills</title>
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
    <script src="../../src/library/knockoutjs/knockout.mapping-latest.js" type="text/javascript"></script>
    
    
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../../src/custom/css/page.css">
    
    <!-- Custom JavaScript -->
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/page.js'></script> 
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/models/user.models.js' defer="defer"></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/viewmodels/myskills.viewmodel.js' defer="defer"></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/page/myskills.page.js' defer="defer"></script>
    
</head>

<body>
		<?php 
		if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) { 
		include("../view/headernav.inc.php"); 
		 ?>
        
        <div class="row-fluid">
              <div class="span12 text-center">    
              		<div class="row-fluid">
                    	<img src="../../src/custom/img/logo/Logo.png" />
                    </div>
                    <div class="row-fluid">
                		Fill In Your Details<br/><br/>
            		</div>
              </div>
        </div>
        
        <div class="row-fluid">
              <div class="span12 text-center"><br/><br/>
              		<b>SKILLS</b> <a href="#" data-bind="click: addSkill">(Add Skill)</a>
              </div>
        </div>
        
		<div class="row-fluid">
            	<div class="span9 offset4 text-center">
                    <div class="row-fluid">
                    	<div class="span1"></div>
                        <div class="span2">
                        	Skills
                        </div>
                        <div class="span1">
                        	Experience
                        </div>   
                        <div class="span2">
                        	Years Since Last Use
                        </div>                     
                    </div>
                    <div class="row-fluid" data-bind="visible: skillList().length == 0">
                        <div class="span6 alert">
                          <strong>Note,</strong> you have not listed any required skills for this position.
                        </div>                    
                    </div>
                    <div data-bind="template: { name: 'skill-row', foreach: skillList() }"></div>
                </div>
		</div>
        
        
        <div class="row-fluid">
                 <div class="span12 text-center">
                       <button type="button" class="btn btn-primary" id="apply-btn" data-bind="click: setSkills" data-loading-text="Loading...">Apply</button>
                 </div>
        </div>      
     	<?php 
		}
		include("../view/footer.inc.php"); ?>
        
        <!-- Templates -->
		<script type="text/html" id="skill-row">
			   <div class="row-fluid">
			   		<div class="span1"><i class="icon-remove" data-bind="click: $parent.removeSkill"></i></div>
					<div class="span2">
							<input type="text" class="span12" id="skillname" data-bind="value: $data.skillname" />
					</div>
					<div class="span1">
							<input type="text" class="span12" id="experience" data-bind="value: $data.experience" />
					</div>
					 <div class="span2">
						    <input type="text" class="span12" id="lastused" data-bind="value: $data.lastused" />  
					</div>              
				</div>
        </script>
        
        <script type="text/html" id="education-row">
			   <div class="row-fluid">
			   		<div class="span1"><i class="icon-remove" data-bind="click: $parent.removeEducation"></i></div>
					<div class="span2">
							<input type="text" class="span12" id="institution" data-bind="value: $data.institution" />
					</div>
					<div class="span1">
							<input type="text" class="span12" id="degree" data-bind="value: $data.degree" />
					</div>
					<div class="span1">
							<input type="text" class="span12" id="graduationdate" data-bind="value: $data.graduationdate" />
					</div>
					<div class="span2">
							<label class="checkbox inline">
								<input type="checkbox" id="chkcompleted" data-bind="checked: $data.completed" /> Completed
							</label>
					</div>                    
				</div>
        </script>
</body>
</html>
