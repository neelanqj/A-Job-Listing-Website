<?php session_start(); ?>
<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Job Profile</title>
      <link rel="icon" type="image/ico" href="../../favicon.ico">
      </link> 
      <link rel="shortcut icon" href="../../favicon.ico">
      </link>
      <!-- CSS File Library Includes -->
      <link rel="stylesheet" type="text/css" href="../../src/library/bootstrap/css/bootstrap.css"/>
      <link rel="stylesheet" type="text/css" href="../../src/library/bootstrap/css/bootstrap-responsive.css"/>
      <!-- JavaScript Library Includes -->
      <script language="JavaScript" type="text/javascript" src='../../src/library/jquery/jquery-1.9.1.js'></script>
      <script language="JavaScript" type="text/javascript" src='../../src/library/bootstrap/js/bootstrap.js'></script>
      <script language="JavaScript" type="text/javascript" src='../../src/library/knockoutjs/knockout-2.2.1.js'></script>  
      <script language="JavaScript" type="text/javascript" src='../../src/library/jquery-ui-1.10.2.custom/js/jquery-ui-1.10.2.custom.min.js'></script>
      <!-- JavaScript Includes -->
      <script language="JavaScript" type="text/javascript" src='../../src/custom/js/page.js'></script> 
      <script language="JavaScript" type="text/javascript" src='../../src/custom/js/knockout.bindings.js'></script>
      <script language="JavaScript" type="text/javascript" src='../../src/custom/js/chronos.calendar.js'></script>
      <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/models/jobs.models.js' defer="defer"></script>
      <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/viewmodels/profilejob.viewmodel.js' defer="defer"></script>
      <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/page/profilejob.page.js' defer="defer"></script>
      <!-- Custom CSS -->
      <link rel="stylesheet" type="text/css" href="../../src/custom/css/page.css">
   </head>
   <body>
      <input type="hidden" id="jobID" value="<?php echo $_GET['id']; ?>" />
      <?php include("../view/headernav.inc.php"); ?>
      <div class="row-fluid">
         <div class="span12 text-center">
            <div class="row-fluid">
               <img src="../../src/custom/img/logo/Logo.png" />
            </div>
            <div class="row-fluid">
               Below is a description of the job you clicked on.<br/><br/><br/>
            </div>
         </div>
      </div>
      <div class="row-fluid">
         <div class="span12">
            <div class="span3">
               <div class="row-fluid">
                  <div class="span12 padsides">
                     <dt>Company Name</dt>
                     <dd data-bind="text: job().company"></dd>
                     <dt>Location</dt>
                     <dd data-bind="text: job().city() +', ' + job().region()"></dd>
                     <dt>Contact Name</dt>
                     <dd data-bind="text: job().contactname"></dd>
                     <dt>Contact Phone Number</dt>
                     <dd data-bind="text: job().contactphonenumber == null || job().contactphonenumber == ''?'None specified':job().contactphonenumber"></dd>
                     <dt>Contact Email</dt>
                     <dd data-bind="text: job().contactemail == null || job().contactemail == '' ?'None specified':job().contactemail"></dd>
                     <dt>Application Deadline</dt>
                     <dd data-bind="text: job().expirationdate == null || job().expirationdate == ''?'None specified':job().expirationdate"></dd>
                  </div>
               </div>
               <div class="row-fluid"></div>
            </div>
            <div class="span9">
               <div class="row-fluid">
                  <div class="span12">
                     <dl class="dl-horizontal" data-bind="with: job()">
                        <dt>Job Title</dt>
                        <dd data-bind="text: title"></dd>
                        <dt data-bind="visible: (maxsalary() != 0) ? true : false">Salary Range</dt>
                        <dd data-bind="text: '$' + minsalary() + ' to $' + maxsalary(), visible: (maxsalary() != 0) ? true : false"></dd>
                        <dt>Description</dt>
                        <dd><p><span data-bind="html: description"></span></p></dd>
                        <dt>Skill Requirements</dt>
                        <dd>
                           <div class="fluid-row alert-success">
                              <div class="span4">Skill Name</div>
                              <div class="span4">Experience</div>
                              <div class="span4">Mandatory</div>
                           </div>
                        </dd>
                        <dd data-bind="foreach: skillList()">
                           <div class="fluid-row">
                              <div class="span4" data-bind="text: $data.skillname"></div>
                              <div class="span4" data-bind="text: $data.experience"></div>
                              <div class="span4" data-bind="text: $data.mandatory == 1? 'Yes': 'No'"></div>
                           </div>
                        </dd>
                     </dl>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
      <div class="row-fluid">
         <div class="span12 text-center">
               <a href="applyjob.view.php?id=<?php echo $_GET['id'] ?>" type="button" class="btn btn-primary" id="apply-btn" data-loading-text="Loading...">Apply For Position</a>
         </div>
      </div>
      <?php include("../view/footer.inc.php"); ?>
              
        <!-- Page Initialization Scripts-->
        <script language="JavaScript" type="text/javascript">
            //<![CDATA[ 
            $(document).ready(function(){					
                    $('#apply-btn').button();
                    
                    $('#apply-btn').click(function () {
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