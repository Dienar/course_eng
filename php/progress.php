<?php
session_start();
require_once "conn.php";

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "Not authenticated"]);
    exit;
}

$user_id = $_SESSION['user_id'];
$course_id = isset($_REQUEST['course_id']) ? intval($_REQUEST['course_id']) : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!$course_id) {
        echo json_encode(["status" => "error", "message" => "Course ID is missing"]);
        exit;
    }

    $progress = isset($_POST['progress']) ? intval($_POST['progress']) : 0;
    $answers = isset($_POST['answers']) ? json_encode($_POST['answers']) : null;

    $stmt = $mysqli->prepare("
        INSERT INTO user_progress (user_id, course_id, progress, answers) 
        VALUES (?, ?, ?, ?) 
        ON DUPLICATE KEY UPDATE progress = VALUES(progress), answers = VALUES(answers)
    ");
    $stmt->bind_param("iiis", $user_id, $course_id, $progress, $answers);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "progress" => $progress]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to save progress"]);
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($course_id) {
        // Если запрашивается прогресс одного курса
        $stmt = $mysqli->prepare("SELECT progress, answers FROM user_progress WHERE user_id = ? AND course_id = ?");
        $stmt->bind_param("ii", $user_id, $course_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            echo json_encode(["progress" => $row['progress'], "answers" => json_decode($row['answers'], true)]);
        } else {
            // Создаем новую запись, если ее нет
            $stmt = $mysqli->prepare("INSERT INTO user_progress (user_id, course_id, progress, answers) VALUES (?, ?, 0, NULL)");
            $stmt->bind_param("ii", $user_id, $course_id);
            $stmt->execute();
            echo json_encode(["progress" => 0, "answers" => []]);
        }
    } else {
        // Если запрашивается прогресс всех курсов
        $stmt = $mysqli->prepare("SELECT course_id, progress FROM user_progress WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $progressData = [];
        while ($row = $result->fetch_assoc()) {
            $progressData[$row['course_id']] = $row['progress'];
        }
        echo json_encode($progressData);
    }
    exit;
}
?>
