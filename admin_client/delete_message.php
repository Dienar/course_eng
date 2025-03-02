<?php
require_once "../php/connoop.php";

class deleteMessage extends conn
{
    

    public function DeleteMessage()
    {
        $mysqli = $this->Mysqli();
        $id = intval($_GET['id']);
        $stmt = $mysqli->prepare("DELETE FROM user_message where id = ?");
        $stmt->bind_param("i",$id);
        $result = $stmt->execute();
        if($result){
             header("location: ../admin_client/admin_client.php");
        }else{
            echo "провал";
        }
        $this->close();
       
    }
}
$deleteMessage =new deleteMessage();
$deleteMessage->DeleteMessage();

