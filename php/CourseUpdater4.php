<?php
require_once 'conn.php';
class CourseUpdater4 {
    private $mysqli;
    
    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function updateCourseName($newName) {
        $newName = $this->mysqli->real_escape_string(trim($newName));
        $query = "UPDATE `course-4` SET name_course = '$newName\r\n' WHERE id = 1";
        return $this->executeQuery($query);
    }

    public function updateCoursePrefix($newPrefix) {
        $newPrefix = $this->mysqli->real_escape_string(trim($newPrefix));
        $query = "UPDATE `course-4` SET prefix_course = '$newPrefix\r\n' WHERE id = 1";
        return $this->executeQuery($query);
    }
    public function updateFirstString($newFirstString) {
        $newFirstString = $this->mysqli->real_escape_string(trim($newFirstString));
        $query = "UPDATE `course-4` SET first_string = '$newFirstString\r\n' WHERE id = 1";
        return $this->executeQuery($query);
    }

    public function updateSecondString($newSecondString) {
        $newSecondString = $this->mysqli->real_escape_string(trim($newSecondString));
        $query = "UPDATE `course-4` SET second_string = '$newSecondString\r\n' WHERE id = 1";
        return $this->executeQuery($query);
    }

    public function updateThirdString($newThirdString) {
        $newThirdString = $this->mysqli->real_escape_string(trim($newThirdString));
        $query = "UPDATE `course-4` SET third_string = '$newThirdString\r\n' WHERE id = 1";
        return $this->executeQuery($query);
    }

    private function executeQuery($query) {
        if ($this->mysqli->query($query)) {
            header('Location: ../index_admin.php');
            exit;
        } else {
            echo "Ошибка: " . $this->mysqli->error;
            return false;
        }
    }

    public function __destruct() {
        $this->mysqli->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $updater = new CourseUpdater4($mysqli1);

    if (isset($_GET['new_name_course'])) {
        $newNameCourse = $_GET['new_name_course'];
        $updater->updateCourseName($newNameCourse);
    }

    if (isset($_GET['new_prefix_course'])) {
        $newPrefixCourse = $_GET['new_prefix_course'];
        $updater->updateCoursePrefix($newPrefixCourse);
    }

    if (isset($_GET['new_first_string'])) {
        $newFirstString = $_GET['new_first_string'];
        $updater->updateFirstString($newFirstString);
    }

    if (isset($_GET['new_second_string'])) {
        $newSecondString = $_GET['new_second_string'];
        $updater->updateSecondString($newSecondString);
    }

    if (isset($_GET['new_third_string'])) {
        $newThirdString = $_GET['new_third_string'];
        $updater->updateThirdString($newThirdString);
    }
}
?>