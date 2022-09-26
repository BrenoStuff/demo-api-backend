<?php

require 'config.php'; // Import the configuration file
require HELPERS_FOLDER . 'autoloaders.php'; // Auto Load the file necessary for class and method

$route = new Router();
$route->handleCORS();
$route->gateKeeper();

$output = new Output();
$output->notFound();

?>