<?php

require_once 'application/lib/dev.php';

use application\core\Router;

// Начиная с версии PHP 5.3.0 можно использовать анонимные функции
spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class.'.php');
		// echo $path.'<br>';
		if(file_exists($path)){
			require_once($path);
		}
});

session_start();

$router = new Router;
$router->run();
?>
