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
        $this->logger->pushHandler(new StreamHandler('php://stdout', Logger::INFO));
        $this->logger->info("Constructing Mediator for {$httpMethod} requests on {$url}");
        $this->url = $url;
        $this->httpMethod = $httpMethod;
    }

    public function call($params){
        $paramString = implode(",",$params);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,$this->url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$paramString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);
        print($server_output);
        curl_close ($ch);

    }

    public static function forPost($url){
        return new RequestMediator($url, "POST");
    }

}
