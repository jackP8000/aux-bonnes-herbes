<?php

namespace App\Listener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\Event\MessageEvent;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

class SetFromListener implements EventSubscriberInterface
{
    private string $emailSender;
    private string $emailNameSender;

    public function __construct(string $emailSender, string $emailNameSender)
    {
        $this->emailSender = $emailSender;
        $this->emailNameSender = $emailNameSender;
    }

    public static function getSubscribedEvents()
    {
        return [
            MessageEvent::class => 'onMessage',
        ];
    }

    public function onMessage(MessageEvent $event)
    {
        $email = $event->getMessage();
        if (!$email instanceof Email) {
            return;
        }

        $email->from(new Address($this->emailSender, $this->emailNameSender));
    }
}
