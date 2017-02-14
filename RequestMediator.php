<?php
require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

define("POST","POST");
define("GET","GET");

class RequestMediator{

    private $url;
    private $httpMethod;
    private $params = array();
    private $logger;

    public function __construct($url, $httpMethod){
        $this->logger = new Logger('name');
        $this->logger->pushHandler(new StreamHandler('php://stdout', Logger::INFO));
        $this->logger->info("Constructing Mediator for {$httpMethod} requests on {$url}");
        $this->url = $url;
        $this->httpMethod = $httpMethod;
    }

    public function call($params){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,$this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if($this->httpMethod==POST){
            $this->setPostParams($params,$ch);
        }

        $server_output = curl_exec ($ch);
        curl_close ($ch);
        return $server_output;
    }
    
    private function setPostParams($params, &$ch){
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
    }

    public static function forPost($url){
        return new RequestMediator($url, POST);
    }
    
    public static function forGet($url){
        return new RequestMediator($url, GET);
    }

}
