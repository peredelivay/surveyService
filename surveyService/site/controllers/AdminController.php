<?php
// controllers/AdminController.php

require_once 'models/Survey.php';

class AdminController {
    private $db;
    private $surveyModel;

    public function __construct($db) {
        $this->db = $db;
        $this->surveyModel = new Survey($db);
    }

    public function index() {
        $surveys = $this->surveyModel->getAllSurveys();
        include 'views/admin.php';
    }

    public function edit($surveyId) {
        $survey = $this->surveyModel->getSurveyById($surveyId);
        $questions = $this->surveyModel->getQuestionsBySurveyId($surveyId);
        include 'views/editSurvey.php';
    }

    public function update($surveyId, $title, $questions) {
        $this->surveyModel->updateSurvey($surveyId, $title);
        foreach ($questions as $questionId => $text) {
            $this->surveyModel->updateQuestion($questionId, $text);
        }
        header('Location: /admin');
    }

    public function delete($surveyId) {
        $this->surveyModel->deleteSurvey($surveyId);
        header('Location: /admin');
    }
}
?>
