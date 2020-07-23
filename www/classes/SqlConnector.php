<?php

class SqlConnector
{
    public $res;

    public function __construct()
    {
       $this->res = mysqli_connect('localhost', 'root', '1111', 'News');
    }

    public function queryAll($query, $class = 'stdClass')
    {
        mysqli_real_query($this->res, $query);
        if(!empty(mysqli_error_list($this->res)))
        {
            var_dump(mysqli_error_list($this->res));
            die;
        }
        $result = mysqli_use_result($this->res);
        $array = [];
        while ($row = mysqli_fetch_object($result, $class)) {
            $array[] = $row;
        }
        mysqli_close($this->res);
        return $array;
    }

    public function queryOne($qery, $class = 'stdClass')
    {
        return $this->queryAll($qery, $class)[0];
    }

    public function makeQueryForUpdating($id, $header = '', $text = '')
    {
        if($header != '' && $text != '')
        {
            $query = 'UPDATE all_news SET header = '.$header.', text = '.$text.' WHERE id = '.$id.'';
        }
        elseif($header != '' && $text == '')
        {
            $query = 'UPDATE all_news SET header = '.$header.' WHERE id = '.$id.'';
        }
        elseif($header == '' && $text != '')
        {
            $query = 'UPDATE all_news SET text = '.$text.' WHERE id = '.$id.'';
        } else {
            $query = null;
        }

        return $query;
    }

    public function updateRecords($query)
    {
        if($query === null)
        {
            return false;
        }
        mysqli_real_query($this->res, $query);
        if(!empty(mysqli_error_list($this->res)))
        {
            var_dump(mysqli_error_list($this->res));
            die;
        }
        mysqli_close($this->res);
        return true;
    }

    public function getRecord($query, $class = 'stdClass')
    {

        mysqli_real_query($this->res, $query);
        if(!empty(mysqli_error_list($this->res)))
        {
            var_dump(mysqli_error_list($this->res));
            die;
        }
        $result = mysqli_use_result($this->res);
        $array = [];
        while ($row = mysqli_fetch_object($result, $class)) {
            $array[] = $row;
        }
        mysqli_close($this->res);
        return $array;
    }


    public function sqlExecute($query)
    {
        mysqli_real_query($this->res, $query);
        if(!empty(mysqli_error_list($this->res)))
        {
            var_dump(mysqli_error_list($this->res));
            die;
        }
        mysqli_close($this->res);
        return true;
    }

}