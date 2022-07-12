<?php

namespace App\Controller\Admin;

use App\Entity\Travel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TravelCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Travel::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
        TextField::new('place', 'Lieu'),
        BooleanField::new('isBest', 'Top'),
        BooleanField::new('isGem', 'Pépite'),
        CountryField::new('country', 'Pays'),
        TextareaField::new('description', 'Description')->hideOnIndex(),
        MoneyField::new('price', 'Prix')->setCurrency('EUR'),
        DateTimeField::new('start_date', 'Date de début')->hideOnIndex(),
        DateTimeField::new('end_date', 'Date de fin')->hideOnIndex(),
        AssociationField::new('style', 'Style de voyage'),
        AssociationField::new('activity', 'Activité'),
        AssociationField::new('numberOfPeople', 'Avec qui partir ?')->hideOnIndex(),
        AssociationField::new('period', 'Période de voyage')->hideOnIndex(),
        AssociationField::new('agency', 'Agence de'),
        MoneyField::new('priceTwo', 'Prix 2 personnes')->setCurrency('EUR')->hideOnIndex(),
        MoneyField::new('priceThree', 'Prix 3 personnes')->setCurrency('EUR')->hideOnIndex(),
        MoneyField::new('priceFour', 'Prix 4 personnes')->setCurrency('EUR')->hideOnIndex(),
        MoneyField::new('additionalPrice', 'Supplément personne seule')->setCurrency('EUR')->hideOnIndex(),
        AssociationField::new('serviceIncluded', 'Services inclus')->hideOnIndex(),
        AssociationField::new('serviceNotIncluded', 'Services non inclus')->hideOnIndex(),  
        ImageField::new('image', 'Image header')
        ->setBasePath('uploads/')
        ->setUploadDir('public/uploads/')
        ->setUploadedFileNamePattern('[randomhash].[extension]'),

        ImageField::new('imageCarousel1', 'Image carousel 1')
        ->setBasePath('uploads/')
        ->setUploadDir('public/uploads/')
        ->setUploadedFileNamePattern('[randomhash].[extension]')->hideOnIndex(),

        ImageField::new('imageCarousel2', 'Image carousel 2')
        ->setBasePath('uploads/')
        ->setUploadDir('public/uploads/')
        ->setUploadedFileNamePattern('[randomhash].[extension]')->hideOnIndex(),

        ImageField::new('imageCarousel3', 'Image carousel 3')
        ->setBasePath('uploads/')
        ->setUploadDir('public/uploads/')
        ->setUploadedFileNamePattern('[randomhash].[extension]')->hideOnIndex(),

        ];
       
    }
    
}
