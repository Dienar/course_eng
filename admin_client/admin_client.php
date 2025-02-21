<?php
require_once '../php/conn.php'; // Подключение к базе данных

$sql = "SELECT * FROM users";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список пользователей</title>
    <link rel="stylesheet" href="admin_client.css">

</head>
<body>
<a href="../php/logout.php" class="logout-btn">Выход</a>
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

</body>
</html>