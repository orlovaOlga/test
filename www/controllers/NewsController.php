<?php

require_once __DIR__.'/../autoload.php';
require_once __DIR__.'/../classes/SqlConnector.php';

class NewsController
{

    public function actionAll()
    {
        $articles = News::getAll();
        include __DIR__.'/../views/news/all.php';
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $article = News::getOne($id);
        include __DIR__.DIRECTORY_SEPARATOR.'../views/news/one.php';
    }


}