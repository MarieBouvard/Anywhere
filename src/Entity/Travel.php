<?php

namespace App\Entity;

use App\Repository\TravelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TravelRepository::class)
 */
class Travel
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
    private $place;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="date")
     */
    private $startDate;

    /**
     * @ORM\Column(type="date")
     */
    private $endDate;

    /**
     * @ORM\ManyToOne(targetEntity=Style::class, inversedBy="travel")
     */
    private $style;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity=Activity::class, inversedBy="travel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $activity;

    /**
     * @ORM\ManyToMany(targetEntity=NumberOfPeople::class, inversedBy="travel")
     */
    private $numberOfPeople;

    /**
     * @ORM\OneToMany(targetEntity=Comments::class, mappedBy="travel")
     */
    private $comments;

    /**
     * @ORM\ManyToMany(targetEntity=Period::class, inversedBy="travel")
     */
    private $period;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageCarousel1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageCarousel2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageCarousel3;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $priceTwo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $priceThree;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $priceFour;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $additionalPrice;

    /**
     * @ORM\ManyToMany(targetEntity=ServiceIncluded::class, inversedBy="travel")
     */
    private $serviceIncluded;

    /**
     * @ORM\ManyToMany(targetEntity=ServiceNotIncluded::class, inversedBy="travel")
     */
    private $serviceNotIncluded;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isBest;

    /**
     * @ORM\ManyToOne(targetEntity=Agency::class, inversedBy="travel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $agency;

    /**
     * @ORM\OneToMany(targetEntity=TravelLike::class, mappedBy="travel")
     */
    private $likes;

    /**
     * @ORM\ManyToMany(targetEntity=Wishlist::class, mappedBy="travel")
     */
    private $wishlists;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isGem;

    public function __construct()
    {
        $this->numberOfPeople = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->period = new ArrayCollection();
        $this->serviceIncluded = new ArrayCollection();
        $this->serviceNotIncluded = new ArrayCollection();
        $this->likes = new ArrayCollection();
        $this->wishlists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    // public function __toString() : ?string {
    //     return $this->getStartDate();
    // }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getTime(){
        $time = date_diff($this->getEndDate(), $this->getStartDate());
        return $time->format('%d jours');
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

    public function getActivity(): ?Activity
    {
        return $this->activity;
    }

    public function setActivity(?Activity $activity): self
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * @return Collection<int, NumberOfPeople>
     */
    public function getNumberOfPeople(): Collection
    {
        return $this->numberOfPeople;
    }

    public function addNumberOfPerson(NumberOfPeople $numberOfPerson): self
    {
        if (!$this->numberOfPeople->contains($numberOfPerson)) {
            $this->numberOfPeople[] = $numberOfPerson;
        }

        return $this;
    }

    public function removeNumberOfPerson(NumberOfPeople $numberOfPerson): self
    {
        $this->numberOfPeople->removeElement($numberOfPerson);

        return $this;
    }

    /**
     * @return Collection<int, Comments>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comments $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setTravel($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getTravel() === $this) {
                $comment->setTravel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Period>
     */
    public function getPeriod(): Collection
    {
        return $this->period;
    }

    public function addPeriod(Period $period): self
    {
        if (!$this->period->contains($period)) {
            $this->period[] = $period;
        }

        return $this;
    }

    public function removePeriod(Period $period): self
    {
        $this->period->removeElement($period);

        return $this;
    }

    public function getImageCarousel1(): ?string
    {
        return $this->imageCarousel1;
    }

    public function setImageCarousel1(?string $imageCarousel1): self
    {
        $this->imageCarousel1 = $imageCarousel1;

        return $this;
    }

    public function getImageCarousel2(): ?string
    {
        return $this->imageCarousel2;
    }

    public function setImageCarousel2(?string $imageCarousel2): self
    {
        $this->imageCarousel2 = $imageCarousel2;

        return $this;
    }

    public function getImageCarousel3(): ?string
    {
        return $this->imageCarousel3;
    }

    public function setImageCarousel3(?string $imageCarousel3): self
    {
        $this->imageCarousel3 = $imageCarousel3;

        return $this;
    }

    public function getPriceTwo(): ?int
    {
        return $this->priceTwo;
    }

    public function setPriceTwo(?int $priceTwo): self
    {
        $this->priceTwo = $priceTwo;

        return $this;
    }

    public function getPriceThree(): ?int
    {
        return $this->priceThree;
    }

    public function setPriceThree(?int $priceThree): self
    {
        $this->priceThree = $priceThree;

        return $this;
    }

    public function getPriceFour(): ?int
    {
        return $this->priceFour;
    }

    public function setPriceFour(?int $priceFour): self
    {
        $this->priceFour = $priceFour;

        return $this;
    }

    public function getAdditionalPrice(): ?int
    {
        return $this->additionalPrice;
    }

    public function setAdditionalPrice(?int $additionalPrice): self
    {
        $this->additionalPrice = $additionalPrice;

        return $this;
    }

    /**
     * @return Collection<int, ServiceIncluded>
     */
    public function getServiceIncluded(): Collection
    {
        return $this->serviceIncluded;
    }

    public function addServiceIncluded(ServiceIncluded $serviceIncluded): self
    {
        if (!$this->serviceIncluded->contains($serviceIncluded)) {
            $this->serviceIncluded[] = $serviceIncluded;
        }

        return $this;
    }

    public function removeServiceIncluded(ServiceIncluded $serviceIncluded): self
    {
        $this->serviceIncluded->removeElement($serviceIncluded);

        return $this;
    }

    /**
     * @return Collection<int, ServiceNotIncluded>
     */
    public function getServiceNotIncluded(): Collection
    {
        return $this->serviceNotIncluded;
    }

    public function addServiceNotIncluded(ServiceNotIncluded $serviceNotIncluded): self
    {
        if (!$this->serviceNotIncluded->contains($serviceNotIncluded)) {
            $this->serviceNotIncluded[] = $serviceNotIncluded;
        }

        return $this;
    }

    public function removeServiceNotIncluded(ServiceNotIncluded $serviceNotIncluded): self
    {
        $this->serviceNotIncluded->removeElement($serviceNotIncluded);

        return $this;
    }

    public function isIsBest(): ?bool
    {
        return $this->isBest;
    }

    public function setIsBest(bool $isBest): self
    {
        $this->isBest = $isBest;

        return $this;
    }

    public function getAgency(): ?Agency
    {
        return $this->agency;
    }

    public function setAgency(?Agency $agency): self
    {
        $this->agency = $agency;

        return $this;
    }

    /**
     * @return Collection<int, TravelLike>
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(TravelLike $like): self
    {
        if (!$this->likes->contains($like)) {
            $this->likes[] = $like;
            $like->setTravel($this);
        }

        return $this;
    }

    public function removeLike(TravelLike $like): self
    {
        if ($this->likes->removeElement($like)) {
            // set the owning side to null (unless already changed)
            if ($like->getTravel() === $this) {
                $like->setTravel(null);
            }
        }

        return $this;
    }

    /**
     * Permet de savoir si ce voyage est liké par un utilisateur 
     * 
     * 
     * @return boolean
     */
    public function isLikedByUser(User $user): bool {
        foreach($this->likes as $like) {
            if($like->getUser() === $user) return true;
        }

        return false;
    }

    /**
     * @return Collection<int, Wishlist>
     */
    public function getWishlists(): Collection
    {
        return $this->wishlists;
    }

    public function addWishlist(Wishlist $wishlist): self
    {
        if (!$this->wishlists->contains($wishlist)) {
            $this->wishlists[] = $wishlist;
            $wishlist->addTravel($this);
        }

        return $this;
    }

    public function removeWishlist(Wishlist $wishlist): self
    {
        if ($this->wishlists->removeElement($wishlist)) {
            $wishlist->removeTravel($this);
        }

        return $this;
    }

    public function isIsGem(): ?bool
    {
        return $this->isGem;
    }

    public function setIsGem(?bool $isGem): self
    {
        $this->isGem = $isGem;

        return $this;
    }


}
