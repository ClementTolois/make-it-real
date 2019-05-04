<?php

namespace App\Repository;

use App\Entity\Accessorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Accessorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Accessorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Accessorie[]    findAll()
 * @method Accessorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccessorieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Accessorie::class);
    }

    // /**
    //  * @return Accessorie[] Returns an array of Accessorie objects
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
    public function findOneBySomeField($value): ?Accessorie
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
