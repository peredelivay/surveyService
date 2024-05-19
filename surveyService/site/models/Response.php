<?php
// models/Response.php

require_once('config/database.php');

class Response {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertResponse($questionId, $username, $responseText) {
        $this->db->query("INSERT INTO responses (question_id, username, response_text) VALUES ($questionId, '$username', '$responseText')");
    }
}
?>
