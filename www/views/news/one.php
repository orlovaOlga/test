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
    <title>Article</title>
</head>
<h1><?php echo $article->header; ?></h1>
<body>
<div><?php echo $article->text; ?></div>
<br>
<a href="../../index.php">Вернуться ко всем новостям</a>
<a href="/index.php?ctrl=Admin&act=Delete&id=<?php echo $article->id ?>">Удалить статью</a>

</body>
</html>
