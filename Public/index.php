<?php
require_once('../vendor/autoload.php');

use Jenssegers\Blade\Blade;
use App\Routing\Router;
use App\HTTP\Request;

session_start();

//boot things up.
App\App::boot();

//Create request to respond to
$request = new Request();

//Match route and create a call to the closure/callable
$call = Router::makeCall($request);

//@todo create some kind of response. This works for now. 
$call->execute();



