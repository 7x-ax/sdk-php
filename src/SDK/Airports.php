<?php

namespace SevenEx\SDK;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Source;
use SevenEx\DTO\Error;
use SevenEx\DTO\Airports\Types as TypesDTO;
use SevenEx\DTO\Airports\ContinentsCollection as ContinentsCollectionDTO;
use SevenEx\DTO\Airports\ContinentCollection as ContinentCollectionDTO;
use SevenEx\DTO\Airports\CountriesCollection as CountriesCollectionDTO;
use SevenEx\DTO\Airports\Airports as AirportsDTO;
use SevenEx\DTO\Airports\SingleAirports as SingleAirportsDTO;
use SevenEx\Utils\Mapper;

class Airports extends Http
{

    protected string $apiurl = '/airports/v1';
    public function types(): TypesDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->withUserAgent($this->useragent)
            ->get($this->baseurl . $this->apiurl . "/types");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(TypesDTO::class, Source::array($x->json(['data'])));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);

                return new Error($error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);

        return new Error($x->body());

    }

    public function continents(): ContinentsCollectionDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->withUserAgent($this->useragent)
            ->get($this->baseurl . $this->apiurl . "/areas/continents");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(ContinentsCollectionDTO::class, Source::array($x->json(['data'])));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);

                return new Error($error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);

        return new Error($x->body());

    }

    public function continent(string $code): ContinentCollectionDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->withUserAgent($this->useragent)
            ->get($this->baseurl . $this->apiurl . "/areas/continents/$code");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(ContinentCollectionDTO::class, Source::array($x->json(['data'])));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);

                return new Error($error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);

        return new Error($x->body());

    }

    public function countries(): CountriesCollectionDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->withUserAgent($this->useragent)
            ->get($this->baseurl . $this->apiurl . "/areas/countries");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(CountriesCollectionDTO::class, Source::array($x->json(['data'])));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);

                return new Error($error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);

        return new Error($x->body());

    }

    public function country(string $isocode): CountriesCollectionDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->withUserAgent($this->useragent)
            ->get($this->baseurl . $this->apiurl . "/areas/countries/$isocode");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(CountriesCollectionDTO::class, Source::array($x->json(['data'])));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);

                return new Error($error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);

        return new Error($x->body());

    }

    public function airports(int $perpage = 10, int $page = 1, string $type = '', string $continent = '', string $country = '', string $region = '', string $address_or_coordinates = ''): AirportsDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->withUserAgent($this->useragent)
            ->get($this->baseurl . $this->apiurl . "/airports?perpage=$perpage&page=$page&type=$type&continent=$continent&country=$country&region=$region&address=$address_or_coordinates");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(AirportsDTO::class, Source::array($x->json(['data'])));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);

                return new Error($error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);

        return new Error($x->body());

    }

    public function airport(string $code): SingleAirportsDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->withUserAgent($this->useragent)
            ->get($this->baseurl . $this->apiurl . "/airports/$code");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(SingleAirportsDTO::class, Source::array($x->json(['data'])));
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