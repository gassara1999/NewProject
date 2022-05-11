<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientsRepository::class)]
class Clients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $mail;

    #[ORM\Column(type: 'string', length: 100)]
    private $ClientName;

    #[ORM\Column(type: 'integer')]
    private $phone;

    #[ORM\Column(type: 'date')]
    private $birthday;

   

    public function __construct()
    {
        $this->name = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getClientName(): ?string
    {
        return $this->ClientName;
    }

    public function setClientName(string $ClientName): self
    {
        $this->ClientName = $ClientName;

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

  

   
}