<?php
namespace Controllers;

use App\HTTP\Request;

class TestController{
    public static function show(Request $request){
        return "Jag är en liten siffra";
    }
}