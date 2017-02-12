<?php

/**
 * Created by PhpStorm.
 * User: nikhilkuria
 * Date: 12/02/17
 * Time: 6:15 AM
 */

require('RequestMediator.php');

abstract class BasicService
{

    protected function getPostMediator($url){
        return RequestMediator::forPost($url);
    }

    protected function getGetMediator($url){
        return RequestMediator::forGet($url);
    }

    protected function addParam($url, $paramName, $paramValue){
        return $url
            .'?'.$paramName.'='
            .$paramValue;
    }
}