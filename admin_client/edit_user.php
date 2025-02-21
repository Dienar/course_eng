<?php
require_once '../php/conn.php'; // Подключение к базе данных

// Проверяем, передан ли ID пользователя
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('Некорректный ID пользователя!'); window.location.href = '../admin_client/admin_client.php';</script>";
    exit;
}

$id = intval($_GET['id']);

// Получаем данные пользователя
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "<script>alert('Пользователь не найден!'); window.location.href = '../admin_client/admin_client.php';</script>";
    exit;
}

// Если форма отправлена, обновляем данные
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));

    $update_sql = "UPDATE users SET name = ?, email = ?, phone = ? WHERE id = ?";
    $update_stmt = $mysqli->prepare($update_sql);
    $update_stmt->bind_param("sssi", $name, $email, $phone, $id);

    if ($update_stmt->execute()) {
        echo "<script>alert('Данные обновлены!'); window.location.href = '../admin_client/admin_client.php';</script>";
    } else {
        echo "<script>alert('Ошибка обновления!');</script>";
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование пользователя</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
            padding: 20px;
        }
        form {
            background: #fff;
            padding: 20px;
            max-width: 400px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Редактирование пользователя</h2>

<form method="post">
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

    <label for="phone">Телефон:</label>
    <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" required>

    <button type="submit">Сохранить изменения</button>
</form>

</body>
</html>