<?php

namespace App\Repository;

use App\Entity\PhotoCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PhotoCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhotoCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhotoCategory[]    findAll()
 * @method PhotoCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotoCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhotoCategory::class);
    }

    // /**
    //  * @return PhotoCategory[] Returns an array of PhotoCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PhotoCategory
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
