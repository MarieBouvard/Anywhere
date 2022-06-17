<?php

namespace App\Repository;

use App\Entity\ServiceIncluded;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ServiceIncluded>
 *
 * @method ServiceIncluded|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceIncluded|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceIncluded[]    findAll()
 * @method ServiceIncluded[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceIncludedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceIncluded::class);
    }

    public function add(ServiceIncluded $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ServiceIncluded $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ServiceIncluded[] Returns an array of ServiceIncluded objects
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

//    public function findOneBySomeField($value): ?ServiceIncluded
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
