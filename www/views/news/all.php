<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NEWS</title>
</head>

<div class="header">
    <font size="5" color="black" face="Tahoma">
<h1>Новости</h1>
    </font>
</div>

<style>
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
    .text {
        text-align: center;
    }
    .header {
        text-align:  center;
        font-style: italic;
    }
</style>
<body>
<div class="text">
<?php foreach ($articles as $article) :?>
    <a href="/index.php?ctrl=News&act=One&id=<?php echo $article->id?>"><h2><?php echo $article->header."<br>";?></h2> </a>
    <?php echo $article->created_at . "<br><br><br>"; ?>
<?php endforeach;?>

<br>
<br>
<br>
<br>
</div>
<form action="../../views/add.php" target="_self">
    <button>Добавить новость</button>
</form>
</body>
</html>

