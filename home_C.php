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
        	<li><a href="#ci">Company Information<span class="ui_icon services"></span></a></li>
        	<li><a href="#an">Posted Announcement<span class="ui_icon home"></span></a></li>
        	<li><a href="#ca">Compose Announcement<span class="ui_icon home"></span></a></li>
           <li><a href="#sr">Search<span class="ui_icon aboutus"></span></a></li>
            
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
            	if (isset($_SESSION["valid_user"]))// 0 is student,1 is company
            	{  
            		echo "Welcome!:".$_SESSION['valid_user']."Company"; 
            		echo "<br/>"; 
            		}  
            		else  
            		{  
            			// 验证失败，将 $_session["valid_user"] 置为 false
            		  $_session["valid_user"] = false;  
            		  die("no access!");  
            		  {header('location:index.php');} 
            		  }  
            ?>
            	</li>   
            <li>  	<a href="logout.php">Logout</a>   </li>                 
        </ul>
        
        <div id="content">
        
        <!-- scroll -->
        
        	
            <div class="scroll">
                <div class="scrollContainer">
                                                      
                    <div class="panel" id="ci">
                        <h1>Company Information</h1>
                    	<?php
                    	require_once('db_fns.php');
                    	$con = db_connect();
                    	mysql_select_db("jobwalla",$con);
                     	$username=$_SESSION['valid_user'];
                    	$result=mysql_query("select *
											  from Company
											  where c_name='$username'")
											  or die(mysql_error()); 
											 while($row=mysql_fetch_array($result))
											 {
											  echo "<br/>";
											   echo "<br/>";
											  echo "Company id:".$row['cid'];
											  echo "<br/>";
											  echo "Company Location is :".$row['c_loc'];
											   echo "<br/>";
											  echo "Company industry is: ".$row['industry'];
											   echo "<br/>";
											   echo "Company register date is: ".$row['reg_date'];
											   echo "<br/>";
											   echo "<a href='change.php?q=".$row['cid']."'>"."change information</a>";
											 }
                    	
                    	
                    	?>
                    	
                    	</div>
                    <div class="panel" id="an">
                        <h1>Announcement</h1>
                    	<?php
                    	require_once('db_fns.php');
                    	$con = db_connect();
                    	mysql_select_db("jobwalla",$con);
                     	$username=$_SESSION['valid_user'];
                    	$result=mysql_query("select *
											  from announcement natural join company
											  where c_name='$username' order by post_time DESC")
											  or die(mysql_error());
											  echo "<h3>Posted</h3>"; 
											 while($row=mysql_fetch_array($result))
											 {
											 	echo "<br/>";
											 echo "Title:  ";
											 echo "<a href='an_C_info.php?q=".$row['aid']."'>".$row['job_title']."</a>";
											 echo "<br/>";
											 echo "Post time:".$row['post_time'];
											 }
											 echo "<br/>";
											 ?>
                    	
                    	</div>
                    <div class="panel" id="ca">
                        <h1>Compose Announcement</h1>    
                        <form method="post" action="Pub_an.php">
										 <table >
										   
										   
										   	<tr>
										     <td><h4>Title:</h4></td>
										     <td><input type="text" name="title" size="50" maxlength="50"/></td></tr>
										    
										   	<tr>
										     <td><h4>Location:</h4></td>
										     <td><input type="text" name="location" size="30" maxlength="30"/></td></tr>
										     	<tr>
										     <td><h4>Salary:</h4></td>
										     <td><input type="number" name="salary" size="9" maxlength="9"/></td></tr>
										   <tr>
										     <td><h4>Background:</h4></td>
										     <td><input type="text" name="bg" size="30" maxlength="30"/></td></tr>
										     	<tr>
										     <td><h4>End Time:</h4></td>
										     <td><input type="datetime" name="et" size="30" maxlength="30"/></td></tr>
										     	<tr>
										     <td><h4>Description:</h4></td>
										     <td><TEXTAREA NAME="description" COLS=50 ROWS=7></TEXTAREA>
										</td></tr>
										   <tr>
										     <td colspan=2 align="center">
										     <input type="submit" value="Publish"></td></tr>
										 </table></form>
                        
                      
                        
                    </div> 
                    
                    <div class="panel" id="sr">
                        <h1><a href="C_Search.php">Search</a></h1>    
                         <form method="post" action="C_Search.php" name="search">  
                        <p>GPA:</p>
												<input onclick="if(this.value=='Please Input GPA') {this.value=''}" name="gpa" type="text" value="" size="45">    
												<p>University:</p>
												<input onclick="if(this.value=='Please Input university') {this.value=''}" onblur="if(this.value==''){this.value='Please Input university'}"name="univ" type="text" value="" size="45">    
												<p>Key Word:</p>
												<input onclick="if(this.value=='Please Input Key Word') {this.value=''}" onblur="if(this.value==''){this.value='Please Input Key Word'}"name="kw" type="text" value="" size="45">    
												<p>Major:</p>
												<input onclick="if(this.value=='Please Input Major') {this.value=''}" onblur="if(this.value==''){this.value='Please Input Major'}"name="mj" type="text" value="" size="45">    
												<input type="submit" value="Search">  
												</form> 
                    	
                        
                        
                    </div> <!-- end of home -->
                   
                 
                
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