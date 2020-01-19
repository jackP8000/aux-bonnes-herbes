<?php

namespace App\Form\Photo;

use App\Entity\Photo;
use App\Entity\PhotoCategory;
use App\Entity\Room;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreatePhotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('filename', FileType::class)
            ->add('isThumbnail')
            ->add('room', EntityType::class, [
                'class' => Room::class,
                'choice_label' => 'name'
            ])
            ->add('photoCategories', EntityType::class, [
                'class' => PhotoCategory::class,
                'choice_label' => 'name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Photo::class,
        ]);
    }
}
