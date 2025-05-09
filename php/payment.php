<?php

require_once __DIR__ . "/connoop.php";
session_start();
class payment extends conn
{
    private $fullname;
    private $email;
    

    private $cartnum;
    private $course_id;

    public function PayToDataBase()
    {
        $mysqli = $this->Mysqli();
        $this->fullname = $_POST['name'];
        $this->email = $_POST['email'];
      
        
        
        $this->cartnum = $_POST['cartnum'];
        $this->course_id = $_POST['course_id']; // Получаем course_id

        // Проверяем, купил ли пользователь этот курс ранее
        $stmt = $mysqli->prepare("SELECT id FROM users_purchases WHERE email = ? AND course_id = ?");
        $stmt->bind_param("si", $this->email, $this->course_id);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            // Если курс уже куплен, показываем alert и отправляем на index.php
            echo "<script>
                alert('Ошибка: Вы уже приобрели этот курс.');
                window.location.replace('../index_loged.php');
            </script>";
            exit();
        }

        // Если курс не куплен, добавляем запись в базу
        $stmt = $mysqli->prepare("INSERT INTO users_purchases (name, email, cartnum, course_id) VALUES ( ?, ?, ?, ?)");
        $stmt->bind_param("sssi", $this->fullname, $this->email, $this->cartnum, $this->course_id);

        
        $email_loged = $_SESSION['email'];
        if($this->email != $email_loged){
            echo "<script>
            alert('Ошибка при оформлении покупки: укажите email при регистрции');
            window.location.replace('../index_loged.php');
        </script>";
        }else{
        $result = $stmt->execute();
        if (!$result) {
            echo "<script>
                alert('Ошибка при оформлении покупки: " . $stmt->error . "');
                window.location.replace('../index_loged.php');
            </script>";
        } else {
            $_SESSION['email'] = $this->email;
            echo "<script>
                alert('Покупка успешно оформлена!');
                window.location.replace('../user.client/');
            </script>";
        }
    }
    }

}

$payment = new payment();
$payment->PayToDataBase();
?>