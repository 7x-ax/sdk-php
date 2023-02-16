<?php

namespace SevenEx\SDK;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Source;
use SevenEx\DTO\Geocode\GeocodeCollection as GeocodeDTO;
use SevenEx\Utils\Errors;
use SevenEx\Utils\Mapper;

class Geocode extends Http
{
    protected string $apiurl = '/geocode/v1';

    public function geocode(string $location): GeocodeDTO|\Exception
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->get($this->baseurl . $this->apiurl . "/geocode/$location");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(GeocodeDTO::class, Source::array($x->json('data')));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);
                throw new \Exception('Mapping failure: ' . $error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);

        return Errors::handle($x);

    }

    public function reverse(string $latitude, string $longitude): GeocodeDTO|\Exception
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->get($this->baseurl . $this->apiurl . "/reverse/$latitude,$longitude");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(GeocodeDTO::class, Source::array($x->json('data')));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);
                throw new \Exception('Mapping failure: ' . $error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);
        throw new \Exception('The 7x Timezone API did not return a valid response.');

    }

    public function search(string $searchString): GeocodeDTO|\Exception
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->get($this->baseurl . $this->apiurl . "/geocode/$searchString");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(GeocodeDTO::class, Source::array($x->json('data')));
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