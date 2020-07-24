<?php
require_once __DIR__.'/../autoload.php';
require_once __DIR__.'/../classes/SqlConnector.php';

class AdminController
{
    public function actionAdd()
    {

        if (!empty($_POST)){
            $header = !empty($_POST['header']) ? $_POST['header'] : null;
            $text = !empty($_POST['text']) ? $_POST['text'] : null;

            if(!empty($header) && !empty($text)){
                $article = new News();
                $article->insert($header, $text);
                header("Location: http://localhost:8080/index.php");
            }
        }
    }

    public function actionDelete()
    {
        $id = $_GET['id'];
        $db = new sqlConnector();
        $query = 'DELETE FROM all_news WHERE id='.$id.'';
        $db->sqlExecute($query);
        header("Location: http://localhost:8080/index.php");
    }

}