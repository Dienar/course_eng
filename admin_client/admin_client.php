<?php
require_once '../php/conn.php'; // Подключение к базе данных

// Запросы к БД
$sql = "SELECT * FROM users";
$sql2 = "SELECT * FROM users_purchases";
$sql3 = "SELECT * FROM user_message";

$result = $mysqli->query($sql);
$result2 = $mysqli->query($sql2);
$result3 = $mysqli->query($sql3);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="admin_client.css">
</head>
<body>
<a href="../php/logout.php" class="logout-btn">Назад</a>

<h2>Список пользователей</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Email</th>
        <th>Телефон</th>
        <th>Действия</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['phone']) ?></td>
        <td class="actions">
            <a href="edit_user.php?id=<?= $row['id'] ?>" class="edit">Редактировать</a>
            <a href="delete_user.php?id=<?= $row['id'] ?>" class="delete" onclick="return confirm('Удалить пользователя?')">Удалить</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<h2>Покупки пользователей</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Email</th>
        <th>Город</th>
        <th>Индекс</th>
        <th>Имя на карте</th>
        <th>Номер карты</th>
        <th>ID курса</th>
    </tr>
    <?php while ($row = $result2->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['sity']) ?></td>
        <td><?= htmlspecialchars($row['index_user']) ?></td>
        <td><?= htmlspecialchars($row['nameoncart']) ?></td>
        <td><?= htmlspecialchars($row['cartnum']) ?></td>
        <td><?= htmlspecialchars($row['course_id']) ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<h2>Сообщения пользователей</h2>
<table>
    <tr>
        <th>ID</th>
        <th>ID пользователя</th>
        <th>Email пользователя</th>
        <th>Сообщение</th>
    </tr>
    <?php while ($row = $result3->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name.id']) ?></td>
        <td><?= htmlspecialchars($row['email.id']) ?></td>
        <td><?= htmlspecialchars($row['message']) ?></td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>