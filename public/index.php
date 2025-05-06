<?php

use core\Router;

require_once __DIR__ . '/../core/Router.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Access-Control-Allow-Origin: *");

Router::route();
?>