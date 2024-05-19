<?php
// models/User.php

require_once('config/database.php');

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertUser($username) {
        $this->db->query("INSERT INTO users (username) VALUES ('$username')");
    }
}
?>
