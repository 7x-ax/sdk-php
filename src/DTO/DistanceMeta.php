<?php

namespace SevenEx\DTO;

final class DistanceMeta
{
    public function __construct(
        readonly DistanceCoordinates $coordinates
    ) {}

}