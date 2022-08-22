<?php
require_once('../vendor/autoload.php');

use App\Routing\Router;
use App\HTTP\Request;

//Load .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
try {
    $dotenv->load();
} catch (Exception $e) {
    die("Could not find .env file. Please create it in root.");
}

//Create request
$request = new Request();

//Match route
$route = Router::find($request);

//Echo the output from route closure/callback
if ($route instanceof \Closure) {
    echo $route($request);
} elseif (is_array($route)) {
    try{
        echo call_user_func($route, $request);
    } catch( Exception $e) {
        echo "Could not execute method";
        dd($route);
    }
} else {
    echo $route;
}


//Run callback for route

//Return callback
