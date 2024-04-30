<?php

namespace App\Repository;

use App\Entity\WebCompetences;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WebCompetences>
 *
 * @method WebCompetences|null find($id, $lockMode = null, $lockVersion = null)
 * @method WebCompetences|null findOneBy(array $criteria, array $orderBy = null)
 * @method WebCompetences[]    findAll()
 * @method WebCompetences[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WebCompetencesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WebCompetences::class);
    }

//    /**
//     * @return WebCompetences[] Returns an array of WebCompetences objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?WebCompetences
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
