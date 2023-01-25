<?php

namespace SevenEx\DTO\Distance;

final class Distance
{
    public function __construct(
        readonly float $distance,
        readonly string $unit,
        readonly DistanceMeta $meta,
    ) {}

}