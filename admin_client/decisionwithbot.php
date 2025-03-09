<?php
require_once "../php/connoop.php";

class decision extends conn
{
    public function decision()
    {
        $mysqli = $this->Mysqli();
        $decision = "Решен";
        $id = $_GET['id'];
        $stmt = $mysqli->prepare("UPDATE support_messages SET decision = ? where id = ?");
        $stmt->bind_param("si",$decision,$id);
        $result = $stmt->execute();
        if($result)
        {
            header("location: ../admin_client/admin_client.php");
        }else{
            echo "Ошибка";
        }
    $this->close();
    }
}
$decision = new decision();
$decision->decision();
?>