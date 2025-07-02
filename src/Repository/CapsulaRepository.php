<?php

namespace App\Repository;

use App\Entity\Capsula;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Capsula>
 */
class CapsulaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Capsula::class);
    }

    public function salvar(Capsula $capsula): Capsula
    {
        $this->getEntityManager()->persist($capsula);
        $this->getEntityManager()->flush();

        return $capsula;
    }
}
