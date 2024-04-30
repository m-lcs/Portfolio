<?php

namespace App\Repository;

use App\Entity\LogicielsWin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LogicielsWin>
 *
 * @method LogicielsWin|null find($id, $lockMode = null, $lockVersion = null)
 * @method LogicielsWin|null findOneBy(array $criteria, array $orderBy = null)
 * @method LogicielsWin[]    findAll()
 * @method LogicielsWin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogicielsWinRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LogicielsWin::class);
    }

//    /**
//     * @return LogicielsWin[] Returns an array of LogicielsWin objects
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

//    public function findOneBySomeField($value): ?LogicielsWin
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
