<?php
			require_once('db_fns.php');
			try{
			$username = $_POST['username'];
			$passwd = $_POST['passwd'];
			$conn = db_connect();
			mysql_select_db("jobwalla",$conn);
			$result=mysql_query("select * from student where username='".$username."'
                         and password = '".$passwd."'")or die(mysql_error()); 
                         if(mysql_num_rows($result)>0)
                         {
                         	session_start();
                         $_SESSION['valid_user'] = $username;
                         $_SESSION['type'] = 0;// 0 is student,1 is company
                         header('location:home_S.php');
                       }
												else {
									     $result=mysql_query("select * from company where c_name='".$username."'
									                       and c_pw = '".$passwd."'")or die(mysql_error()); 
                       if (mysql_num_rows($result)>0) {
                       	session_start();
                         $_SESSION['valid_user'] = $username;
                         $_SESSION['type'] = 1;// 0 is student,1 is company
                          header('location:home_C.php');
                          }
									 			 else if(mysql_num_rows($result)<1) {
									 			 	throw new Exception('Could not log you in.');
									 			}
									 		}
 			 	//$_SESSION['valid_user'] = $username;
 			 	//$post= "home.php?q=".urlencode("$username");
				//echo "<meta http-equiv=refresh content='0; url=$post'>"; 
 			}
 			catch (Exception $e) {
     
     echo $e->getMessage();
     
  }

?>