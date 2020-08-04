<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Изменить статью</title>
</head>
<style>
    body {
        background: #d0e9fa; /* Цвет фона */
        color: #100909; /* Цвет текста */
    }
    a {
        color: #000000; /* Цвет текста */
        padding: 2px; /* Поля вокруг текста */
        text-decoration: none;
    }
    a:hover {
        color: #ffffff; /* Цвет текста */
    }
    .text {
        text-align: center;
    }
    input[type=text] {
        height: 30px;
    }
    p {
        font-style: italic;
    }

</style>
<body>
<div class="text">
<form action="/index.php?ctrl=Admin&act=Update&id=<?php echo $article->id ?>" method="post">
    <p><b>Заголовок</b></p>
    <p><textarea name="header" cols="140" rows="3">
    <?php echo $article->header; ?>
   </textarea></p>
    <br>
<p><b>Текст</b></p>
    <p><textarea name="text" cols="140" rows="40">
    <?php echo $article->text; ?>
   </textarea></p>
    <input type="submit">
</form>
</div>
<a href="../../index.php"><h3>Отменить изменнения и вернуться ко всем новостям</h3></a>
</body>
</html>