<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RoomController extends AbstractController
{
    /**
     * @Route("/location/le-gite", name="le-gite-show")
     */
    public function leGiteShow()
    {
        return $this->render('room/le_gite.html.twig', [
        ]);
    }

    /**
     * @Route("/chambre/papillons", name="papillons-show")
     */
    public function papillonsShow()
    {
        return $this->render('room/papillons.html.twig', [
        ]);
    }

    /**
     * @Route("/chambre/soleil-levant", name="soleil-levant-show")
     */
    public function soleilLevantShow()
    {
        return $this->render('room/soleil_levant.html.twig', [
        ]);
    }
}
