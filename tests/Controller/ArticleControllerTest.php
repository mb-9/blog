<?php

namespace App\Test\Controller;

use App\Entity\Article;
use App\Entity\ArticleAuthor;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArticleControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private ArticleRepository $repository;
    private string $path = '/article/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Article::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Blog index');

    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'article[title]' => 'Testing',
            'article[description]' => 'Testing',
            'article[content]' => 'Testing',
            'article[idAuthor]' => 1,
        ]);

        self::assertResponseRedirects('/article/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {

        $this->markTestIncomplete();
        $fixtureAuthor = new ArticleAuthor();
        $fixtureAuthor->setEmail("authoremail@testemail.com");

        $this->manager->persist($fixtureAuthor);
        
        $fixture = new Article();
        $fixture->setTitle('My Title');
        $fixture->setDescription('My Title');
        $fixture->setContent('My Title');
        $fixture->setIdAuthor($fixtureAuthor);

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Blog post');
    }


/*
    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Article();
        $fixture->setTitle('My Title');
        $fixture->setDescription('My Title');
        $fixture->setContent('My Title');
        $fixture->setIdAuthor('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'article[title]' => 'Something New',
            'article[description]' => 'Something New',
            'article[datetimeCreated]' => 'Something New',
            'article[content]' => 'Something New',
            'article[idAuthor]' => 'Something New',
        ]);

        self::assertResponseRedirects('/article/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getTitle());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getDatetimeCreated());
        self::assertSame('Something New', $fixture[0]->getContent());
        self::assertSame('Something New', $fixture[0]->getIdAuthor());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Article();
        $fixture->setTitle('My Title');
        $fixture->setDescription('My Title');
        $fixture->setContent('My Title');
        $fixture->setIdAuthor('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/article/');
    }*/
}
