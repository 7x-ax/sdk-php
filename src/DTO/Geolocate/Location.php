<?php

namespace SevenEx\DTO\Geolocate;

class Location
{
    public function __construct(
        readonly int $accuracy_radius,
        readonly float $latitude,
        readonly float $longitude,
        readonly string $time_zone
    ) {}

}