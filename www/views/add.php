<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add new post</title>
</head>
<body>
<form action="/index.php?ctrl=News&act=Add" method="post">
    <p><b>Заголовок</b></p>
    <input type="text" id="header" name="header">
    <br>
    <p><b>Текст статьи</b></p>
    <p><textarea name="text"></textarea></p>
    <br>
    <input type="submit">
</form>

<a href="../index.php">На главную</a>
</body>
</html>