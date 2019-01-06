<?php

namespace App\Repository;

use App\Entity\Bookings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\QueryBuilder;


/**
 * @method Bookings|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bookings|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bookings[]    findAll()
 * @method Bookings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookingsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bookings::class);
    }

    public function trouveTout() {
        return $this->createQueryBuilder('b')
                    ->getQuery()
                    ->getResult()
        ;    
    }

    public function trouveId($id) {
        return $this->createQueryBuilder('b')
            ->where('b.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }
// On récupère les entités par rapport à la destination, et la date de départ:
    public function testCount($dest, $departureDate) {
        $qb = $this->createQueryBuilder('b');
        $qb->where('b.destination = :destination')
           ->setParameter('destination', $dest)
           ->andWhere('b.departureDate = :departureDate')
           ->setParameter('departureDate', $departureDate)
           ->select($qb->expr()->count('b.departureTime'));
        // return $qb->getQuery()->getScalarResult();
        
        $value = $qb->getQuery()->getScalarResult();
        return $value;
        var_dump($value);
        dump($value);
    }


    public function selDestDate($dest, $laDate, $partage) {
        return $this->createQueryBuilder('b')
            ->where('b.destination = :destination')
            ->setParameter('destination', $dest)
            ->andWhere('b.departureDate = :departureDate')
            ->setParameter('departureDate', $laDate)
            ->andWhere('b.sharing = :sharing')
            ->setParameter('sharing', $partage)
            ->orderBy('b.departureTime')
            ->getQuery()
            ->getResult();
        ;
    }

    public function maSel(QueryBuilder $qb) {
        $qb->andWhere('b.departureTime = :departureTime')
           ->setParameter('departureTime', '16:00');
    }

// "SELECT u FROM User u WHERE u.id = ? OR u.nickname LIKE ? ORDER BY u.name ASC" using Expr class
    public function selDouble($dest, $laDate) {
        $qb = $this->createQueryBuilder('b');
        $qb->where('b.destination = :destination')
           ->setParameter('destination', $dest)
           ->andWhere('b.departureDate = :departureDate')
           ->setParameter('departureDate', $laDate)
           ->orderBy('b.departureTime')
        ;
        $this->maSel($qb);
        return $qb->getQuery()->getResult();    
    }


/*
    public function myFindOne($id) {
        $qb = $this->createQueryBuilder('a');
        $qb
        ->where('a.id = :id')
        ->setParameter('id', $id)
        ;
        return $qb
        ->getQuery()
        ->getResult()
        ;
    }
*/
    // /**
    //  * @return Bookings[] Returns an array of Bookings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bookings
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
