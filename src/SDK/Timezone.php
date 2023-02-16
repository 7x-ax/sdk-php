<?php

namespace SevenEx\SDK;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Source;
use SevenEx\DTO\Error;
use SevenEx\DTO\Timezone\Timezone as TimezoneDTO;
use SevenEx\Utils\Mapper;

class Timezone extends Http
{

    protected string $apiurl = '/timezone/v1';
    public function get(float $latitude, float $longitude): TimezoneDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->get($this->baseurl . $this->apiurl . "/bycoordinates/$latitude,$longitude");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(TimezoneDTO::class, Source::array($x->json('data')));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);

                return new Error($x->json('data')['error']);
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);

        return new Error($x->json('data')['error']);

    }


}