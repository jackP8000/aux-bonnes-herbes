<?php


namespace App\Controller\Admin\Photo;

use App\Form\Photo\CreatePhotoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CreateController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/admin/photo/create", name="admin_photo_create")
     */
    public function index(Request $request)
    {
        $photoForm = $this->createForm(CreatePhotoType::class);

        $photoForm->handleRequest($request);

        if ($photoForm->isSubmitted() && $photoForm->isValid()) {
        }

        return $this->render('admin/photo/create.html.twig', [
            'photoForm' => $photoForm->createView()
        ]);
    }
}