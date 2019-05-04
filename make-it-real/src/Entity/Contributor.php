<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContributorRepository")
 */
class Contributor
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="contributors_")
     * @ORM\JoinColumn(nullable=false)
     */
    private $project;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="contributors_")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="text")
     */
    private $role;

    /**
     * @ORM\Column(type="text")
     */
    private $permission;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Equipment", mappedBy="owner")
     */
    private $equipments_;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Accessorie", mappedBy="owner")
     */
    private $accessories_;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Chat", mappedBy="sender")
     */
    private $chats_;

    public function __construct()
    {
        $this->equipments_ = new ArrayCollection();
        $this->accessories_ = new ArrayCollection();
        $this->chats_ = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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

    public function getPermission(): ?string
    {
        return $this->permission;
    }

    public function setPermission(string $permission): self
    {
        $this->permission = $permission;

        return $this;
    }

    /**
     * @return Collection|Equipment[]
     */
    public function getEquipments(): Collection
    {
        return $this->equipments_;
    }

    public function addEquipments(Equipment $equipments): self
    {
        if (!$this->equipments_->contains($equipments)) {
            $this->equipments_[] = $equipments;
            $equipments->setOwner($this);
        }

        return $this;
    }

    public function removeEquipments(Equipment $equipments): self
    {
        if ($this->equipments_->contains($equipments)) {
            $this->equipments_->removeElement($equipments);
            // set the owning side to null (unless already changed)
            if ($equipments->getOwner() === $this) {
                $equipments->setOwner(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Accessorie[]
     */
    public function getAccessories(): Collection
    {
        return $this->accessories_;
    }

    public function addAccessories(Accessorie $accessories): self
    {
        if (!$this->accessories_->contains($accessories)) {
            $this->accessories_[] = $accessories;
            $accessories->setOwner($this);
        }

        return $this;
    }

    public function removeAccessories(Accessorie $accessories): self
    {
        if ($this->accessories_->contains($accessories)) {
            $this->accessories_->removeElement($accessories);
            // set the owning side to null (unless already changed)
            if ($accessories->getOwner() === $this) {
                $accessories->setOwner(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Chat[]
     */
    public function getChats(): Collection
    {
        return $this->chats_;
    }

    public function addChats(Chat $chats): self
    {
        if (!$this->chats_->contains($chats)) {
            $this->chats_[] = $chats;
            $chats->setSender($this);
        }

        return $this;
    }

    public function removeChats(Chat $chats): self
    {
        if ($this->chats_->contains($chats)) {
            $this->chats_->removeElement($chats);
            // set the owning side to null (unless already changed)
            if ($chats->getSender() === $this) {
                $chats->setSender(null);
            }
        }

        return $this;
    }
}
