<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

$controllerClassName = $ctrl . 'Controller';

require_once __DIR__ . '/autoload.php';

try {

    $controller = new $controllerClassName;
    $method = 'action'.$act;
    $controller->$method();
}
catch (E404Exception $e ){
    header('HTTP/1.1 404 Page Not Found');
    $view = new View();
    $view->error = $e->getMessage();
    $view->display('404.html');
  //die('Something went wrong: '. $e->getMessage());
    }





