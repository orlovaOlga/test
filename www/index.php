<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

$controllerClassName = $ctrl . 'Controller';

require_once __DIR__ . '/autoload.php';

/*$c = new AdminController();
($c->actionGetLogs());*/
try {

    $controller = new $controllerClassName;
    $method = 'action'.$act;
    $controller->$method();
}
catch (E404Exception $e ) {
    header('HTTP/1.1 '. $e->getCode() .' Page Not Found');
    $log = new Logs($e->getMessage(), $e->getCode(), 1 , $e->getFile(), $e->getLine());
   // var_dump($log); die;
    $log->writeInLogFile();
    $view = new View();
    $view->error = $e->getMessage();
    $view->display( $e->getCode() .'.html');

    }

catch (E403Exception $e) {
    header("HTTP/1.1 {$e->getCode()} Connection to database failed");
    $log = new Logs($e->getMessage(), $e->getCode(), 1 , $e->getFile(), $e->getLine());
    $log->writeInLogFile();
    $view = new View();
    $view->error = $e->getMessage();
    $view->display($e->getCode() .'.html');
    die;
}





