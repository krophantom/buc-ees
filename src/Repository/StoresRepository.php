<?php

namespace App\Repository;

use App\Entity\Stores;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Stores|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stores|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stores[]    findAll()
 * @method Stores[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StoresRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Stores::class);
    }

    // /**
    //  * @return Stores[] Returns an array of Stores objects
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
    public function findOneBySomeField($value): ?Stores
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
