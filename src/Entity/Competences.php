<?php

namespace App\Entity;

use App\Repository\CompetencesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetencesRepository::class)]
class Competences
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: Projets::class, mappedBy: 'competences')]
    private Collection $projets;

    #[ORM\ManyToMany(targetEntity: Stages::class, mappedBy: 'Competences')]
    private Collection $stages;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descriptionCompetence = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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
            $projet->addCompetence($this);
        }

        return $this;
    }

    public function removeProjet(Projets $projet): static
    {
        if ($this->projets->removeElement($projet)) {
            $projet->removeCompetence($this);
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
            $stage->addCompetence($this);
        }

        return $this;
    }

    public function removeStage(Stages $stage): static
    {
        if ($this->stages->removeElement($stage)) {
            $stage->removeCompetence($this);
        }

        return $this;
    }

    public function getDescriptionCompetence(): ?string
    {
        return $this->descriptionCompetence;
    }

    public function setDescriptionCompetence(string $descriptionCompetence): static
    {
        $this->descriptionCompetence = $descriptionCompetence;

        return $this;
    }
}
