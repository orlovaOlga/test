<?php

class SqlConnector
{
    private $dbh;
    private $calssName = 'stdClass';


    public function __construct()
    {
        try {
            $this->dbh = new PDO('mysql:dbname=News; host:localhost', 'root', '1111');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            throw new E403Exception($e->getMessage(), $e->getCode());
        }
    }

    public function setClassName($className)
    {
        $this->calssName = $className;
    }

    public function query($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->calssName);
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);

    }

}