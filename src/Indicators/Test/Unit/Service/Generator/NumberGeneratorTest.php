<?php

declare(strict_types=1);

namespace App\Indicators\Test\Unit\Service\Generator;

use App\Indicators\Service\Generator\NumberGenerator;
use PHPUnit\Framework\TestCase;

class NumberGeneratorTest extends TestCase
{
    public function testLengthSuccess(): void
    {
        $indicator = (new NumberGenerator())->generate($length = 10);
        self::assertEquals($length, strlen($indicator->getValue()));
    }

    public function testTypeSuccess(): void
    {
        $indicator = (new NumberGenerator())->generate($length = 10);
        self::assertMatchesRegularExpression('/^[0-9]+$/', $indicator->getValue());
    }
}
