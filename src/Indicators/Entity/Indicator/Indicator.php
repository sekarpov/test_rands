<?php

declare(strict_types=1);

namespace App\Indicators\Entity\Indicator;

use Webmozart\Assert\Assert;

class Indicator
{
    private Id $id;
    private string $value;

    public function __construct(Id $id, string $value)
    {
        $this->id = $id;
        $this->value = $value;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
