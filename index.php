<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JobWalla</title>
<meta name="keywords" content="Welcome to JobWalla" />
<meta name="description" content="database project" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/coda-slider.css" type="text/css" media="screen" charset="utf-8" />

<script src="js/jquery-1.2.6.js" type="text/javascript"></script>
<script src="js/jquery.scrollTo-1.3.3.js" type="text/javascript"></script>
<script src="js/jquery.localscroll-1.2.5.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.serialScroll-1.2.1.js" type="text/javascript" charset="utf-8"></script>
<script src="js/coda-slider.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>

<div id="slider">
	
    <div id="templatemo_sidebar">
    	<div id="templatemo_header">
        	<a href="" target="_parent"><img src="images/templatemo_logo.png" alt="JobWalla" /></a>
        </div> <!-- end of header -->
        
        <ul class="navigation">
            <li><a href="#Login">Login<span class="ui_icon aboutus"></span></a></li>
            <li><a href="#RS">Register as student<span class="ui_icon home"></span></a></li>
            <li><a href="#RC">Register as company<span class="ui_icon services"></span></a></li>
         </ul>
    </div> <!-- end of sidebar -->

	<div id="templatemo_main">
    	<ul id="social_box">
            <li><a href="http://www.facebook.com/"><img src="images/facebook.png" alt="facebook" /></a></li>
            <li><a href="http://www.twitter.com/"><img src="images/twitter.png" alt="twitter" /></a></li>
            <li><a href="http://www.linkedin.com/"><img src="images/linkedin.png" alt="linkin" /></a></li>                       
        </ul>
        
        <div id="content">
        
        <!-- scroll -->
        
        	
            <div class="scroll">
                <div class="scrollContainer">
                     <div class="panel" id="Login">
                        <h1>Log in</h1>
                        <form method="post" action="login.php">
									  <table>
									   <tr>
									     <td colspan="2">Members log in here:</td>
									   <tr>
									     <td>Username:</td>
									     <td><input type="text" name="username"/></td></tr>
									   <tr>
									     <td>Password:</td>
									     <td><input type="password" name="passwd"/></td></tr>
									   <tr>
									     <td colspan="2" align="center">
									     <input type="submit" value="Log in"/></td></tr>
									   <tr>
									     
									   </tr>
									 </table></form>   
									  </div>
                    
                    <div class="panel" id="RS">
                        <h1>Register as student</h1> 
                        
                         <form method="post" action="register_new_S.php">
										 <table >
										   <tr>
										     <td>Preferred username <br />(max 16 chars):</td>
										     <td valign="top"><input type="text" name="username"
										         size="16" maxlength="16"/></td></tr>
										   <tr>
										     <td>Password <br />(between 6 and 16 chars):</td>
										     <td valign="top"><input type="password" name="passwd"
										         size="16" maxlength="16"/></td></tr>
										   <tr>
										     <td>Confirm password:</td>
										     <td><input type="password" name="passwd2" size="16" maxlength="16"/></td></tr>
										   	<tr>
										     <td>Real Name:</td>
										     <td><input type="text" name="RN" size="16" maxlength="16"/></td></tr>
										   	<tr>
										     <td>University:</td>
										     <td><input type="text" name="U" size="16" maxlength="16"/></td></tr>
										     	<tr>
										     <td>Major:</td>
										     <td><input type="text" name="Major" size="14" maxlength="14"/></td></tr>
										   <tr>
										     <td>GPA:</td>
										     <td><input type="number" name="GPA" size="4" maxlength="4"/></td></tr>
										     	<tr>
										     <td>Resume:</td>
										     <td><TEXTAREA NAME="resume" COLS=40 ROWS=6></TEXTAREA>
										</td></tr>
										   <tr>
										     <td colspan=2 align="center">
										     <input type="submit" value="Register"></td></tr>
										 </table></form>
   									</div>  
                                                     
                    <div class="panel" id="RC">
                        <h1>Register as Company</h1>
                        <form method="post" action="register_new_C.php">
												 <table >
												   
												   <tr>
												     <td>Company Name: <br />(max 16 chars):</td>
												     <td valign="top"><input type="text" name="username"
												         size="16" maxlength="16"/></td></tr>
												   <tr>
												     <td>Password <br />(between 6 and 16 chars):</td>
												     <td valign="top"><input type="password" name="passwd"
												         size="16" maxlength="16"/></td></tr>
												   <tr>
												     <td>Confirm password:</td>
												     <td><input type="password" name="passwd2" size="16" maxlength="16"/></td></tr>
												   <tr>												   
												     		<tr>
												     <td>Location:</td>
												     <td><input type="text" name="cl" size="16" maxlength="16"/></td></tr>
												     		<tr>
												     <td>Industry:</td>
												     <td><input type="text" name="ci" size="16" maxlength="16"/></td></tr>
												     	
												     <td colspan=2 align="center">
												     <input type="submit" value="Register"></td></tr>
												 </table></form>
                    </div>
                    
                
                </div>
			</div>
            
        <!-- end of scroll -->
        
        </div> <!-- end of content -->
        
        <div id="templatemo_footer">

            databaseproject <a href="#">runye zhang and yan yan</a> 
        
        </div> <!-- end of templatemo_footer -->
    
    </div> <!-- end of main -->
</div>

</body>
</html>