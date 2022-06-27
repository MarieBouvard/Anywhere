<?php

namespace App\Form;

use App\Entity\Wishlist;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WishType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('notes', TextType::class, [
                'attr' => [
                    'placeholder' => 'Rajouter une note ..',
                    'class' => 'form-control w-25'
                ]
            ])
            // ->add('Ajouteramawishlist', SubmitType::class, [
            //     'attr' => [
            //         'class' => 'form-control w-50 bg-dark text-light mt-2'
            //     ]
            // ])
        ;
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Wishlist::class,
        ]);
    }
}
