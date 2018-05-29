<?php session_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Candidate Profile</title>

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
    
    <!-- Custom JavaScript -->
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/page.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/models/user.models.js' defer="defer"></script>    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/models/message.models.js' defer="defer"></script>          
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/viewmodels/profileperson.viewmodel.js' defer="defer"></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/page/profileperson.page.js' defer="defer"></script>
</head>

<body>
		<?php include("../view/headernav.inc.php"); ?>
        
        <input type="hidden" id="profileid" value="<?php echo $_GET['id']; ?>" />
        
        <div class="row-fluid" data-bind="with: person">
              <div class="span12 text-center">    
              		<div class="row-fluid">
                    	<img src="../../src/custom/img/logo/Logo.png" />
                    </div>
                    <div class="row-fluid">
                		About <span data-bind="text: firstName().toUpperCase() + ' ' + lastName().toUpperCase()"></span><br/>
            		</div>
                    
                    <div id="aboutcandidate">
                    	<b>First Name:</b> <span data-bind="text: firstName()"></span>
                        <b>Last Name:</b> <span data-bind="text: lastName()"></span><br/>
                        <b>Career Level:</b> <span data-bind="text: careerLvl()"></span>
                        <b>Education:</b> <span data-bind="text: education()"></span><br/><br/>
                    </div>
              </div>
        </div>
        
        <div class="row-fluid text-center">
              <a class="btn btn-success" href="#contactuser" data-toggle="modal"  data-bind="visible: employervisibility()"> Contact User </a>
        </div>
        
        <div class="offset3 span8" style="text-align:center">
        	<br/><br/>
        	<b>SKILL LIST</b><br/>
            
            <table class="table table-striped table-bordered table-hover" align="center">
            <thead>
            	<th>Skill Name</th><th>Experience</th><th>Last Used</th>
            </thead>
            <tbody data-bind="template: { name: 'skill-row', foreach: skillList() }">
            
            </tbody>            
            </table>
        </div>
        
        
        <!-- skill item row template -->
        <script type="text/html" id="skill-row">
            <tr>
                <td data-bind="text: skillname"></td>
				<td data-bind="text: experience"></td>
				<td data-bind="text: lastused"></td>		
            </tr>
        </script>
        
        <!-- Modals -->
        <div id="contactuser" class="modal hide fade">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Contact User</h3>
          </div>
          <div class="modal-body text-center">
          	<div class="fluid-row">
            	<div class="span5">
					By contacting this user, they will gain access to messaging you back. You can load one of your saved messages via the load button and drop down list, or type in a custom message to them.
                </div>
            </div>
            <div class="fluid-row">
            	<div class="span5">
					<hr/>
                </div>
            </div>            
            <div class="fluid-row">
            	<div class="span5">
					<select class="inline" data-bind="template: { name: 'message-item', foreach: messageList() }, value: selectedItem"><option>--- Select Stored Message ---</option></select> 
                    <a class="btn btn-success inline" href="#" data-bind="click: getMessage">Load Stored Message</a>
                </div>
            </div>
            <div class="fluid-row">
            	<div class="span5">
					<hr/>
                </div>
            </div>
            <div class="fluid-row">
            	<div class="span5">
					Title
                </div>
            </div>
            <div class="fluid-row">
            	<div class="span5">
					<input type="text" data-bind="value: messageObj().title" /> 
                </div>
            </div>
            <div class="fluid-row">
            	<div class="span5">
					Message Body
                </div>
            </div>            
            <div class="fluid-row">
            	<div class="span5">
					<textarea  class="span5" rows"10" data-bind="value: messageObj().message" ></textarea>
                </div>
            </div>                      
          </div>
          <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Close</a>
            <a href="#" class="btn btn-primary" data-bind="click: sendMessage">Send Message & Initiate Contact</a>
          </div>
        </div>        
        
         <div id="messagesent" class="modal hide fade">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Message Sent</h3>
          </div>
          <div class="modal-body text-center">
          	The message has been sent to the user.      
          </div>
          <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Close</a>
          </div>
        </div>
        
        <div id="messagesent" class="modal hide fade">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Message Not Sent</h3>
          </div>
          <div class="modal-body text-center">
          	The message could not be sent to the user.      
          </div>
          <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Close</a>
          </div>
        </div>
        
        <?php include("../view/footer.inc.php"); ?>
        
        <!-- Template -->
        <script type="text/html" id="message-item">
			   <option data-bind="text: title, value: mid"></option>
        </script>        
</body>
</html>