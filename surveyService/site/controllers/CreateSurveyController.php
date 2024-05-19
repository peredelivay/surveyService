<?php
// site/controllers/SurveyAdminController.php

require_once('site/models/SurveyModel.php');
require_once('site/models/QuestionModel.php');

class CreateSurveyController
{
    public function createSurveyForm()
    {
        include('app/views/admin/create_survey_form.php');
    }

    public function createSurvey()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $surveyTitle = $_POST['survey_title'];
            $this->surveyModel->createSurvey($surveyTitle);
            // Дополнительные действия после создания опроса
            header('Location: index.php');
        }
    }

    public function editSurveyForm($surveyId)
    {
        $survey = $this->surveyModel->getSurveyById($surveyId);
        $questions = $this->questionModel->getQuestionsBySurveyId($surveyId);
        include('app/views/admin/edit_survey_form.php');
    }

    public function editSurvey($surveyId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newTitle = $_POST['survey_title'];
            $this->surveyModel->updateSurvey($surveyId, $newTitle);
            // Дополнительные действия после редактирования опроса
            header('Location: index.php');
        }
    }

    public function deleteSurvey($surveyId)
    {
        $this->surveyModel->deleteSurvey($surveyId);
        // Дополнительные действия после удаления опроса
        header('Location: index.php');
    }
}
?>
