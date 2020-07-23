<?php
require_once __DIR__.DIRECTORY_SEPARATOR."models".DIRECTORY_SEPARATOR."news.php";
require_once __DIR__ . DIRECTORY_SEPARATOR;
require_once __DIR__.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'News.php';
$articleId = $_GET['id'];
$news = new News();
$news->deleteArticle($articleId);
include __DIR__.DIRECTORY_SEPARATOR.'views/delete.php';