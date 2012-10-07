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
            <li><a href="#sf">Search Result<span class="ui_icon aboutus"></span></a></li>
            <li><a href="#rs">Search<span class="ui_icon aboutus"></span></a></li>
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
            		echo "Welcome!  Company:".$_SESSION['valid_user'];	
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
                        <h1>Advanced Company Search</h1>
                        
                    	<?php
                    	/*$aid = 0;
                    	if(isset($_GET['aid']) && !empty($_GET['aid'])) 
                    	{
                    		$aid = $_GET['aid'];
                    		 echo "<h2>".$aid."is select!</h2>";
											
											 echo "<h2><a href='home_C.php'>"."Send to All</a></h2>";
											 echo "<br/>";echo "<br/>";
											 
											 
											}
											else
											{
												echo "<br/>";
											 echo "<h2><a href='home_C.php'>"."Select announcement</a></h2>";
											 echo "<br/>";echo "<br/>";
												
											}
                    		*/
                    		global $arr;
                    		
                    		require_once('db_fns.php');
	                    	$con = db_connect();
	                    	mysql_select_db("jobwalla",$con);
	                    	$sql="select * 
	                    	from student
	                    	where (1=1)";
	                    	if(isset($_POST['gpa']) && !empty($_POST['gpa']))
	                    	{
	                    		$gpa=$_POST['gpa'];
	                    		$sql .=" and GPA>='$gpa'";
	                    	}
	                    	if(isset($_POST['univ']) && !empty($_POST['univ']))
	                    	{
	                    		$un=$_POST['univ'];
	                    		$sql .=" and university LIKE '%$un%'";
	                    	}
	                    	if(isset($_POST['kw']) && !empty($_POST['kw']))
	                    	{
	                    		$kw=$_POST['kw'];	
	                    		$sql .=" and resume LIKE '%$kw%'";
	                    	}
	                    	if(isset($_POST['mj']) && !empty($_POST['mj']))
	                    	{
	                    		$mj=$_POST['mj'];
	                    		$sql .=" and major LIKE '%$mj%'";
	                    	}
	                    	
	                    	$result=mysql_query($sql); 
											 while($row=mysql_fetch_array($result))
											 {
											 	 echo "<a href='friend_info.php?q=".$row['sid']."'>".$row['s_name']."</a>"; 
											 	 echo "                                ";
											 	 echo "University:".$row['university'];echo "<br/>";
											 	 echo "Major:".$row['major'];echo "<br/>";
												 echo "GPA".$row['gpa'];
											 	  echo "<br/>";
											 	  echo "<br/>";
											 	  $arr[] =$row['sid'];
											 }
											 $ss=implode(":", $arr); 

											
											echo "<h2><a href='multi_an.php?ss=$ss'>"."Send announcement</a></h2>";
											
											 echo "<h2><a href='home_C.php'>"."back to home</a></h2>";
											 
											 
											 
                    	?>
                    	
                    	</div> 
                           
                    <div class="panel" id="rs">
                        <h1> Search</h1>    
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