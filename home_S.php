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
        	<li><a href="#no">Notify<span class="ui_icon services"></span></a></li>
        	<li><a href="#co">Company<span class="ui_icon gallery"></span></a></li>
        	<li><a href="#an">Announcement<span class="ui_icon home"></span></a></li>
        	<li><a href="#fa">Forward Record<span class="ui_icon home"></span></a></li>
            <li><a href="#fr">Friend<span class="ui_icon aboutus"></span></a></li>
            <li><a href="#me">Message<span class="ui_icon contactus"></span></a></li>
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
                        <h1>My information</h1>
                        <?php
                    	require_once('db_fns.php');
                    	$con = db_connect();
                    	mysql_select_db("jobwalla",$con);
                     	$username=$_SESSION['valid_user'];
                    	$result=mysql_query("select *
											  from student
											  where username='$username'")
											  or die(mysql_error()); 
											 while($row=mysql_fetch_array($result))
											 {echo "Personal Information:<br/>";
											   echo "<br/>";
											  echo "Student id:".$row['sid'];
											  echo "<br/>";
											  echo "Student name is :".$row['s_name'];
											   echo "<br/>";
											  echo "Student industry is: ".$row['university'];
											    echo "<br/>";
											  echo "Student Major is: ".$row['major'];
											    echo "<br/>";
											  echo "Student GPA is: ".$row['gpa'];
											   echo "<br/>";
											    echo "Student resume is: ".$row['resume'];
											   echo "<br/>";
											   echo "Student register date is: ".$row['register_date'];
											   
											   //echo "<a href='change_S.php?q=".$row['sid']."'>"."change information</a>";
											 }
                    	?>
                        <div class="btn_more"><a href="privacy.php">privacy<span>&raquo;</span></a></div>
                    	</div>
                    	
                    	  <div class="panel" id="co">
                        <h1>Company</h1>   
                        <form method="post" action="company_search.php" name="search">  
                        <h2>Input Company name:</h2>
												<input onclick="if(this.value=='Please Input Company name') {this.value=''}" onblur="if(this.value==''){this.value='Please Input Company name'}"name="search_c" type="text" value="" size="45">    
												<input type="submit" value="Search">  
												</form> 
                        
                        <?php
                    	require_once('db_fns.php');
                    	$con = db_connect();
                    	mysql_select_db("jobwalla",$con);
                     	$username=$_SESSION['valid_user'];
                    $result=mysql_query("select *
											  from student natural join follow natural join company
											  where username='$username'")
											  or die(mysql_error()); 
											  echo "<h4>Followed Company</h4>";
											 while($row=mysql_fetch_array($result))
											 {
											 	echo "Company:";
											 	echo "<a href='Company_info.php?cid=".$row['cid']."'>".$row['c_name']."</a>";
											 	echo "<br/>";
											 	echo "<br/>";
											 	
											}
											 
                    	?>
                    	<div class="btn_more"><a href="company_search.php">more<span>&raquo;</span></a></div>
                        
                      
                    </div>
                    
                    <div class="panel" id="an">
                        <h1>Announcement</h1>
                    	<?php
                    	require_once('db_fns.php');
                    	$con = db_connect();
                    	mysql_select_db("jobwalla",$con);
                     	$username=$_SESSION['valid_user'];
                    	$result=mysql_query("select *
											  from student natural join follow natural join announcement natural join company
											  where username='$username' order by post_time DESC")
											  or die(mysql_error());
											  echo "<h3>Followed news</h3>"; 
											 while($row=mysql_fetch_array($result))
											 {
											 	echo "<br/>";
											 echo "Title:  ";
											 echo "<a href='an_info.php?q=".$row['aid']."'>".$row['job_title']."</a>";
											 echo "<br/>";
											 echo "By Company:".$row['c_name'];
											 echo "<br/>";
											 echo "<a href='forward_select.php?q=".$row['aid']."'>forward to friends</a> ";
											 echo "<br/>";
											 }
											 echo "<br/>";
											 echo "<h3>Forwarded news:</h3>";
											 $result=mysql_query("select *
											  from student S,notify N,announcement A,company C,student S2
											  where S.username='$username' and S.sid=N.sid_R and N.aid=A.aid and A.cid=C.cid and N.sid_S=S2.sid order by N.ntime")
											  or die(mysql_error());
											 while($row=mysql_fetch_array($result))
											 {
											 	echo "<br/>";
											 echo "Title:  ";
											  echo "<a href='an_info.php?q=".$row['aid']."'>".$row['job_title']."</a>";
											 echo "<br/>";
											  echo "By user:";
											  echo "<a href='friend_info.php?q=".$row['sid']."'>".$row['s_name']."</a>";
											  echo "<br/>";
											 echo "By Company:".$row['c_name'];
											 	  echo "<br/>";
											 	   echo "<a href='forward_select.php?q=".$row['aid']."'>forward to friends</a> ";
											 echo "<br/>";
											 }
											 echo "<br/>";
											 echo "<br/>";
                    	?>
                    	</div>
                    	 <div class="panel" id="fa">
                        <h1>Forwarded record</h1>
                    	<?php
                    	require_once('db_fns.php');
                    	$con = db_connect();
                    	mysql_select_db("jobwalla",$con);
                     	$username=$_SESSION['valid_user'];
                    	$result=mysql_query("select S1.s_name,A.job_title,N.nTime,A.aid,S1.sid,s1.username
											  from student S,student S1,notify N,announcement A
											  where S.username='$username' and S.sid=N.sid_S and N.sid_R = S1.sid and N.sid_S!=N.sid_R and A.aid=N.aid order by nTime DESC")
											  or die(mysql_error());
											  echo "<h3>My Forwarded record:</h3>"; 
											 while($row=mysql_fetch_array($result))
											 {
											 	echo "<br/>";
											 echo "Title:  ";
											 echo "<a href='an_info.php?q=".$row['aid']."'>".$row['job_title']."</a>";
											 echo "<br/>";
											 echo "To Friends:  ";
											 echo "<a href='friend_info.php?q=".$row['sid']."'>".$row['s_name']."</a>";
											 echo "<br/>";
											 echo "Forward time:".$row['nTime'];
											 echo "<br/>";
											
											 }
											 echo "<br/>";
                    	?>
                    	</div>
                    
                    <div class="panel" id="fr">
                        <h1>Friends</h1>   
                        <form method="post" action="Friends.php" name="search">  
                        <h2>Input Real Name to Search:</h2>
												<input onclick="if(this.value=='Please Input Real Name Here') {this.value=''}" onblur="if(this.value==''){this.value='Please Input Real Name Here'}"name="search" type="text" value="" size="45">    
												<input type="submit" value="Search">  
												</form> 
                        
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
											 
                    	?>
                    	<div class="btn_more"><a href="friends.php">more<span>&raquo;</span></a></div>
                        
                      
                    </div>
                    
                    <div class="panel" id="me">
                        <h1>Message</h1>
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
											 echo "<br/>";
											 ?>
                		<div class="btn_more"><a href="message_info.php">more message<span>&raquo;</span></a></div>
                    </div>
                
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