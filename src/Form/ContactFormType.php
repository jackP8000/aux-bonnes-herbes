<?php

namespace App\Form;

use App\Model\DTO\contactFormDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'form.firstname.label',
            ])
            ->add('lastname', TextType::class, [
                'label' => 'form.lastname.label',
            ])
            ->add('email', EmailType::class, [
                'label' => 'form.email.label',
            ])
            ->add('message', TextareaType::class, [
                'label' => 'form.message.label',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'translation_domain' => 'contact',
            'data_class' => contactFormDTO::class,
        ]);
    }
}
