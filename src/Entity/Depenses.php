<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepensesRepository")
 */
class Depenses
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @ORM\Column(type="date")
     */
    private $date_depense;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeDepense", inversedBy="typedepense")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typedepense;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Employee", inversedBy="employee")
     * @ORM\JoinColumn(nullable=false)
     */
    private $employee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getDateDepense(): ?\DateTimeInterface
    {
        return $this->date_depense;
    }

    public function setDateDepense(\DateTimeInterface $date_depense): self
    {
        $this->date_depense = $date_depense;

        return $this;
    }

    public function getTypedepense(): ?TypeDepense
    {
        return $this->typedepense;
    }

    public function setTypedepense(?TypeDepense $typedepense): self
    {
        $this->typedepense = $typedepense;

        return $this;
    }

    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    public function setEmployee(?Employee $employee): self
    {
        $this->employee = $employee;

        return $this;
    }
}
