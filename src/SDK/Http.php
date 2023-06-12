<?php

namespace SevenEx\SDK;

use Illuminate\Http\Client\Factory;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LogLevel;

class Http
{
    public Factory $http;

    protected string $apikey;

    public Logger $logger;

    protected string $baseurl;

    protected string $useragent = "7x/sdk/php/1.4";

    public function __construct(string $apikey, string $baseurl = 'https://api.7x.ax', string $logLevel = LogLevel::INFO)
    {
        $this->baseurl = $baseurl;
        $this->logger = new Logger('7x');
        $this->logger->pushHandler(new StreamHandler('php://stdout', $logLevel));
        $this->apikey = $apikey;
        $this->http = new Factory();
    }
}