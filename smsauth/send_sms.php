<?php
session_start();
$phone = preg_replace('/\D/', '', $_SESSION['phone']); // Удаляем лишнее
$code = rand(100000, 999999);

// Сохраняем в сессию

$_SESSION['sms_code'] = $code;
$_SESSION['sms_code_time'] = time();

// Отправка СМС через SMS.ru
$api_id = '70DAC512-53F1-27E1-6115-98F11FED24B9';
$msg = urlencode("Код подтверждения: $code");

$url = "https://sms.ru/sms/send?api_id=$api_id&to=$phone&msg=$msg&json=1";
$response = file_get_contents($url);
$data = json_decode($response, true);

if ($data['status'] === 'OK') {
    header('Location: verify_sms.php');
} else {
    echo "Ошибка при отправке СМС: " . $data['status_text'];
}
