<?php

namespace SevenEx\DTO\Geolocate;

final class Geolocate
{
    public function __construct(
        readonly City $city,
        readonly Continent $continent,
        readonly Country $country,
        readonly Location $location,
        readonly Postal $postal,
        readonly Subdivisions $subdivisions,
        readonly Traits $traits,
        readonly IspCountry $isp_country
    ) {}
}