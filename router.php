<?php

require 'config.php'; // Import the configuration file
require HELPERS_FOLDER . 'autoloaders.php'; // Auto Load the file necessary for class and method

$url = $_SERVER['REQUEST_URI']; // Get the url solicited
$urlClean = str_replace(BASE_PATH,'',$url); // Clear the url solicited (remove the main path)
$urlArray = explode('/', $urlClean); // Divide the $urlClean by the Slash

if (isset($urlArray[0]) && $urlArray[0] != '' && isset($urlArray[1]) && $urlArray[1] != '') {
    $controller = $urlArray[0] . 'Controller';
    $action = $urlArray[1];
} else {
    echo '<h1>Endereço da API inválido</h1>';
    die;
}

if(file_exists(CONTROLLERS_FOLDER . $controller . '.php')){
    $obj = new $controller();
    if(method_exists($obj, $action)){
        $obj->$action();
        die;
    }
}

echo '<h1> Endereço da API inválido </h1>';

?>