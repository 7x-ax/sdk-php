<?php

namespace SevenEx\DTO\Airports;

use CuyZ\Valinor\Type\StringType;

class Types
{
    public function __construct(
        readonly int $count,
        /** @var array<string> */
        readonly array $types
    ) {}

}