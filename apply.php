<?php
  // include function files for this application
  require_once('db_fns.php');
 
  // start session which may be needed later
  // start it now because it must go before headers
  session_start();
  $username=$_SESSION['valid_user'];
  
  try
  {
  $aid=$_GET['q'];
    $conn = db_connect();
mysql_select_db("jobwalla",$conn);

  $result=mysql_query("INSERT INTO `jobwalla`.`apply` 
  select sid,aid 
  from student S,announcement A
  where A.aid='$aid' and S.username='$username'")or die(mysql_error());
  
  if (!$result) {
    throw new Exception('Could not Apply !');
  }
    
		header("location: an_info.php?q=$aid");
}
catch (Exception $e) {
     
     echo $e->getMessage();
     
  }
  
?>
