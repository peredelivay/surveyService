<?php
// site/models/SurveyModel.php

require_once('site/config/database.php');

class QuestionModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getQuestionsBySurveyId($surveyId)
    {
        $sql = "SELECT * FROM questions WHERE survey_id = $surveyId";
        return $this->db->query($sql);
    }
}
?>
