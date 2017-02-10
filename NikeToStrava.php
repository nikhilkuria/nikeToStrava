<?php

require('RequestMediator.php');

$handle = fopen("php://stdin","r");

$authMediator = RequestMediator::forPost('https://developer.nike.com/services/login');

print("Please login to Nike + \n");
print("User Name : ");
$userName = trim(fgets($handle));
print("Password : ");
$passWord = trim(fgets($handle));

$params = array();
$params['username'] = $userName;
$params['password'] = $passWord;

$authMediator->call($params);