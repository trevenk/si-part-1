<?php

namespace App\Repository;

use App\Entity\TipoArticulo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TipoArticulo|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoArticulo|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoArticulo[]    findAll()
 * @method TipoArticulo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoArticuloRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TipoArticulo::class);
    }

    // /**
    //  * @return TipoArticulo[] Returns an array of TipoArticulo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TipoArticulo
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
