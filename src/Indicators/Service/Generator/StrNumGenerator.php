<?php

declare(strict_types=1);

namespace App\Indicators\Service\Generator;

use App\Indicators\Entity\Indicator\Id;
use App\Indicators\Entity\Indicator\Indicator;
use Webmozart\Assert\Assert;

class StrNumGenerator implements Driver
{
    public function canGenerate(string $type): bool
    {
        return $type === 'alphanumeric';
    }

    public function generate(?int $length = null): Indicator
    {
        Assert::numeric($length);
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return new Indicator(Id::make(), $randomString);
    }
}
