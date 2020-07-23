<?php
require __DIR__ . DIRECTORY_SEPARATOR;

abstract class Article
{
    public $header;
    public $text;
    public $connector;

    public function __construct()
    {
        $this->connector = new SqlConnector();
    }

   public function getAllNews()
   {
       return $this->connector->queryAll();
   }

   public function insert($header, $text)
   {
       return $this->connector->insertIntoTable($header, $text);
   }

   public function getArticle($id)
   {
       $query = 'SELECT (header), (text) FROM all_news WHERE id='.$id.'';
       return $this->connector->getRecord($query);

   }

   public function deleteArticle($id)
    {
        $query = 'DELETE FROM all_news WHERE id='.$id.'';
        return $this->connector->sqlExecute($query);
    }

    public function insertIntoTable($header, $text)
    {
        $query = 'INSERT INTO all_news (header, text) VALUES ("'.$header.'", "'.$text.'")';
        return $this->connector->sqlExecute($query);
    }


}