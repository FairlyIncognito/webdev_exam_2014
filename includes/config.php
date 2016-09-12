<?php
define("ROOT", __DIR__ . "/");
define("HTTP", ($_SERVER["SERVER_NAME"] == "localhost")
    ? "http://localhost:8888/"
    : "http://xmir19.wi9.sde.dk/"
);
$http = rtrim(HTTP, '/');

// URI to array
$uri = explode("/", $_SERVER['REQUEST_URI']);

foreach ($uri as $key => $value) {
    unset($uri[$key]);
    if ($value == '') {
        break;
    }
}
$uri = array_values($uri);

$httpMethod = $_SERVER['REQUEST_METHOD'];

// Database information
$host = 'xmir19.wi9.sde.dk';
$database = 'xmir19_wi9_sde_dk';
$user = 'xmir19.wi9';
$password = 'yk452pqp';