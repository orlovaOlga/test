<?php

require_once __DIR__ . DIRECTORY_SEPARATOR.'autoload.php';
$articleId = $_GET['id'];
$articles = new News();
$article = ($articles->getArticle($articleId)[0]);
$header = ($article->header);
$text = ($article->text);

//die;
include __DIR__ . DIRECTORY_SEPARATOR;