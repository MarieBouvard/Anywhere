<?php

namespace App\Form;

use App\Classe\Search;
use App\Entity\Activity;
use App\Entity\NumberOfPeople;
use App\Entity\Style;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('string', CountryType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Votre recherche ..',
                    'class' => 'form-control-sm border bg-light text-dark'
                ]
            ])
            ->add('activities', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Activity::class,
                'multiple' => true, 
                'expanded' => true
            ])

            // ->add('styles', EntityType::class, [
            //     'label' => false,
            //     'required' => false,
            //     'class' => Style::class,
            //     'multiple' => true, 
            //     'expanded' => true
            // ])

            // ->add('numberOfPeople', EntityType::class, [
            //     'label' => false,
            //     'required' => false,
            //     'class' => NumberOfPeople::class,
            //     'multiple' => true, 
            //     'expanded' => true
            // ])


            ->add('submit', SubmitType::class, [
                'label' => 'Filtrer',
                'attr' => [
                    'class' => 'btn btn-warning text-dark text-center'
                ]
            ])
        ;
    }
  
       

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
            'method' => 'GET', 
            'crsf_protection' => false,
            'error_mapping' => [
                '.' => 'country',
            ],
        ]);
    }

    public function getBlockPrefix() {
        return '';
    }
}