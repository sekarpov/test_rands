<?php

declare(strict_types=1);

namespace App\Indicators\Entity\Indicator;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use DomainException;

class IndicatorRepository
{
    private EntityManagerInterface $em;
    private EntityRepository $repo;

    public function __construct(EntityManagerInterface $em, EntityRepository $repo)
    {
        $this->em = $em;
        $this->repo = $repo;
    }

    /**
     * @param Id $id
     * @return Indicator
     * @throws DomainException
     */
    public function get(Id $id): Indicator
    {
        /** @var Indicator|false $indicator */
        $indicator = $this->repo->find($id->getValue());

        if (!$indicator) {
            throw new DomainException('Indicator is not found');
        }
        /** @var Indicator $indicator */
        return $indicator;
    }

    public function add(Indicator $indicator): void
    {
        $this->em->persist($indicator);
    }
}
