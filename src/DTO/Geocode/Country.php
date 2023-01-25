<?php

namespace SevenEx\DTO\Geocode;

final class Country
{
    public function __construct(
        readonly string $code,
        readonly string $name
    ) {}

}