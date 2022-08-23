<?php

namespace App;

use App\HTTP\Request;

/**
 * Call
 * Class to handle the call to the route content
 */
class Call
{

    protected $callable;
    protected $request;
    
    /**
     * __construct
     *
     * @param  mixed $callable
     * @param  Request $request
     * @return void
     */
    public function __construct($callable, Request $request)
    {
        if (!$callable) {
            throw new \Exception("Callable is null. ");
        }
        $this->callable = $callable;
        $this->request = $request;
    }

    
    /**
     * execute
     *
     * @return void
     */
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
