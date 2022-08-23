<?php
use App\Routing\Router;
use Controllers\TestController;


//default route
Router::addRoute('GET', '/',[TestController::class,'show'] );


