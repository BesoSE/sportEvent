<?php

namespace App\Repository;

use App\Entity\PocetnaStatistika;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PocetnaStatistika|null find($id, $lockMode = null, $lockVersion = null)
 * @method PocetnaStatistika|null findOneBy(array $criteria, array $orderBy = null)
 * @method PocetnaStatistika[]    findAll()
 * @method PocetnaStatistika[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PocetnaStatistikaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PocetnaStatistika::class);
    }

    // /**
    //  * @return PocetnaStatistika[] Returns an array of PocetnaStatistika objects
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
    public function findOneBySomeField($value): ?PocetnaStatistika
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
