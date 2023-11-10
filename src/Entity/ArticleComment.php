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

    #[ORM\Column(type: Types::TEXT)]
    private ?string $message = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datetimeCreated = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    public function __construct(){
        
        $this->datetimeCreated  = new \Datetime();
        $this->email            = "";
        $this->message          = "";

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

}
