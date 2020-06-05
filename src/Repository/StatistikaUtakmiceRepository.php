<?php

namespace App\Repository;

use App\Entity\StatistikaUtakmice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StatistikaUtakmice|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatistikaUtakmice|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatistikaUtakmice[]    findAll()
 * @method StatistikaUtakmice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatistikaUtakmiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatistikaUtakmice::class);
    }

    // /**
    //  * @return StatistikaUtakmice[] Returns an array of StatistikaUtakmice objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StatistikaUtakmice
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
