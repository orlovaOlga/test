<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'autoload.php';

if (!empty($_POST))
{
    $data = [];
    $data['header'] = !empty($_POST['header']) ? $_POST['header'] : null;
    $data['text'] = !empty($_POST['text']) ? $_POST['text'] : null;

   if(!empty($data['header']) && !empty($data['text']))
   {
       $article = new News();
       $article->insert($data['header'], $data['text']);
       header("Location: http://localhost:8080/index.php");
   }
}