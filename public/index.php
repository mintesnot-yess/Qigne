<?php
const BASE_PASE = __DIR__ . '/../';
session_start();

include BASE_PASE . "Core/function.php";

spl_autoload_register(function ($class) {

    include  base_path('Core/' . $class . '.php');
});


include  base_path("Core/Router.php");