<?php
    $mysqli = new mysqli('localhost','root','','message');
    $mysqli1 = new mysqli('localhost','root','','courses');
    if ($mysqli->connect_errno || $mysqli1->connect_errno)exit('Ошибки подключения');
    $mysqli->set_charset('utf8');
    $mysqli1->set_charset('utf8');
?>