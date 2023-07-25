<?php

namespace SevenEx\DTO\Numbers;

final class Arabic
{
    public function __construct(
        readonly string $arabic,
        readonly float $latin) {}
}