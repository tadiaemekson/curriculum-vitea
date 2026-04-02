<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class ContactMessage
{
    #[Assert\NotBlank(message: 'Please enter your name.')]
    #[Assert\Length(max: 120)]
    private ?string $name = null;

    #[Assert\NotBlank(message: 'Please enter your email address.')]
    #[Assert\Email(message: 'Please enter a valid email address.')]
    #[Assert\Length(max: 180)]
    private ?string $email = null;

    #[Assert\NotBlank(message: 'Please write a short message.')]
    #[Assert\Length(min: 10, minMessage: 'Your message should be at least {{ limit }} characters.')]
    #[Assert\Length(max: 3000)]
    private ?string $message = null;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }
}
