<?php

/**
 * This file is part of Portfolio project.
 * (c) Caroline Noyer <hello@carolinenoyer.info>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Repository;

use App\Entity\CreationType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CreationType>
 *
 * @method CreationType|null find($id, $lockMode = null, $lockVersion = null)
 * @method CreationType|null findOneBy(array $criteria, array $orderBy = null)
 * @method CreationType[]    findAll()
 * @method CreationType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CreationTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CreationType::class);
    }

    /**
     * @return CreationType[] Returns an array of CreationType objects
     */
    public function getCreationTypes(): array
    {
        $qb = $this->createQueryBuilder('crea');
        $qb
            ->select('crea')
            ->orderBy('crea.position', 'ASC');

        return $qb
            ->getQuery()
            ->getResult();
    }
}
