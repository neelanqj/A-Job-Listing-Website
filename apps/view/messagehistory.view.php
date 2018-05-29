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
<title>My Messages</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width">
    <title>My Messages</title>
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
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/models/message.models.js'></script>  
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/viewmodels/messagehistory.viewmodel.js' defer="defer"></script> 
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/page/messagehistory.page.js' defer="defer"></script>

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
                		Below is a record of the messages you have exchanged with different users.<br/><br/>
            		</div>
              </div>
        </div>
        
        <div class="row-fluid">
              <div class="span12 text-center"><br/><br/>
              		<b>MESSAGES</b>
              </div>
        </div>
        
        <!-- pagination -->
        <div class="row-fluid">
            <div class="span12 text-center">
                <div class="pagination">
                  <ul data-bind="template: { name: 'pagination-item',  foreach: ko.utils.range(1, totalpages()) }"></ul>
                </div>
            </div>
        </div>
        
     <div class="row-fluid">
     	<div class="span12 text-center">
            <div class="pagination navigation">
              <ul>
                <li data-bind="attr: { 'class': (pagenum() == 1)?'disabled':'' }"><a data-bind="click: prevPage">Prev</a></li>
                <li class="next-posts" data-bind="attr: { 'class': (pagenum() == totalpages() ||totalpages() == 0)?'disabled':'' }"><a data-bind="click: nextPage">Next</a></li>
              </ul>
            </div>        
        </div>
     </div>        
             
    <div class="row-fluid" data-bind="visible: messageHistoryList().length > 0">
          <div class="span12 text-center"><br/><br/>
                <div id="scroll" class="listing" data-bind="template: { name: 'item-row', foreach: messageHistoryList }, event: { scroll: scrolled }"></div>
                <div class="span12 text-center"><br/><br/>
          	<img class="mini-image" src="../../src/custom/img/animate/mini-loading.gif" data-bind="visible: pendingRequest" /></div> 
          </div>       

    </div>
   <div class="row-fluid" data-bind="visible: messageHistoryList().length == 0">    
    <div class="alert alert-info text-center">
      No Messages
    </div>        
   </div>     
	<?php 
    }
    include("../view/footer.inc.php"); ?>
    
    <!-- Templates -->
    <script type="text/html" id="item-row">
      <div class="post">
            <span data-bind="text: 'Sender: ' + sender + ', Reciever: ' + reciever"></span><br/>
            <span data-bind="text: 'Create Date: ' + createdate"></span><br/>
            <span data-bind="text: title"></span><br/>
            <span data-bind="text: message + '...'"></span> 
			<a href="#" data-bind="click: $root.viewMessage">(More)</a>
      </div>
    </script>
    
    <script type="text/html" id="pagination-item">
       <li data-bind="attr: { 'class': ($data == $root.pagenum())?'active':'' }">
            <a data-bind="text: $data, click: $root.setPage"></a>
       </li>
    </script>
    
    <!-- Modals -->
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
    
</body>
</html>
