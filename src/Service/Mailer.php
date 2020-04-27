<?php

namespace App\Service;

use App\Model\DTO\contactFormDTO;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class Mailer
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendContactMessage(contactFormDTO $contactFormDTO): TemplatedEmail
    {
        $email = (new TemplatedEmail())
            ->from(new Address($contactFormDTO->getEmail(), $contactFormDTO->getName()))
            ->to(new Address('mariereneerupin@gmail.com', 'Marie-Renée Rupin'))
            ->subject('AuxBonnesHerbes - Demande d\'informations')
            ->htmlTemplate('email/contact.html.twig')
            ->context(['contactFormDTO' => $contactFormDTO])
        ;
        $this->mailer->send($email);

        return $email;
    }
}
