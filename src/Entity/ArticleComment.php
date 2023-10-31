<?php

namespace App\Entity;

use App\Repository\ArticleCommentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleCommentRepository::class)]
class ArticleComment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'articleComments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Article $idArticle = null;

    #[ORM\ManyToOne(inversedBy: 'articleComments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CommentUser $idUser = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $message = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datetimeCreated = null;

    public function __construct(){
        
        $this->datetimeCreated  = new \Datetime();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdArticle(): ?Article
    {
        return $this->idArticle;
    }

    public function setIdArticle(?Article $idArticle): static
    {
        $this->idArticle = $idArticle;

        return $this;
    }

    public function getIdUser(): ?CommentUser
    {
        return $this->idUser;
    }

    public function setIdUser(?CommentUser $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getDatetimeCreated(): ?\DateTimeInterface
    {
        return $this->datetimeCreated;
    }

    public function setDatetimeCreated(\DateTimeInterface $datetimeCreated): static
    {
        $this->datetimeCreated = $datetimeCreated;

        return $this;
    }
}