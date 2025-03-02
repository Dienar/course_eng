<?php
require_once "../php/connoop.php";

class deletepurchase extends conn
{
    public function DeletePurchase()
    {
        $mysqli = $this->Mysqli();
        $id = intval($_GET['id']);
        $stmt = $mysqli->prepare("DELETE FROM users_purchases where id = ?");
        $stmt->bind_param("i",$id);
        $result = $stmt->execute();
        if($result){
            header("location: ../admin_client/admin_client.php");
        }else{
            echo "Ошибка";
        }
        $this->close();
    }
}
$deletepurchase = new deletepurchase();
$deletepurchase->DeletePurchase();
?>