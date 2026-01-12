<?php
    class Database {
        private $host= "localhost";
        private $db_name = "usuario";
        private $username = "root";
        private $password = "root";
        private $connection = null;

        public function getConnection(){
            if($this->connection !== null){
                return $this->connection;
            }
            try{
                $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name,$this->username,$this->password);
            }
        }
    }
?>