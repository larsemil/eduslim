<?php

namespace App;

use RyanChandler\Blade\Blade;
use Illuminate\Database\Capsule\Manager as Capsule;


/**
 * App
 * Main application class.
 */
class App
{
    public static $blade;
    
    /**
     * boot
     *
     * @return void
     */
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


        //initialize Eloquent
        if(isset($_ENV['ENABLE_DB']) && $_ENV['ENABLE_DB'] ){
            $capsule = new Capsule;
            $capsule->addConnection([
                'driver'   => $_ENV['DB_DRIVER'],
                'host'     => $_ENV['DB_HOST'],
                'database' => $_ENV['DB_DATABASE'],
                'username' => $_ENV['DB_USERNAME'],
                'password' => $_ENV['DB_PASSWORD'],
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'   => $_ENV['DB_PREFIX'],
                ]);

                $capsule->setAsGlobal();

                $capsule->bootEloquent();

        }
        
        

        //initialize blade
        self::$blade = new Blade('../Views', '../cache');
    }
}
