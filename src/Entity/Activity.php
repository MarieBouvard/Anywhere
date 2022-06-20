<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActivityRepository::class)
 */
class Activity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=Travel::class, mappedBy="activity")
     */
    private $travel;

    /**
     * @ORM\OneToMany(targetEntity=Agency::class, mappedBy="activity", orphanRemoval=true)
     */
    private $agencies;

    public function __construct()
    {
        $this->travel = new ArrayCollection();
        $this->agencies = new ArrayCollection();
    }

    public function __toString() : ?string {
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

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
            $travel->setActivity($this);
        }

        return $this;
    }

    public function removeTravel(Travel $travel): self
    {
        if ($this->travel->removeElement($travel)) {
            // set the owning side to null (unless already changed)
            if ($travel->getActivity() === $this) {
                $travel->setActivity(null);
            }
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
            $agency->setActivity($this);
        }

        return $this;
    }

    public function removeAgency(Agency $agency): self
    {
        if ($this->agencies->removeElement($agency)) {
            // set the owning side to null (unless already changed)
            if ($agency->getActivity() === $this) {
                $agency->setActivity(null);
            }
        }

        return $this;
    }
}
