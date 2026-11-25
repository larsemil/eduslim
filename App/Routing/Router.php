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
        $methodRoutes = self::$routes[$request->getMethod()] ?? [];

        //Exact match (eg. /movies)
        if (isset($methodRoutes[$request->getPath()])) {
            return new Call($methodRoutes[$request->getPath()], $request);
        }

        //Fall back to routes with dynamic segments (eg. /movies/{id})
        foreach ($methodRoutes as $path => $resolver) {
            $params = self::matchDynamicRoute($path, $request->getPath());

            if ($params !== null) {
                $request->setParams($params);
                return new Call($resolver, $request);
            }
        }

        routeNotFound();
        return;
    }

    /**
     * matchDynamicRoute
     * Matches a registered route path (eg. /movies/{id}) against the
     * requested path, returning the matched params or null if no match.
     *
     * @param  string $routePath
     * @param  string $requestPath
     * @return array|null
     */
    private static function matchDynamicRoute(string $routePath, string $requestPath){
        if (strpos($routePath, '{') === false) {
            return null;
        }

        $pattern = preg_replace('#\{([a-zA-Z_][a-zA-Z0-9_]*)\}#', '(?P<$1>[^/]+)', $routePath);

        if (!preg_match('#^' . $pattern . '$#', $requestPath, $matches)) {
            return null;
        }

        return array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
    }

    
}