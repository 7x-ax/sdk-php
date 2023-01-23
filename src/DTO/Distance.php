<?php

namespace SevenEx\DTO;

final class Distance
{
    public function __construct(
        readonly float $distance,
        readonly string $unit,
        readonly DistanceMeta $meta,
    ) {}

}