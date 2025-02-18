<?php

/**
 * This file is part of Portfolio project.
 * (c) Caroline Noyer <hello@carolinenoyer.info>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Repository;

use App\Entity\Experience;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Experience>
 *
 * @method Experience|null find($id, $lockMode = null, $lockVersion = null)
 * @method Experience|null findOneBy(array $criteria, array $orderBy = null)
 * @method Experience[]    findAll()
 * @method Experience[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExperienceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Experience::class);
    }

    /**
     * @return Experience[] Returns an array of Experience objects
     */
    public function getExperiencesWithCompany(?int $limit = null): array
    {
        $qb = $this->createQueryBuilder('exp');
        $qb
            ->select('exp')
            ->innerJoin('exp.company', 'comp')
            ->addSelect('comp')
            ->orderBy('exp.startDate', 'DESC');

        if ($limit) {
            $qb->setMaxResults(3);
        }

        return $qb
            ->getQuery()
            ->getResult();
    }
}
