<?php

function db_connect() {
	$con=mysql_connect("localhost","root","");
if(!$con)
{die('Could not connect:'. mysql_error());
}
return $con;

   /*$result = new mysqli('localhost', 'root', '', 'jobwalla');
   if (!$result) {
     throw new Exception('Could not connect to database server');
   } else {
     return $result;
   }*/
}



?>
