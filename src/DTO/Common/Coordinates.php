<?php

namespace SevenEx\DTO\Common;

final class Coordinates
{
    public function __construct(
        readonly float $latitude,
        readonly float $longitude
    ) {}

}