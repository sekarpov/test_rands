<?php

declare(strict_types=1);

namespace App\Indicators\Fixture;

use App\Indicators\Entity\Indicator\Id;
use App\Indicators\Entity\Indicator\Indicator;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Persistence\ObjectManager;

class IndicatorFixture extends AbstractFixture
{
    public function load(ObjectManager $manager): void
    {
        $indicator = new Indicator(new Id('00000000-0000-0000-0000-000000000001'), '123456789');

        $manager->persist($indicator);

        $manager->flush();
    }
}
