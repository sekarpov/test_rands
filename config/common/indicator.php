<?php

declare(strict_types=1);

use App\Indicators\Service\Generator\Generator;
use App\Indicators\Service\Generator\GuidGenerator;
use App\Indicators\Service\Generator\NumberGenerator;
use App\Indicators\Service\Generator\StringGenerator;
use App\Indicators\Service\Generator\StrNumGenerator;
use App\Indicators\Entity\Indicator\IndicatorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Psr\Container\ContainerInterface;
use App\Indicators\Entity\Indicator\Indicator;

return [
    Generator::class => function () {
        return new Generator([
            new GuidGenerator(),
            new NumberGenerator(),
            new StringGenerator(),
            new StrNumGenerator()
        ]);
    },
    IndicatorRepository::class => function (ContainerInterface $container): IndicatorRepository {
        /** @var EntityManagerInterface $em */
        $em = $container->get(EntityManagerInterface::class);
        /** @var EntityRepository $repo */
        $repo = $em->getRepository(Indicator::class);
        return new IndicatorRepository($em, $repo);
    }
];
