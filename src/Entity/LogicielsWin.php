<?php

namespace App\Entity;

use App\Repository\LogicielsWinRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogicielsWinRepository::class)]
class LogicielsWin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\ManyToMany(targetEntity: Projets::class, mappedBy: 'LogicielWin')]
    private Collection $projets;

    #[ORM\ManyToMany(targetEntity: Stages::class, mappedBy: 'Web')]
    private Collection $stages;

    public function __construct()
    {
        $this->projets = new ArrayCollection();
        $this->stages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Projets>
     */
    public function getProjets(): Collection
    {
        return $this->projets;
    }

    public function addProjet(Projets $projet): static
    {
        if (!$this->projets->contains($projet)) {
            $this->projets->add($projet);
            $projet->addLogicielWin($this);
        }

        return $this;
    }

    public function removeProjet(Projets $projet): static
    {
        if ($this->projets->removeElement($projet)) {
            $projet->removeLogicielWin($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Stages>
     */
    public function getStages(): Collection
    {
        return $this->stages;
    }

    public function addStage(Stages $stage): static
    {
        if (!$this->stages->contains($stage)) {
            $this->stages->add($stage);
            $stage->addWeb($this);
        }

        return $this;
    }

    public function removeStage(Stages $stage): static
    {
        if ($this->stages->removeElement($stage)) {
            $stage->removeWeb($this);
        }

        return $this;
    }
}
