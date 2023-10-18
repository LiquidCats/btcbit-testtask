<?php

declare(strict_types=1);

namespace Console\Charts\Contracts;

interface NormalizerContract
{
    public function normalize(float $value, float $min, float $max): int;
}