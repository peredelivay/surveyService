<?php
// controllers/SurveyController.php

require_once 'models/Survey.php';
require_once 'models/User.php';
require_once 'models/Response.php';

class SurveyController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function show($id) {
        $survey = (new Survey($this->db))->getSurveyById($id);
        $questions = (new Survey($this->db))->getQuestionsBySurveyId($id);
        include __DIR__ . '/../views/viewSurvey.php';
    }

    public function submit() {
        $surveyId = $_POST['survey_id'];
        $username = $_POST['username'];
        $responses = $_POST['responses'];

        // Вставка пользователя
        $userModel = new User($this->db);
        $userId = $userModel->insertUser($username);

        // Вставка ответов
        $responseModel = new Response($this->db);
        foreach ($responses as $questionId => $responseText) {
            $responseModel->insertResponse($questionId, $username, $responseText);
        }

        // Перенаправление на страницу благодарности или назад на страницу опроса
        header('Location: /surveys/submited');
    }
}
?>
