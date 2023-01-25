<?php

namespace SevenEx\DTO\Distance;

final class DistanceMeta
{
    public function __construct(
        readonly DistanceCoordinates $coordinates
    ) {}

}