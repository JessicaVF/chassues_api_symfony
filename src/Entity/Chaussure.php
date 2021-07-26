<?php

namespace App\Entity;

use App\Repository\ChaussureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ChaussureRepository::class)
 */
class Chaussure
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"chaussuresIndex"})
     *
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"chaussuresIndex"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"chaussuresIndex"})
     */
    private $brand;

    /**
     * @ORM\Column(type="text")
     * @Groups({"chaussuresIndex"})
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Lacet::class, mappedBy="chaussure", orphanRemoval=true)
     * @Groups({"chaussuresIndex"})
     */
    private $lacets;

    public function __construct()
    {
        $this->lacets = new ArrayCollection();
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

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Lacet[]
     */
    public function getLacets(): Collection
    {
        return $this->lacets;
    }

    public function addLacet(Lacet $lacet): self
    {
        if (!$this->lacets->contains($lacet)) {
            $this->lacets[] = $lacet;
            $lacet->setChaussure($this);
        }

        return $this;
    }

    public function removeLacet(Lacet $lacet): self
    {
        if ($this->lacets->removeElement($lacet)) {
            // set the owning side to null (unless already changed)
            if ($lacet->getChaussure() === $this) {
                $lacet->setChaussure(null);
            }
        }

        return $this;
    }
}
