<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="web/css/style.css">
    <title>Main page</title>
</head>
<body>

<header>
    <h1>Сайт опросов</h1>
    <nav>
        <a href="/">Главная страница</a>
        <a href="/surveys">Все опросы</a>
        <a href="/about">О сайте</a>
    </nav>
</header>

<div class="survey-block">
    <div class="surveys">
        <?php foreach ($surveys as $survey): ?>
            <div class="survey-card">
                <h3><?php echo htmlspecialchars($survey['title']); ?></h3>
                <a href="/survey/<?php echo $survey['id']; ?>">Пройти опрос</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<footer class="footer">
        <p>
            2022 &copy; Popov Ivan MIREA. ALL RIGHTS RESERVED
        </p>
    </footer>
</body>

</html>