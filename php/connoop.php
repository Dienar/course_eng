<?php
    class conn
    {
        private $mysqli;

        public function  __construct()
        {
            
        $this->mysqli = new mysqli('localhost','root','','eng_course');
        if($this->mysqli->connect_error)
        {
            echo "error";
        }
            
        }

        public function Mysqli()
        {
            return $this->mysqli;
        }

        public function close()
        {
            $this->mysqli->close();   
        }
    }
?>