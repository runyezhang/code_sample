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
            <li><a href="#sf">Search Friends<span class="ui_icon aboutus"></span></a></li>
            <li><a href="#fr">My Friends<span class="ui_icon aboutus"></span></a></li>
            <li><a href="#fr_r">Friends Request<span class="ui_icon aboutus"></span></a></li>
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
                                                      
                    
                    <div class="panel" id="sf">
                        <h1>Announcement</h1>
                        <form method="post" action="Friends.php" name="search">  
                        <h2>Input Real Name to Search:</h2>
												<input onclick="if(this.value=='Please Input Real Name Here') {this.value=''}" onblur="if(this.value==''){this.value='Please Input Real Name Here'}"name="search" type="text" value="" size="45">    
												<input type="submit" value="Search">  
												</form> 
                    	<?php
                    	$searchs = 0;
                    		
                    	if(isset($_POST['search']) && !empty($_POST['search'])) 
                    	{
                    		$searchs = $_POST['search'];
                    		require_once('db_fns.php');
	                    	$con = db_connect();
	                    	mysql_select_db("jobwalla",$con);
	                    	$result=mysql_query("select *
											  from student 
											  where s_name LIKE '%$searchs%'")
                     or die(mysql_error()); 
											 while($row=mysql_fetch_array($result))
											 {
											 	 echo "<a href='friend_info.php?q=".$row['sid']."'>".$row['s_name']."</a>"; 
											 	 echo "                                ";
											 	 echo "University:".$row['university'];echo "<br/>";
												 
											 	  echo "<br/>";
											 	  echo "<br/>";
											 }
											 
											}
											echo "<br/>";echo "<br/>";echo "<br/>";
											 echo "<h2><a href='home_S.php'>"."back to home</a></h2>";
                    	?>
                    	
                    	</div> 
                    <div class="panel" id="fr">
                        <h1>Friends</h1>    
                        <?php
                    	require_once('db_fns.php');
                    	$con = db_connect();
                    	mysql_select_db("jobwalla",$con);
                     	$username=$_SESSION['valid_user'];
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
											 echo "Friends:".$row['s_name'];echo "<br/>";
												 echo "<a href='friend_info.php?q=".$row['sid']."'>"."Details information</a>";
											 	  echo "<br/>";
											 	  echo "<br/>";
											 }
											 echo "<br/>";echo "<br/>";
											 echo "<h2><a href='home_S.php'>"."back to home</a></h2>";
                    	?>
                        
                      
                    </div>
                    	
                    
                    
                     <div class="panel" id="fr_r">
                        <h1>Friend Request</h1>    
                         <?php
                    	require_once('db_fns.php');
                    	$con = db_connect();
                    	mysql_select_db("jobwalla",$con);
                     	$username=$_SESSION['valid_user'];
                    $result=mysql_query("select S1.s_name,F.status,S1.sid
											  from friends F,student S,student S1
											  where S.username='$username'and F.sid_R=S.sid and S1.sid = F.sid_S")
											  or die(mysql_error()); 
											 
											 if($row=mysql_fetch_array($result))
											 {
											 	do{
											 		
											 	if($row['status'] == 0){
											 		
											   echo "<h4>You have friend request:</h4>";
											   echo "From:";
											    echo "<a href='friend_info.php?q=".$row['sid']."'>".$row['s_name']."</a>";
											   echo "<br/>";
											   echo "<a href='conf_fri.php?q=".$row['sid']."'>Conform</a>";
											   echo "<br/>";
											   echo "<br/>";
											 }
											 
											}while($row=mysql_fetch_array($result));
										}
										else
											 {
											 	echo "<h4>No request.</h4>";
											 }
											 echo "<br/>";echo "<br/>";
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