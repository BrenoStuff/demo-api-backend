<?php

require('config.php');

echo "Abriu o Router.php com sucesso! <br/>";

$url = $_SERVER['REQUEST_URI'];

echo BASE_PATH . '<br/>';
echo $url;

?>