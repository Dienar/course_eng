<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Подтверждение кода</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
<style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Montserrat', sans-serif;
      background: linear-gradient(120deg, #89f7fe, #66a6ff);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      background-color: #ffffff;
      padding: 40px 30px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      text-align: center;
      max-width: 400px;
      width: 100%;
      animation: fadeIn 0.6s ease;
    }

    .form-container h2 {
      margin-bottom: 20px;
      color: #333;
      font-weight: 600;
    }

    input[type="text"] {
      width: 70%;
      padding: 14px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-size: 16px;
      transition: border 0.3s ease;
    }

    input[type="text"]:focus {
      border-color: #66a6ff;
      outline: none;
    }

    button[type="submit"] {
      background-color: #66a6ff;
      color: white;
      border: none;
      padding: 14px 20px;
      font-size: 16px;
      border-radius: 10px;
      cursor: pointer;
      transition: background 0.3s ease;
      width: 100%;
    }

    button[type="submit"]:hover {
      background-color: #4f8ce2;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      } to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Введите код из СМС</h2>
    <form method="post">
      <input type="text" name="code" maxlength="6" required placeholder="6-значный код">
      <button type="submit">Подтвердить</button>
    </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $user_code = $_POST['code'];
      $true_code = $_SESSION['sms_code'] ?? '';
      $code_time = $_SESSION['sms_code_time'] ?? 0;

      if (time() - $code_time > 300) {
          echo "⏰ Код истёк. Запросите новый.";
      } elseif ($user_code == $true_code) {
          $_SESSION['authenticated'] = true;
          if(!empty($_SESSION['user_role'])){
            header('Location: ../index_admin.php');
          }
          header("Location: ../index_loged.php");
          exit();
      } else {
          echo "❌ Неверный код.";
      }
  }
  ?>
</body>
</html>
