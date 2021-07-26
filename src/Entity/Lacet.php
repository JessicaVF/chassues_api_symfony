<?php

namespace App\Entity;

use App\Repository\LacetRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=LacetRepository::class)
 */
class Lacet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"chaussuresIndex", "lacetCreate"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"chaussuresIndex", "lacetCreate"})
     */
    private $couleur;

    /**
     * @ORM\ManyToOne(targetEntity=Chaussure::class, inversedBy="lacets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $chaussure;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getChaussure(): ?Chaussure
    {
        return $this->chaussure;
    }

    public function setChaussure(?Chaussure $chaussure): self
    {
        $this->chaussure = $chaussure;

        return $this;
    }
}
