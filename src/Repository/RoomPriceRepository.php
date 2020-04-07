<?php

namespace App\Repository;

use App\Entity\RoomPrice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RoomPrice|null find($id, $lockMode = null, $lockVersion = null)
 * @method RoomPrice|null findOneBy(array $criteria, array $orderBy = null)
 * @method RoomPrice[]    findAll()
 * @method RoomPrice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoomPriceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RoomPrice::class);
    }

    // /**
    //  * @return RoomPrice[] Returns an array of RoomPrice objects
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
    public function findOneBySomeField($value): ?RoomPrice
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
