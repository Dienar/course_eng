<?php
require_once "../php/connoop.php";

class delUserProgress extends conn
{
    public function DelUserProgress()
    {
        $mysqli = $this->Mysqli();
        $id = $_GET['user_id'];
        $stmt = $mysqli->prepare("DELETE (progress,answers) FROM user_progress where user_id = ?");
        $stmt->bind_param("s",$id);
        $result = $stmt->execute();
        if($result)
        {
            header("location: ../admin_client/admin_client.php");
        }else{
            echo "Ошибка!";
        }
        $this->close();
    }
}
$deluserprogress = new delUserProgress();
$deluserprogress->DelUserProgress();
?>