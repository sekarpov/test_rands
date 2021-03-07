<?php

declare(strict_types=1);

namespace App\Indicators\Entity\Indicator;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="indicators_indicators")
 */
class Indicator
{
    /**
     * @ORM\Column(type="indicators_indicator_id")
     * @ORM\Id
     */
    private Id $id;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
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
