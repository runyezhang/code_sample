<?php

session_start();
unset($_SESSION['valid_user']);
unset($_SESSION['type']);
// start output html
header('location:index.php');

?>
