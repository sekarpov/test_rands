<?php

declare(strict_types=1);

use App\Indicators\Service\Generator\Generator;
use App\Indicators\Service\Generator\GuidGenerator;
use App\Indicators\Service\Generator\NumberGenerator;
use App\Indicators\Service\Generator\StringGenerator;
use App\Indicators\Service\Generator\StrNumGenerator;

return [
    Generator::class => function () {
        return new Generator([
            new GuidGenerator(),
            new NumberGenerator(),
            new StringGenerator(),
            new StrNumGenerator()
        ]);
    }
];
