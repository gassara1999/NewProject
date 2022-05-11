<?php

namespace App\Entity;

use App\Repository\CoachRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoachRepository::class)]
class Coach
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $Coach_name;

    #[ORM\Column(type: 'string', length: 100)]
    private $mail;

    #[ORM\Column(type: 'integer')]
    private $phone;

    #[ORM\Column(type: 'date')]
    private $birthday;

    #[ORM\Column(type: 'string', length: 100)]
    private $speciality;

    #[ORM\Column(type: 'string', length: 100)]
    private $salary;

    #[ORM\OneToMany(mappedBy: 'coach', targetEntity: PrivateCoaching::class)]
    private $privateCoachings;

    public function __construct()
    {
        $this->privateCoachings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoachName(): ?string
    {
        return $this->Coach_name;
    }

    public function setCoachName(string $Coach_name): self
    {
        $this->Coach_name = $Coach_name;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getSpeciality(): ?string
    {
        return $this->speciality;
    }

    public function setSpeciality(string $speciality): self
    {
        $this->speciality = $speciality;

        return $this;
    }

    public function getSalary(): ?string
    {
        return $this->salary;
    }

    public function setSalary(string $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * @return Collection<int, PrivateCoaching>
     */
    public function getPrivateCoachings(): Collection
    {
        return $this->privateCoachings;
    }

    public function addPrivateCoaching(PrivateCoaching $privateCoaching): self
    {
        if (!$this->privateCoachings->contains($privateCoaching)) {
            $this->privateCoachings[] = $privateCoaching;
            $privateCoaching->setCoach($this);
        }

        return $this;
    }

    public function removePrivateCoaching(PrivateCoaching $privateCoaching): self
    {
        if ($this->privateCoachings->removeElement($privateCoaching)) {
            // set the owning side to null (unless already changed)
            if ($privateCoaching->getCoach() === $this) {
                $privateCoaching->setCoach(null);
            }
        }

        return $this;
    }
}
