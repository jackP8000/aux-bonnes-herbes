<?php

namespace App\Controller;

use App\Repository\RoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NavController extends AbstractController
{
    /**
     * @var RoomRepository
     */
    private RoomRepository $roomRepository;

    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    /**
     * @Route("/rooms", name="rooms_list")
     */
    public function getRooms()
    {
        $rooms = $this->roomRepository->findAll();

        return $this->render('layout/_navlist.html.twig', [
            'rooms' => $rooms,
        ]);
    }
}
