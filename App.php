<?php

require_once "./Router.php";
require_once "./SimpleMVCRouter.php";

require_once './vendor/mustache/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();

$requestedRoute = $_GET["content"];

$classDefinition = Router::class;
$router = new $classDefinition();
$router->analyzeRoute($requestedRoute);


$navigator = new SimpleMVCRouter();
$navigator->navigate($_SERVER, $router->getCurrentController(), $router->getCurrentAction());