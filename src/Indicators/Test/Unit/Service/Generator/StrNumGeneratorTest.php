<?php

declare(strict_types=1);

namespace App\Indicators\Test\Unit\Service\Generator;

use App\Indicators\Service\Generator\StrNumGenerator;
use PHPUnit\Framework\TestCase;

class StrNumGeneratorTest extends TestCase
{
    public function testLengthSuccess(): void
    {
        $indicator = (new StrNumGenerator())->generate($length = 10);
        self::assertEquals($length, strlen($indicator->getValue()));
    }

    public function testTypeSuccess(): void
    {
        $indicator = (new StrNumGenerator())->generate($length = 10);
        self::assertTrue(ctype_alnum($indicator->getValue()));
    }
}
