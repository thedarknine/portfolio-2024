<?php

/**
 * This file is part of Portfolio project.
 * (c) Caroline Noyer <hello@carolinenoyer.info>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Repository;

use App\Entity\Education;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Education>
 *
 * @method Education|null find($id, $lockMode = null, $lockVersion = null)
 * @method Education|null findOneBy(array $criteria, array $orderBy = null)
 * @method Education[]    findAll()
 * @method Education[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EducationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Education::class);
    }

    /**
     * @return Education[] Returns an array of Education objects
     */
    public function getEducationsWithSchool(): array
    {
        $qb = $this->createQueryBuilder('educ');
        $qb
            ->select('educ')
            ->innerJoin('educ.school', 'sch')
            ->addSelect('sch')
            ->orderBy('educ.year', 'DESC');

        return $qb
            ->getQuery()
            ->getResult();
    }
}
