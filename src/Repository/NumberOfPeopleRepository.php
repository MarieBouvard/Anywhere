<?php

namespace App\Repository;

use App\Entity\NumberOfPeople;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NumberOfPeople>
 *
 * @method NumberOfPeople|null find($id, $lockMode = null, $lockVersion = null)
 * @method NumberOfPeople|null findOneBy(array $criteria, array $orderBy = null)
 * @method NumberOfPeople[]    findAll()
 * @method NumberOfPeople[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NumberOfPeopleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NumberOfPeople::class);
    }

    public function add(NumberOfPeople $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(NumberOfPeople $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return NumberOfPeople[] Returns an array of NumberOfPeople objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NumberOfPeople
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
