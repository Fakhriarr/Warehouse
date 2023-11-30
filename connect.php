<?php
    class DbHouse {
        private $host;
        private $user;
        private $pass;
        private $db;
    
        public function connect() {
            $this->host = 'localhost';
            $this->user = 'root';
            $this->pass = '';
            $this->db = 'db_warehouse';
            $conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
            return $conn;
        }
    }

    $database = new DbHouse();
    $connect = $database->connect();
    
?>