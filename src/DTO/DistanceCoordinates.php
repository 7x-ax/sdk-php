<?php

namespace SevenEx\DTO;

final class DistanceCoordinates
{
    public function __construct(
        readonly Coordinates $from,
        readonly Coordinates $to,
    ) {}

}