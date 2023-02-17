<?php

namespace SevenEx\SDK;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Source;
use SevenEx\DTO\Distance\Distance as DistanceDTO;
use SevenEx\DTO\Error;
use SevenEx\Utils\Mapper;

class Distance extends Http
{
    protected string $apiurl = '/distance/v1';
    public function getByCoordinates(float $fromLatitude, float $fromLongitude,
                                     float $toLatitude, float $toLongitude, string $unit = 'km'): DistanceDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->get($this->baseurl . $this->apiurl . "/bycoordinates/$fromLatitude,$fromLatitude,$toLatitude,$toLongitude?unit=$unit");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(DistanceDTO::class, Source::array($x->json('data')));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);

                return new Error($error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);

        return new Error($x->json('data')['error']);

    }

    public function getByAddress(string $from, string $to, string $unit = 'km'): DistanceDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->get($this->baseurl . $this->apiurl . "/byaddress/$from/$to?unit=$unit");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(DistanceDTO::class, Source::array($x->json('data')));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);

                return new Error($error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);

        return new Error($x->json('data')['error']);
    }


}