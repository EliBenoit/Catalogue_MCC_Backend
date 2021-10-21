<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=BookingRepository::class)
 * @ApiResource()
 */
class Booking
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $collectAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="create")
     */
    private $bookingDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $returnDate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isValidate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isReturn;

    /**
     * @ORM\OneToOne(targetEntity=Books::class, mappedBy="bookingId", cascade={"persist", "remove"})
     */
    private $booksId;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="bookingId")
     */
    private $userId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCollectAt(): ?\DateTimeInterface
    {
        return $this->collectAt;
    }

    public function setCollectAt(?\DateTimeInterface $collectAt): self
    {
        $this->collectAt = $collectAt;

        return $this;
    }

    public function getBookingDate(): ?\DateTimeInterface
    {
        return $this->bookingDate;
    }

    public function setBookingDate(?\DateTimeInterface $bookingDate): self
    {
        $this->bookingDate = $bookingDate;

        return $this;
    }

    public function getReturnDate(): ?\DateTimeInterface
    {
        return $this->returnDate;
    }

    public function setReturnDate(?\DateTimeInterface $returnDate): self
    {
        $this->returnDate = $returnDate;

        return $this;
    }

    public function getIsValidate(): ?bool
    {
        return $this->isValidate;
    }

    public function setIsValidate(bool $isValidate): self
    {
        $this->isValidate = $isValidate;

        return $this;
    }

    public function getIsReturn(): ?bool
    {
        return $this->isReturn;
    }

    public function setIsReturn(bool $isReturn): self
    {
        $this->isReturn = $isReturn;

        return $this;
    }

    public function getBooksId(): ?Books
    {
        return $this->booksId;
    }

    public function setBooksId(?Books $booksId): self
    {
        // unset the owning side of the relation if necessary
        if ($booksId === null && $this->booksId !== null) {
            $this->booksId->setBookingId(null);
        }

        // set the owning side of the relation if necessary
        if ($booksId !== null && $booksId->getBookingId() !== $this) {
            $booksId->setBookingId($this);
        }

        $this->booksId = $booksId;

        return $this;
    }

    public function getUserId(): ?Users
    {
        return $this->userId;
    }

    public function setUserId(?Users $userId): self
    {
        $this->userId = $userId;

        return $this;
    }
}
