<?php

namespace App\Entity;

use App\Repository\ProjetsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetsRepository::class)]
class Projets
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lien = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateFin = null;

    #[ORM\ManyToMany(targetEntity: Competences::class, inversedBy: 'projets')]
    private Collection $competences;

    #[ORM\ManyToOne(inversedBy: 'projets')]
    private ?Annee $annee = null;

    #[ORM\ManyToMany(targetEntity: Logiciels::class, inversedBy: 'projets')]
    private Collection $logiciels;

    #[ORM\ManyToMany(targetEntity: WebCompetences::class, inversedBy: 'projets')]
    private Collection $webcompetences;

    #[ORM\ManyToMany(targetEntity: LogicielsWin::class, inversedBy: 'projets')]
    private Collection $LogicielWin;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image5 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image6 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image7 = null;

    public function __construct()
    {
        $this->competences = new ArrayCollection();
        $this->logiciels = new ArrayCollection();
        $this->webcompetences = new ArrayCollection();
        $this->LogicielWin = new ArrayCollection();
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(string $lien): static
    {
        $this->lien = $lien;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->DateFin;
    }

    public function setDateFin(\DateTimeInterface $DateFin): static
    {
        $this->DateFin = $DateFin;

        return $this;
    }

    /**
     * @return Collection<int, Competences>
     */
    public function getCompetences(): Collection
    {
        return $this->competences;
    }

    public function addCompetence(Competences $competence): static
    {
        if (!$this->competences->contains($competence)) {
            $this->competences->add($competence);
        }

        return $this;
    }

    public function removeCompetence(Competences $competence): static
    {
        $this->competences->removeElement($competence);

        return $this;
    }

    public function getAnnee(): ?Annee
    {
        return $this->annee;
    }

    public function setAnnee(?Annee $annee): static
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * @return Collection<int, Logiciels>
     */
    public function getLogiciels(): Collection
    {
        return $this->logiciels;
    }

    public function addLogiciel(Logiciels $logiciel): static
    {
        if (!$this->logiciels->contains($logiciel)) {
            $this->logiciels->add($logiciel);
        }

        return $this;
    }

    public function removeLogiciel(Logiciels $logiciel): static
    {
        $this->logiciels->removeElement($logiciel);

        return $this;
    }

    /**
     * @return Collection<int, WebCompetences>
     */
    public function getWebcompetences(): Collection
    {
        return $this->webcompetences;
    }

    public function addWebcompetence(WebCompetences $webcompetence): static
    {
        if (!$this->webcompetences->contains($webcompetence)) {
            $this->webcompetences->add($webcompetence);
        }

        return $this;
    }

    public function removeWebcompetence(WebCompetences $webcompetence): static
    {
        $this->webcompetences->removeElement($webcompetence);

        return $this;
    }

    /**
     * @return Collection<int, LogicielsWin>
     */
    public function getLogicielWin(): Collection
    {
        return $this->LogicielWin;
    }

    public function addLogicielWin(LogicielsWin $logicielWin): static
    {
        if (!$this->LogicielWin->contains($logicielWin)) {
            $this->LogicielWin->add($logicielWin);
        }

        return $this;
    }

    public function removeLogicielWin(LogicielsWin $logicielWin): static
    {
        $this->LogicielWin->removeElement($logicielWin);

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(string $image2): static
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(string $image3): static
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getImage4(): ?string
    {
        return $this->image4;
    }

    public function setImage4(string $image4): static
    {
        $this->image4 = $image4;

        return $this;
    }

    public function getImage5(): ?string
    {
        return $this->image5;
    }

    public function setImage5(?string $image5): static
    {
        $this->image5 = $image5;

        return $this;
    }

    public function getImage6(): ?string
    {
        return $this->image6;
    }

    public function setImage6(string $image6): static
    {
        $this->image6 = $image6;

        return $this;
    }

    public function getImage7(): ?string
    {
        return $this->image7;
    }

    public function setImage7(string $image7): static
    {
        $this->image7 = $image7;

        return $this;
    }
}
