<?php
use App\App;

function blade($name, $data){

    try{
   return App::$blade->make($name, $data);
    } catch(\Exception $e){
        die("Could not load view: ".$name);
    }
}