<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PartnersController extends AbstractController
{
    /**
     * @Route("/partners", name="partners")
     */
    public function show()
    {
        return $this->render('partners/index.html.twig', [
            'controller_name' => 'PartnersController',
        ]);
    }
}
