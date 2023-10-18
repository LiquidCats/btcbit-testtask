<?php

declare(strict_types=1);

namespace Console\Charts;

use Console\Charts\Contracts\NormalizerContract;

readonly class TerminalNormalizer implements NormalizerContract
{
    public function __construct(private int $terminalWith)
    {
    }

    public function normalize(float $value, float $min, float $max): int
    {
        return (int) (($value - $min) / ($max - $min) * $this->terminalWith) ;
    }
}