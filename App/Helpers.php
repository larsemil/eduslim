<?php

use App\App;

function blade($name, $data = [])
{
    
    try {
        return App::$blade->make($name, $data);
    } catch (\Exception $e) {
        die("Could not load view: " . $name);
    }
}

function routeNotFound(){
    //@todo fix better 404 handling;
    die("Page not found");

}
