<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployeeRepository")
 */
class Employee
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
    private $matricule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $number;

    /**
     * @ORM\Column(type="integer")
     */
    private $salary;

    /**
     * @ORM\Column(type="date")
     */
    private $date_of_taking_office;

    /**
     * @ORM\Column(type="integer")
     */
    private $duration_of_contract;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_of_contract;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Depenses", mappedBy="employee", orphanRemoval=true)
     */
    private $employee;

    public function __construct()
    {
        $this->created_at = new \DateTime();
        $this->employee = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getSalary(): ?int
    {
        return $this->salary;
    }

    public function setSalary(int $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getDateOfTakingOffice(): ?\DateTimeInterface
    {
        return $this->date_of_taking_office;
    }

    public function setDateOfTakingOffice(\DateTimeInterface $date_of_taking_office): self
    {
        $this->date_of_taking_office = $date_of_taking_office;

        return $this;
    }

    public function getDurationOfContract(): ?int
    {
        return $this->duration_of_contract;
    }

    public function setDurationOfContract(int $duration_of_contract): self
    {
        $this->duration_of_contract = $duration_of_contract;

        return $this;
    }

    public function getTypeOfContract(): ?string
    {
        return $this->type_of_contract;
    }

    public function setTypeOfContract(string $type_of_contract): self
    {
        $this->type_of_contract = $type_of_contract;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return Collection|Depenses[]
     */
    public function getEmployee(): Collection
    {
        return $this->employee;
    }

    public function addEmployee(Depenses $employee): self
    {
        if (!$this->employee->contains($employee)) {
            $this->employee[] = $employee;
            $employee->setEmployee($this);
        }

        return $this;
    }

    public function removeEmployee(Depenses $employee): self
    {
        if ($this->employee->contains($employee)) {
            $this->employee->removeElement($employee);
            // set the owning side to null (unless already changed)
            if ($employee->getEmployee() === $this) {
                $employee->setEmployee(null);
            }
        }

        return $this;
    }
}
