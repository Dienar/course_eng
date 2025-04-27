<?php
$selectcourse = $_GET['selectcourse'];
switch($selectcourse){
    case 1:
        header('Location: readlist.php');
        break;
    case 2:
        header('Location: beginercourse.php');
        break;
    case 3:
        header('Location: advancedcourse.php');
        break;
    case 4:
        header('Location: examcourse.php');
        break;
    default:
        echo "Ошибка запроса, повторите попытку";
    }
?>