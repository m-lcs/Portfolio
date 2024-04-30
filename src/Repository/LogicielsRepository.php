<?php

namespace App\Repository;

use App\Entity\Logiciels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Logiciels>
 *
 * @method Logiciels|null find($id, $lockMode = null, $lockVersion = null)
 * @method Logiciels|null findOneBy(array $criteria, array $orderBy = null)
 * @method Logiciels[]    findAll()
 * @method Logiciels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogicielsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Logiciels::class);
    }

//    /**
//     * @return Logiciels[] Returns an array of Logiciels objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Logiciels
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
