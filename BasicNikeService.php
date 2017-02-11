<?php

/**
 * Created by PhpStorm.
 * User: nikhilkuria
 * Date: 11/02/17
 * Time: 5:52 AM
 */

define("LOGIN","https://developer.nike.com/services/login");

require('NikeService.php');
require('RequestMediator.php');

class BasicNikeService implements NikeService
{

    public function login($userName, $passWord): string
    {
        $mediator = RequestMediator::forPost(LOGIN);
        $params = array();
        $params['username'] = $userName;
        $params['password'] = $passWord;

        $response = $mediator->call($params);

        $responseDecoded = json_decode($response,true);
        return $responseDecoded["access_token"];
    }

    public static function create(){
        return new BasicNikeService();
    }
}