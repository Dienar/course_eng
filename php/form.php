<?php
include_once "conn.php";
session_start();

// Отладка: проверяем, что user_id есть в сессии
if (!isset($_SESSION['user_id'])) {
    echo "Ошибка: Пользователь не авторизован.";
    exit();
}

// Отладка: проверяем, что сообщение передано
if (!isset($_POST['message'])) {
    echo "Ошибка: Сообщение не передано.";
    exit();
}

$messageform = $_POST['message'];
$user_id = $_SESSION['user_id'];
$decision = "Не решен";
// Отладка: выводим данные
echo "Сообщение: " . $messageform . "<br>";
echo "User ID: " . $user_id . "<br>";

// Подготовленный запрос для защиты от SQL-инъекций
$stmt = $mysqli->prepare("INSERT INTO user_message (message, user_id,decision) VALUES (?, ?,?)");
if ($stmt === false) {
    echo "Ошибка подготовки запроса: " . $mysqli->error;
    exit();
}

$stmt->bind_param("sis", $messageform, $user_id,$decision);
if ($stmt->execute()) {
    echo "Успех";
} else {
    echo "Ошибка выполнения запроса: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>