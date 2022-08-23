<?php

namespace App;

use Jenssegers\Blade\Blade;


class App
{
    public static $blade;

    public static function boot()
    {

        //Whoops error handler
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();

        //Load .env file
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
        try {
            $dotenv->load();
        } catch (\Exception $e) {
            die("Could not find .env file. Please create it in root.");
        }


        //initialize blade
        self::$blade = new Blade('../Views', '../cache');
    }
}
