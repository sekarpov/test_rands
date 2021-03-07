<?php

declare(strict_types=1);

namespace App\Indicators\Command\Generate;

use App\Flusher;
use App\Indicators\Entity\Indicator\IndicatorRepository;
use App\Indicators\Service\Generator\Generator;

class Handler
{
    private IndicatorRepository $indicator;
    private Generator $generator;
    private Flusher $flusher;

    public function __construct(IndicatorRepository $indicator, Generator $generator, Flusher $flusher)
    {
        $this->indicator = $indicator;
        $this->generator = $generator;
        $this->flusher = $flusher;
    }

    public function handle(Command $command): string
    {
        $indicator = $this->generator->generate($command->type, $command->length);
        $this->indicator->add($indicator);
        $this->flusher->flush();

        return $indicator->getId()->getValue();
    }
}
