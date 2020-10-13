<?php

namespace App\Service;

use App\Model\DTO\contactFormDTO;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Contracts\Translation\TranslatorInterface;

class Mailer
{
    private MailerInterface $mailer;
    private TranslatorInterface $translator;
    private string $emailAdmin;
    private string $emailNameAdmin;

    public function __construct(MailerInterface $mailer, TranslatorInterface $translator, string $emailAdmin, string $emailNameAdmin)
    {
        $this->mailer = $mailer;
        $this->translator = $translator;
        $this->emailAdmin = $emailAdmin;
        $this->emailNameAdmin = $emailNameAdmin;
    }

    public function sendContactMessage(contactFormDTO $contactFormDTO): TemplatedEmail
    {
        $email = (new TemplatedEmail())
            ->to(new Address($this->emailAdmin, $this->emailNameAdmin))
            ->subject($this->translator->trans('contact.subject', [], 'email'))
            ->htmlTemplate('email/contact.html.twig')
            ->context(['contactFormDTO' => $contactFormDTO, 'emailTo' => $this->emailAdmin]);
        $this->mailer->send($email);

        return $email;
    }
}
