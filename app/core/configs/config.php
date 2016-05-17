<?php

if (getenv('APP_ENV')) {
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

define('DS', DIRECTORY_SEPARATOR);
define('__ROOT__', dirname(dirname(dirname(__DIR__))) . DS);
define('DIR_TO_PAGES', __ROOT__ . 'pages' . DS);
define('TEMPLATE_EXTENSION', '.phtml');