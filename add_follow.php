<?php
  // include function files for this application
  require_once('db_fns.php');
 
  // start session which may be needed later
  // start it now because it must go before headers
  session_start();
  $username=$_SESSION['valid_user'];
  
  try
  {
  $cid=$_GET['cid'];
    $conn = db_connect();
	mysql_select_db("jobwalla",$conn);


  $result=mysql_query(" 
  INSERT INTO follow(`sid`, `cid`)
  VALUES ((select sid from student where username='$username'),'$cid')")or die(mysql_error());
    
  if (!$result) {
    throw new Exception('Could not Apply !');
  }
    
		header("location: home_S.php");
}
catch (Exception $e) {
     
     echo $e->getMessage();
     
  }
  
?>
