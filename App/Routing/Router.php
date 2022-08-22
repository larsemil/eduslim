<?php namespace App\Routing;

use App\Call;
use App\HTTP\Request;

//Load routes
require_once('../Routes.php');

class Router{

    private static $routes = [];

    public static function addRoute(string $method, string $path, $resolver){
        self::$routes[$method][$path] = $resolver;
    }

    public static function getRoutes(string $method = 'GET'){
        return self::$routes[$method];
    }

    public static function makeCall(Request $request){
        return new Call(isset(self::$routes[$request->getMethod()][$request->getPath()]) ?
        self::$routes[$request->getMethod()][$request->getPath()] : null, $request);
       
    }

    
}