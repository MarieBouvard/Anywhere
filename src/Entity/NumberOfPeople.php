<?php

namespace App\Entity;

use App\Repository\NumberOfPeopleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NumberOfPeopleRepository::class)
 */
class NumberOfPeople
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Travel::class, mappedBy="numberOfPeople")
     */
    private $travel;

    /**
     * @ORM\OneToMany(targetEntity=Agency::class, mappedBy="numberOfPeople")
     */
    private $agencies;

    public function __construct()
    {
        $this->travel = new ArrayCollection();
        $this->agencies = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
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

    /**
     * @return Collection<int, Travel>
     */
    public function getTravel(): Collection
    {
        return $this->travel;
    }

    public function addTravel(Travel $travel): self
    {
        if (!$this->travel->contains($travel)) {
            $this->travel[] = $travel;
            $travel->addNumberOfPerson($this);
        }

        return $this;
    }

    public function removeTravel(Travel $travel): self
    {
        if ($this->travel->removeElement($travel)) {
            $travel->removeNumberOfPerson($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Agency>
     */
    public function getAgencies(): Collection
    {
        return $this->agencies;
    }

    public function addAgency(Agency $agency): self
    {
        if (!$this->agencies->contains($agency)) {
            $this->agencies[] = $agency;
            $agency->setNumberOfPeople($this);
        }

        return $this;
    }

    public function removeAgency(Agency $agency): self
    {
        if ($this->agencies->removeElement($agency)) {
            // set the owning side to null (unless already changed)
            if ($agency->getNumberOfPeople() === $this) {
                $agency->setNumberOfPeople(null);
            }
        }

        return $this;
    }
}
