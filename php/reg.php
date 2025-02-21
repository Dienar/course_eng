<?php
require_once "conn.php";
session_start();
$nameform= $_POST['name'];
$emailform= $_POST['email'];
$phoneform= $_POST['phone'];
$name='"'.$mysqli->real_escape_string($nameform).'"';
$email='"'.$mysqli->real_escape_string($emailform).'"';
$phone='"'.$mysqli->real_escape_string($phoneform).'"';
$query = "SELECT * FROM admin_form WHERE `name_admin` = $name AND `email_admin` = $email and `phone_admin` = $phone";
$result = $mysqli->query($query);
if($result->num_rows > 0) {
   $_SESSION['user_role'] = 'admin';
   header('Location: ../index_admin.php');
   exit();
}
$query = "SELECT * FROM users WHERE `email` = $email and `phone` = $phone";
$result = $mysqli->query($query);
if($result->num_rows > 0){ ?>
    <script>
    alert('Вы уже получили подарок =(');
    setTimeout('location.replace("../index.php")', 0);
  </script>
  <?php
$mysqli->close();
}else{
$query = "INSERT INTO users (name,email,phone) VALUES ($name,$email,$phone)";
$result=$mysqli->query($query);
if($result){
   $_SESSION['user_role'] = 'user';
    ?>
    <script>
    alert('Вы получили подарок =)');
    setTimeout('location.replace("../index.php")', 0);
  </script>
  <?php
}else{
    echo "провал";
}}
$mysqli->close();