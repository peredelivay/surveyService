<?php
// site/models/SurveyModel.php

require_once('config/database.php');

class Survey
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllSurveys()
    {
        $sql = "SELECT * FROM surveys";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getSurveyById($id) {
        $result = $this->db->query("SELECT * FROM surveys WHERE id = $id");
        return $result->fetch_assoc();
    }

    public function getQuestionsBySurveyId($surveyId) {
        $result = $this->db->query("SELECT * FROM questions WHERE survey_id = $surveyId");
        $questions = [];
        while ($row = $result->fetch_assoc()) {
            $questions[] = $row;
        }
        return $questions;
    }

    public function createSurvey($surveyTitle)
    {
        $sql = "INSERT INTO surveys (title) VALUES ('$surveyTitle')";
        return $this->db->query($sql);
    }

    public function updateSurvey($surveyId, $newTitle)
    {
        $sql = "UPDATE surveys SET title = '$newTitle' WHERE id = $surveyId";
        return $this->db->query($sql);
    }

    public function updateQuestion($questionId, $newText)
    {
        $sql = "UPDATE questions SET text = '$newText' WHERE id = $questionId";
        return $this->db->query($sql);
    }

    public function deleteSurvey($surveyId)
    {
        // Удаляем все связанные вопросы
        $this->deleteQuestionsBySurveyId($surveyId);

        $sql = "DELETE FROM surveys WHERE id = $surveyId";
        return $this->db->query($sql);
    }

    private function deleteQuestionsBySurveyId($surveyId)
    {
        $sql = "DELETE FROM questions WHERE survey_id = $surveyId";
        return $this->db->query($sql);
    }
}
?>
