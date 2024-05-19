<?php
// site/config/database.php

class Database
{
    private $servername = "db";
    private $username = "user";
    private $password = "password";
    private $database = "db";

    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    private function connect()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    public function query($sql) {
        $result = $this->conn->query($sql);
        if (!$result) {
            throw new Exception("SQL Error: " . $this->conn->error);
        }
        return $result;
    }

}
?>
