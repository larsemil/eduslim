<?php
use App\Routing\Router;
use Controllers\TestController;

Router::addRoute('GET', '/', function(){
    return "Hello World";
});

Router::addRoute('GET', '/katt', [TestController::class,'show']);
