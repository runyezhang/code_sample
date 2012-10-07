<?php
  // include function files for this application
  require_once('db_fns.php');
 
  // start session which may be needed later
  // start it now because it must go before headers
  session_start();
  $username=$_SESSION['valid_user'];
  
  try
  {
  	                    $aid = $_GET['aid'];
  	                    $sid = $_GET['sid'];
                    		require_once('db_fns.php');
	                    	$con = db_connect();
	                    	mysql_select_db("jobwalla",$con);
	                    	$result=mysql_query("
	                    	INSERT INTO notify(`sid_S`, `sid_R`, `aid`, `nTime`)
                        VALUES ((select sid from student where username='$username'),'$sid','$aid' ,CURRENT_TIMESTAMP)
	                    	")
                     or die(mysql_error()); 
										
  if (!$result) {
    throw new Exception('Could not Apply !');
  }
   

		header("location: home_S.php");
}
catch (Exception $e) {
     
     echo $e->getMessage();
     
  }
  
?>
