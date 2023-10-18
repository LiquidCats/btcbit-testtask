<?php

declare(strict_types=1);

namespace Console\Charts\Contracts;

interface ReaderContract
{
    /**
     * @param string $source
     *
     * @return float[]
     */
    public function read(string $source): array;
}