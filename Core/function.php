<?php

function base_path($path)
{
    return BASE_PASE . $path;
}

function assets($path)
{
    return base_path("assets/" . $path);
}

function views($path, $attiributes = [])
{
    extract($attiributes);
    return base_path('views/' . $path);
}

function routeTocontroller($url, $routes)
{
    if (array_key_exists($url, $routes)) {
        include base_path($routes[$url]);
    } else {
        include views("404.php");

    }
}
function dd($url)
{
    echo '<pre>';
    var_dump($url);
}