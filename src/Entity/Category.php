<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
     * @ORM\OneToMany(targetEntity=Gasto::class, mappedBy="category")
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
            $gasto->setCategory($this);
        }

        return $this;
    }

    public function removeGasto(Gasto $gasto): self
    {
        if ($this->gasto->removeElement($gasto)) {
            // set the owning side to null (unless already changed)
            if ($gasto->getCategory() === $this) {
                $gasto->setCategory(null);
            }
        }

        return $this;
    }
}
