<?php

namespace SevenEx\DTO\Geocode;

use SevenEx\DTO\Common\Coordinates;

final class Geocode
{
    public function __construct(
        readonly string $search,
        readonly ?string $processed,
        readonly Coordinates $coordinates,
        readonly Location $location
    ) {}

}