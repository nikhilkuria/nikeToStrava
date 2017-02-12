<?php

/**
 * Created by PhpStorm.
 * User: nikhilkuria
 * Date: 11/02/17
 * Time: 5:48 AM
 */
interface NikeService
{

    public function login($userName, $passWord) : string ;

    public function getSummary() : array ;

}