<?php
// models/AdminModel.php

require_once 'config/database.php';

class AdminModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllSurveys() {
        $result = $this->db->query("SELECT * FROM surveys");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSurveyById($surveyId) {
        $result = $this->db->query("SELECT * FROM surveys WHERE id = $surveyId");
        return $result->fetch_assoc();
    }

    public function getQuestionsBySurveyId($surveyId) {
        $result = $this->db->query("SELECT * FROM questions WHERE survey_id = $surveyId");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateSurvey($surveyId, $title, $questions) {
        $this->db->query("UPDATE surveys SET title = '$title' WHERE id = $surveyId");
        foreach ($questions as $questionId => $text) {
            $this->db->query("UPDATE questions SET text = '$text' WHERE id = $questionId AND survey_id = $surveyId");
        }
    }

    public function deleteSurvey($surveyId) {
        $this->db->query("DELETE FROM surveys WHERE id = $surveyId");
    }
}
?>
