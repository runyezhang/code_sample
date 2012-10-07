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
        	<li><a href="#me">Message<span class="ui_icon contactus"></span></a></li>
        	<li><a href="#cm">Compose Message<span class="ui_icon contactus"></span></a></li>
        	<li><a href="#am">All Message<span class="ui_icon contactus"></span></a></li>
        	<li><a href="#sm">Send Message<span class="ui_icon contactus"></span></a></li>
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
                                                      
                    <div class="panel" id="me">
                        <h1>Message context</h1>
                        <?php
                        if(isset($_GET['t']) && !empty($_GET['t'])&&($_GET['t']==1)) 
                    	{
                    		echo "<h1>Sending Success</h1>";                    		
                    	}
                    	$username=$_SESSION['valid_user'];
                    	require_once('db_fns.php');
                    	$con = db_connect();
                    	mysql_select_db("jobwalla",$con);
                    	if(isset($_GET['sid_S']) && !empty($_GET['sid_S'])){
                    	$sid_S=$_GET['sid_S'];
                    	$sid_R=$_GET['sid_R'];
                    	$mtime=$_GET['mtime'];
                    	$result=mysql_query("select *
											  from message M,student S
											  where M.sid_S='$sid_S' and M.sid_R='$sid_R' and M.mTime='$mtime' and S.sid=M.sid_S")
											  or die(mysql_error()); 
											 while($row=mysql_fetch_array($result))
											 {
											  echo "From:".$row['s_name'];
											   echo "<br/>";
											  echo "Time: ".$row['mTime'];
											    echo "<br/>";
											  echo "Content: ".$row['content'];
											    echo "<br/>";
											    if($row['username']!=$username)
											    {
											  echo "<a href='Compose.php?q=".$row['sid']."'>"."Reply</a>";
											}
											else
											{
												echo "<h4>Send from me</h4>";
												
											}
											 }
											}
											     echo "<br/>";echo "<br/>";
											      echo "<br/>";echo "<br/>";
											   echo "<h2><a href='home_S.php'>"."back to home</a></h2>";
                    	?>
                        
                    	</div>
                    	
                                                      
                    <div class="panel" id="cm">
                        <h1>Compose Message</h1>
                        <h4>Please select reciever</h4>
					
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
											 echo "<a href='compose.php?q=".$row['sid']."'>".$row['s_name']."</a>";
											 	  echo "<br/>";
											 	  echo "<br/>";
											 }
											 echo "<br/>";echo "<br/>";
											 echo "<h2><a href='home_S.php'>"."back to home</a></h2>";
                    	?>
                        
                    	</div>
                    
                    <div class="panel" id="am">
                        <h1>All Message</h1>
                        
											<?php
                        	$username=$_SESSION['valid_user'];
                    	require_once('db_fns.php');
                    	$con = db_connect();
                    	mysql_select_db("jobwalla",$con);
                    	$result=mysql_query("select M.sid_S,M.sid_R,M.mTime,S.s_name
											  from student S,message M,student S1
											  where S.sid = M.sid_S and S1.username='$username' and S1.sid=M.sid_R order by mTime DESC")
											  or die(mysql_error());
											  
											 while($row=mysql_fetch_array($result))
											 {
											 	echo "<br/>";
											 echo "From:  ";
											 echo "<a href='message_info.php?sid_S=".$row['sid_S']."&sid_R=".$row['sid_R']."&mtime=".$row['mTime']."'>".$row['s_name']."</a>";
											 echo "<br/>";
											 echo "Time:".$row['mTime'];
												
											 	  echo "<br/>";
											 }
											 echo "<br/>";echo "<br/>";
											 echo "<h2><a href='home_S.php'>"."back to home</a></h2>";
											 ?>
                        
                    	</div>
                    	 <div class="panel" id="sm">
                        <h1>Send Message</h1>
                        
											<?php
                      $username=$_SESSION['valid_user'];
                    	require_once('db_fns.php');
                    	$con = db_connect();
                    	mysql_select_db("jobwalla",$con);
                    	$result=mysql_query("select S1.sid,S1.s_name,M.sid_S,M.sid_R,M.mTime
											  from student S,message M,student S1
											  where S.sid = M.sid_S and S.username='$username' and S1.sid=M.sid_R order by mTime DESC")
											  or die(mysql_error());
											  
											 while($row=mysql_fetch_array($result))
											 {
											 	echo "<br/>";
											 echo "To:  ";
											 echo "<a href='message_info.php?sid_S=".$row['sid_S']."&sid_R=".$row['sid_R']."&mtime=".$row['mTime']."'>".$row['s_name']."</a>";
											 echo "<br/>";
											 echo "Time:".$row['mTime'];
												
											 	  echo "<br/>";
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