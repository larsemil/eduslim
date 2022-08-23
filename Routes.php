<?php
use App\Routing\Router;
use Controllers\TestController;


//default route
Router::addRoute('GET', '/',[TestController::class,'show'] );

Router::addRoute('GET','/test', [TestController::class, 'test']);
Router::addRoute('POST', '/test', [TestController::class,'store']);
