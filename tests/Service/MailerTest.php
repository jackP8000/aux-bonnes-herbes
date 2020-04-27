<?php

namespace App\Tests\Service;

use App\Model\DTO\ContactFormDTO;
use App\Service\Mailer;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class MailerTest extends TestCase
{
    public function testSendContactMessage()
    {
        $symfonyMailer = $this->createMock(MailerInterface::class);
        $symfonyMailer->expects($this->once())
            ->method('send');

        $contactFormDTO = new ContactFormDTO();
        $contactFormDTO->setEmail('jeanjacques.annaud@gmail.com');
        $contactFormDTO->setFirstname('Jean Jacques');
        $contactFormDTO->setLastname('Annaud');
        $contactFormDTO->setMessage('Bonjour, comment on réserves ?');

        $mailer = new Mailer($symfonyMailer);
        $email = $mailer->sendContactMessage($contactFormDTO);

        $this->assertSame('AuxBonnesHerbes - Demande d\'informations', $email->getSubject());
        $this->assertCount(1, $email->getFrom());
        $fromNamedAddress = $email->getFrom();
        $this->assertInstanceOf(Address::class, $fromNamedAddress[0]);
        $this->assertSame('jeanjacques.annaud@gmail.com', $fromNamedAddress[0]->getAddress());
        $this->assertSame('Jean Jacques Annaud', $fromNamedAddress[0]->getName());
        $toNamedAddress = $email->getTo();
        $this->assertInstanceOf(Address::class, $toNamedAddress[0]);
        $this->assertSame('mariereneerupin@gmail.com', $toNamedAddress[0]->getAddress());
        $this->assertSame('Marie-Renée Rupin', $toNamedAddress[0]->getName());
    }
}
