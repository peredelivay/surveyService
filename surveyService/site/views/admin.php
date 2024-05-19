<?php
// views/admin.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../web/css/style.css">
    <title>Администрирование опросов</title>
</head>
<body>

<header>
    <h1>Администрирование опросов</h1>
    <nav>
        <a href="/">Главная страница</a>
        <a href="/surveys">Все опросы</a>
        <a href="/about">О сайте</a>
    </nav>
</header>

<div class="survey-block">
    <table border="1" class="survey-table">
        <tr>
            <th>Название опроса</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($surveys as $survey): ?>
            <tr>
                <td><?php echo htmlspecialchars($survey['title']); ?></td>
                <td>
                    <form method="post" action="/admin/edit" style="display:inline;">
                        <input type="hidden" name="survey_id" value="<?php echo $survey['id']; ?>">
                        <button type="submit">Изменить</button>
                    </form>
                    <form method="post" action="/admin/delete" style="display:inline;">
                        <input type="hidden" name="survey_id" value="<?php echo $survey['id']; ?>">
                        <button type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<footer class="footer">
    <p>
        2024 &copy; Popov Ivan MIREA. ALL RIGHTS RESERVED
    </p>
</footer>

</body>
</html>
