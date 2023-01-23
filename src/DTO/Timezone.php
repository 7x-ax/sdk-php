<?php

namespace SevenEx\DTO;

final class Timezone
{
    public function __construct(
        readonly float $latitude,
        readonly float $longitude,
        /** @var list<string> */
        readonly array $timezones) {}

}