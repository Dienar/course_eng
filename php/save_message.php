<?php
require_once "connoop.php";

class SaveMessage extends conn
{
    public function SaveMessage()
    {
        $mysqli = $this->Mysqli();
        $data = json_decode(file_get_contents("php://input"), true);

        if (!empty($data["email"]) && !empty($data["message"])) {
            $email = filter_var($data["email"], FILTER_SANITIZE_EMAIL);
            $message = htmlspecialchars($data["message"]);

            // Проверяем, есть ли уже такое сообщение в базе
            $stmt = $mysqli->prepare("SELECT id FROM support_messages WHERE email = ? AND message = ?");
            $stmt->bind_param("ss", $email, $message);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Если сообщение уже есть, отправляем ошибку
                echo json_encode(["status" => "error", "message" => "Мы уже занимаемся этим вопросом!"]);
                exit;
            }

            // Если сообщение новое, записываем в базу
            $decision = "Не решен";
            $stmt = $mysqli->prepare("INSERT INTO support_messages (email, message, decision) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $email, $message, $decision);
            $stmt->execute();
            $stmt->close();

            echo json_encode(["status" => "success", "message" => "Сообщение успешно отправлено!"]);
        }
    }
}

$savemessage = new SaveMessage();
$savemessage->SaveMessage();
?>
