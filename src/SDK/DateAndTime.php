<?php

namespace SevenEx\SDK;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Source;
use SevenEx\DTO\Error;
use SevenEx\DTO\DateAndTime\DateAndTime as DateAndTimeDTO;
use SevenEx\Utils\Mapper;

class DateAndTime extends Http
{

    protected string $apiurl = '/datetime/v1';
    public function byTimezone(string $timezone): DateAndTimeDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->withUserAgent($this->useragent)
            ->get($this->baseurl . $this->apiurl . "/bytimezone/$timezone");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                $result = $this->objectifyTime($x->json(['data']));
                return Mapper::get()->map(DateAndTimeDTO::class, Source::array($result));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);

                return new Error($error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);

        return new Error($x->body());

    }

    public function byCoordinates(string $latitude, string $longitude   ): DateAndTimeDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->withUserAgent($this->useragent)
            ->get($this->baseurl . $this->apiurl . "/bycoordinates/$latitude,$longitude");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                $result = $this->objectifyTime($x->json(['data']));
                return Mapper::get()->map(DateAndTimeDTO::class, Source::array($result));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);

                return new Error($error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);

        return new Error($x->body());

    }

    public function byAddress(string $address): DateAndTimeDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->withUserAgent($this->useragent)
            ->get($this->baseurl . $this->apiurl . "/byaddress/$address");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                $result = $this->objectifyTime($x->json(['data']));
                return Mapper::get()->map(DateAndTimeDTO::class, Source::array($result));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);

                return new Error($error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);

        return new Error($x->body());

    }

    private function objectifyTime(array $result): array
    {
        $result['time']['hour']['h12'] = $result['time']['hour']['12'];
        $result['time']['hour']['h24'] = $result['time']['hour']['24'];
        unset($result['time']['hour']['12']);
        unset($result['time']['hour']['24']);

        return $result;
    }



}