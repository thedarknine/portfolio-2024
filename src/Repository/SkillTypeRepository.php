<?php

/**
 * This file is part of Portfolio project.
 * (c) Caroline Noyer <hello@carolinenoyer.info>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Repository;

use App\Entity\SkillType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SkillType>
 *
 * @method SkillType|null find($id, $lockMode = null, $lockVersion = null)
 * @method SkillType|null findOneBy(array $criteria, array $orderBy = null)
 * @method SkillType[]    findAll()
 * @method SkillType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkillTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SkillType::class);
    }

    /**
     * @return SkillType[] Returns an array of SkillType objects
     */
    public function getSkillTypes(): array
    {
        $qb = $this->createQueryBuilder('sklt');
        $qb
            ->select('sklt')
            ->orderBy('sklt.position', 'ASC');

        return $qb
            ->getQuery()
            ->getResult();
    }
}
