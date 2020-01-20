<?php

namespace App\Controller\Admin\Photo;

use App\Form\Photo\CreatePhotoType;
use App\Service\UploaderHelper;
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
    /**
     * @var UploaderHelper
     */
    private UploaderHelper $uploaderHelper;

    public function __construct(EntityManagerInterface $entityManager, UploaderHelper $uploaderHelper)
    {
        $this->entityManager = $entityManager;
        $this->uploaderHelper = $uploaderHelper;
    }

    /**
     * @Route("/admin/photo/create", name="admin_photo_create")
     */
    public function index(Request $request)
    {
        $photoForm = $this->createForm(CreatePhotoType::class);

        $photoForm->handleRequest($request);

        if ($photoForm->isSubmitted() && $photoForm->isValid()) {
            $photo = $photoForm->getData();

            $uploadedFile = $photoForm['imageFile']->getData();

            if ($uploadedFile) {
                $newFilename = $this->uploaderHelper->uploadPhoto($uploadedFile);

                $photo->setFilename($newFilename);

                $this->entityManager->persist($photo);
                $this->entityManager->flush();
            }
        }

        return $this->render('admin/photo/create.html.twig', [
            'photoForm' => $photoForm->createView(),
        ]);
    }
}
