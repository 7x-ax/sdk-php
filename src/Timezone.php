<?php

namespace x7x\Sdk;

class Timezone extends Http
{

    protected string $apiurl = '/timezone/v1';
    public function get(float $latitude, float $longitude): array|\Exception
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->get($this->baseurl . $this->apiurl . "/bycoordinates/$latitude,$longitude");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            return $x->json('data');
        } else {
            $this->logger->error('Response NOT OK', ['response' => $x->json()]);
            throw new \Exception('The 7x Timezone API did not return a valid response.');
        }


    }


}