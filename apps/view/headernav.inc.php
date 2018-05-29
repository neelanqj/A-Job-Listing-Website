<input type="hidden" id="session" value="<?php echo session_id(); ?>" />
<input type="hidden" id="address" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
<input type="hidden" id="userID" value="<?php echo (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))?$_SESSION['user_id']:'' ; ?>" />
        <img id="loading" class="centerimage hide" src="../../src/custom/img/animate/loading2.gif" />
    
        <div class="navbar">
        	<div class="navbar-inner">
            	<a class="brand" href="/wecare/mainall">J</a>
                <ul class="nav" >
                    <li class="active"><a href="/wecare/mainall">Jobs</a></li>
                    <?php 
					if (!isset($_COOKIE['accounttype']) || (isset($_COOKIE['accounttype']) && $_COOKIE['accounttype'] > 1)) {
                    	echo '<li class="active"><a href="/wecare/mainemployers">Employers</a></li>';
					}
					if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) { 
						echo "<li class='divider-vertical'></li><li class='active'><a href='/wecare/usercp'>Control Panel</a></li><li class='divider-vertical'></li>";
					}
                    if (!isset($_SESSION['user_id'])) { 
                    ?>
                    
                    <li class="dropdown">
                      <a class="dropdown-toggle" role="button" data-toggle="dropdown">
                        Login
                        <b class="caret"></b>
                      </a>   
                      <!-- Drop down element -->
                       <ul class="dropdown-menu logo" role="menu" aria-labelledby="dLabel">
                            <li>                      
                                <!-- Login Element -->
                                <div class="loginform">
                                    <form action="/wecare/login" method="post" class="form-horizontal">
                                      <div class="control-group">
                                        <label class="control-label" for="email">Email</label>
                                        <div class="controls">
                                          <input type="text" name="email" id="email" placeholder="Email">
                                        </div>
                                      </div>
                                      <div class="control-group">
                                        <label class="control-label" for="password">Password</label>
                                        <div class="controls">
                                          <input type="password" name="password" id="password" placeholder="Password">
                                        </div>
                                      </div>
                                      <div class="control-group">
                                        <div class="controls">
                                          <button type="submit" class="btn">Sign in</button>
                                        </div>
                                      </div>
                                      <div class="pull-right">
                                        <a href="/wecare/forgotpassword">Forgot Password?</a> &nbsp;&nbsp;
                                        <a href="/wecare/activate">Verify Account</a>
                                      </div>
                                    </form>
                                </div>
                                <!-- End Of Login Element -->
                            </li>
                        </ul>
                        <!-- End of drop down element -->
                    </li>
                    <li><a href="/wecare/signup">Sign up</a></li>
                <?php } else { ?>
                    <li><a href="/wecare/logout">Logout</a></li>
                <?php } ?>          
                    <li><a href="/wecare/about">About</a></li>
                    <li><a href="/wecare/contact">Contact us</a></li>     
                </ul>
            </div>
        </div>


    