<?php

require_once "conn.php";

class CourseUpdater
{
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function updateCourseName($newName)
    {
        $newName = $this->mysqli->real_escape_string(trim($newName));
        $query = "UPDATE `course-1` SET `name_course` = '$newName\r\n' WHERE `id` = 1";
        return $this->executeQuery($query);
    }

    public function updateCoursePrefix($newPrefix)
    {
        $newPrefix = $this->mysqli->real_escape_string(trim($newPrefix));
        $query = "UPDATE `course-1` SET `prefix_course` = '$newPrefix\r\n' WHERE `id` = 1";
        return $this->executeQuery($query);
    }
    public function updataFirstString($newfirststring)
    {
        $newfirststring= $this->mysqli->real_escape_string(trim($newfirststring));
        $query = "UPDATE `course-1` SET `first_string` = '$newfirststring\r\n' WHERE `id` = 1";
        return $this->executeQuery($query);
    }
    public function updateSecondString($newsecondstring)
    {
        $newsecondstring= $this->mysqli->real_escape_string(trim($newsecondstring));
        $query = "UPDATE `course-1` SET `second_string` = '$newsecondstring\r\n' WHERE `id` = 1";
        return $this->executeQuery($query);
    }
    public function updateThirdString($newthirdstring)
    {
        $newthirdstring= $this->mysqli->real_escape_string(trim($newthirdstring));
        $query = "UPDATE `course-1` SET `third_string` = '$newthirdstring\r\n' WHERE `id` = 1";
        return $this->executeQuery($query);
    }

    private function executeQuery($query)
    {
        if ($this->mysqli->query($query)) {
            header('Location: ../index_admin.php');
            exit;
        } else {
            echo "Ошибка: " . $this->mysqli->error;
            return false;
        }
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $updater = new CourseUpdater($mysqli1);

    if (isset($_GET['new_name_course'])) {
        $newNameCourse = $_GET['new_name_course'];
        $updater->updateCourseName($newNameCourse);
    }

    if (isset($_GET['new_prefix_course'])) {
        $newPrefixCourse = $_GET['new_prefix_course'];
        $updater->updateCoursePrefix($newPrefixCourse);
    }
    if (isset($_GET['new_first_string'])) {
        $new_first_string = $_GET['new_first_string'];
        $updater->updataFirstString($new_first_string);
    }
    if (isset($_GET['new_second_string'])) {
        $new_second_string = $_GET['new_second_string'];
        $updater->updateSecondString($new_second_string);
    }
    if (isset($_GET['new_third_string'])) {
        $new_third_string = $_GET['new_third_string'];
        $updater->updateThirdString($new_third_string);
    }
}
class CourseUpdater2{
    private $mysqli;
    public function __construct($mysqli){
        $this->mysqli = $mysqli;
    }
    public function updateCourseName($newName)
    {
        $newName = $this->mysqli->real_escape_string(trim($newName));
        $query = "UPDATE `course-2` SET `name_course` = '$newName\r\n' WHERE `id` = 1";
        return $this->executeQuery($query);
    }

    public function updateCoursePrefix($newPrefix)
    {
        $newPrefix = $this->mysqli->real_escape_string(trim($newPrefix));
        $query = "UPDATE `course-2` SET `prefix_course` = '$newPrefix\r\n' WHERE `id` = 1";
        return $this->executeQuery($query);
    }
    public function updataFirstString($newfirststring)
    {
        $newfirststring= $this->mysqli->real_escape_string(trim($newfirststring));
        $query = "UPDATE `course-2` SET `first_string` = '$newfirststring\r\n' WHERE `id` = 1";
        return $this->executeQuery($query);
    }
    public function updateSecondString($newsecondstring)
    {
        $newsecondstring= $this->mysqli->real_escape_string(trim($newsecondstring));
        $query = "UPDATE `course-2` SET `second_string` = '$newsecondstring\r\n' WHERE `id` = 1";
        return $this->executeQuery($query);
    }
    public function updateThirdString($newthirdstring)
    {
        $newthirdstring= $this->mysqli->real_escape_string(trim($newthirdstring));
        $query = "UPDATE `course-2` SET `third_string` = '$newthirdstring\r\n' WHERE `id` = 1";
        return $this->executeQuery($query);
    }

    private function executeQuery($query)
    {
        if ($this->mysqli->query($query)) {
            header('Location: ../index_admin.php');
            exit;
        } else {
            echo "Ошибка: " . $this->mysqli->error;
            return false;
        }
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $updater = new CourseUpdater2($mysqli1);

    if (isset($_GET['new_name_course'])) {
        $newNameCourse = $_GET['new_name_course'];
        $updater->updateCourseName($newNameCourse);
    }

    if (isset($_GET['new_prefix_course'])) {
        $newPrefixCourse = $_GET['new_prefix_course'];
        $updater->updateCoursePrefix($newPrefixCourse);
    }
    if (isset($_GET['new_first_string'])) {
        $new_first_string = $_GET['new_first_string'];
        $updater->updataFirstString($new_first_string);
    }
    if (isset($_GET['new_second_string'])) {
        $new_second_string = $_GET['new_second_string'];
        $updater->updateSecondString($new_second_string);
    }
    if (isset($_GET['new_third_string'])) {
        $new_third_string = $_GET['new_third_string'];
        $updater->updateThirdString($new_third_string);
    }
}
?>