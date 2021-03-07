<?php

declare(strict_types=1);

namespace App\Indicators\Entity\Indicator;

use DomainException;

interface IndicatorRepository
{
    /**
     * @param Id $id
     * @return Indicator
     * @throws DomainException
     */
    public function get(Id $id): Indicator;

    public function add(Indicator $indicator): string;
}
