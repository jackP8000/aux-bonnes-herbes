<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MettriePlaceController extends AbstractController
{
    /**
     * @Route("/mettrie/place", name="mettrie_place")
     */
    public function show()
    {
        return $this->render('mettrie_place/index.html.twig', [
            'controller_name' => 'MettriePlaceController',
        ]);
    }
}
