<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivityRepository::class)]
class Activity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $ActivityName;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\OneToMany(mappedBy: 'activity', targetEntity: Planning::class)]
    private $relation;


    public function __construct()
    {
        $this->planings = new ArrayCollection();
        $this->relation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActivityName(): ?string
    {
        return $this->ActivityName;
    }

    public function setActivityName(string $ActivityName): self
    {
        $this->ActivityName = $ActivityName;

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

    /**
     * @return Collection<int, Planning>
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(Planning $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation[] = $relation;
            $relation->setActivity($this);
        }

        return $this;
    }

    public function removeRelation(Planning $relation): self
    {
        if ($this->relation->removeElement($relation)) {
            // set the owning side to null (unless already changed)
            if ($relation->getActivity() === $this) {
                $relation->setActivity(null);
            }
        }

        return $this;
    }

}
