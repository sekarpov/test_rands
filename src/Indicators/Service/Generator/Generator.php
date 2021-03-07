<?php

declare(strict_types=1);

namespace App\Indicators\Service\Generator;

use App\Indicators\Entity\Indicator\Indicator;

class Generator
{
    /** @var Driver[] */
    private array $drivers;

    public function __construct(array $drivers)
    {
        $this->drivers = $drivers;
    }

    public function generate(string $type, int $length): Indicator
    {
        return $this->resolveDriver($type)->generate($length);
    }

    private function resolveDriver(string $type): Driver
    {
        foreach ($this->drivers as $driver) {
            if ($driver->canGenerate($type)) {
                return $driver;
            }
        }

        throw new \DomainException(sprintf(
            'Unable to generate indicators with type %s',
            $type
        ));
    }
}
