<?php

function myLoaders($class_name){
    if(file_exists(CONTROLLERS_FOLDER . $class_name . '.php')) {
        require CONTROLLERS_FOLDER . $class_name . '.php';
    }
}

spl_autoload_register('myLoaders'); // Require and Load the classes automatically
?>