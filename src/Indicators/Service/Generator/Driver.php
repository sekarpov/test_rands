<?php

declare(strict_types=1);

namespace App\Indicators\Service\Generator;

use App\Indicators\Entity\Indicator\Indicator;

interface Driver
{
    public function canGenerate(string $type): bool;

    public function generate(?int $length = null): Indicator;
}
