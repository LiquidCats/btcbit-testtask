<?php

declare(strict_types=1);

require __DIR__.'/vendor/autoload.php';

use Console\Charts\FileReader;
use Console\Charts\PrintChartCommand;
use Console\Charts\TerminalNormalizer;
use Symfony\Component\Console\Application;


$application = new Application();

$application->add(
    new PrintChartCommand(
        reader: new FileReader(),
        normalizer: new TerminalNormalizer(80)
    )
);

$application->setDefaultCommand('chart:print');

$application->run();