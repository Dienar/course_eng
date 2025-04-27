<?php
session_start();
$_SESSION['email'] = 0;
$_SESSION['user_id'] = "";
session_unset();  
session_destroy();
?>