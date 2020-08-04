<?php

$autoload = function($class)
{
    if(file_exists(__DIR__ . '/controllers/' . $class . '.php'))
    {
        require_once __DIR__ . '/controllers/' . $class . '.php';

    } elseif(file_exists(__DIR__ . '/models/'. $class . '.php')) {

        require_once __DIR__ . '/models/' . $class . '.php';

    } elseif(file_exists(__DIR__ . DIRECTORY_SEPARATOR .  'classes'. DIRECTORY_SEPARATOR . $class . '.php')) {

        require_once __DIR__ . DIRECTORY_SEPARATOR . 'classes'.DIRECTORY_SEPARATOR . $class . '.php';

    } elseif (file_exists(__DIR__ . '/exceptions/' . $class . '.php')) {

        require_once __DIR__ . DIRECTORY_SEPARATOR. 'exceptions' .DIRECTORY_SEPARATOR . $class . '.php';
    }
};

spl_autoload_register($autoload);