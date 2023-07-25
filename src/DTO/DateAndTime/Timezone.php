<?php

namespace SevenEx\DTO\DateAndTime;

final class Timezone
{
    public function __construct(
        readonly string $name,
        readonly bool $daylightsaving,
        readonly Offset $offset,
        readonly string $abbreviation
    ) {}
}