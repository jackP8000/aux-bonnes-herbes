<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BiographyController extends AbstractController
{
    /**
     * @Route("/biography", name="biography")
     */
    public function index()
    {
        return $this->render('biography/index.html.twig', [
            'controller_name' => 'BiographyController',
        ]);
    }
}
