<?php

namespace SevenEx\SDK;

use SevenEx\DTO\Timezone as TimezoneDTO;
class Timezone extends Http
{

    protected string $apiurl = '/timezone/v1';
    public function get(float $latitude, float $longitude): TimezoneDTO|\Exception
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->get($this->baseurl . $this->apiurl . "/bycoordinates/$latitude,$longitude");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            $r = $x->json('data');

            return new TimezoneDTO($r['latitude'], $r['longitude'], $r['timezones']);
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);
        throw new \Exception('The 7x Timezone API did not return a valid response.');

    }


}