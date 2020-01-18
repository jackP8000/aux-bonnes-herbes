<?php

namespace App\Controller;

use App\Entity\Room;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RoomController extends AbstractController
{
    /**
     * @Route("/room/{slug}", name="room")
     */
    public function index(Room $room)
    {
        return $this->render('room/index.html.twig', [
            'room' => $room,
        ]);
    }
}
