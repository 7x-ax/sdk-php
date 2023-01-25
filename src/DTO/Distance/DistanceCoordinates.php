<?php

namespace SevenEx\DTO\Distance;

use SevenEx\DTO\Common\Coordinates;

final class DistanceCoordinates
{
    public function __construct(
        readonly Coordinates $from,
        readonly Coordinates $to,
    ) {}

}