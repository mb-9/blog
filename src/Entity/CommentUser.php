<?php

namespace App\Entity;

use App\Repository\CommentUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentUserRepository::class)]
class CommentUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\OneToMany(mappedBy: 'idUser', targetEntity: ArticleComment::class, orphanRemoval: true)]
    private Collection $articleComments;

    public function __construct()
    {
        $this->articleComments     = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, ArticleComment>
     */
    public function getArticleComments(): Collection
    {
        return $this->articleComments;
    }

    public function addArticleComment(ArticleComment $articleComment): static
    {
        if (!$this->articleComments->contains($articleComment)) {
            $this->articleComments->add($articleComment);
            $articleComment->setIdUser($this);
        }

        return $this;
    }

    public function removeArticleComment(ArticleComment $articleComment): static
    {
        if ($this->articleComments->removeElement($articleComment)) {
            // set the owning side to null (unless already changed)
            if ($articleComment->getIdUser() === $this) {
                $articleComment->setIdUser(null);
            }
        }

        return $this;
    }
}
