<?php

$url = parse_url($_SERVER['REQUEST_URI'])['path'];
$routes = include base_path("routes.php");

routeTocontroller($url, $routes);
