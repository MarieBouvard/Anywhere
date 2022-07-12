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

    /**
     * @ORM\Column(type="boolean")
     */
    private $isTop;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secondPerson;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thirdPerson;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fourthPerson;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pictureSecondPerson;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pictureThirdPerson;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pictureFourthPerson;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $headerBanner;

    /**
     * @ORM\Column(type="integer")
     */
    private $experience;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $spokenLanguages;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $discoveryPicture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $discoveryQuote;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstCarouselPic;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $secondCarouselPic;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $thirdCarouselPic;


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

    public function isIsTop(): ?bool
    {
        return $this->isTop;
    }

    public function setIsTop(?bool $isTop): self
    {
        $this->isTop = $isTop;

        return $this;
    }

    public function getSecondPerson(): ?string
    {
        return $this->secondPerson;
    }

    public function setSecondPerson(?string $secondPerson): self
    {
        $this->secondPerson = $secondPerson;

        return $this;
    }

    public function getThirdPerson(): ?string
    {
        return $this->thirdPerson;
    }

    public function setThirdPerson(?string $thirdPerson): self
    {
        $this->thirdPerson = $thirdPerson;

        return $this;
    }

    public function getFourthPerson(): ?string
    {
        return $this->fourthPerson;
    }

    public function setFourthPerson(?string $fourthPerson): self
    {
        $this->fourthPerson = $fourthPerson;

        return $this;
    }

    public function getPictureSecondPerson(): ?string
    {
        return $this->pictureSecondPerson;
    }

    public function setPictureSecondPerson(?string $pictureSecondPerson): self
    {
        $this->pictureSecondPerson = $pictureSecondPerson;

        return $this;
    }

    public function getPictureThirdPerson(): ?string
    {
        return $this->pictureThirdPerson;
    }

    public function setPictureThirdPerson(?string $pictureThirdPerson): self
    {
        $this->pictureThirdPerson = $pictureThirdPerson;

        return $this;
    }

    public function getPictureFourthPerson(): ?string
    {
        return $this->pictureFourthPerson;
    }

    public function setPictureFourthPerson(?string $pictureFourthPerson): self
    {
        $this->pictureFourthPerson = $pictureFourthPerson;

        return $this;
    }

    public function getHeaderBanner(): ?string
    {
        return $this->headerBanner;
    }

    public function setHeaderBanner(string $headerBanner): self
    {
        $this->headerBanner = $headerBanner;

        return $this;
    }

    public function getExperience(): ?string
    {
        return $this->experience;
    }

    public function setExperience(string $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getSpokenLanguages(): ?string
    {
        return $this->spokenLanguages;
    }

    public function setSpokenLanguages(string $spokenLanguages): self
    {
        $this->spokenLanguages = $spokenLanguages;

        return $this;
    }

    public function getDiscoveryPicture(): ?string
    {
        return $this->discoveryPicture;
    }

    public function setDiscoveryPicture(string $discoveryPicture): self
    {
        $this->discoveryPicture = $discoveryPicture;

        return $this;
    }

    public function getDiscoveryQuote(): ?string
    {
        return $this->discoveryQuote;
    }

    public function setDiscoveryQuote(string $discoveryQuote): self
    {
        $this->discoveryQuote = $discoveryQuote;

        return $this;
    }

    public function getFirstCarouselPic(): ?string
    {
        return $this->firstCarouselPic;
    }

    public function setFirstCarouselPic(string $firstCarouselPic): self
    {
        $this->firstCarouselPic = $firstCarouselPic;

        return $this;
    }

    public function getSecondCarouselPic(): ?string
    {
        return $this->secondCarouselPic;
    }

    public function setSecondCarouselPic(string $secondCarouselPic): self
    {
        $this->secondCarouselPic = $secondCarouselPic;

        return $this;
    }

    public function getThirdCarouselPic(): ?string
    {
        return $this->thirdCarouselPic;
    }

    public function setThirdCarouselPic(string $thirdCarouselPic): self
    {
        $this->thirdCarouselPic = $thirdCarouselPic;

        return $this;
    }

}
