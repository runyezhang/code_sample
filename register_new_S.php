<?php
  // include function files for this application
  require_once('db_fns.php');
 

  //create short variable names
  $username=$_POST['username'];
  $passwd=$_POST['passwd'];
  $passwd2=$_POST['passwd2'];
  $RN=$_POST['RN'];
  $U=$_POST['U'];
  $Major=$_POST['Major'];
  $GPA=$_POST['GPA'];
  $resume=$_POST['resume'];
  
  // start session which may be needed later
  // start it now because it must go before headers
  session_start();
  try   {
    // check forms filled in
    
    
    
    // passwords not the same
    if ($passwd != $passwd2) {
      throw new Exception('The passwords you entered do not match - please go back and try again.');
    }

    // check password length is ok
    // ok if username truncates, but passwords will get
    // munged if they are too long.
    if ((strlen($passwd) < 6) || (strlen($passwd) > 16)) {
      throw new Exception('Your password must be between 6 and 16 characters Please go back and try again.');
    }

    // attempt to register
    // this function can also throw an exception
    
    $conn = db_connect();
mysql_select_db("jobwalla",$conn);
$result=mysql_query("select * from student where username='$username'")or die(mysql_error()); 
  if (!$result) {
    throw new Exception('Could not execute query');
  }
  if (mysql_num_rows($result)>0) {
    throw new Exception('That username is taken - go back and choose another one.');
  }
  $result=mysql_query("INSERT INTO `jobwalla`.`student` (`sid`, `username`, `password`, `s_name`, `register_date`, `university`, `major`, `gpa`, `info`, `resume`, `gpa_pri`, `resume_pri`)
   VALUES (NULL, '$username', '$passwd', '$RN', CURRENT_TIMESTAMP, '$U', '$Major', '$GPA', '', '', '', '')")or die(mysql_error());
  
  if (!$result) {
    throw new Exception('Could not register you in database - please try again later.');
  }
    // register session variable
    $_SESSION['valid_user'] = $username;
		$_SESSION['type'] = 0; // 0 is student,1 is company
    // provide link to members page
    //$post= "home_S.php?q=".urlencode("$username");
		//echo "<meta http-equiv=refresh content='0; url=$post'>"; 
		$post= "home_S.php";
		echo "<meta http-equiv=refresh content='0; url=$post'>"; 

  }
  catch (Exception $e) {
     
     echo $e->getMessage();
     
  }
?>
