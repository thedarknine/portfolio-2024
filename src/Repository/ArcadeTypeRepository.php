<?php

/**
 * This file is part of Portfolio project.
 * (c) Caroline Noyer <hello@carolinenoyer.info>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Repository;

use App\Entity\ArcadeType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ArcadeType>
 *
 * @method ArcadeType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArcadeType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArcadeType[]    findAll()
 * @method ArcadeType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArcadeTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArcadeType::class);
    }

    /**
     * @return ArcadeType[] Returns an array of ArcadeType objects
     */
    public function getArcadeTypes(): array
    {
        $qb = $this->createQueryBuilder('arc');
        $qb
            ->select('arc')
            ->orderBy('arc.position', 'ASC');

        return $qb
            ->getQuery()
            ->getResult();
    }
}
