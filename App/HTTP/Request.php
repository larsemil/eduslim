<?php
namespace App\HTTP;
use Scheme;


class Request{
    protected $url = '';
    protected $base_url = '';
    protected $protocol = '';
    protected $path = '';
    protected $method = '';

    protected $headers = [];
    public function __construct()
    {

        // Get full URL
        $url ="//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        $this->url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );

        // Get protocol
        $this->protocol = Protocol::get();

        $this->base_url = substr(str_replace($this->protocol, '', $_ENV['BASE_URL']),1);
        $this->path = str_replace($this->base_url,'', $this->url);

        $this->method = $_SERVER['REQUEST_METHOD'];

        $this->headers = getallheaders();

        return $this;
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
}