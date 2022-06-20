<?php

namespace App\Entity;

use App\Repository\AgencyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgencyRepository::class)
 */
class Agency
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $responsable;


    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;


     /**
     * @ORM\Column(type="string", length=150)
     */
    private $role;


    /**
     * @ORM\Column(type="text")
     */
    private $description;


    /**
     * @ORM\Column(type="string", length=50)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $city;

    /**
     * @ORM\ManyToOne(targetEntity=Activity::class, inversedBy="agencies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $activity;

    /**
     * @ORM\ManyToOne(targetEntity=Style::class, inversedBy="agencies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $style;

    /**
     * @ORM\ManyToOne(targetEntity=NumberOfPeople::class, inversedBy="agencies")
     */
    private $numberOfPeople;

    /**
     * @ORM\OneToMany(targetEntity=Travel::class, mappedBy="agency", orphanRemoval=true)
     */
    private $travel;

    public function __construct()
    {
        $this->travel = new ArrayCollection();
    }

    public function __toString()
    {
        $username = "L'agence de " . $this->getResponsable();
        return $username;
    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getActivity(): ?Activity
    {
        return $this->activity;
    }

    public function setActivity(?Activity $activity): self
    {
        $this->activity = $activity;

        return $this;
    }

    public function getStyle(): ?Style
    {
        return $this->style;
    }

    public function setStyle(?Style $style): self
    {
        $this->style = $style;

        return $this;
    }

    public function getNumberOfPeople(): ?NumberOfPeople
    {
        return $this->numberOfPeople;
    }

    public function setNumberOfPeople(?NumberOfPeople $numberOfPeople): self
    {
        $this->numberOfPeople = $numberOfPeople;

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
            $travel->setAgency($this);
        }

        return $this;
    }

    public function removeTravel(Travel $travel): self
    {
        if ($this->travel->removeElement($travel)) {
            // set the owning side to null (unless already changed)
            if ($travel->getAgency() === $this) {
                $travel->setAgency(null);
            }
        }

        return $this;
    }
}
