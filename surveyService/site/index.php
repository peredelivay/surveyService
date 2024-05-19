<?php
// Подключаем необходимые файлы и настройки
require_once 'controllers/HomeController.php';
require_once 'controllers/AllSurveysController.php';
require_once 'controllers/AboutController.php';
require_once 'controllers/SurveyController.php';
require_once 'controllers/SubmitController.php';
require_once 'controllers/AdminController.php';
require_once 'config/database.php'; // Подключаем файл с классом Database

// Подключение к базе данных
$db = new Database();

$uri = $_SERVER['REQUEST_URI'];
$uri = parse_url($uri, PHP_URL_PATH);

// Простая маршрутизация, можно использовать более продвинутые инструменты для сложной маршрутизации
if ($uri === '/') {
    $controller = new HomeController();
    $controller->index();
} elseif ($uri === '/about') {
    $controller = new AboutController();
    $controller->index();
} elseif ($uri === '/surveys/submited') {
    $controller = new SubmitController();
    $controller->index();
} elseif ($uri === '/surveys') {
    $controller = new AllSurveysController($db);
    $controller->index();
} elseif (preg_match('#^/survey/(\d+)$#', $uri, $matches)) {
    $controller = new SurveyController($db);
    $controller->show($matches[1]);
} elseif ($uri === '/survey/submit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new SurveyController($db);
    $controller->submit();
}elseif ($uri === '/admin') {
    $controller = new AdminController($db);
    $controller->index();
} elseif ($uri === '/admin/edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new AdminController($db);
    $controller->edit($_POST['survey_id']);
} elseif ($uri === '/admin/update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new AdminController($db);
    $controller->update($_POST['survey_id'], $_POST['title'], $_POST['questions']);
} elseif ($uri === '/admin/delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new AdminController($db);
    $controller->delete($_POST['survey_id']);
} else {
    header('HTTP/1.0 404 Not Found');
    echo 'Page not found';
}
?>
