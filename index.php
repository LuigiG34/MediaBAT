<?php

// use Autololoader & Router to start the App
use App\Core\Router;
use Autoloader\Autoloader;

// Define URL at project base
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));

// Get Autoloader
require_once './Autoloader.php';
Autoloader::register();

// instantiate Router
$app = new Router();

// Start the app
$app->start();