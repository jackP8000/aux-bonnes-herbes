<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NearbyController extends AbstractController
{
    /**
     * @Route("/nearby", name="nearby")
     */
    public function show()
    {
        return $this->render('nearby/index.html.twig', [
            'controller_name' => 'NearbyController',
        ]);
    }
}
