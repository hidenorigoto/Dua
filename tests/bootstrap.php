<?php

spl_autoload_register(function($class)
{
    if (0 === strpos($class, 'Dua\\Test\\')) {
        $file = __DIR__ . '/../tests/' . str_replace('\\', '/', $class) . '.php';
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
    } elseif (0 === strpos($class, 'Dua\\')) {
        $file = __DIR__ . '/../src/' . str_replace('\\', '/', $class) . '.php';
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
    } elseif (0 === strpos($class, 'Symfony\\')) {
        $file = __DIR__ . '/../../symfony/src/' . str_replace('\\', '/', $class) . '.php';
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
    } elseif (0 === strpos($class, 'Net_UserAgent_Mobile')) {
        $file = __DIR__ . '/../../net-useragent-mobile/src/' . str_replace('_', '/', $class) . '.php';
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
    }
});

set_include_path(get_include_path()
    .PATH_SEPARATOR.'/opt/local/lib/php'
    .PATH_SEPARATOR.__DIR__.'/../../net-useragent-mobile/src'
);
