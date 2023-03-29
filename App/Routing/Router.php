<?php namespace App\Routing;

use App\Call;
use App\HTTP\Request;

//Load routes
require_once('../Routes.php');

/**
 * Router
 * Router class for handling of routes
 */
class Router{

    private static $routes = [];
    
    /**
     * addRoute
     *
     * @param  mixed $method
     * @param  mixed $path
     * @param  mixed $resolver
     * @return void
     */
    public static function addRoute(string $method, string $path, $resolver){
        self::$routes[$method][$path] = $resolver;
    }
    
    /**
     * get
     * Shorthand method for addRoute for GET request
     *
     * @param  mixed $path
     * @param  mixed $resolver
     * @return void
     */
    public static function get(string $path, $resolver){
        self::addRoute('GET', $path, $resolver);
    }

    /**
     * post
     * Shorthand method for addRoute for POST request
     *
     * @param  mixed $path
     * @param  mixed $resolver
     * @return void
     */
    public static function post(string $path, $resolver){
        self::addRoute('POST', $path, $resolver);
    }

    
    
    /**
     * getRoutes
     *
     * @param  mixed $method
     * @return array
     */
    public static function getRoutes(string $method = 'GET'){
        return self::$routes[$method];
    }
    
    /**
     * makeCall
     *
     * @param  mixed $request
     * @return Call
     */
    public static function makeCall(Request $request){
        $route = isset(self::$routes[$request->getMethod()][$request->getPath()]) ?
        self::$routes[$request->getMethod()][$request->getPath()] : null;;

        if(!$route){
            routeNotFound();
            return;
        }

        return new Call($route, $request);
    }

    
}