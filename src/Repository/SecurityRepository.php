<?php

namespace App\Repository;

use App\Entity\Security;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Security>
 *
 * @method Security|null find($id, $lockMode = null, $lockVersion = null)
 * @method Security|null findOneBy(array $criteria, array $orderBy = null)
 * @method Security[]    findAll()
 * @method Security[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SecurityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Security::class);
    }

//    /**
//     * @return Security[] Returns an array of Security objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Security
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
