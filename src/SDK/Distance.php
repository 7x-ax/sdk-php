<?php

namespace SevenEx\SDK;

use SevenEx\DTO\Distance as DistanceDTO;
use SevenEx\Utils\Mapper;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\Mapper\MappingError;
class Distance extends Http
{

    protected string $apiurl = '/distance/v1';
    public function getByCoordinates(float $fromLatitude, float $fromLongitude, float $toLatitude, float $toLongitude, string $unit = 'km'): DistanceDTO|\Exception
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
                throw new \Exception('Mapping failure: ' . $error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);
        throw new \Exception('The 7x Timezone API did not return a valid response.');

    }

    public function getByAddress(string $from, string $to, string $unit = 'km'): DistanceDTO|\Exception
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
                throw new \Exception('Mapping failure: ' . $error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);
        throw new \Exception('The 7x Timezone API did not return a valid response.');

    }


}