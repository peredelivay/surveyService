<?php
// views/viewSurvey.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../web/css/style.css">
    <title><?php echo htmlspecialchars($survey['title']); ?></title>
</head>
<body>
<header>
    <h1><?php echo htmlspecialchars($survey['title']); ?></h1>
    <nav>
        <a href="/">Главная страница</a>
        <a href="/surveys">Все опросы</a>
        <a href="/about">О сайте</a>
    </nav>
</header>
<div class="survey-form">
    <form action="/survey/submit" method="post">
        <input type="hidden" name="survey_id" value="<?php echo $survey['id']; ?>">
        <?php foreach ($questions as $question): ?>
            <div class="question">
                <label for="question-<?php echo $question['id']; ?>"><?php echo htmlspecialchars($question['text']); ?></label>
                <input type="text" id="question-<?php echo $question['id']; ?>" name="responses[<?php echo $question['id']; ?>]" required>
            </div>
        <?php endforeach; ?>
        <div class="question">
            <label for="username">Введите ваше имя:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <button type="submit">Отправить</button>
    </form>
</div>
<footer class="footer">
    <p>
        2022 &copy; Popov Ivan MIREA. ALL RIGHTS RESERVED
    </p>
</footer>
</body>
</html>
