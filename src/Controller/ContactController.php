<?php

namespace App\Controller;

use App\Form\ContactFormType;
use App\Model\DTO\contactFormDTO;
use App\Service\Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function show(Request $request, Mailer $mailer)
    {
        $contactFormDTO = new contactFormDTO();

        $contactForm = $this->createForm(ContactFormType::class, $contactFormDTO);

        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $mailer->sendContactMessage($contactFormDTO);
        }

        return $this->render('contact/index.html.twig', [
            'contactForm' => $contactForm->createView(),
        ]);
    }
}
