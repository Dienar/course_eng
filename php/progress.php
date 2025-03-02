<?php
session_start();
require_once "conn.php";

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "Not authenticated"]);
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $progress = isset($_POST['progress']) ? intval($_POST['progress']) : 0;

    $stmt = $mysqli->prepare("INSERT INTO user_progress (user_id, progress) 
                              VALUES (?, ?) ON DUPLICATE KEY UPDATE progress = ?");
    $stmt->bind_param("iii", $user_id, $progress, $progress);
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "progress" => $progress]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to save progress"]);
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $mysqli->prepare("SELECT progress FROM user_progress WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    echo json_encode(["progress" => $row ? $row['progress'] : 0]);
    exit;
}
?>
