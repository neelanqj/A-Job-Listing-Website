<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Message Control Panel</title>
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
    
    <!-- JavaScript -->
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/page.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/models/message.models.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/viewmodels/messagecp.viewmodel.js' defer="defer"></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/page/messagecp.page.js' defer="defer"></script>
    
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
                		Message Control Panel.<br/>
                        Below is a list of the messages you have stored.
            		</div>
              </div>
        </div>
        <div class="row-fluid">
            <div class="span8 offset4 text-center">
                	<div class="span6 pull-left"><br/>
                    	<div class="row" data-bind="visible: $root.existMessages() == true">
                            <select class="span12" name="messages" size="16" data-bind="template: { name: 'message-item', foreach: messageList() }, value: selectedItem">
                                
                                
                            </select><br/>
                            
                        </div>
                        <div class="row text-center" data-bind="visible: $root.existMessages() == false">YOU HAVE NO STORED MESSAGES</div>
                        <div class="row">
	                    	 <a data-bind="click: viewMessage">View Message</a> &nbsp;&nbsp;&nbsp; <a href="#newmessage" data-toggle="modal">New Message</a> &nbsp;&nbsp;&nbsp; <a data-bind="click: viewEditMessage">Edit Message</a> &nbsp;&nbsp;&nbsp; <a href="#" data-bind="click: deleteMessage">Delete Message</a>
                        </div>
                    </div>            
            </div>
         </div>
      
        
		<?php include("footer.inc.php"); ?>
        
        <div id="newmessage" class="modal hide fade">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Create and Store a New Message</h3>
          </div>
          <div class="modal-body">
            	<div class="row">
                	<div class="span5">Title</div>
                </div>
            	<div class="row">
                 	<div class="span5"><input id="title" data-bind="value: createMessageObj.title"></div>
                </div>
            	<div class="row">
                	<div class="span5">Message</div>
                </div>
            	<div class="row">
                	<div class="span5"><textarea class="span5" rows="10" data-bind="value: createMessageObj.message"></textarea></div>
                </div> 
          </div>
          <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Close</a>
            <a href="#" class="btn btn-primary" data-bind="click: createMessage">Create Message</a>
          </div>
        </div>
        
        <div id="editmessage" class="modal hide fade">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Edit Stored Message</h3>
          </div>
          <div class="modal-body">
            	<div class="row">
                	<div class="span5">Title</div>
                </div>
            	<div class="row">
                 	<div class="span5"><input type="text" data-bind="value: editMessageObj().title"></div>
                </div>
            	<div class="row">
                	<div class="span5">Message</div>
                </div>
            	<div class="row">
                	<div class="span5"><textarea class="span5" rows="10" data-bind="value: editMessageObj().message"></textarea></div>
                </div> 
          </div>
          <div class="modal-footer">
          	<a href="#" class="btn btn-primary" data-bind="click: editMessage">Apply Changes</a>
            <a href="#" class="btn" data-dismiss="modal">Close</a>
          </div>
        </div>
        
        <div id="viewmessage" class="modal hide fade">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>View Message</h3>
          </div>
          <div class="modal-body">
            	<div class="row"><div class="span5" style="font-style:oblique" data-bind="text: viewMessageObj().title">Title</div></div>
                <div class="row"><div class="span5" data-bind="text: viewMessageObj().message">Message Body</div></div>
          </div>
          <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Close</a>
          </div>
        </div>
        
        <div id="operationsuccess" class="modal hide fade">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Success</h3>
          </div>
          <div class="modal-body text-center">
				<img src="../../src/custom/img/positive.jpg" />
            	Successfully Completed Task
          </div>
          <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Close</a>
          </div>
        </div>
        
        <div id="operationfail" class="modal hide fade">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Error</h3>
          </div>
          <div class="modal-body text-center">
				<img src="../../src/custom/img/negative.jpg" /><br/>
            	Task did not complete successfully.
          </div>
          <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Close</a>
          </div>
        </div>
        
        <!-- Template -->
        <script type="text/html" id="message-item">
			   <option data-bind="text: title, value: mid"></option>
        </script>
</body>
</html>
