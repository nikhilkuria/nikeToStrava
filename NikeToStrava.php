<?php

require('BasicNikeService.php');

$handle = fopen("php://stdin","r");

$nikeService = BasicNikeService::create();

print("Please login to Nike + \n");
print("User Name : ");
$userName = trim(fgets($handle));
print("Password : ");
$passWord = trim(fgets($handle));

$nikeService = BasicNikeService::createWithCredentials($userName,$passWord);
$summary = $nikeService->getSummary();
print("");