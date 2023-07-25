<?php

namespace SevenEx\SDK;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Source;
use SevenEx\DTO\Error;
use SevenEx\DTO\Numbers\Arabic as ArabicDTO;
use SevenEx\DTO\Numbers\Html as HtmlDTO;
use SevenEx\Utils\Mapper;

class Numbers extends Http
{

    protected string $apiurl = '/numbers/v1';
    public function arabicToLatin(string $arabic): ArabicDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->withUserAgent($this->useragent)
            ->get($this->baseurl . $this->apiurl . "/arabic-to-latin/$arabic");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(ArabicDTO::class, Source::array($x->json('data')));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);

                return new Error($error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);

        return new Error($x->body());

    }

    public function latinToArabic(float $latin): ArabicDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->withUserAgent($this->useragent)
            ->get($this->baseurl . $this->apiurl . "/latin-to-arabic/$latin");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(ArabicDTO::class, Source::array($x->json('data')));
            } catch (MappingError $error) {
                $this->logger->error($error->getMessage());
                Mapper::logErrors($this->logger, $error);

                return new Error($error->getMessage());
            }
        }

        $this->logger->error('Response NOT OK', ['response' => $x->json()]);

        return new Error($x->body());

    }

    public function arabicToHtml(string $arabic): HtmlDTO|Error
    {
        $x = $this->http->withHeaders(['apikey' => $this->apikey])
            ->withUserAgent($this->useragent)
            ->get($this->baseurl . $this->apiurl . "/arabic-to-html/$arabic");
        if ($x->status() === 200) {
            $this->logger->debug('Response OK', ['response' => $x->json()]);
            try {
                return Mapper::get()->map(HtmlDTO::class, Source::array($x->json('data')));
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