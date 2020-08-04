<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "../../autoload.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $article->header; ?></title>
</head>
<form action="../../index.php" target="_self">
    <button>Вернуться ко всем новостям</button>
</form>
<div class="header">
<h1><?php echo $article->header; ?></h1>
</div>
<body>
<style>
    .b1 {
        background: #a2a2dc; /* Синий цвет фона */
        color: black; /* Белые буквы */
        font-size: 10pt; /* Размер шрифта в пунктах */
    }
    body {
        background: #d0e9fa;
        color: #100909;
    }
    a {
        color: #000000;
        padding: 2px;
        transition: 1s linear;
        text-decoration: none;
    }
    a:hover {
        color: #ffffff;
    }

    .header {
        text-align:  center;
        font-style: italic;
    }
    .form {
        text-align: ;
    }
</style>
<div><?php echo $article->text; ?></div>
<br>
<br>
<br>

<!--<form action="../../index.php?ctrl=Admin&act=Delete&id=<?php /*echo $article->id */?>" class="text"  target="_self">
    <button class="b1">Удалить статью</button>
</form>
<br>

<div class="form">
<form action="../../index.php?ctrl=Admin&act=UpdateForm&id=<?php /*echo $article->id */?>" class="text" target="_self">
    <button class="b1">Изменить статью</button>
</form>-->

<!--<a href="../../index.php">Вернуться ко всем новостям</a>-->
<a href="/index.php?ctrl=Admin&act=Delete&id=<?php echo $article->id ?>">Удалить статью</a>
<a href="/index.php?ctrl=Admin&act=UpdateForm&id=<?php echo $article->id ?>">Изменить статью</a>
</body>
</html>
