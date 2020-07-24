<?php
require_once __DIR__.'/../classes/AbstrstractModel.php';

class News extends AbstrstractModel
{

    public $id;
    public $header;
    public $text;
    public $createdAt;
    protected static $table = 'all_news';
    protected static $class = 'News';



}