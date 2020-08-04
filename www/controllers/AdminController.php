<?php
require_once __DIR__.'/../autoload.php';
require_once __DIR__.'/../classes/SqlConnector.php';
require_once __DIR__.'/../classes/View.php';

class AdminController extends AbstrstractModel
{
    public function actionForm()
    {
        $form = new View();
        $form->display('add.php');
    }

    public function actionAdd()
    {

        $header = !empty($_POST['header']) ? $_POST['header'] : null;
        $text = !empty($_POST['text']) ? $_POST['text'] : null;

        if(empty ($header) || empty($text)){

            throw new E404Exception('статья не была добавлена. Заголовок и текст не могут быть пустыми');
        } else {

            $news = new NewsModel();
            $news->header = $header;
            $news->text = $text;
            try {
                $news->save();
            }
            catch (E403Exception $e) {

                header("HTTP/1.1 {$e->getCode()} Connection to database failed");
                $view = new View();
                $view->error = $e->getMessage();
                $view->display($e->getCode() .'.html');
                die;
            }

            header("Location: http://localhost:8080/index.php");
        }
    }


    public function actionDelete()
    {
        $news = new NewsModel();
        $news->id = $_GET['id'];

        try {
            $news->delete();
        }
        catch (E403Exception $e) {
            header("HTTP/1.1 {$e->getCode()} Connection to database failed");
            $view = new View();
            $view->error = $e->getMessage();
            $view->display($e->getCode() .'.html');
            die;
        }

        header("Location: http://localhost:8080/index.php");
    }

    public function actionUpdateForm()
    {
        $id = $_GET['id'];
        $article = News::getOne($id);
        $view = new View();
        $view->article = $article;
        $view->display('update.php');
    }

    public function actionUpdate()
    {

        $id = $_GET['id'];
        $header = $_POST['header'];
        $text = $_POST['text'];
        if(empty ($header) || empty($text)){

            throw new E404Exception('статья не была добавлена. Заголовок и текст не могут быть пустыми');

        } else {

            $news = new NewsModel();
            $news->header = trim($header);
            $news->text = trim($text);
            $news->id = $id;

            try {
                $news->save();
            }
            catch (E403Exception $e) {
                header("HTTP/1.1 {$e->getCode()} Connection to database failed");
                $view = new View();
                $view->error = $e->getMessage();
                $view->display($e->getCode() .'.html');
                die;
            }

            header("Location: http://localhost:8080/index.php");
        }

    }

}