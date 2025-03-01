<?php
require_once "conn.php";
session_start();

$nameform = $_POST['name'];
$emailform = $_POST['email'];
$phoneform = $_POST['phone'];

// Экранируем данные для безопасности
$name = $mysqli->real_escape_string($nameform);
$email = $mysqli->real_escape_string($emailform);
$phone = $mysqli->real_escape_string($phoneform);

// Проверяем, является ли пользователь администратором
$stmt = $mysqli->prepare("SELECT * FROM admin_form WHERE name_admin = ? AND email_admin = ? AND phone_admin = ?");
$stmt->bind_param("sss", $name, $email, $phone);
$stmt->execute();
$stmt->store_result(); // Нужно вызвать store_result() перед использованием num_rows

if ($stmt->num_rows > 0) {
    $_SESSION['user_role'] = 'admin';
    header('Location: ../index_admin.php');
    exit();
}

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
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Поздравляю! Вы вошли в аккаунт!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.replace('../index_loged.php');
            });
        });
    </script>";
} else {
    // Вставляем нового пользователя
    $query = $mysqli->prepare("INSERT INTO users (name, email, phone) VALUES (?, ?, ?)");
    $query->bind_param("sss", $name, $email, $phone);
    $result = $query->execute();

    if ($result) {
        $_SESSION['email'] = $email;
        $_SESSION['user_role'] = 'user';
        echo "<script>
        localStorage.setItem('Reg_or_Not',2);
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Поздравляю! Вы создали аккаунт!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.replace('../index_loged.php');
            });
        });
    </script>";
    } else {
        echo "Ошибка при регистрации.";
    }
}

$mysqli->close();
?>