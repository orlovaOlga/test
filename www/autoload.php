<?php

$autoload = function($class)
{
    if(file_exists(__DIR__ . '/controllers/' . $class . '.php'))
    {
        require_once __DIR__ . '/controllers/' . $class . '.php';

    } elseif(file_exists(__DIR__ . '/models/'. $class . '.php')) {

        require_once __DIR__ . '/models/' . $class . '.php';

    } elseif(file_exists(__DIR__ . '/classes/SqlConnector.php')) {

        require_once __DIR__ . '/classes/SqlConnector.php';

    } elseif(file_exists(__DIR__ . '/classes/AbstrstractModel.php')) {

        require_once __DIR__ . '/classes/AbstrstractModel.php';

    } elseif(file_exists(__DIR__ . '/controllers/AddController.php')) {

        require_once __DIR__ . '/controllers/AddController.php';
    }
};

spl_autoload_register($autoload);