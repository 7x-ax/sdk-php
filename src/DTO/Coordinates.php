<?php

namespace SevenEx\DTO;

final class Coordinates
{
    public function __construct(
        readonly float $latitude,
        readonly float $longitude
    ) {}

}