<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answers = [
        'listening' => $_POST['listening_answers'] ?? [],
        'reading' => $_POST['reading_answers'] ?? []
    ];

    // Сохраняем результаты в БД
    $stmt = $mysqli->prepare("INSERT INTO user_test_results (user_id, test_type, answers) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $_SESSION['user_id'], 'listening_reading', json_encode($answers));
    $stmt->execute();

    // Обновляем прогресс
    $stmt = $mysqli->prepare("UPDATE user_progress SET progress = 100 WHERE user_id = ? AND course_id = 2");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();

    echo json_encode(['status' => 'success']);
}
?>