<?php

namespace SevenEx\DTO\Geocode;

final class Location
{
    public function __construct(
        readonly string $name,
        readonly string $label,
        readonly Country $country,
        readonly ?string $region,
        readonly ?string $county,
        readonly ?string $locality,
        readonly ?string $continent
    ) {}

}