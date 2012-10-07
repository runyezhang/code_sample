<?php
	var $serverName     = 'db4free.net:3306';
    var $dbName         = 'dbname'; 
    var $dbUsername     = 'username'; 
    var $dbPassword     = '123'; 
    mysql_connect($serverName,$dbUsername ,$dbPassword); 
    mysql_select_db($dbName);
    
    ?>