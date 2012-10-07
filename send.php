<?php
  // include function files for this application
  require_once('db_fns.php');
 
  // start session which may be needed later
  // start it now because it must go before headers
  session_start();
  $username=$_SESSION['valid_user'];
  $sid=$_SESSION['sid_R'];
  try
  {
  	                    $Content = $_POST['Content'];
                    		require_once('db_fns.php');
	                    	$con = db_connect();
	                    	mysql_select_db("jobwalla",$con);
	                    	$result=mysql_query("
	                    	INSERT INTO message(`sid_S`, `sid_R`, `mTime`, `content`)
                        VALUES ((select sid from student where username='$username'),'$sid', CURRENT_TIMESTAMP,'$Content')
	                    	")
                     or die(mysql_error()); 
										
  if (!$result) {
    throw new Exception('Could not Apply !');
  }
    unset($_SESSION['sid_R']);

		header("location: message_info.php?t=1");
}
catch (Exception $e) {
     
     echo $e->getMessage();
     
  }
  
?>
