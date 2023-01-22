<?php

namespace x7x\Sdk;

use Illuminate\Http\Client\Factory;
use Monolog\Logger;
use Psr\Log\LogLevel;
use Monolog\Handler\StreamHandler;

class Http
{
    public Factory $http;

    protected string $apikey;

    public Logger $logger;

    protected string $baseurl = 'https://api.7x.ax';

    public function __construct(string $apikey, string $logLevel = LogLevel::INFO)
    {
        $this->logger = new Logger('7x');
        $this->logger->pushHandler(new StreamHandler('php://stdout', $logLevel));
        $this->apikey = $apikey;
        $this->http = new Factory();
    }
}