<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoomPriceRepository")
 */
class RoomPrice
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="float")
     */
    private float $weekendNightlyRate;

    /**
     * @ORM\Column(type="float")
     */
    private float $weekNightlyRate;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private float $lowSeasonWeeklyRate;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private float $highSeasonWeeklyRate;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private float $additionalPersonPricePerDay;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Room", inversedBy="roomPrice", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private Room $room;

    public function getId(): int
    {
        return $this->id;
    }

    public function getWeekendNightlyRate(): float
    {
        return $this->weekendNightlyRate;
    }

    public function getWeekNightlyRate(): float
    {
        return $this->weekNightlyRate;
    }

    public function getLowSeasonWeeklyRate(): float
    {
        return $this->lowSeasonWeeklyRate;
    }

    public function getHighSeasonWeeklyRate(): float
    {
        return $this->highSeasonWeeklyRate;
    }

    public function getAdditionalPersonPricePerDay(): float
    {
        return $this->additionalPersonPricePerDay;
    }

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setRoom(Room $room): self
    {
        $this->room = $room;

        return $this;
    }
}
