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

<form action="../index.php" target="_self">
    <button>На главную</button>
</form>
<div class="text">
<form action="../index.php?ctrl=Admin&act=Add" method="post">
    <p><b>Заголовок</b></p>
    <input type="text" autocomplete="off" id="header" name="header" size="148" >
    <br>
    <p><b>Текст статьи</b></p>
    <p><textarea rows="40" cols="140" name="text"></textarea></p>
    <br>
    <input type="submit">
</form>
</div>

</body>
</html>