<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhotoRepository")
 */
class Photo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $filename;

    /**
     * @ORM\Column(type="boolean")
     */
    private $thumbnail;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Room", inversedBy="photos")
     */
    private $room;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PhotoCategory", mappedBy="photos")
     */
    private $photoCategories;

    public function __construct()
    {
        $this->photoCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function isThumbnail(): ?bool
    {
        return $this->thumbnail;
    }

    public function setThumbnail(bool $thumbnail): void
    {
        $this->thumbnail = $thumbnail;
    }

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setRoom(?Room $room): self
    {
        $this->room = $room;

        return $this;
    }

    /**
     * @return Collection|PhotoCategory[]
     */
    public function getPhotoCategories(): Collection
    {
        return $this->photoCategories;
    }

    public function addPhotoCategory(PhotoCategory $photoCategory): self
    {
        if (!$this->photoCategories->contains($photoCategory)) {
            $this->photoCategories[] = $photoCategory;
            $photoCategory->addPhoto($this);
        }

        return $this;
    }

    public function removePhotoCategory(PhotoCategory $photoCategory): self
    {
        if ($this->photoCategories->contains($photoCategory)) {
            $this->photoCategories->removeElement($photoCategory);
            $photoCategory->removePhoto($this);
        }

        return $this;
    }
}
