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
