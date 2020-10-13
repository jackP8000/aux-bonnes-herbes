<?php

namespace App\Controller;

use App\Form\ContactFormType;
use App\Model\DTO\ContactFormDTO;
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
        $contactFormDTO = new ContactFormDTO();

        $contactForm = $this->createForm(ContactFormType::class, $contactFormDTO);

        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $mailer->sendContactMessage($contactFormDTO);

            $this->addFlash('success', 'contact-form.success');

            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'contactForm' => $contactForm->createView(),
        ]);
    }
}
