<?php

namespace App\Entity;

use App\Repository\PrivateCoachingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrivateCoachingRepository::class)]
class PrivateCoaching
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Coach::class, inversedBy: 'privateCoachings')]
    #[ORM\JoinColumn(nullable: false)]
    private $coach;

    #[ORM\Column(type: 'date')]
    private $DateSession;

    #[ORM\Column(type: 'string', length: 100)]
    private $BeginHour;

    #[ORM\Column(type: 'string', length: 100)]
    private $EndHour;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoach(): ?Coach
    {
        return $this->coach;
    }

    public function setCoach(?Coach $coach): self
    {
        $this->coach = $coach;

        return $this;
    }

    public function getDateSession(): ?\DateTimeInterface
    {
        return $this->DateSession;
    }

    public function setDateSession(\DateTimeInterface $DateSession): self
    {
        $this->DateSession = $DateSession;

        return $this;
    }

    public function getBeginHour(): ?string
    {
        return $this->BeginHour;
    }

    public function setBeginHour(string $BeginHour): self
    {
        $this->BeginHour = $BeginHour;

        return $this;
    }

    public function getEndHour(): ?string
    {
        return $this->EndHour;
    }

    public function setEndHour(string $EndHour): self
    {
        $this->EndHour = $EndHour;

        return $this;
    }
}
