<?php

require('RequestMediator.php');

$authMediator = RequestMediator::forPost('https://developer.nike.com/services/login');
//$authMediator = new RequestMediator("hello","hello");