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
    <title>Find People</title>
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
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/models/jobs.models.js' defer="defer"></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/viewmodels/searchpeople.viewmodels.js' defer="defer"></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/page/searchpeople.page.js' defer="defer"></script>
    
</head>
<body>
		<?php include("../view/headernav.inc.php"); ?>
        
        <div class="row-fluid">
              <div class="span12 text-center">    
              		<div class="row-fluid">
                    	<img src="../../src/custom/img/logo/Logo.png" />
                    </div>
                    <div class="row-fluid"  data-bind="visible: peopleList().length == 0">
                		Find your ideal candidate.<br/>
                        Select the qualities and skills you are searching for in a candidate.<br/><br/>
            		</div>
                    <div class="row-fluid"  data-bind="visible: peopleList().length > 0">
                    	Search Results.
                    </div>
              </div>
        </div>
        
        <div id="searchParams" data-bind="visible: peopleList().length == 0">
            <!-- Career Level and education -->
            <div class="row-fluid">
                <div class="span8 offset4 text-center">
                    <div class="span3">
                        <div class="row-fluid">
                            Career Level
                        </div>
                        <div class="row-fluid">
                            <select id="careerlevel" name="careerlevel" class="span12" data-bind="value: careerLvl">
                                <option value="-1">Select career level</option>
                                <option value="9">Student (High School)</option>
                                <option value="10">Student</option>
                                <option value="11">Entry Level</option>
                                <option value="12">Experienced (Non-Manager)</option>
                                <option value="13">Manager (Manager/Supervisor of Staff)</option>
                                <option value="14">Executive (SVP, VP, Department Head, etc.)</option>
                                <option value="15">Senior Executive (President, CFO)</option>
                            </select>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="row-fluid">
                            Education
                        </div>
                        <div class="row-fluid">
                            <select id="education" class="span12" name="education" data-bind="value: education">
                                <option value="-1">Select education level</option>
                                <option value="0">Some High School Coursework</option>
                                <option value="1">High School or equivalent</option>
                                <option value="2">Certification</option>
                                <option value="3">Vocational</option>
                                <option value="4">Some College Coursework Completed</option>
                                <option value="5">College Diploma</option>
                                <option value="6">Bachelor&#39;s Degree</option>
                                <option value="7">Master&#39;s Degree</option>
                                <option value="8">Doctorate</option>
                                <option value="9">Professional</option>
                            </select>
                        </div>        
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
                            </div>                     
                        </div>
                        <div class="row-fluid" data-bind="visible: skillList().length == 0">
                            <div class="span6 alert">
                              <strong>Note,</strong> you have not listed any skills you want your candidate to have.
                            </div>                    
                        </div>
                        <div data-bind="template: { name: 'skill-row', foreach: skillList() }"></div>
                    </div>
            </div>
            
            <div class="row-fluid">
                <div class="span12 text-center">
                    <button type="button" class="btn btn-primary" id="search-btn" data-bind="click: searchPeople, enable: skillList().length > 0" >Search</button>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12 text-center">
                   <hr/>
                </div>
            </div>
     </div>
     
     <!-- pagination -->
     <div class="row-fluid">
     	<div class="span12 pagination-centered">
            <div class="pagination">
              <ul data-bind="template: { name: 'pagination-item',  foreach: ko.utils.range(1, totalpages()) }"></ul>    
            </div>
        </div>
     </div>
     <div class="row-fluid">
     	<div class="span12 pagination-centered">
            <div class="pagination">
              <ul>
                <li data-bind="attr: { 'class': (pagenum() == 1)?'disabled':'' }"><a data-bind="click: prevPage">Prev</a></li>
                <li data-bind="attr: { 'class': (pagenum() == totalpages() || totalpages() == 0)?'disabled':'' }"><a data-bind="click: nextPage">Next</a></li>
              </ul>
            </div>        
        </div>
     </div>
     <!-- end pagination -->
     
     <div id="searchResults" data-bind="visible: peopleList().length > 0" class="row-fluid">
        <div class="span12">
            <table class="table table-striped table-bordered table-hover">
                <thead><th>First Name</th><th>Last Name</th><th>Career Level</th><th>Education</th><th></th></thead>
                <tbody data-bind="visible: peopleList().length > 0, template: { name: 'candidate-row', foreach: peopleList() }">
                </tbody>
               	<tbody data-bind="visible: peopleList().length == 0">  
                	<tr>
			   		<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
                    </tr>
				</tr>
            </table>
        </div>
    </div>
    
    <div id="searchResults" data-bind="visible: peopleList().length == 0" class="row-fluid">
        <div class="span12 text-center">
            No People Matching Search Criteria
        </div>
    </div>
    
     <!-- pagination -->   
     
     <div class="row-fluid">
     	<div class="span12 pagination-centered">
            <div class="pagination">
              <ul>
                <li data-bind="attr: { 'class': (pagenum() == 1)?'disabled':'' }"><a data-bind="click: prevPage">Prev</a></li>
                <li data-bind="attr: { 'class': (pagenum() == totalpages() || totalpages() == 0)?'disabled':'' }"><a data-bind="click: nextPage">Next</a></li>
              </ul>
            </div>        
        </div>
     </div>          
     <div class="row-fluid">
     	<div class="span12 pagination-centered">
            <div class="pagination">
              <ul data-bind="template: { name: 'pagination-item',  foreach: ko.utils.range(1, totalpages()) }">
              </ul>
            </div>        
        </div>
     </div>
     <!-- end pagination -->
     
    <?php include("../view/footer.inc.php"); ?>
    
    <!-- Templates -->
    <!-- skills item template -->
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
                        <label class="checkbox inline">
                          <input type="checkbox" id="chkskillmanditory" data-bind="checked: $data.mandatory"> Manditory
                        </label>       
                </div>                    
            </div>
    </script>
    
    <!-- person list template -->
    <script type="text/html" id="candidate-row">
		<tr>
			<td data-bind="text: firstName"></td>
			<td data-bind="text: lastName"></td>
			<td data-bind="text: careerLvl"></td>
			<td data-bind="text: education"></td>
			<td><a class="btn btn-primary" data-bind="attr: { href: 'profileperson.view.php?id=' + uid }" target="_blank">View Candidate Skills</a></td>
		</tr>
	</script>
    
    <script type="text/html" id="pagination-item">
           <li data-bind="attr: { 'class': ($data == $root.pagenum())?'active':'' }"><a data-bind="text: $data, click: $root.setPage"></a></li>
    </script>    
     
    <!-- Page Initialization Scripts-->
    <script language="JavaScript" type="text/javascript">
        //<![CDATA[ 
				   /*
        $(document).ready(function(){
                $('#search-btn').button();
                
                $('#search-btn').click(function () {
                        $(this).button('loading');
                    });
                
                $('.dropdown-menu input, .dropdown-menu label').click(function(e) {
                    e.stopPropagation();
                    });
            });		
        //]]>  
		*/
    </script>      
</body>
</html>
