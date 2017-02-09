<?php
require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class RequestMediator{
    
    private $url;
    private $httpMethod;
    private $params = array();
    private $logger;
    
    public function __construct($url, $httpMethod){
        $this->logger = new Logger('name');
        $this->logger->pushHandler(new StreamHandler('php://stdout', Logger::WARNING));
        $this->logger->warning('Foo');
        $this->url = $url;
        $this->httpMethod = $httpMethod;
    }
    
    public static function forPost($url){
        return new RequestMediator($url, "POST");
    }
    
}