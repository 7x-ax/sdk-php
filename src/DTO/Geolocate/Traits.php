<?php

namespace SevenEx\DTO\Geolocate;

class Traits
{
    public function __construct(
        readonly int $autonomous_system_number,
        readonly string $autonomous_system_organization,
        readonly string $domain,
        readonly string $ip_address,
        readonly string $isp,
        readonly string $organization,
        readonly string $network,
    ) {}

}