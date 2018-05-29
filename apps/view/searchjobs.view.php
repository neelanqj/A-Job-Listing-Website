<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-42805010-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-42805010-1');
</script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Job Search</title>
    <link rel="icon" type="image/ico" href="../../favicon.ico"></link> 
    <link rel="shortcut icon" href="../../favicon.ico"></link>
    
    <!-- CSS File Library Includes -->
    <link rel="stylesheet" type="text/css" href="../../src/library/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../../src/library/bootstrap/css/bootstrap-responsive.css"/>
    
    <!-- JavaScript Library Includes -->
    <script language="JavaScript" type="text/javascript" src='../../src/library/jquery/jquery-1.9.1.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/library/bootstrap/js/bootstrap.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/library/knockoutjs/knockout-2.2.1.js'></script> 
    <!-- JavaScript Includes -->
   	<script language="JavaScript" type="text/javascript" src='../../src/custom/js/knockout.bindings.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/page.js'></script> 
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/viewmodels/searchjobs.viewmodel.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/page/searchjobs.page.js' defer="defer"></script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../../src/custom/css/page.css">
    
</head>
<body>
		<?php include("../view/headernav.inc.php"); ?>
        
        <div class="row-fluid">
        	<div class="span12">
            	<div class="span3"></div>
                <div class="span1"><div class="container"><img src="../../src/custom/img/logo/Logo_trim.png" /></div></div> 
                <div class="span2">
                    <div class="row-fluid text-center">
                        <b>Skills</b>
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="span12" id="skills" value="<?php echo isset($_GET['s'])? $_GET['s']:''; ?>" 
                        data-bind="value: searchSkills, initializeValue: searchSkills, event: { keypress: onEnter }, valueUpdate: 'keypress'"> 
                    </div>
                </div>
                <div class="span2">
                    <div class="row-fluid text-center">
                        <b>Location</b>
                    </div>                
                    <div class="row-fluid">
                        <input type="text" class="span12" id="location" value="<?php echo isset($_GET['l'])? $_GET['l']:''; ?>" 
                        data-bind="value: searchLocation, initializeValue: searchLocation, event: { keypress: onEnter }, valueUpdate: 'keypress'" placeholder="(All Locations)"> 
                    </div>
                </div>                       
                <div class="span4">
                	<div class="row-fluid">&nbsp;</div>
                    <div class="row-fluid">
                        <button type="button" class="btn btn-primary" id="search-btn" data-bind="click: searchJobs">Search</button>
                    </div>
                </div>
        	</div>        
     </div><hr/>
     
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
            <div class="pagination">
              <ul>
                <li data-bind="attr: { 'class': (pagenum() == 1)?'disabled':'' }"><a data-bind="click: prevPage">Prev</a></li>
                <li data-bind="attr: { 'class': (pagenum() == totalpages() || totalpages() == 0)?'disabled':'' }"><a data-bind="click: nextPage">Next</a></li>
              </ul>
            </div>        
        </div>
     </div>
     <!-- end pagination -->
     
     <div class="row-fluid">
        	<div class="span12">
            	<div class="span3"></div>
                <div class="span9" data-bind="template: { name: 'job-row',  foreach: jobList }"></div>
            </div>
     </div>
     
    <div class="row-fluid" data-bind="visible: jobList().length == 0">    
        <div class="text-center">
        	No Results<br/><br/>
        </div>        
    </div> 

     <!-- pagination -->
     <div class="row-fluid">
     	<div class="span12 text-center">
            <div class="pagination">
              <ul>
                <li data-bind="attr: { 'class': (pagenum() == 1)?'disabled':'' }"><a data-bind="click: prevPage">Prev</a></li>
                <li data-bind="attr: { 'class': (pagenum() == totalpages() || totalpages() == 0)?'disabled':'' }"><a data-bind="click: nextPage">Next</a></li>
              </ul>
            </div>        
        </div>
     </div>
       
     <div class="row-fluid">
    	<div class="span12 text-center">
           <div class="pagination">
             <ul data-bind="template: { name: 'pagination-item',  foreach: ko.utils.range(1, totalpages()) }"></ul>
           </div>
		</div>
    </div>
    <!-- end pagination -->
     
    <?php include("../view/footer.inc.php"); ?>
    
    <!-- Templates -->
	<script type="text/html" id="job-row">
           <div class="row-fluid">
                <div class="span12">
					<a data-bind="text: title, attr: { href: 'profilejob.view.php?id=' + jid }"  target="_blank"></a>, <span data-bind="text: '(' +company + ' in ' + city + ', ' + region + ', ' + country + ') Posted: ' + createdate"></span>
				</div>
            </div>
			<div class="row-fluid">
				<div class="span12" data-bind="text: description + '...'"></div><a data-bind="attr: { href: 'profilejob.view.php?id=' + jid }">(Read More)</a>&nbsp;&nbsp;<a data-bind="attr: { href: 'profilejob.view.php?id=' + jid }" target="_blank">(Read More In New Window)</a><br/><br/><br/>
			</div>
    </script>
    
    <script type="text/html" id="pagination-item">
           <li data-bind="attr: { 'class': ($data == $root.pagenum())?'active':'' }">
		   		<a data-bind="text: $data, click: $root.setPage"></a>
		   </li>
    </script>
         
</body>
</html>