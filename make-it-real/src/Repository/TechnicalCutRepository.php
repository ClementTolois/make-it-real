<?php

namespace App\Repository;

use App\Entity\TechnicalCut;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TechnicalCut|null find($id, $lockMode = null, $lockVersion = null)
 * @method TechnicalCut|null findOneBy(array $criteria, array $orderBy = null)
 * @method TechnicalCut[]    findAll()
 * @method TechnicalCut[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TechnicalCutRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TechnicalCut::class);
    }

    // /**
    //  * @return TechnicalCut[] Returns an array of TechnicalCut objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TechnicalCut
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
