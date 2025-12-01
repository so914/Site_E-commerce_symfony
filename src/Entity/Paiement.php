<?php

namespace App\Entity;

use App\Enum\PaiementStat;
use App\Repository\PaiementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaiementRepository::class)]
class Paiement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $commande = null;

    #[ORM\Column(enumType: PaiementStat::class)]
    private ?PaiementStat $statut = null;

    #[ORM\Column]
    private ?float $total = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $datePaiement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(Commande $commande): static
    {
        $this->commande = $commande;

        return $this;
    }

    public function getStatut(): ?PaiementStat
    {
        return $this->statut;
    }

    public function setStatut(PaiementStat $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): static
    {
        $this->total = $total;

        return $this;
    }

    public function getDatePaiement(): ?\DateTimeImmutable
    {
        return $this->datePaiement;
    }

    public function setDatePaiement(\DateTimeImmutable $datePaiement): static
    {
        $this->datePaiement = $datePaiement;

        return $this;
    }
}
