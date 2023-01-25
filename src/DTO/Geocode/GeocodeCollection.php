<?php

namespace SevenEx\DTO\Geocode;

final class GeocodeCollection
{
    public function __construct(
        /** @var array<Geocode> */
        readonly array $objects
    ) {}

}