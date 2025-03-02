<?php
require_once '../php/conn.php'; // Подключение к базе данных

// Запросы к БД
$sql = "SELECT * FROM users";
$sql2 = "SELECT * FROM users_purchases";
$sql3 = "SELECT * FROM user_message";
$sql4 = "SELECT * FROM user_progress";

$result = $mysqli->query($sql);
$result2 = $mysqli->query($sql2);
$result3 = $mysqli->query($sql3);
$result4 = $mysqli->query($sql4);
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
        <th>Действия</th>
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
        <td class="actions">
            <a href="delete_purchase.php?id=<?= $row['id'] ?>" class="delete" onclick="return confirm('Удалить покупку?')">Удалить</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<h2>Сообщения пользователей</h2>
<table>
    <tr>
        <th>ID</th>
        <th>ID пользователя</th>
        <th>Сообщение</th>
        <th>Решение</th>
        <th>Действия</th>
    </tr>
    <?php while ($row = $result3->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['user_id']) ?></td>
        <td><?= htmlspecialchars($row['message']) ?></td>
        <td><?= htmlspecialchars($row['decision']) ?></td>
        <td class="actions">
            <a href="decision.php?id=<?= $row['id'] ?>" class="edit" onclick="return confirm('Сообщение решено?')">Решить</a>
            <a href="delete_message.php?id=<?= $row['id'] ?>" class="delete" onclick="return confirm('Удалить сообщение?')">Удалить</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
<h2>Прогресс пользователей</h2>
<table>
    <tr>
        <th>ID пользователя</th>
        <th>Процент выплнения теста</th>
        <th>Ответы</th>
        <th>Действия</th>
    </tr>
    <?php while ($row = $result4->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['user_id']) ?></td>
        <td><?= htmlspecialchars($row['progress']) ?></td>
        <td><?= htmlspecialchars($row['answers']) ?></td>
        <td class="actions">
            <a href="?id=<?= $row['user_id'] ?>" class="edit" onclick="alert('В разработке')">Редактировать</a>
            <a href="delete_user_progress.php?id=<?= $row['user_id'] ?>" class="delete" onclick="return confirm('Удалить пользователя?')">Удалить</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>