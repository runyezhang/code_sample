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
        	<li><a href="#an">Information<span class="ui_icon services"></span></a></li>
        	
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
                                                      
                    <div class="panel" id="no">
                        <h1>Privacy Setting</h1>
                        
                        <?php
                        $username=$_SESSION['valid_user'];
                    	require_once('db_fns.php');
                    	$con = db_connect();
                    	mysql_select_db("jobwalla",$con);
                    	$result=mysql_query("select *
											  from student
											  where username='$username'")
											  or die(mysql_error()); 
											  while($row=mysql_fetch_array($result))
											 {
											  if($row['gpa_pri'] ==0)
											  {
											  	echo "<h2>Only Friend can see my GPA</h2>";
											  	echo "<br/>";
											    echo "<h4><a href='change_pri.php?gpa=1'>"."switch to All can see my GPA.</a></h24>";
											    echo "<br/>";echo "<br/>";
											  }
											  if($row['gpa_pri'] ==1)
											  {
											  	echo "<h2>All can see my GPA.</h2>";
											  	echo "<br/>";
											    echo "<h4><a href='change_pri.php?gpa=0'>"."switch to Only Friend can see my GPA.</a></h4>";
											    echo "<br/>";echo "<br/>";
											  }
											  if($row['resume_pri'] ==0)
											  {
											  	echo "<h2>Only Friend can see my resume</h2>";
											  	echo "<br/>";
											    echo "<h4><a href='change_pri.php?resume=1'>"."switch to All can see my resume.</a></h4>";
											    echo "<br/>";echo "<br/>";
											  }
											  if($row['resume_pri'] ==1)
											  {
											  	echo "<h2>All can see my resume.</h2>";
											  	echo "<br/>";
											    echo "<h4><a href='change_pri.php?resume=0'>"."switch to Only Friend can see my resume.</a></h4>";
											    echo "<br/>";echo "<br/>";
											  }
											  
											 }
                    	echo "<br/>";
											
											 
												echo "<br/>";
											  echo "<br/>";
											   echo "<h2><a href='home_S.php'>"."back to home</a></h2>";
                    	?>
                        
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