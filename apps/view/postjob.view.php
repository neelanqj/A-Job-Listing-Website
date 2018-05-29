<?php session_start() ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Post Job</title>
    <link rel="icon" type="image/ico" href="../../favicon.ico"></link> 
    <link rel="shortcut icon" href="../../favicon.ico"></link>

    <!-- CSS File Library Includes -->
    <link rel="stylesheet" type="text/css" href="../../src/library/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../../src/library/bootstrap/css/bootstrap-responsive.css"/>
    
    <link rel="stylesheet" type="text/css" href="../../src/library/jquery-ui-1.10.2.custom/css/redmond/jquery-ui-1.10.2.custom.min.css"/>
    
    <!-- JavaScript Library Includes -->
    <script language="JavaScript" type="text/javascript" src='../../src/library/jquery/jquery-1.9.1.js'></script>    
    <script language="JavaScript" type="text/javascript" src='../../src/library/jquery-cookie/jquery.cookie.js'></script>
    <script language="JavaScript" type="text/javascript" src="../../src/library/jquery-maskedinput/src/jquery.maskedinput.js"></script>
    <script language="JavaScript" type="text/javascript" src='../../src/library/bootstrap/js/bootstrap.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/library/knockoutjs/knockout-2.2.1.js'></script>  
    <script language="JavaScript" type="text/javascript" src='../../src/library/jquery-ui-1.10.2.custom/js/jquery-ui-1.10.2.custom.min.js'></script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../../src/custom/css/page.css">
    
    <!-- Java Custom -->
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/page.js'></script>    
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/knockout.bindings.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/chronos.calendar.js'></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/models/jobs.models.js' defer="defer"></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/viewmodels/postjob.viewmodel.js' defer="defer"></script>
    <script language="JavaScript" type="text/javascript" src='../../src/custom/js/apps/page/postjob.page.js' defer="defer"></script>
    
    <!-- Page Initialization Scripts-->
	<script language="JavaScript" type="text/javascript">
        //<![CDATA[ 
        $(document).ready(function(){
                $( "#datepicker" ).datepicker({
                    inline: true
                });
                $("#calendarhelp").popover();					
            });		
        //]]>  
    </script>      
</head>

