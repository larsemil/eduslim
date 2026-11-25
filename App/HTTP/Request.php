<?php
namespace App\HTTP;

class Request{
    protected $url = '';
    protected $base_url = '';
    protected $protocol = '';
    protected $path = '';
    protected $method = '';

    protected $headers = [];
    protected $params = [];
    public function __construct()
    {

        // Get full URL
        $url ="//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        $this->url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
        $this->url = explode('?',$this->url)[0];
        
        // Get protocol
        $this->protocol = Protocol::get();

        $this->base_url = substr(str_replace($this->protocol, '', $_ENV['BASE_URL']),1);
        $this->path = $this->checkPath();

        $this->method = $_SERVER['REQUEST_METHOD'];

        $this->headers = getallheaders();

        return $this;
    }

    public function checkPath(){
        //@todo: fix placeholder urls (eg. /pages/{title})
        return str_replace($this->base_url,'', $this->url);
    }

    public function getUrl(){
        return $this->url;
    }

    public function getBaseUrl(){
        return $this->base_url;
    }

    public function getProtocol(){
        return $this->protocol;
    }
    
    public function getPath(){
        return $this->path;
    }

    public function getHeaders(){
        return $this->headers;
    }

    public function getMethod(){
        return $this->method;
    }

    /**
     * setParams
     * Sets the params matched from a dynamic route (eg. /movies/{id})
     *
     * @param  array $params
     * @return void
     */
    public function setParams(array $params){
        $this->params = $params;
    }

    /**
     * getParam
     * Get a single param matched from a dynamic route, or $default if not set
     *
     * @param  string $key
     * @param  mixed $default
     * @return mixed
     */
    public function getParam(string $key, $default = null){
        return $this->params[$key] ?? $default;
    }

    /**
     * getParams
     *
     * @return array
     */
    public function getParams(){
        return $this->params;
    }
}