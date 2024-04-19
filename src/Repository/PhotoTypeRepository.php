<?php

/**
 * This file is part of Portfolio project.
 * (c) Caroline Noyer <hello@carolinenoyer.info>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Repository;

use App\Entity\PhotoType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PhotoType>
 *
 * @method PhotoType|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhotoType|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhotoType[]    findAll()
 * @method PhotoType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotoTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhotoType::class);
    }

    /**
     * @return PhotoType[] Returns an array of PhotoType objects
     */
    public function getPhotoTypes(): array
    {
        $qb = $this->createQueryBuilder('phot');
        $qb
            ->select('phot')
            ->orderBy('phot.position', 'ASC');

        return $qb
            ->getQuery()
            ->getResult();
    }
}
