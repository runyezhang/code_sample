<?php
  // include function files for this application
  require_once('db_fns.php');
 
  // start session which may be needed later
  // start it now because it must go before headers
  session_start();
  $username=$_SESSION['valid_user'];
   
  try
  {
  	                    $ss= $_GET['ss']; 
											  $aid= $_GET['q']; 
											  $arr=explode(":", $ss);
                    		require_once('db_fns.php');
	                    	$con = db_connect();
	                    	mysql_select_db("jobwalla",$con);
	                    	foreach($arr as $sid)
	                    	{
	                    	$result=mysql_query("
	                    	INSERT INTO notify(`sid_S`, `sid_R`,`aid` , `nTime`)
                        VALUES ('$sid','$sid','$aid', CURRENT_TIMESTAMP)
	                    	")
                     or die(mysql_error()); 
										}
  if (!$result) {
    throw new Exception('Could not Send!');
  }
    

		header("location: home_C.php");
}
catch (Exception $e) {
     
     echo $e->getMessage();
     
  }
  
?>
