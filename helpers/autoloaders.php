<?php

function myLoaders($class_name){
    if(file_exists(CONTROLLERS_FOLDER . $class_name . '.php')) {
        require CONTROLLERS_FOLDER . $class_name . '.php';
    }

    if(file_exists(HELPERS_FOLDER . $class_name . '.php')) {
        require HELPERS_FOLDER . $class_name . '.php';
    }

    if(file_exists(MODELS_FOLDER . $class_name . '.php')) {
        require MODELS_FOLDER . $class_name . '.php';
    }
}

spl_autoload_register('myLoaders'); // Require and Load the classes automatically
?>