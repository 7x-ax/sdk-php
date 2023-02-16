<?php

namespace SevenEx\Utils;

use Illuminate\Http\Client\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Errors
{
    public static function handle(Response $response)
    {
        if ($response->status() === 404) {
            throw new NotFoundHttpException($response->json('data'));
        }

    }

}