<body>
		<?php include("headernav.inc.php"); ?>
        <form name="input" action="postjob.view.php" method="get">  
        <div class="row-fluid">
              <div class="span12 text-center">    
              		<div class="row-fluid">
                    	<img src="../../src/custom/img/logo/Logo.png" />
                    </div>
                    <div class="row-fluid">
                		Please enter the information about the job position. <br/>
                       	The contact email and phone number will not be given out. It will be used for verification of the job.
            		</div>
              </div>
        </div>
        
        <!-- Section 1 - Company information -->
        <div class="row-fluid">
              <div class="span12 text-center"><br/><br/>
              		<b>SECTION 1: COMPANY INFORMATION</b> 
                    
              </div>
        </div>
        
		<div class="row-fluid">
            <div class="span8 offset4 text-center">
                <div class="span3">
                    <div class="row-fluid">
                        Company 
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="span12" id="company" data-bind="value: job.company"/>
                    </div>
                </div>
                <div class="span3">
                    <div class="row-fluid">
                        Job Title
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="span12" id="title" data-bind="value: job.title"/>
                    </div>        
                </div>
            </div>
		</div>
        

        <!-- End Section 1 -->
        
        <!-- Section 2 - Job Location -->
        <div class="row-fluid">
              <div class="span12 text-center"><br/><br/>
              		<b>SECTION 2: JOB LOCATION</b>
              </div>
        </div>
        
		<div class="row-fluid">
            <div class="span8 offset4 text-center">
                <div class="span3">
                    <div class="row-fluid">
                        Country
                    </div>
                    <div class="row-fluid">
                        <select id="country" class="span12" data-bind="value: job.country">
                            <option value="0">Select country</option>
                            <option value="1">Canada</option>
                            <option value="2">USA</option>        
                        </select>
                    </div>
                </div>
                <div class="span3">
                    <div class="row-fluid" data-bind="visible: job.country() == 1">
                        Province
                    </div>
                    <div class="row-fluid" data-bind="visible: job.country() == 2">
                        State
                    </div>
                    <div class="row-fluid">
                        <select name="state" data-bind="visible: job.country() == 2, value: job.state">
                        	<option>Select State</option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>

                        <select id="province" data-bind="visible: job.country() == 1, value: job.province">
	                        <option>Select Province</option>
                            <option value="AB">Alberta</option>
                            <option value="BC">British Columbia</option>
                            <option value="MB">Manitoba</option>
                            <option value="NB">New Brunswick</option>
                            <option value="NL">Newfoundland and Labrador</option>
                            <option value="NS">Nova Scotia</option>
                            <option value="ON">Ontario</option>
                            <option value="PE">Prince Edward Island</option>
                            <option value="QC">Quebec</option>
                            <option value="SK">Saskatchewan</option>
                            <option value="NT">Northwest Territories</option>
                            <option value="NU">Nunavut</option>
                            <option value="YT">Yukon</option>
                        </select>
                    </div>        
                </div>
            </div>
		</div>	

        <div class="row-fluid">
            <div class="span8 offset4 text-center">
                <div class="span3">
                    <div class="row-fluid">
                        City
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="span12" id="city" data-bind="value: job.city" />
                    </div>
                </div>
                <div class="span3">
                    <div class="row-fluid">
                        Postal Code (Optional)
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="span12" id="postalcode" data-bind="masked: job.postalcode, mask: (job.country() == 1)?'a9a-9a9': '99999'" />
                    </div>
                </div>
            </div>
		</div>   
        
        <div class="row-fluid">
            <div class="span8 offset4 text-center">
                <div class="span3">
                    <div class="row-fluid">
                        Address 1 (Optional)
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="span12" id="address1" data-bind="value: job.address1" />
                    </div>
                </div>
                <div class="span3">
                    <div class="row-fluid">
                        Address 2 (Optional)
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="span12" id="address2" data-bind="value: job.address2" />
                    </div>       
                </div>
            </div>
		</div>             
        
        <!-- Section 2 - Company Contact -->
        <div class="row-fluid">
              <div class="span12 text-center"><br/><br/>
              		<b>SECTION 3: JOB CONTACT INFORMATION</b> 
					<br/>					
                    Used for job post verification (phone and email)
              </div>
        </div>        
        
		<div class="row-fluid">
            <div class="span8 offset4 text-center">
                <div class="span3">
                    <div class="row-fluid">
                        Contact Name
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="span12" id="cname"  data-bind="value: job.contactname"/>
                    </div>
                </div>
                <div class="span3">
                    <div class="row-fluid">
                        Phone Number
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="span12" id="phone1" data-bind="masked: job.contactphonenumber, mask: '(999) 999-9999? x99999'"/>
                    </div>        
                </div>
            </div>
		</div>        
        
		<div class="row-fluid">
            <div class="span8 offset4 text-center">
                <div class="span3">
                    <div class="row-fluid">
                        Contact Email
                    </div>
                    <div class="row-fluid">
                        <input type="email" class="span12" id="cemail" data-bind="value: job.contactemail" />
                    </div>
                </div>
                <div class="span3">
                    <div class="row-fluid">
                        &nbsp;
                    </div>
                    <div class="row-fluid">
						(Applications will be emailed here.)
                    </div>        
                </div>
            </div>
		</div>            
        
		<div class="row-fluid">
            <div class="span8 offset4 text-center">
                <div class="span3">
                        <label class="checkbox inline">
                          <input type="checkbox" id="chkemail" value="option1" data-bind="value: job.hidecontactemail"> Hide Email From Applicants
                        </label>
                </div>
                <div class="span3">
                    <div class="row-fluid">
                        <label class="checkbox inline">
                          <input type="checkbox" id="chkphone" value="option2" data-bind="value: job.hidecontactphonenumber"> Hide Phone Number From Applicants
                        </label>
                    </div>        
                </div>
            </div>
		</div>                    
        
		<div class="row-fluid">
            <div class="span8 offset4 text-center">
                <div class="span3">
                    <div class="row-fluid">
                        Min Educational Requirements
                    </div>
                    <div class="row-fluid">
                    <select id="education" class="span12" name="education" data-bind="value: job.education">
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
                <div class="span3">
                    <div class="row-fluid">
                        Min Career Level
                    </div>
                    <div class="row-fluid">
                    <select id="careerlevel" name="careerlevel" class="span12" data-bind="value: job.careerlvl">
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
            </div>
		</div>            

        <!-- Section 4 - Job Expiration Date -->
        <div class="row-fluid">
              <div class="span12 text-center"><br/><br/>
              		<b>SECTION 4: JOB POST EXPIRATION DATE</b><br/>
                    Select the day the job will stop accepting applications from the calendar.
              </div>
        </div>        
        
		<div class="row-fluid">
                <div class="span3 offset4 text-center">
						<br/><br/>
                    	<div class="text-center" id="datepicker" data-bind="datepicker: job.expirationdate, datepickerOptions: { minDate: new Date() }"></div>
                </div>
                <div class="span1 text-center"><br/><br/><br/><br/><br/>
                		<a href="#" id="calendarhelp" class="btn btn-danger" data-trigger="hover" rel="popover" 
                        data-content="Click a date on the calendar to select the corresponding date." 
                        data-original-title="How do I pick the proper date!?">?</a>
                </div>
		</div>
        <!-- End of selections -->
        
        <!-- End of section 4 -->
        
        <!-- SECTION 5: JOB SKILLS -->
        <div class="row-fluid">
              <div class="span12 text-center"><br/><br/>
              		<b>SECTION 5: JOB INFORMATION</b><br/>
                    Enter the job information.
              </div>
        </div>

		<div class="row-fluid">
            <div class="span8 offset4 text-center">
                <div class="span6">
                    <div class="row-fluid">
                        Job Description
                    </div>
                    <div class="row-fluid">
                        <textarea class="span12" rows="5" data-bind="value: job.description"></textarea>
                    </div>
                </div>
             </div>
		</div>
        
        <div class="row-fluid">
            <div class="span8 offset4 text-center">
                <div class="span6">
                    <div class="row-fluid">
                        Job Category (Optional)
                    </div>
                    <div class="row-fluid">
                        <select name="category" data-bind="value: job.category">
                           <option>Select a Job Category</option>
                           <option></option>
                           <option value="Accounting">Accounting</option>
                           <option value="Administrative">Administrative</option>
                           <option value="Advertising">Advertising</option>
                           <option value="Banking">Banking</option>
                           <option value="Business">Business</option>
                           <option value="Clerical">Clerical</option>
                           <option value="Computer Hardware">Computer Hardware</option>
                           <option value="Computer Networking">Computer Networking</option>
                           <option value="Computer Software">Computer Software</option>
                           <option value="Construction">Construction</option>
                           <option value="Consulting">Consulting</option>
                           <option value="Customer Service">Customer Service</option>
                           <option value="Design">Design</option>
                           <option value="Education">Education</option>
                           <option value="Engineering">Engineering</option>
                           <option value="Executive">Executive</option>
                           <option value="Finance">Finance</option>
                           <option value="Food &amp; Beverage">Food &amp; Beverage</option>
                           <option value="Government">Government</option>
                           <option value="Health Care">Health Care</option>
                           <option value="Hospitality">Hospitality</option>
                           <option value="Human Resources">Human Resources</option>
                           <option value="Information Technology">Information Technology</option>
                           <option value="Insurance">Insurance</option>
                           <option value="Law Enforcement">Law Enforcement</option>
                           <option value="Legal">Legal</option>
                           <option value="Management">Management</option>
                           <option value="Manufacturing">Manufacturing</option>
                           <option value="Marketing">Marketing</option>
                           <option value="Media">Media</option>
                           <option value="Non-profit">Non-profit</option>
                           <option value="Office Management">Office Management</option>
                           <option value="Part-Time">Part-Time</option>
                           <option value="Public Relations">Public Relations</option>
                           <option value="Quality Control">Quality Control/Assurance</option>
                           <option value="Real State">Real State</option>
                           <option value="Restaurant">Restaurant</option>
                           <option value="Retail">Retail</option>
                           <option value="Sales">Sales</option>
                           <option value="Security">Security</option>
                           <option value="Transportation">Transportation</option>
                           <option value="Travel">Travel / Tourism</option>
                           <option value="Warehouse">Warehouse</option>
                           <option value="other">Other</option>
                        </select>
                    </div>
                </div>
             </div>
		</div>
        
		<div class="row-fluid">
            <div class="span8 offset4 text-center">
                <div class="span3">
                    <div class="row-fluid">
                        Min Salary
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="span12" id="minsalary"  data-bind="value: job.minsalary"/>
                    </div>
                </div>
                <div class="span3">
                    <div class="row-fluid">
                        Max Salary
                    </div>
                    <div class="row-fluid">
                        <input type="text" class="span12" id="maxsalary" data-bind="value: job.maxsalary"/>
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
                    <div class="row-fluid" data-bind="visible: job.skillList().length == 0">
                        <div class="span6 alert">
                          <strong>Note,</strong> you have not listed any required skills for this position.
                        </div>                    
                    </div>
                    <div data-bind="template: { name: 'skill-row', foreach: job.skillList() }"></div>
                </div>
		</div>
        
     	<div class="row-fluid">
          	<div class="span12 text-center"><br/><br/>
        		<a href="#" class="btn btn-primary" id="submit-btn" data-loading-text="Loading..." data-bind="click: createJob">Create Job</a>
			</div>
        </div>
        </form>
  		<?php 
		include("footer.inc.php"); ?>
        
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
							<label class="checkbox inline">
							  <input type="checkbox" id="chkskillmanditory" data-bind="checked: $data.mandatory"> Manditory
							</label>       
					</div>                    
				</div>
        </script>
        
</body>
</html>