<?php

namespace App\Repository\Post;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Security\Core\Security;

/**
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository implements PostRepositoryInterface
{
    /**
     * @var Security
     */
    private $security;

    public function __construct(RegistryInterface $registry, Security $security)
    {
        parent::__construct($registry, Post::class);
        $this->security = $security;
    }

    /**
     * Finds all posts with related categories.
     *
     * @return Post[]
     */
    public function findAllWithCategories()
    {
        $qb = $this->createQueryBuilder('p')
            ->innerJoin('p.category', 'c')
            ->addSelect('c');

        if (!$this->security->isGranted('ROLE_USER')) {
            $qb->andWhere("c.slug != 'science'");
        }

        return $qb->getQuery()
            ->getResult()
        ;
    }
}
