<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="projects_")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contributor", mappedBy="project")
     */
    private $contributors_;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TechnicalCut", mappedBy="project")
     */
    private $technicalCuts_;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Planning", mappedBy="project")
     */
    private $plannings_;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Budget", mappedBy="project")
     */
    private $budgets_;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Place", mappedBy="project")
     */
    private $places_;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Equipment", mappedBy="project")
     */
    private $equipments_;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Accessorie", mappedBy="project")
     */
    private $accessories_;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Script", mappedBy="project")
     */
    private $scripts_;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Chat", mappedBy="project")
     */
    private $chats_;

    public function __construct()
    {
        $this->contributors_ = new ArrayCollection();
        $this->technicalCuts_ = new ArrayCollection();
        $this->plannings_ = new ArrayCollection();
        $this->budgets_ = new ArrayCollection();
        $this->places_ = new ArrayCollection();
        $this->equipments_ = new ArrayCollection();
        $this->accessories_ = new ArrayCollection();
        $this->scripts_ = new ArrayCollection();
        $this->chats_ = new ArrayCollection();
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

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Collection|Contributor[]
     */
    public function getContributors(): Collection
    {
        return $this->contributors_;
    }

    public function addContributors(Contributor $contributors): self
    {
        if (!$this->contributors_->contains($contributors)) {
            $this->contributors_[] = $contributors;
            $contributors->setProject($this);
        }

        return $this;
    }

    public function removeContributors(Contributor $contributors): self
    {
        if ($this->contributors_->contains($contributors)) {
            $this->contributors_->removeElement($contributors);
            // set the owning side to null (unless already changed)
            if ($contributors->getProject() === $this) {
                $contributors->setProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TechnicalCut[]
     */
    public function getTechnicalCuts(): Collection
    {
        return $this->technicalCuts_;
    }

    public function addTechnicalCuts(TechnicalCut $technicalCuts): self
    {
        if (!$this->technicalCuts_->contains($technicalCuts)) {
            $this->technicalCuts_[] = $technicalCuts;
            $technicalCuts->setProject($this);
        }

        return $this;
    }

    public function removeTechnicalCuts(TechnicalCut $technicalCuts): self
    {
        if ($this->technicalCuts_->contains($technicalCuts)) {
            $this->technicalCuts_->removeElement($technicalCuts);
            // set the owning side to null (unless already changed)
            if ($technicalCuts->getProject() === $this) {
                $technicalCuts->setProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Planning[]
     */
    public function getPlannings(): Collection
    {
        return $this->plannings_;
    }

    public function addPlannings(Planning $plannings): self
    {
        if (!$this->plannings_->contains($plannings)) {
            $this->plannings_[] = $plannings;
            $plannings->setProject($this);
        }

        return $this;
    }

    public function removePlannings(Planning $plannings): self
    {
        if ($this->plannings_->contains($plannings)) {
            $this->plannings_->removeElement($plannings);
            // set the owning side to null (unless already changed)
            if ($plannings->getProject() === $this) {
                $plannings->setProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Budget[]
     */
    public function getBudgets(): Collection
    {
        return $this->budgets_;
    }

    public function addBudgets(Budget $budgets): self
    {
        if (!$this->budgets_->contains($budgets)) {
            $this->budgets_[] = $budgets;
            $budgets->setProject($this);
        }

        return $this;
    }

    public function removeBudgets(Budget $budgets): self
    {
        if ($this->budgets_->contains($budgets)) {
            $this->budgets_->removeElement($budgets);
            // set the owning side to null (unless already changed)
            if ($budgets->getProject() === $this) {
                $budgets->setProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Place[]
     */
    public function getPlaces(): Collection
    {
        return $this->places_;
    }

    public function addPlaces(Place $places): self
    {
        if (!$this->places_->contains($places)) {
            $this->places_[] = $places;
            $places->setProject($this);
        }

        return $this;
    }

    public function removePlaces(Place $places): self
    {
        if ($this->places_->contains($places)) {
            $this->places_->removeElement($places);
            // set the owning side to null (unless already changed)
            if ($places->getProject() === $this) {
                $places->setProject(null);
            }
        }

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
            $equipments->setProject($this);
        }

        return $this;
    }

    public function removeEquipments(Equipment $equipments): self
    {
        if ($this->equipments_->contains($equipments)) {
            $this->equipments_->removeElement($equipments);
            // set the owning side to null (unless already changed)
            if ($equipments->getProject() === $this) {
                $equipments->setProject(null);
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
            $accessories->setProject($this);
        }

        return $this;
    }

    public function removeAccessories(Accessorie $accessories): self
    {
        if ($this->accessories_->contains($accessories)) {
            $this->accessories_->removeElement($accessories);
            // set the owning side to null (unless already changed)
            if ($accessories->getProject() === $this) {
                $accessories->setProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Script[]
     */
    public function getScripts(): Collection
    {
        return $this->scripts_;
    }

    public function addScripts(Script $scripts): self
    {
        if (!$this->scripts_->contains($scripts)) {
            $this->scripts_[] = $scripts;
            $scripts->setProject($this);
        }

        return $this;
    }

    public function removeScripts(Script $scripts): self
    {
        if ($this->scripts_->contains($scripts)) {
            $this->scripts_->removeElement($scripts);
            // set the owning side to null (unless already changed)
            if ($scripts->getProject() === $this) {
                $scripts->setProject(null);
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
            $chats->setProject($this);
        }

        return $this;
    }

    public function removeChats(Chat $chats): self
    {
        if ($this->chats_->contains($chats)) {
            $this->chats_->removeElement($chats);
            // set the owning side to null (unless already changed)
            if ($chats->getProject() === $this) {
                $chats->setProject(null);
            }
        }

        return $this;
    }
}
