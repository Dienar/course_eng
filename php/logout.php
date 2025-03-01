<?php
session_start();

if (!isset($_SESSION['user_role'])) {
    // Если роль не установлена, отправляем на страницу входа
    header("Location: ../index_loged.php");
    exit;
}

if ($_SESSION['user_role'] === 'admin') {
    header("Location: ../index_admin.php"); // Перенаправление администратора
    exit;
} else {
    header("Location: ../index_loged.php"); // Перенаправление обычного пользователя
    exit;
}