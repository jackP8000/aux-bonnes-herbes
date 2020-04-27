<?php

namespace App\Model\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class contactFormDTO
{
    /**
     * @Assert\NotBlank(message="contact.firstname.required")
     */
    private ?string $firstname = null;

    /**
     * @Assert\NotBlank(message="contact.lastname.required")
     */
    private ?string $lastname = null;

    /**
     * @Assert\NotBlank(message="contact.email.required")
     * @Assert\Email(message="contact.email.invalid")
     */
    private ?string $email = null;

    /**
     * @Assert\NotBlank(message="contact.message.required")
     */
    private ?string $message = null;

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    public function getName(): string
    {
        return ucfirst($this->firstname).' '.ucfirst($this->lastname);
    }
}
