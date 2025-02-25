<?php

require_once __DIR__ . "/connoop.php";

class payment extends conn
{
    private $fullname;
    private $email;
    private $city;
    private $index;
    private $nameoncart;
    private $cartnum;

    public function PayToDataBase()
    {
        $mysqli = $this->Mysqli();
        $this->fullname = $_POST['name'];
        $this->email = $_POST['email'];
        $this->city = $_POST['city'];
        $this->index = $_POST['index_user'];
        $this->nameoncart = $_POST['nameoncart'];
        $this->cartnum = $_POST['cartnum'];
        $stmt = $mysqli->prepare("INSERT INTO users_purchases (name,email,sity,index_user,nameoncart,cartnum) VALUES (?,?,?,?,?,?)");  
        $stmt->bind_param("ssssss", $this->fullname, $this->email, $this->city, $this->index, $this->nameoncart,$this->cartnum); // исправил количество параметров на 7
        $result = $stmt->execute();
        
        if (!$result) {
            echo "error: " . $stmt->error; // добавил вывод ошибки, если запрос не выполнен
        } else {
            echo "Success"; // можно вывести сообщение об успешной вставке
        }
    }
}

$payment = new payment();
$payment->PayToDataBase();
?>