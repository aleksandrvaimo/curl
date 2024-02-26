<?php

require_once __DIR__ . '/autoload.php';

use Curl\Model\CustomerData;
use Curl\Model\ErrorHandler;
use Curl\Model\SendRequest;

$sendRequest = new SendRequest(new ErrorHandler(), new CustomerData());
$sendRequest->sendCurlRequest();

if ($sendRequest->getErrorMessage()) {
    var_dump($sendRequest->getErrorMessage());
}

var_dump($sendRequest->getCurlResponse());
