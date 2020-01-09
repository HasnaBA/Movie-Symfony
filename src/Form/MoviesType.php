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

class MoviesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => "Nom du Film",
            ])

            ->add('description', TextareaType::class, [
                'label' => "Description",
                'required' => false,
            ])

            ->add('date', DateType::class, [
                'label' => "Date de sortie",
                'required' => false,
                'years' => range(1900, date('Y')),
                ])

            ->add('country', TextType::class, [
                'label' => "Pays d'origine",
                'required' => false,

            ])

            ->add('cover', TextType::class, [
            'label' => "Couverture",
            'required' => false,

            ])
            ->add('link', TextType::class, [
            'label' => "Lien Allociné",
            'required' => false,

            ])      
            ->add('author', EntityType::class, [
                'label' => "Auteur",
                'required' => false,
                'class' => Authors::class,
                'choice_label' => 'name',  
                
            ])
            ->add('save', SubmitType::class, [
                'label' => "Ajouter un film"
            ]);      

    }
}