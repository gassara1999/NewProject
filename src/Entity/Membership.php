<?php

namespace App\Entity;

use App\Repository\MembershipRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MembershipRepository::class)]
class Membership
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    #[ORM\ManyToOne(targetEntity: Clients::class, inversedBy: 'memberships')]
    #[ORM\JoinColumn(nullable: false)]
    private $clientName;

    #[ORM\ManyToOne(targetEntity: MembershipType::class, inversedBy: 'type')]
    #[ORM\JoinColumn(nullable: false)]
    private $membershipType;

    #[ORM\Column(type: 'date')]
    private $begin;

    #[ORM\Column(type: 'date')]
    private $end;

    #[ORM\Column(type: 'decimal', precision: 4, scale: 2)]
    private $price;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBegin(): ?\DateTimeInterface
    {
        return $this->begin;
    }

    public function setBegin(\DateTimeInterface $begin): self
    {
        $this->begin = $begin;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(\DateTimeInterface $end): self
    {
        $this->end = $end;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getClientName(): ?Clients
    {
        return $this->clientName;
    }

    public function setClientName(?Clients $clientName): self
    {
        $this->clientName = $clientName;

        return $this;
    }

    public function getMembershipType(): ?MembershipType
    {
        return $this->membershipType;
    }

    public function setMembershipType(?MembershipType $membershipType): self
    {
        $this->membershipType = $membershipType;

        return $this;
    }
}
