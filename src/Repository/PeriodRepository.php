<?php

namespace App\Repository;

use App\Entity\Agency;
use App\Entity\Period;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Period>
 *
 * @method Period|null find($id, $lockMode = null, $lockVersion = null)
 * @method Period|null findOneBy(array $criteria, array $orderBy = null)
 * @method Period[]    findAll()
 * @method Period[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeriodRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Period::class);
    }

    public function add(Period $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Period $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    // public function travelInJune() {
    //     return $this->createQueryBuilder('e')
    //         ->addSelect('r')
    //         ->join('e.travel_period', 'r')
    //         ->where("r.period_id = 30")
    //         ->setMaxResults(4)
    //         ->getQuery()
    //         ->getResult()
    //         ;
    // }

    public function travelInJune(int $periodId): ?Period
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT p, t
            FROM App\Entity\Period p
            INNER JOIN p.travel t
            WHERE p.id = :id'
        )->setParameter('id', $periodId)
         ->setMaxResults(3);

        return $query->getOneOrNullResult();
    }


    public function travelInJuly(int $periodId): ?Period
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT p, t
            FROM App\Entity\Period p
            INNER JOIN p.travel t
            WHERE p.id = :id'
        )->setParameter('id', $periodId)
         ->setMaxResults(20);

        return $query->getOneOrNullResult();
    }

    public function findHeartUsersTravels(int $periodId): ?Period
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT p, t
            FROM App\Entity\Period p
            INNER JOIN p.travel t
            WHERE p.id = :id'
        )->setParameter('id', $periodId)
         ->setMaxResults(6);

        return $query->getOneOrNullResult();
    }



    // public function findEachMonthOneTimes() {
    //     return $this->createQueryBuilder('m')
    //         ->andWhere('m.value = :50')
    //         ->setMaxResults(12)
    //         ->getQuery()
    //         ->getResult()
    //         ;
    //     }


//    public function findOneBySomeField($value): ?Period
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
