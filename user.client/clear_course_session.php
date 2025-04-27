<?php
// clear_course_session.php
session_start();

// Удаляем данные о завершенном курсе из сессии
if (isset($_SESSION['completed_course'])) {
    unset($_SESSION['completed_course']);
}

// Можно также очистить другие связанные данные, если нужно
// if (isset($_SESSION['nextcourse1'])) {
//     unset($_SESSION['nextcourse1']);
// }

// Отправляем ответ в формате JSON
header('Content-Type: application/json');
echo json_encode(['status' => 'success', 'message' => 'Session cleared']);
exit();
?>