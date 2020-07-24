<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NEWS</title>
</head>
<body>

<?php foreach ($articles as $article) :?>
    <a href="/index.php?ctrl=News&act=One&id=<?php echo $article->id?>"><h3><?php echo $article->header."<br>";?></h3> </a>
    <?php echo $article->created_at . "<br>"; ?>
<?php endforeach;?>

<br>
<br>
<br>
<br>

<a href="views/add.php">Добавить новость</a>
</body>
</html>

