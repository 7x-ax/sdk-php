<?php

namespace SevenEx\DTO\Airports;

use SevenEx\DTO\Airports\Enums\Types;

final class Airport
{
    public function __construct(
        readonly int $id,
        readonly string $ident,
        readonly string $name,
        readonly Types $type,
        readonly float $latitude_deg,
        readonly float $longitude_deg,
        readonly float $elevation_ft,
        readonly string $continent,
        readonly string $iso_country,
        readonly string $iso_region,
        readonly string $municipality,
        readonly string $scheduled_service,
        readonly string $gps_code,
        readonly string $iata_code,
        readonly string $local_code,
        readonly string $home_link,
        readonly string $wikipedia_link,
        readonly string $keywords,
    ) {}

}