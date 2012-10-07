<?php
  // include function files for this application
  require_once('db_fns.php');
 
  // start session which may be needed later
  // start it now because it must go before headers
 
  
  try
  {
  $username=$_POST['username'];
  $passwd=$_POST['passwd'];
  $passwd2=$_POST['passwd2'];
  $RN=$_POST['RN'];
  $U=$_POST['U'];
  $Major=$_POST['Major'];
  $GPA=$_POST['GPA'];
  $resume=$_POST['resume'];
    $conn = db_connect();
	mysql_select_db("ZN2",$conn);


  $result=mysql_query(" 
  INSERT INTO coupon_records(`name`, `e-mail`, `phone`, `Pick_time`, `apply_time`, `weight`)
  VALUES ('$name','$sid', 0, CURRENT_TIMESTAMP)")or die(mysql_error());
    
  if (!$result) {
    throw new Exception('Could not Apply !');
  }
    
		header("location: friend_info.php?q=$sid");
}
catch (Exception $e) {
     
     echo $e->getMessage();
     
  }
  
?>
