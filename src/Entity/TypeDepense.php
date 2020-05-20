<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeDepenseRepository")
 * @UniqueEntity("account_number")
 */
class TypeDepense
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $account_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Depenses", mappedBy="account_number")
     */
    private $depenses;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Depenses", mappedBy="typedepense", orphanRemoval=true)
     */
    private $typedepense;

    public function __construct()
    {
        $this->depenses = new ArrayCollection();
        $this->typedepense = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccountNumber(): ?int
    {
        return $this->account_number;
    }

    public function setAccountNumber(int $account_number): self
    {
        $this->account_number = $account_number;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Depenses[]
     */
    public function getDepenses(): Collection
    {
        return $this->depenses;
    }

    public function addDepense(Depenses $depense): self
    {
        if (!$this->depenses->contains($depense)) {
            $this->depenses[] = $depense;
            $depense->addAccountNumber($this);
        }

        return $this;
    }

    public function removeDepense(Depenses $depense): self
    {
        if ($this->depenses->contains($depense)) {
            $this->depenses->removeElement($depense);
            $depense->removeAccountNumber($this);
        }

        return $this;
    }

    /**
     * @return Collection|Depenses[]
     */
    public function getTypedepense(): Collection
    {
        return $this->typedepense;
    }

    public function addTypedepense(Depenses $typedepense): self
    {
        if (!$this->typedepense->contains($typedepense)) {
            $this->typedepense[] = $typedepense;
            $typedepense->setTypedepense($this);
        }

        return $this;
    }

    public function removeTypedepense(Depenses $typedepense): self
    {
        if ($this->typedepense->contains($typedepense)) {
            $this->typedepense->removeElement($typedepense);
            // set the owning side to null (unless already changed)
            if ($typedepense->getTypedepense() === $this) {
                $typedepense->setTypedepense(null);
            }
        }

        return $this;
    }
}
