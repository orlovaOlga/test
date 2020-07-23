<?php
require_once __DIR__.'/../autoload.php';

abstract class AbstrstractModel
{
    protected static $table;
    protected static $class;

    public static function getAll()
    {
        $db = new sqlConnector();
        $query = 'SELECT id, header, created_at FROM '.static::$table.' ORDER BY created_at DESC';
        return $db->queryAll($query, static::$class);
    }


    public static function getOne($id)
    {
        $db = new sqlConnector();
        $query = 'SELECT * FROM ' . static::$table . ' WHERE id='.$id.'';
        return $db->queryOne($query, static::$class);
    }

    public static function insert($header, $text)
    {
        $db = new SqlConnector();
        $query = 'INSERT INTO '.static::$table.'(header, text) VALUES ("'.$header.'", "'.$text.'")';
        return $db->sqlExecute($query);
    }

}