<?php

namespace SevenEx\DTO;

class Timezone
{
    public float $latitude;

    public float $longitude;

    public array $timezones;

    public function __construct(float $latitude, float $longitude, array $timezones) {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->timezones = $timezones;
    }

}