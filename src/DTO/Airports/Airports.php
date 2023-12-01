<?php

namespace SevenEx\DTO\Airports;

class Airports
{
    public function __construct(
        readonly int $total,
        readonly int $pages,
        readonly int $count,
        readonly int $currentpage,
        readonly int $perpage,
        /** @var array<Airport> */
        readonly array $airports
    ) {}

}