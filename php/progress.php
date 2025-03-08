<?php
session_start();
require_once "conn.php";

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "Not authenticated"]);
    exit;
}

$user_id = $_SESSION['user_id'];
$course_id = $_SESSION['course_id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $progress = isset($_POST['progress']) ? intval($_POST['progress']) : 0;
    $answers = isset($_POST['answers']) ? json_encode($_POST['answers']) : null;
    error_log("Course ID: " . $course_id);
    $stmt = $mysqli->prepare("INSERT INTO user_progress (user_id, progress, answers, course_id) 
                              VALUES (?, ?, ?, ?) 
                              ON DUPLICATE KEY UPDATE progress = VALUES(progress), answers = VALUES(answers)");
    $stmt->bind_param("iiss", $user_id, $progress, $answers, $course_id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "progress" => $progress]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to save progress"]);
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $mysqli->prepare("SELECT progress, answers FROM user_progress WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo json_encode(["progress" => $row['progress'], "answers" => json_decode($row['answers'], true)]);
    } else {
        // Если данных нет, создаем запись с 0 прогресса и пустыми ответами
        $stmt = $mysqli->prepare("INSERT INTO user_progress (user_id, progress, answers, course_id) VALUES (?, 0, NULL, ?)");
        $stmt->bind_param("is", $user_id, $course_id);
        $stmt->execute();
        echo json_encode(["progress" => 0, "answers" => []]);
    }
    exit;
}
?>