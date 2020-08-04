<?php
require_once __DIR__.'/../autoload.php';
//require_once __DIR__.'/SqlConnector.php';

abstract class AbstrstractModel implements IModel
{
    protected static $table;
    protected static $class;
    protected $data = [];

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function __get($key)
    {
        return $this->data[$key];
    }

    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    public static function getAll()
    {
        $class = get_called_class();
        $query = 'SELECT id, header, created_at FROM '.static::$table.' ORDER BY created_at DESC';
        try {
            $db = new sqlConnector();
        }
        catch (PDOException $e) {

            throw new E403Exception($e->getMessage(), 403);
        }

        $db->setClassName($class);
        return $db->query($query);
    }

    public static function getOne($id)
    {
        $db = new sqlConnector();
        $query = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $res = $db->query($query, [':id'=> $id ]);
        return $res[0] ;
    }

    protected function insert()
    {

        $cols = array_keys($this->data);
        $data = [];
        foreach($cols as $col){
            $data[':' . $col] = $this->data[$col];
        }
        $query = 'INSERT INTO '.static::$table. '
        (' .implode(', ', $cols). ') 
        VALUES (' .implode(', ', array_keys($data)). ')
        ';

        $db = new SqlConnector();
        return $db->execute($query, $data);

    }

    public function delete()
    {
        $db = new sqlConnector();
        $query = 'DELETE FROM ' .static::$table . ' WHERE id=:id';
        try {
            return $db->execute($query, [':id'=> $this->id ]);
        }
        catch (PDOException $e){
            throw new E403Exception($e->getMessage(), 403);
        }

    }

    public static function findByColumn($column, $value)
    {
        $class = get_called_class();
        $db = new sqlConnector();
        $db->setClassName($class);
        $query = 'SELECT * FROM ' .static::$table. ' WHERE ' .$column.'=:value';
        try {
            $res =  $db->query($query, [':value'=> $value ]);
        }
        catch (PDOException $e) {
            throw new E403Exception($e->getMessage(), 403);
        }

        if(empty($res)){

            throw new E404Exception("статья не найдена");

        } else {
                return $res[0];
        }

    }

    protected function update()
    {
        $cols = [];
        $data = [];
        foreach($this->data as $k => $v){
            $data[':' . $k] = $v;
            if($k == 'id'){
                continue;
            }
            $cols[] = $k . '=:' . $k;

        }
        $query = 'UPDATE '.static::$table. '
        SET ' .implode(', ' , $cols) .
        ' WHERE id=:id';
        $db = new sqlConnector();
        return $db->execute($query, $data);

    }

    public function save()
    {
        $id = isset($this->data['id']) ? $this->data['id'] : null;

        if($id == null){
            try {
                $this->insert();
            }
            catch (PDOException $e){
                throw new E403Exception($e->getMessage(), 403);
            }

        } else {
            try {
                $this->update();
            }
            catch (PDOException $e) {
            throw new E403Exception($e->getMessage(), 403);
            }
        }
    }
}