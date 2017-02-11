<?php

require('BasicNikeService.php');

$handle = fopen("php://stdin","r");

$nikeService = BasicNikeService::create();

print("Please login to Nike + \n");
print("User Name : ");
//$userName = trim(fgets($handle));
$userName = 'nikhilkuria@gmail.com';
print("Password : ");
//$passWord = trim(fgets($handle));
$passWord = 'lower@UPPER007';

$token = $nikeService->login($userName,$passWord);
print($token);