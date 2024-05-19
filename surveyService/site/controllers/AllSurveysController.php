<?php
// site/controllers/AllSurveysController.php

require_once 'models/Survey.php';

class AllSurveysController
{
    private $survey;

    public function __construct($db)
    {
        $this->survey = new Survey($db);
    }

    public function index()
    {
        $surveys = $this->survey->getAllSurveys();
        include 'views/surveys.php';
    }
}
?>
