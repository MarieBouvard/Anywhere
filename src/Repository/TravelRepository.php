<?php

namespace App\Repository;

use App\Classe\Search;
use App\Entity\Travel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Travel>
 *
 * @method Travel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Travel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Travel[]    findAll()
 * @method Travel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TravelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Travel::class);
    }

    public function add(Travel $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Travel $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Requête qui permet de récupérer les produits en fonction de la recherche de l'utilisateur
     * @return Travel[]
     */
    public function findWithSearch (Search $search) {

        $query = $this
            ->createQueryBuilder('t')
            ->select('c', 't')
            ->join('t.activity', 'c');

            if(!empty($search->activities)) {
                $query = $query
                    ->andWhere('c.id IN (:activities)')
                    ->setParameter('activities', $search->activities);
            }

            if (!empty($search->string)) {
                $query = $query
                    ->andWhere('t.country LIKE :string')
                    ->setParameter('string', "%{$search->string}%");
            }

            return $query->getQuery()->getResult();
    }


    /**
    * @return Travel[] Returns an array of Travel objects
    */
    public function roadtripTravelAgency() {
    return $this->createQueryBuilder('t')
        ->where("t.style = 1")
        ->setMaxResults(3)
        ->getQuery()
        ->getResult()
        ;
    }


//    /**
//     * @return Travel[] Returns an array of Travel objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

   

}
