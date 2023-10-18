<?php

declare(strict_types=1);

namespace Console\Charts;

use Console\Charts\Contracts\NormalizerContract;
use Console\Charts\Contracts\ReaderContract;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use function str_repeat;

#[AsCommand(
    name: 'chart:print',
    description: 'Print to console as a chart',
    aliases: ['app:chart-print'],
    hidden: false
)]
class PrintChartCommand extends Command
{

    public function __construct(
        private readonly ReaderContract $reader,
        private readonly NormalizerContract $normalizer,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addOption('source', 'S', InputOption::VALUE_OPTIONAL, default: "assets/data.json");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $source = $input->getOption('source');

        if (!$source) {
            $output->writeln("data source is not provided");
            return self::FAILURE;
        }

        $data = $this->reader->read($source);
        $minValue = (float) min($data);
        $maxValue = (float) max($data);

        foreach ($data as $value) {
            $normalizedValue = $this->normalizer->normalize($value, $minValue, $maxValue);
            $output->writeln(str_repeat(' ', $normalizedValue) . '#');
        }

        return self::SUCCESS;
    }
}