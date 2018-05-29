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
    
    <title>Jugger Jobs - IT Jobs For Job Seekers</title>
<!-- Shareaholic Content Tags -->
<meta name='shareaholic:site_name' content='Jugger Jobs - IT Job Bank' />
<meta name='shareaholic:language' content='en-US' />
<meta name='shareaholic:wp_version' content='7.0.3.3' />

<!-- Shareaholic Content Tags End -->
<style type='text/css'>img#wpstats{display:none}</style>

<!-- Jetpack Open Graph Tags -->
<meta property="og:type" content="blog" />
<meta property="og:title" content="Jugger Jobs - IT Job Bank" />
<meta property="og:description" content="Jobs, IT, Mobile, E-commerce, Graphics Design" />
<meta property="og:url" content="http://www.juggerjobs.com/" />
<meta property="og:site_name" content="Jugger Jobs - IT Job Bank" />
<meta name="twitter:site" content="@jetpack" />
<meta name="p:domain_verify" content="d5f36c601b6bd41b3b3d2d462e39d239"/>

<meta name="description" content="Jugger Jobs Offers IT Jobs" />

<link rel="canonical" href="http://www.juggerjobs.com" />
<meta property="og:title" content="IT Jobs For Jobs Seekers" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.juggerjobs.com" />
<meta property="og:image" content="http://www.juggerjobs.com/src/custom/img/logo/Logo.png" />
<meta property="og:site_name" content="Jugger Jobs" />
<meta property="fb:admins" content="75408333052" />
<meta property="og:description" content="Jugger Jobs Connects IT Employees and Employeers" />
<meta name="twitter:card" value="summary" />
<meta name="twitter:description" value="Jugger Jobs Connects IT Employees and Employeers" />

<meta charset="UTF-8">
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
                		Find a Tech Job.<br/><br/>
            		</div>
              </div>
        </div>
        <form name="input" action="/apps/view/searchjobs.view.php" method="get"> 
        <div class="row-fluid">
            <div class="span8 offset4 text-center">
                	<div class="span3">
	                    <div class="row-fluid">
                    		<input type="text" class="span12" id="skills" name="s"> 
                        </div>
                        <div class="row-fluid">
                        	job title, skill name or company name
                        </div>
                    </div>
                    <div class="span3">
	                    <div class="row-fluid">
                    		<input type="text" class="span12" id="location" name="l" placeholder="(All Locations)"> 
                        </div>
                        <div class="row-fluid">
                        	location, country, state, province or city
                        </div>
                    </div>            
            </div>
         </div>

     	<div class="row-fluid">
          	<div class="span12 text-center">
            	<br/><br/>
        		<input type="submit" class="btn btn-primary" id="search-btn" value="Search">
			</div>
        </div>
        </form>
     </div>
     
    <?php include("../view/footer.inc.php"); ?>
     
     
</body>
</html>