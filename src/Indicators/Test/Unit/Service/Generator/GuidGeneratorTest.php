<?php

declare(strict_types=1);

namespace App\Indicators\Test\Unit\Service\Generator;

use App\Indicators\Service\Generator\GuidGenerator;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class GuidGeneratorTest extends TestCase
{
    public function testTypeSuccess(): void
    {
        $indicator = (new GuidGenerator())->generate();
        self::assertTrue(Uuid::isValid($indicator->getValue()));
    }
}
