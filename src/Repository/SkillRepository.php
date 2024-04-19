<?php

/**
 * This file is part of Portfolio project.
 * (c) Caroline Noyer <hello@carolinenoyer.info>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Repository;

use App\Entity\Skill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Skill>
 *
 * @method Skill|null find($id, $lockMode = null, $lockVersion = null)
 * @method Skill|null findOneBy(array $criteria, array $orderBy = null)
 * @method Skill[]    findAll()
 * @method Skill[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkillRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Skill::class);
    }

    /**
     * @return Skill[] Returns an array of Skill objects
     */
    public function getSkillsOrderByType(): array
    {
        $qb = $this->createQueryBuilder('skl');
        $qb
            ->select('skl')
            ->where('skl.display = 1')
            ->innerJoin('skl.skillType', 'type')
            ->addSelect('type')
            ->orderBy('skl.position', 'ASC');

        $result = $qb
            ->getQuery()
            ->getResult();

        $listing = [];
        foreach ($result as $skill) {
            $listing[$skill->getSkillType()->getLabel()][] = $skill;
        }

        return $listing;
    }
}
