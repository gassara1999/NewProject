<?php

namespace App\Entity;

use App\Repository\PlanningRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanningRepository::class)]
class Planning
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    #[ORM\ManyToOne(targetEntity: Activity::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $ActivityName;

    #[ORM\Column(type: 'integer')]
    private $Room;

    #[ORM\Column(type: 'string')]
    private $start_time;

    #[ORM\Column(type: 'string')]
    private $End_time;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\ManyToOne(targetEntity: Activity::class, inversedBy: 'relation')]
    #[ORM\JoinColumn(nullable: false)]
    private $activity;

    

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getActivityName(): ?Activity
    {
        return $this->ActivityName;
    }

    public function setActivityName(?Activity $ActivityName): self
    {
        $this->ActivityName = $ActivityName;

        return $this;
    }

    public function getRoom(): ?int
    {
        return $this->Room;
    }

    public function setRoom(int $Room): self
    {
        $this->Room = $Room;

        return $this;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->start_time;
    }

    public function setStartTime(\DateTimeInterface $start_time): self
    {
        $this->start_time = $start_time;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->End_time;
    }

    public function setEndTime(\DateTimeInterface $End_time): self
    {
        $this->End_time = $End_time;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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

   
}
