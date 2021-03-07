<?php

declare(strict_types=1);

namespace App\Indicators\Service\Generator;

use App\Indicators\Entity\Indicator\Id;
use App\Indicators\Entity\Indicator\Indicator;
use Ramsey\Uuid\Uuid;
use Webmozart\Assert\Assert;

class GuidGenerator implements Driver
{
    public function canGenerate(string $type): bool
    {
        return $type === 'guid';
    }

    public function generate(?int $length = null): Indicator
    {
        return new Indicator(Id::make(), Uuid::uuid4()->toString());
    }
}
