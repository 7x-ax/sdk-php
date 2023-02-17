<?php

namespace SevenEx\SDK;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Source;
use SevenEx\DTO\Error;
use SevenEx\DTO\Geocode\GeocodeCollection as GeocodeDTO;
use SevenEx\Utils\Mapper;

class Geocode extends Http
{
    protected string $apiurl = '/geocode/v1';

    public function geocode(string $location): GeocodeDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->withUserAgent($this->useragent)
            ->get($this->baseurl . $this->apiurl . "/geocode/$location");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(GeocodeDTO::class, Source::array($x->json('data')));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);

                return new Error($error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);

        return new Error($x->body());
    }

    public function reverse(string $latitude, string $longitude): GeocodeDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->withUserAgent($this->useragent)
            ->get($this->baseurl . $this->apiurl . "/reverse/$latitude,$longitude");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(GeocodeDTO::class, Source::array($x->json('data')));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);

                return new Error($error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);

        return new Error($x->body());
    }

    public function search(string $searchString): GeocodeDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->withUserAgent($this->useragent)
            ->get($this->baseurl . $this->apiurl . "/geocode/$searchString");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(GeocodeDTO::class, Source::array($x->json('data')));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);

                return new Error($error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);

        return new Error($x->body());
    }


}