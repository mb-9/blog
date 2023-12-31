<?php

namespace App\Test\Controller;

use App\Entity\Article;
use App\Entity\ArticleAuthor;
use App\Entity\ArticleComment;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ArticleCommentRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArticleCommentControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private ArticleCommentRepository $repository;
    private string $path = '/article/comment/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(ArticleComment::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testNew(): void {

        $fixtureAuthor = new ArticleAuthor();
        $fixtureAuthor->setEmail("authoremail@testemail.com");

        $fixture = new Article();
        $fixture->setTitle('My Title');
        $fixture->setDescription('My Description');
        $fixture->setContent('My Content');
        $fixture->setIdAuthor($fixtureAuthor);


        $this->manager = static::getContainer()->get(EntityManagerInterface::class);
        $this->manager->persist($fixtureAuthor);
        $this->manager->persist($fixture);
        $this->manager->flush();


        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->client->request('GET', twig_sprintf('article/' . $fixture->getId(), $this->path));

        self::assertResponseStatusCodeSame(200);
        
        $this->client->submitForm('Save', [
            'article_comment[message]' => 'Booo',
            'article_comment[email]' => 'test@email.com',
        ]);
  
        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    /*public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);


        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }



    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ArticleComment();
        $fixture->setMessage('My Title');
        $fixture->setDatetimeCreated('My Title');
        $fixture->setIdArticle('My Title');
        $fixture->setIdUser('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ArticleComment');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ArticleComment();
        $fixture->setMessage('My Title');
        $fixture->setDatetimeCreated('My Title');
        $fixture->setIdArticle('My Title');
        $fixture->setIdUser('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'article_comment[message]' => 'Something New',
            'article_comment[datetimeCreated]' => 'Something New',
            'article_comment[idArticle]' => 'Something New',
            'article_comment[idUser]' => 'Something New',
        ]);

        self::assertResponseRedirects('/article/comment/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getMessage());
        self::assertSame('Something New', $fixture[0]->getDatetimeCreated());
        self::assertSame('Something New', $fixture[0]->getIdArticle());
        self::assertSame('Something New', $fixture[0]->getIdUser());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new ArticleComment();
        $fixture->setMessage('My Title');
        $fixture->setDatetimeCreated('My Title');
        $fixture->setIdArticle('My Title');
        $fixture->setIdUser('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/article/comment/');
    }*/
}
