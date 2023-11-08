<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Article>
 *
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }
   
    /**
     * findAllAsc
     *
     * @param  mixed $value
     * @return Query
     */
    public function findAllAsc($value): Query
    {
        return $this->createQueryBuilder('article')
            ->orderBy('article.datetimeCreated', 'ASC')
            ->getQuery();
    }
    
    /**
     * findAllWithCommentCounts
     * Using this because if the index of entities will be too long, for each entity there'd be query for comments 
     *
     * @param  mixed $value
     * @return Query
     */
    public function findAllWithCommentCounts($value): Query
    {
   
        return $this->createQueryBuilder('article')
        ->select(['article', 'COUNT(ac.idArticle) as cntComments'])
        ->leftJoin('App\Entity\ArticleComment','ac', \Doctrine\ORM\Query\Expr\Join::WITH, 'article.id = ac.idArticle ')
        ->groupBy('article.id')
        ->getQuery();

    }


}
