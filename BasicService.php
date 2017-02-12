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

    protected function addParam($url, $paramName, $paramValue, $firstParam){
        if($firstParam==true){
            $bindChar = '?';
        }else{
            $bindChar = '&';
        }

        $url =  $url
            .$bindChar
            .$paramName.'='
            .$paramValue;

        return $url;
    }

    protected function addParams($url, $params){
        $url = $url+'?';
        foreach ($params as $name => $value){
            $url = $url.$name.'='.$value.'&';
        }
        return substr($url,0,-1);
    }
}