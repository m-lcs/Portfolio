<?php

namespace App\Entity;

use App\Repository\StagesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StagesRepository::class)]
class Stages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descr = null;

    #[ORM\Column(length: 255)]
    private ?string $lienRapport = null;

    #[ORM\Column(length: 255)]
    private ?string $logo = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\ManyToOne(inversedBy: 'stages')]
    private ?Annee $annee = null;

    #[ORM\ManyToMany(targetEntity: Logiciels::class, inversedBy: 'stages')]
    private Collection $logiciels;

    #[ORM\ManyToMany(targetEntity: Competences::class, inversedBy: 'stages')]
    private Collection $Competences;

    #[ORM\ManyToMany(targetEntity: LogicielsWin::class, inversedBy: 'stages')]
    private Collection $Web;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image5 = null;

    public function __construct()
    {
        $this->logiciels = new ArrayCollection();
        $this->Competences = new ArrayCollection();
        $this->Web = new ArrayCollection();
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

    public function getDescr(): ?string
    {
        return $this->descr;
    }

    public function setDescr(string $descr): static
    {
        $this->descr = $descr;

        return $this;
    }

    public function getLienRapport(): ?string
    {
        return $this->lienRapport;
    }

    public function setLienRapport(string $lienRapport): static
    {
        $this->lienRapport = $lienRapport;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): static
    {
        $this->logo = $logo;

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
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): static
    {
        $this->dateFin = $dateFin;

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
     * @return Collection<int, Competences>
     */
    public function getCompetences(): Collection
    {
        return $this->Competences;
    }

    public function addCompetence(Competences $competence): static
    {
        if (!$this->Competences->contains($competence)) {
            $this->Competences->add($competence);
        }

        return $this;
    }

    public function removeCompetence(Competences $competence): static
    {
        $this->Competences->removeElement($competence);

        return $this;
    }

    /**
     * @return Collection<int, LogicielsWin>
     */
    public function getWeb(): Collection
    {
        return $this->Web;
    }

    public function addWeb(LogicielsWin $web): static
    {
        if (!$this->Web->contains($web)) {
            $this->Web->add($web);
        }

        return $this;
    }

    public function removeWeb(LogicielsWin $web): static
    {
        $this->Web->removeElement($web);

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(?string $image2): static
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(?string $image3): static
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getImage4(): ?string
    {
        return $this->image4;
    }

    public function setImage4(?string $image4): static
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
}
