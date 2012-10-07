<?php
  // include function files for this application
  require_once('db_fns.php');
 
  // start session which may be needed later
  // start it now because it must go before headers
  session_start();
  $username=$_SESSION['valid_user'];
  
  try
  {
  $sid=$_GET['q'];
    $conn = db_connect();
	mysql_select_db("jobwalla",$conn);


  $result=mysql_query(" 
  UPDATE Friends
  SET status = '1'
  where sid_R = (select sid from student where username='$username') and sid_S='$sid'")or die(mysql_error());
    
  if (!$result) {
    throw new Exception('Could not Apply !');
  }
    
		header("location: friend_info.php?q=$sid");
}
catch (Exception $e) {
     
     echo $e->getMessage();
     
  }
  
?>
