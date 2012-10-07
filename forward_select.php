<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JobWalla</title>
<meta name="keywords" content="Welcome to JobWalla" />
<meta name="description" content="database project" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/coda-slider.css" type="text/css" media="screen" charset="utf-8" />

<script src="js/jquery-1.6.2.js" type="text/javascript"></script>
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
            <li><a href="#fr">Select Friend<span class="ui_icon aboutus"></span></a></li>
        </ul>
    </div> <!-- end of sidebar -->

	<div id="templatemo_main">
    	<ul id="social_box">
            <li><a href="http://www.facebook.com/"><img src="images/facebook.png" alt="facebook" /></a></li>
            <li><a href="http://www.twitter.com/"><img src="images/twitter.png" alt="twitter" /></a></li>
            <li><a href="http://www.linkedin.com/"><img src="images/linkedin.png" alt="linkin" /></a></li>  
            
            <li>
            	<?php
            	require_once('db_fns.php');
            	session_start();
           		 if (!isset($_SESSION["valid_user"]))// 0 is student,1 is company
            		{  
            			die("deny!");   
            		  {header('location:index.php');} 
            		  
            			}  
            		echo "Welcome!  Student:".$_SESSION['valid_user'];	
            		echo "<br/>";
            	//check_valid_user();
            	//$sid=$_GET['q'];
							//echo "Welcome:".urldecode($sid);
							//if(!$sid)
							//{header('location:index.php');}
             	?>
            	</li>   
            	            <li>  	<a href="logout.php">Logout</a>   </li>                        
        </ul>
        
        <div id="content">
        
        <!-- scroll -->
        
        	
            <div class="scroll">
                <div class="scrollContainer">
                                              
                    <div class="panel" id="fr">
                        <h1>Select Friends</h1>   
                                                
                        <?php
                        
                        
                    	require_once('db_fns.php');
                    	$con = db_connect();
                    	mysql_select_db("jobwalla",$con);
                     	$username=$_SESSION['valid_user'];
                     	$aid=$_GET['q'];
                     	$result=mysql_query("SELECT *
													FROM announcement A
													WHERE A.aid='$aid'
													")
											  or die(mysql_error()); 
											 while($row=mysql_fetch_array($result))
											 {
											 
												 echo "<h2>Forward Announcement:".$row['job_title']."</h2>";
											 	  echo "<br/>";
											 }
                    	$result=mysql_query("SELECT distinct S2.s_name ,S2.sid
													FROM 
													(SELECT sid_R,sid_S 
													FROM friends 
													WHERE status=1) As T, Student S1,Student S2
													WHERE (S1.username='$username' AND T.sid_R=S1.sid AND T.sid_S=S2.sid) OR (S1.username='$username' AND T.sid_S=S1.sid AND T.sid_R=S2.sid)
													")
											  or die(mysql_error()); 
											 while($row=mysql_fetch_array($result))
											 {
											 
												 echo "<a href='forward.php?aid=$aid&&sid=".$row['sid']."'>".$row['s_name']."</a>";
											 	  echo "<br/>";
											 	  echo "<br/>";
											 }
											 echo "<br/>";echo "<br/>";echo "<br/>";
											 echo "<h2><a href='home_S.php'>"."back to home</a></h2>";
											 echo "<br/>";
                    	?>
                    	 
                    </div> <!-- end of home -->
                    
                    
                
                   <div class="panel" id="change">
                        <h1>Personal infor change</h1>
                        <div id="contact_form">
                            <form method="post" action="change.php">
										 <table >
										   
										   <tr>
										     <td>Password :</td>
										     <td valign="top"><input type="password" name="passwd"
										         size="16" maxlength="16"/></td></tr>
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
										     <input type="submit" value="change"></td></tr>
										 </table></form>
						</div>
						   </div>
                
                    
                 
                
                </div>
			</div>
            
        <!-- end of scroll -->
        
        </div> <!-- end of content -->
        
        <div id="templatemo_footer">

            Database project <a href="#">Runye Zhang and Yan Yan</a> 
        
        </div> <!-- end of templatemo_footer -->
    
    </div> <!-- end of main -->
</div>

</body>
</html>