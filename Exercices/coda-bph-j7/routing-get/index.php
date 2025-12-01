<?php
require "config/autoload.php";
require "config/Router.php";
$router = new Router;
$router->handleRequest($_GET);