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
     * uses left joins to call less queries for index of entities
     *
     * @param  mixed $value
     * @return Query
     */
    public function findAllWithCommentCounts($value): Query
    {
   
        return $this->createQueryBuilder('article')
        ->select(['article','aa.email', 'COUNT(ac.idArticle) as cntComments'])
        ->leftJoin('App\Entity\ArticleComment','ac', \Doctrine\ORM\Query\Expr\Join::WITH, 'article.id = ac.idArticle ')
        ->leftJoin('App\Entity\ArticleAuthor','aa', \Doctrine\ORM\Query\Expr\Join::WITH, 'article.idAuthor = aa.id')
        ->groupBy('article.id')
        ->getQuery();

    }


}
