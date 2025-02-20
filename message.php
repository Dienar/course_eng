<?php
require_once "conn.php";
if(isset($_GET['sendmessage'])){
    $messageform= $_GET['message'];
$mess='"'.$mysqli->real_escape_string($messageform).'"';
$query = "INSERT INTO user_message (message) VALUES ($mess)";
$result=$mysqli->query($query);
if($result){
    echo "Успех";
}else{
    echo "ПИЗДЕЦ";
}
$mysqli->close();
}