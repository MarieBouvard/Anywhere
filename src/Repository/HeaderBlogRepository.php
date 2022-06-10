<?php

namespace App\Repository;

use App\Entity\HeaderBlog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HeaderBlog>
 *
 * @method HeaderBlog|null find($id, $lockMode = null, $lockVersion = null)
 * @method HeaderBlog|null findOneBy(array $criteria, array $orderBy = null)
 * @method HeaderBlog[]    findAll()
 * @method HeaderBlog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeaderBlogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HeaderBlog::class);
    }

    public function add(HeaderBlog $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(HeaderBlog $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }



    public function findLastHeaderBlog() {
        return $this->createQueryBuilder('h')
            ->orderBy('h.title', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult()
            ;
    }

//    /**
//     * @return HeaderBlog[] Returns an array of HeaderBlog objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?HeaderBlog
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
