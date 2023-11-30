<?php

namespace SevenEx\SDK;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Source;
use SevenEx\DTO\Error;
use SevenEx\DTO\Geolocate\Geolocate as GeolocateDTO;
use SevenEx\Utils\Mapper;

class Geolocate extends Http
{

    protected string $apiurl = '/geolocate/v1';
    public function ip(string $ip): GeolocateDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->withUserAgent($this->useragent)
            ->get($this->baseurl . $this->apiurl . "/ip/$ip");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                $result = $this->ObjectifyIntlStrings($x->json(['data']));
                return Mapper::get()->map(GeolocateDTO::class, Source::array($result));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);

                return new Error($error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);

        return new Error($x->body());

    }

    private function ObjectifyIntlStrings(array $result): array
    {
        $result['country']['names']['ptbr'] = $result['country']['names']['pt-BR'];
        unset($result['country']['names']['pt-BR']);
        $result['country']['names']['zhcn'] = $result['country']['names']['zh-CN'];
        unset($result['country']['names']['zh-CN']);
        $result['city']['names']['ptbr'] = $result['city']['names']['pt-BR'];
        unset($result['city']['names']['pt-BR']);
        $result['city']['names']['zhcn'] = $result['city']['names']['zh-CN'];
        unset($result['city']['names']['zh-CN']);
        $result['continent']['names']['ptbr'] = $result['continent']['names']['pt-BR'];
        unset($result['continent']['names']['pt-BR']);
        $result['continent']['names']['zhcn'] = $result['continent']['names']['zh-CN'];
        unset($result['continent']['names']['zh-CN']);
        foreach((array) $result['subdivisions'] as $sdid => $sd) {
            $result['subdivisions'][$sdid]['names']['ptbr'] = $result['subdivisions'][$sdid]['names']['pt-BR'];
            unset($result['subdivisions'][$sdid]['names']['pt-BR']);
            $result['subdivisions'][$sdid]['names']['zhcn'] = $result['subdivisions'][$sdid]['names']['zh-CN'];
            unset($result['subdivisions'][$sdid]['names']['zh-CN']);
        }
        $result['isp_country']['names']['ptbr'] = $result['isp_country']['names']['pt-BR'];
        unset($result['isp_country']['names']['pt-BR']);
        $result['isp_country']['names']['zhcn'] = $result['isp_country']['names']['zh-CN'];
        unset($result['isp_country']['names']['zh-CN']);

        return $result;


    }


}