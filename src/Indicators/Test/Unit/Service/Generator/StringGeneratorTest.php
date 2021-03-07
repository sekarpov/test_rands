<?php

declare(strict_types=1);

namespace App\Indicators\Test\Unit\Service\Generator;

use App\Indicators\Service\Generator\StringGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers StringGeneratorTest
 */
class StringGeneratorTest extends TestCase
{
    protected $runTestInSeparateProcess = false;

    public function testLengthSuccess(): void
    {
        $indicator = (new StringGenerator())->generate($length = 10);
        self::assertEquals($length, strlen($indicator->getValue()));
    }

    public function testTypeSuccess(): void
    {
        $indicator = (new StringGenerator())->generate($length = 10);
        self::assertMatchesRegularExpression('/^[a-zA-Z]+$/', $indicator->getValue());
    }
}
