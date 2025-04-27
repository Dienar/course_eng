<?php
session_start();
require '../../phpmailer/PHPMailer.php';
require '../../phpmailer/SMTP.php';
require '../../phpmailer/Exception.php';
$courseid = $_GET['courseid'];
switch($courseid){
    case 1:
        $_SESSION['nextcourseS1'] = "<h3>Вы завершили курс! 🎉🎉 Поздрвляем !🎉🎉</h3>";
        break;
     case 2:
        $_SESSION['nextcourseS2'] = "<h3>Вы завершили курс! 🎉🎉 Поздрвляем !🎉🎉</h3>";
        break;
     case 3:
        $_SESSION['nextcourseS3'] = "<h3>Вы завершили курс! 🎉🎉 Поздрвляем !🎉🎉</h3>";
        break;
     case 4:
        $_SESSION['nextcourseS4'] = "<h3>Вы завершили курс! 🎉🎉 Поздрвляем !🎉🎉</h3>";
        break;
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$adressmail = $_GET['email'];
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'andycheef@gmail.com';       // Твоя почта Gmail
    $mail->Password   = 'lcxq rrlp jcmp akgt';         // Пароль приложения Gmail
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('andycheef@gmail.com', 'English Course');
    $mail->addAddress($adressmail);        // Адрес получателя

    $mail->isHTML(true);
    $mail->Subject = '🎉 Поздравляем с успешным завершением курса английского языка!';
    
    $mail->Body = '
        <div style="font-family: Arial, sans-serif; color: #333; max-width: 600px; margin: auto; border: 1px solid #ddd; padding: 20px; border-radius: 10px; background-color: #f9f9f9;">
            <div style="text-align: center;">
                <h2 style="color: #2c3e50;">🎓 Поздравляем!</h2>
                <img src="https://sun9-66.userapi.com/c784/u11247482/110383887/x_3b57e1b3ad.jpg" alt="Certificate" style="max-width: 100%; height: auto; border-radius: 8px;" />
            </div>
            <p style="font-size: 16px;">
                Вы успешно завершили наш онлайн-курс по английскому языку! Это большое достижение, и мы гордимся вашими успехами.
            </p>
            <p style="font-size: 16px;">
                За это время вы прошли множество заданий, выучили новые слова и отточили грамматику. Мы надеемся, что этот опыт станет прочной основой для вашего будущего.
            </p>
            <p style="font-size: 16px;">
                <strong>Помните:</strong> знание языка открывает двери в мир новых возможностей!
            </p>
            <hr style="margin: 30px 0;">
            <p style="font-size: 14px; text-align: center; color: #888;">
                Спасибо, что были с нами.<br>
                С уважением,<br>
                <strong style="color: #2c3e50;">Команда English Course</strong>
            </p>
        </div>
    ';

    $mail->send();
    echo '
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Поздравляем!</title>
    <style>
        body {
            margin: 0;
            font-family: "Segoe UI", sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .card {
            background-color: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 600px;
        }
        .card h1 {
            color: #2c3e50;
            font-size: 32px;
        }
        .card p {
            font-size: 18px;
            margin-top: 20px;
            color: #555;
        }
        .card img {
            max-width: 100%;
            border-radius: 12px;
            margin-top: 20px;
        }
        .button {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 24px;
            background-color: #27ae60;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #219150;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>🎉 Поздравляем!</h1>
        <p>Вы успешно завершили курс английского языка на платформе <strong>Global</strong>.</p>
        <img src="https://sun9-66.userapi.com/c784/u11247482/110383887/x_3b57e1b3ad.jpg" alt="Certificate">
        <a class="button" href="../../user.client">Перейти в личный кабинет</a>
    </div>
</body>
</html>
';

} catch (Exception $e) {
    echo "Ошибка: {$mail->ErrorInfo}";
    
}
?>