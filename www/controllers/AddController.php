<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__.'/../autoload.php';

class AddController
{
    public $header;
    public $text;

    public function __construct()
    {

        if (!empty($_POST))
        {
            $this->header = !empty($_POST['header']) ? $_POST['header'] : null;
            $this->text = !empty($_POST['text']) ? $_POST['text'] : null;

            if(!empty($this->header) && !empty($this->text))
            {

                $article = new News();
                $article->insert($this->header, $this->text);
                header("Location: http://localhost:8080/index.php");
            }
        }

    }

}