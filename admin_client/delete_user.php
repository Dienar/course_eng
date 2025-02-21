<?php
require_once '../php/conn.php'; // Подключение к базе данных

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Приводим ID к целому числу для безопасности

    // Запрос на удаление пользователя
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Пользователь удалён!'); window.location.href = '../admin_client/admin_client.php';</script>";
    } else {
        echo "<script>alert('Ошибка удаления!'); window.location.href = '../admin_client/admin_client.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Некорректный запрос!'); window.location.href = '../admin_client/admin_client.php';</script>";
}

$mysqli->close();
?>