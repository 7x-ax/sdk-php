<?php

namespace SevenEx\SDK;

use SevenEx\DTO\Timezone as TimezoneDTO;
use SevenEx\Utils\Mapper;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Tree\Message\Messages;
class Timezone extends Http
{

    protected string $apiurl = '/timezone/v1';
    public function get(float $latitude, float $longitude): TimezoneDTO|\Exception
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->get($this->baseurl . $this->apiurl . "/bycoordinates/$latitude,$longitude");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(TimezoneDTO::class, Source::array($x->json('data')));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                throw new \Exception('Mapping failure: ' . $error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);
        throw new \Exception('The 7x Timezone API did not return a valid response.');

    }


}