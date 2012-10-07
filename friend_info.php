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
        	<li><a href="#an">Information<span class="ui_icon aboutus"></span></a></li>
        	
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
                        <h1>Person Info</h1>
                        <?php
                    	require_once('db_fns.php');
                    	$con = db_connect();
                    	mysql_select_db("jobwalla",$con);
                    	$sid=$_GET['q'];
                    	$username=$_SESSION['valid_user'];
                    	$result=mysql_query("select *
											  from student S
											  where S.sid='$sid'")
											  or die(mysql_error()); 
											 while($row=mysql_fetch_array($result))
											 {echo "Personal Information:<br/>";
											   echo "<br/>";
											  echo "Student name is :".$row['s_name'];
											   echo "<br/>";
											  echo "Student industry is: ".$row['university'];
											    echo "<br/>";
											  echo "Student Major is: ".$row['major'];
											    echo "<br/>";
											   echo "Student register date is: ".$row['register_date'];
											   echo "<br/>";
											   echo "<br/>";echo "<br/>";
											  
											 }
											 $result=mysql_query("select F.status,S1.gpa_pri,S1.resume_pri,S1.resume,S1.gpa,S1.sid
											  from friends F,student S,student S1
											  where S1.sid='$sid' and S.username='$username' and ((F.sid_S=S.sid and F.sid_R=S1.sid) or (F.sid_R=S.sid and F.sid_S=S1.sid))")
											  or die(mysql_error()); 
											 
											 if($row=mysql_fetch_array($result))
											 {
											 	do{
											 	if($row['status']== 0){
											   echo "<h4>Already Sending request!</h4>";
											  if($row['gpa_pri'] ==1){
											   echo "Student GPA is: ".$row['gpa'];
											 }
											 if($row['gpa_pri'] ==0){
											   echo "<h4>Student GPA is set to privacy!</h4> ";
											 }
											   echo "<br/>";
											   if($row['resume_pri'] ==1){
											    echo "Student resume is: ".$row['resume'];
											   }
											   if($row['resume_pri'] ==0){
											   echo "<h4>Student resume is set to privacy!</h4> ";
											 }
											   break;
											 }
											 if($row['status'] == 2){
											  echo "<a href='add_f.php?q=".$sid."'>"."Add Friends</a>";
											  if($row['gpa_pri'] ==1){
											   echo "Student GPA is: ".$row['gpa'];
											 }
											 if($row['gpa_pri'] ==0){
											   echo "<h4>Student GPA is set to privacy!</h4> ";
											 }
											   echo "<br/>";
											   if($row['resume_pri'] ==1){
											    echo "Student resume is: ".$row['resume'];
											   }
											   if($row['resume_pri'] ==0){
											   echo "<h4>Student resume is set to privacy!</h4> ";
											 }
											   break;
											 }
											  if($row['status'] == 1){
											  	echo "<h4>Already Friends!</h4>";
											  	 echo "<h2><a href='dele_friend.php?sid=$sid'>"."delete friend</a></h2>";
											  	 echo "Student GPA is: ".$row['gpa'];
											  	  echo "<br/>";
											  	 echo "Student resume is: ".$row['resume'];
											  	break;
											  }
											}while($row=mysql_fetch_array($result));
										}
										else{
											echo "<a href='add_f.php?q=".$sid."'>"."Add Friends</a>";
										}
												
											  
											     echo "<br/>";echo "<br/>";
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