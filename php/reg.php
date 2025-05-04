<?php
session_start();
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
require_once "conn.php";

// Получаем данные из формы
$nameform = $_POST['name'];
$emailform = $_POST['email'];
$phoneform = $_POST['phone'];

// Сохраняем в сессию для повторного заполнения формы
$_SESSION['name'] = $nameform;
$_SESSION['email'] = $emailform;
$_SESSION['phone'] = $phoneform;

// Экранируем данные для безопасности
$name = $mysqli->real_escape_string($nameform);
$email = $mysqli->real_escape_string($emailform);
$phone = $mysqli->real_escape_string($phoneform);

// Проверяем, является ли пользователь администратором
$stmt = $mysqli->prepare("SELECT * FROM admin_form WHERE name_admin = ? AND email_admin = ? AND phone_admin = ?");
$stmt->bind_param("sss", $name, $email, $phone);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['user_role'] = 'admin';
    header('Location: ../admin_client/admin_client.php');
    exit();
}

// Проверяем существование пользователя с таким email И телефоном
$checkBoth = $mysqli->prepare("SELECT id FROM users WHERE email = ? AND phone = ?");
$checkBoth->bind_param("ss", $email, $phone);
$checkBoth->execute();
$bothResult = $checkBoth->get_result();

if ($bothResult->num_rows > 0) {
    // Если совпали оба - проводим регистрацию (логин)
    $existingUser = $bothResult->fetch_assoc();
    $_SESSION['user_id'] = $existingUser['id'];
    $_SESSION['user_role'] = 'user';
    
    echo "<script>
        localStorage.setItem('Reg_or_Not', 2);
        window.location.replace('../smsauth/send_sms.php');
    </script>";
    exit();
}

// Проверяем существование пользователя с таким email ИЛИ телефоном
$checkEither = $mysqli->prepare("SELECT id FROM users WHERE email = ? OR phone = ?");
$checkEither->bind_param("ss", $email, $phone);
$checkEither->execute();
$eitherResult = $checkEither->get_result();

if ($eitherResult->num_rows > 0) {
    // Если совпало только что-то одно - выводим ошибку
    $existingUser = $eitherResult->fetch_assoc();
    
    // Определяем, что именно совпало
    $emailExists = false;
    $phoneExists = false;
    
    $checkEmail = $mysqli->prepare("SELECT id FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    if ($checkEmail->get_result()->num_rows > 0) {
        $emailExists = true;
    }
    
    $checkPhone = $mysqli->prepare("SELECT id FROM users WHERE phone = ?");
    $checkPhone->bind_param("s", $phone);
    $checkPhone->execute();
    if ($checkPhone->get_result()->num_rows > 0) {
        $phoneExists = true;
    }
    
    // Формируем сообщение об ошибке
    $errorMessage = '';
    if ($emailExists) {
        $errorMessage = "The user with this email has already been registered";
    } else {
        $errorMessage = "The user with this phone number has already been registered";
    }
    
    header('Location: ../index.php?errorMessage='.urlencode($errorMessage));
    exit();
}

// Если не совпало ничего - регистрируем нового пользователя
$query = $mysqli->prepare("INSERT INTO users (name, email, phone) VALUES (?, ?, ?)");
$query->bind_param("sss", $name, $email, $phone);
$result = $query->execute();

if ($result) {
    $new_user_id = $query->insert_id;
    
    $_SESSION['email'] = $email;
    $_SESSION['user_role'] = 'user';
    $_SESSION['user_id'] = $new_user_id;
    
    echo "<script>
        localStorage.setItem('Reg_or_Not', 2);
        window.location.replace('../smsauth/send_sms.php');
    </script>";
} else {
    $errorMessage = "Error during registration. Please try again later.";
    header('Location: ../index.php?errorMessage='.urlencode($errorMessage));
}

$mysqli->close();
?>