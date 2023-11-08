<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Psr\Log\LoggerInterface;
use App\Entity\ArticleComment;
use App\Form\ArticleCommentType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CommentUserRepository;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\ArticleCommentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/article')]
class ArticleController extends AbstractController
{
    #[Route('/', name: 'app_article_index', methods: ['GET'])]
    public function index(ArticleRepository $articleRepository,  PaginatorInterface $paginator, Request $request): Response
    {


        $articlesPaginated = $paginator->paginate(
            $articleRepository->findAllWithCommentCounts(''),
            $request->query->getInt('page', 1),
            10
        );

        

        return $this->render('article/index.html.twig', [
            'articles' => $articleRepository->findAll(),
            'articlesPaginated' => $articlesPaginated,
        ]);
    }

    #[Route('/new', name: 'app_article_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('app_article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('article/new.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_article_show', methods: ['GET', 'POST'])]
    public function show(
        Article $article,
        PaginatorInterface $paginator,
        ArticleCommentRepository $articleCommentRepository,
        CommentUserRepository $commentUserRepository,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {

        
        $commentUser = $commentUserRepository->findOneBy(['id' => 2]);

        $articleComment = new ArticleComment();
        $articleComment->setIdArticle($article);
        $articleComment->setIdUser($commentUser);

        $form = $this->createForm(ArticleCommentType::class, $articleComment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($articleComment);
            $entityManager->flush();
        }


        $commentsPaginated = $paginator->paginate(
            $articleCommentRepository->findBy(array('idArticle' => $article->getId()), array('datetimeCreated' => 'DESC')),
            $request->query->getInt('page', 1),
            10
        );


        return $this->render('article/show.html.twig', [
            'article'           => $article,
            'commentsPaginated' => $commentsPaginated,
            'article_comment'   => $articleComment,
            'form'              => $form, 
        ]);
    }

    #[Route('/{id}/edit', name: 'app_article_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Article $article, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('article/edit.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_article_delete', methods: ['POST'])]
    public function delete(Request $request, Article $article, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $article->getId(), $request->request->get('_token'))) {
            $entityManager->remove($article);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_article_index', [], Response::HTTP_SEE_OTHER);
    }
}
