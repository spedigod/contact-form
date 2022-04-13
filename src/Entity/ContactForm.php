<?php

namespace App\Entity;

use App\Repository\ContactFormRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactFormRepository::class)]
class ContactForm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Hiba! Kérjük töltsd ki a Felhasználónév mezőt!')]
    private $username;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Hiba! Kérjük töltsd ki az Email mezőt!')]
    #[Assert\Email]
    private $email;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank(message: 'Kérjük ne hagyja üresen az üzenet mezőt se!')]
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
