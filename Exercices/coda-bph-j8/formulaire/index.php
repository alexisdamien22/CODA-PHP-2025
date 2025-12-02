<?php
require "config/autoload.php";
$route = new Router;
$route->handleRequest($_GET);