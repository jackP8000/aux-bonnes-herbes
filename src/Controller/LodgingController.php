<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LodgingController extends AbstractController
{
    /**
     * @Route("/lodging/{slug}", name="lodging")
     */
    public function index()
    {
        return $this->render('lodging/index.html.twig', [
            'controller_name' => 'LodgingController',
        ]);
    }
}
