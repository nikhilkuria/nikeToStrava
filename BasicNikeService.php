<?php

/**
 * Created by PhpStorm.
 * User: nikhilkuria
 * Date: 11/02/17
 * Time: 5:52 AM
 */

define("LOGIN","https://developer.nike.com/services/login");
define("SUMMARY","https://api.nike.com/v1/me/sport");

require('NikeService.php');
require('BasicService.php');

class BasicNikeService extends BasicService implements NikeService
{
    private $accessToken;

    public function login($userName, $passWord) : string
    {
        $mediator = $this->getPostMediator(LOGIN);
        $params = array();
        $params['username'] = $userName;
        $params['password'] = $passWord;

        $response = $mediator->call($params);
        $responseDecoded = json_decode($response,true);
        $this->accessToken = $responseDecoded["access_token"];
        return $this->accessToken;
    }

    public function getSummary() : array
    {
        $mediator = $this->getGetMediator($this->addTokenParam(SUMMARY));
        $response = $mediator->call(array());
        $responseDecoded = json_decode($response, true);
        return $responseDecoded;
    }

    private function addTokenParam($url){
        return $url
            .'?access_token='
            .$this->accessToken;
    }

    public static function createWithCredentials($userName, $passWord){
        $nikeService = new BasicNikeService();
        $nikeService->login($userName,$passWord);
        return $nikeService;
    }

    public static function create(){
        return new BasicNikeService();
    }
}