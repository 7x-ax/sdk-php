<?php

namespace SevenEx\DTO;

use SevenEx\DTO\Distance\DistanceCoordinates;

final class Error
{
    public function __construct(
        readonly string $error
    ) {}

}
