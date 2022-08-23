<?php

namespace App;

use App\HTTP\Request;

class Call
{

    protected $callable;
    protected $request;

    public function __construct($callable, Request $request)
    {
        if (!$callable) {
            throw new \Exception("Callable is null. ");
        }
        $this->callable = $callable;
        $this->request = $request;
    }


    public function execute()
    {
        $call = $this->callable;
        //Echo the output from route closure/callback
        if ($call instanceof \Closure) {
            echo $call($this->request);
        } elseif (is_array($call)) {

            echo call_user_func($call, $this->request);
        } else {
            echo $call;
        }
    }
}
