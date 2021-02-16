<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=24)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $auth_token;

    /**
     * @ORM\OneToMany(targetEntity=Gasto::class, mappedBy="user")
     */
    private $gasto;

    public function __construct()
    {
        $this->gasto = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getAuthToken(): ?string
    {
        return $this->auth_token;
    }

    public function setAuthToken(?string $auth_token): self
    {
        $this->auth_token = $auth_token;

        return $this;
    }

    /**
     * @return Collection|Gasto[]
     */
    public function getGasto(): Collection
    {
        return $this->gasto;
    }

    public function addGasto(Gasto $gasto): self
    {
        if (!$this->gasto->contains($gasto)) {
            $this->gasto[] = $gasto;
            $gasto->setUser($this);
        }

        return $this;
    }

    public function removeGasto(Gasto $gasto): self
    {
        if ($this->gasto->removeElement($gasto)) {
            // set the owning side to null (unless already changed)
            if ($gasto->getUser() === $this) {
                $gasto->setUser(null);
            }
        }

        return $this;
    }
}
