<?php
ini_set('display_errors', 'off');
error_reporting(0);
require_once "conn.php";
session_start();

$nameform = $_POST['name'];
$emailform = $_POST['email'];
$phoneform = $_POST['phone'];

$_SESSION['name'] = $nameform;
$_SESSION['email'] = $emailform;
$_SESSION['phone'] = $phoneform;
// Экранируем данные для безопасности
$name = $mysqli->real_escape_string($nameform);
$email = $mysqli->real_escape_string($emailform);
$phone = $mysqli->real_escape_string($phoneform);



  // Сохраняем user_id в сессии
// Проверяем, является ли пользователь администратором
$stmt = $mysqli->prepare("SELECT * FROM admin_form WHERE name_admin = ? AND email_admin = ? AND phone_admin = ?");
$stmt->bind_param("sss", $name, $email, $phone);
$stmt->execute();
$stmt->store_result(); // Нужно вызвать store_result() перед использованием num_rows

if ($stmt->num_rows > 0) {
    $_SESSION['user_role'] = 'admin';
    header('Location: ../admin_client/admin_client.php');
    exit();
}else{
$stmt = $mysqli->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s",$emailform);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$_SESSION['user_id'] = $user['id'];
// Проверяем, был ли уже зарегистрирован пользователь с таким email и phone
$set = $mysqli->prepare("SELECT * FROM users WHERE email = ? AND phone = ?");
$set->bind_param("ss", $email, $phone);
$set->execute();
$set->store_result(); // Также нужно вызвать store_result()

echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";

if ($set->num_rows > 0) {

    $_SESSION['email'] = $email;
    echo "<script>
    var Reg_or_not = localStorage.setItem('Reg_or_Not',2);
    </script>";
    header('Location: ../smsauth/send_sms.php');
} else {
    // Вставляем нового пользователя
    $query = $mysqli->prepare("INSERT INTO users (name, email, phone) VALUES (?, ?, ?)");
    $query->bind_param("sss", $name, $email, $phone);
    $result = $query->execute();

    if ($result) {
        $new_user_id = $query->insert_id;
        
        $_SESSION['email'] = $email;
        $_SESSION['user_role'] = 'user';
        $_SESSION['user_id'] = $new_user_id;
        "<script>localStorage.setItem('Reg_or_Not',2);</script>"; 
        header('Location: ../smsauth/send_sms.php');
    } else {
        echo "Ошибка при регистрации.";
    }}
}

$mysqli->close();
?>