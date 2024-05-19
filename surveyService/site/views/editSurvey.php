<?php
// views/editSurvey.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../web/css/style.css">
    <title>Редактирование опроса</title>
</head>
<body>

<header>
    <h1>Редактирование опроса "<?php echo htmlspecialchars($survey['title']); ?>"</h1>
    <nav>
        <a href="/">Главная страница</a>
        <a href="/surveys">Все опросы</a>
        <a href="/about">О сайте</a>
    </nav>
</header>

<div class="survey-form">
    <form method="post" action="/admin/update">
        <input type="hidden" name="survey_id" value="<?php echo $survey['id']; ?>">
        <div class="question">
            <label for="title">Название опроса:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($survey['title']); ?>" required>
        </div>
        <?php foreach ($questions as $question): ?>
            <div class="question">
                <label for="question-<?php echo $question['id']; ?>">Вопрос:</label>
                <input type="text" id="question-<?php echo $question['id']; ?>" name="questions[<?php echo $question['id']; ?>]" value="<?php echo htmlspecialchars($question['text']); ?>" required>
            </div>
        <?php endforeach; ?>
        <button type="submit">Сохранить изменения</button>
    </form>
</div>

<footer class="footer">
    <p>
        2024 &copy; Popov Ivan MIREA. ALL RIGHTS RESERVED
    </p>
</footer>

</body>
</html>
