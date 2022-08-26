<?php
namespace Controllers;

use App\HTTP\Request;
use Models\User;


class TestController{
    public static function show(Request $request){
        return blade('hello');
    }

    public static function test(Request $request){
        dd(User::all());
        
        return blade('form');
    }

    public static function store(Request $request){
        return "Tack för din data. ";
    }
}