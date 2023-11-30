<?php

namespace SevenEx\DTO\Geolocate;

final class Names
{
    public function __construct(
        readonly string $en,
        readonly string $ru,
        readonly string $zhcn,
        readonly string $de,
        readonly string $fr,
        readonly string $es,
        readonly string $ja,
        readonly string $ptbr,
    ) {}

}