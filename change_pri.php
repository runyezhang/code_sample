<?php
  // include function files for this application
  require_once('db_fns.php');
 
  // start session which may be needed later
  // start it now because it must go before headers
  session_start();
  $username=$_SESSION['valid_user'];
  
  try
  {
		  $conn = db_connect();
			mysql_select_db("jobwalla",$conn);
			if(isset($_GET['gpa'])) 
         {
           $gpa = $_GET['gpa'];
					  $result=mysql_query(" 
					  UPDATE student
					  SET gpa_pri = '$gpa'
					  where username='$username'")or die(mysql_error());
					}
					if(isset($_GET['resume'])) 
         {
           $resume = $_GET['resume'];
					  $result=mysql_query(" 
					  UPDATE student
					  SET resume_pri = '$resume'
					  where username='$username'")or die(mysql_error());
					}
		    
  if (!$result) {
    throw new Exception('Could not Apply !');
  }
    
		header("location: privacy.php");
}
catch (Exception $e) {
     
     echo $e->getMessage();
     
  }
  
?>
