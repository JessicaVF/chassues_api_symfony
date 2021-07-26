<?php

namespace App\Repository;

use App\Entity\Lacet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Lacet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lacet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lacet[]    findAll()
 * @method Lacet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LacetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lacet::class);
    }

    // /**
    //  * @return Lacet[] Returns an array of Lacet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lacet
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
