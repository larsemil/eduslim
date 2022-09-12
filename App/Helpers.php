<?php

use App\App;

/**
 * blade helper function
 *
 * @param  mixed $name
 * @param  mixed $data
 * @return string
 */
function blade($name, $data = [])
{
    
    try {
        return App::$blade->make($name, $data);
    } catch (\Exception $e) {
        die("Could not load view: " . $name);
    }
}

/**
 * routeNotFound
 *
 * @return void
 */
function routeNotFound(){
    //@todo fix better 404 handling;
    die("Page not found");

}

/**
 * redirect
 * Redirects to chosen url
 *
 * @param  mixed $url
 * @return void
 */
function redirect($url)
{
    if (strpos($url, 'http') !== false) {
        header('location: '.$url);
    } else {
        header('location: ' .url($url));
    }
}

/**
 * url
 * Generate an internal url using base URL
 * If url contains http or https only return url
 * @param  mixed $url
 * @return string
 */
function url($url){
    if (strpos($url, 'http') !== false) {
        return $url;
    }
    return $_ENV['BASE_URL'] . $url;
}


/**
 * now
 * returns current timestamp as year-month-day hour:minute:seconds
 *
 * @return void
 */
function now(){
    return date("Y-m-d H:i:s");
}
