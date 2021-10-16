<?php

    class Database extends PDO
    {
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $database_name = "webtintuc";
        protected $conn;

        public function __construct() {
            try {
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->database_name}", $this->username, $this->password);
                // set the PDO error mode to exception
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $ex) {
                echo "Connection failed: " . $ex->getMessage();
            }
        }

    }
?>