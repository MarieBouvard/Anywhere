<?php

namespace App\Repository;

use App\Entity\ServiceNotIncluded;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ServiceNotIncluded>
 *
 * @method ServiceNotIncluded|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceNotIncluded|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceNotIncluded[]    findAll()
 * @method ServiceNotIncluded[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceNotIncludedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceNotIncluded::class);
    }

    public function add(ServiceNotIncluded $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ServiceNotIncluded $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ServiceNotIncluded[] Returns an array of ServiceNotIncluded objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ServiceNotIncluded
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
