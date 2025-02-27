<?php
include_once "conn.php";
echo $_POST['message'];
$messageform= $_POST['message'];
$mess='"'.$mysqli->real_escape_string($messageform).'"';
$query = "INSERT INTO user_message (message) VALUES ($mess)";
$result=$mysqli->query($query);
if($result){
    echo "Успех";
}else{
    echo "ошибка";
}
$mysqli->close();
