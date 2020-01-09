<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Authors;

use Symfony\Component\Form\FormBuilderInterface;

class AuthorsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => "Nom de l' auteur ",
            ])

            ->add('biography', TextareaType::class, [
                'label' => "Biography",
                'required' => false,
            ])

            ->add('birthday', DateType::class, [
                'label' => "Date de naissance",
                'required' => false,
                'years' => range(1900, date('Y')),
                ])

            ->add('nationality', TextType::class, [
                'label' => "Nationalité",
                'required' => false,

            ])

            ->add('photo', TextType::class, [
            'label' => "Photo",
            'required' => false,

            ])
            
            ->add('link', TextType::class, [
            'label' => "Lien Allociné",
            'required' => false,

            ])      
            

          
            ->add('save', SubmitType::class, [
                'label' => "Ajouter un film"
            ]);      

    }
}