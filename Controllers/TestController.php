<?php
namespace Controllers;

use App\HTTP\Request;


class TestController{
    public static function show(Request $request){
        return blade('hello');
    }

    public static function test(Request $request){
        return blade('form');
    }

    public static function store(Request $request){
        return "Tack för din data. ";
    }
}