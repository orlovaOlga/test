<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!doctype html>
<html lang="en">
<head>
   <div class="text"> <h1>Последние ошибки</h1> </div>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logs</title>
</head>
<style>
    .text {
        text-align: center;
    }
</style>
<body>
<?php foreach ($logs as $log): ?>
<ul>
   <li> <?php echo $log; "<br> <br>" ?> </li>
</ul>
<?php endforeach; ?>
</body>
</html>