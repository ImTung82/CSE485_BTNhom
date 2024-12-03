<?php
    class DBConnection {
        private $host;
        private $user;
        private $password;
        private $dbname;
        private $conn;

        public function __construct() {
            $this->host = DB_HOST;
            $this->user = DB_USER;
            $this->password = DB_PASSWORD;
            $this->dbname = DB_NAME;

            try {
                $this->conn = new PDO("mysql:host={$this->host}; dbname={$this->dbname}", $this->user, $this->password);
            } catch (PDOException $e) {
                $this->conn = null;
            }
        }

        public function getConnection() {
            return $this->conn;
        }
    }
?>