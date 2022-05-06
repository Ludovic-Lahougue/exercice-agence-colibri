<?php
session_start();

use App\router\{Request, Response};
use App\controller\FrontController;

require_once 'src/Autoloader.php';
Autoloader::register();

$server = $_SERVER;

$request = new Request($_GET, $_POST, $server);
$response = new Response();
$router = new FrontController($request, $response);
$router->execute();
