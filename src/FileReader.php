<?php

declare(strict_types=1);

namespace Console\Charts;

use Console\Charts\Contracts\ReaderContract;
use JsonException;
use function file_get_contents;
use function json_decode;
use const JSON_THROW_ON_ERROR;

readonly class
FileReader implements ReaderContract
{
    /**
     * @param string $source
     *
     * @return float[]
     *
     * @throws JsonException
     */
    public function read(string $source): array
    {
        $rawData = file_get_contents($source);

        return json_decode($rawData, flags: JSON_THROW_ON_ERROR);
    }
}