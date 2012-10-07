<?php
  // include function files for this application
  require_once('db_fns.php');
 
  // start session which may be needed later
  // start it now because it must go before headers
  session_start();
  $username=$_SESSION['valid_user'];
  try
  {
  	                    $title = $_POST['title'];
  	                    $location = $_POST['location'];
  	                    $salary = $_POST['salary'];
  	                    $bg = $_POST['bg'];
  	                    $description = $_POST['description'];
  	                    $et=$_POST['et'];
  	                    global $test;
                    		require_once('db_fns.php');
	                    	$con = db_connect();
	                    	mysql_select_db("jobwalla",$con);
	                    	$result=mysql_query("
	                    	INSERT INTO announcement(`aid`, `cid`, `job_title`,`location`,`salary`,`background`,`description`, `post_time`, `end_time`)
                        VALUES (NULL,(select cid from company where c_name='$username'),'$title', '$location','$salary','$bg','$description',CURRENT_TIMESTAMP,'$et')
	                    	")
                     or die(mysql_error()); 
                    /* $result=mysql_query("
	                    	select max(aid) as a
	                    	from announcement
	                    	")or die(mysql_error());
	                    	 while($row=mysql_fetch_array($result))
	                    	 {
	                    	 	$test=$row['a'];
	                    	}*/
										
  if (!$result) {
    throw new Exception('Could not Apply !');
  }
   
			header("location:home_C.php");
		//header("location: C_Search.php?aid=$test");
}
catch (Exception $e) {
     
     echo $e->getMessage();
     
  }
  
?>
