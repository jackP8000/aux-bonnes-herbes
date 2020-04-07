<?php

namespace App\Repository;

use App\Entity\AddtionalServicePrice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AddtionalServicePrice|null find($id, $lockMode = null, $lockVersion = null)
 * @method AddtionalServicePrice|null findOneBy(array $criteria, array $orderBy = null)
 * @method AddtionalServicePrice[]    findAll()
 * @method AddtionalServicePrice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AddtionalServicePriceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AddtionalServicePrice::class);
    }

    // /**
    //  * @return AddtionalServicePrice[] Returns an array of AddtionalServicePrice objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AddtionalServicePrice
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
