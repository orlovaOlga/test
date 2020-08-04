<?php

require_once __DIR__.'/../autoload.php';
require_once __DIR__.'/../classes/SqlConnector.php';
require_once __DIR__ . '/../classes/View.php';


class NewsController
{

    public function actionAll()
    {
        $articles = News::getAll();
        $view = new View();
        $view->articles = $articles;
        $view->render('news/all.php');
        $view->display('news/all.php');

    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $article = News::findByColumn('id', $id);
        $view = new View();
        $view->article = $article;
        $view->display('news/one.php');

     /*   $id = $_GET['id'];
        $article = News::getOne($id);
        $view = new View();
        $view->article = $article;
        $view->display('news/one.php');*/

    }
}