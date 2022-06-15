<?php

namespace App\Controller\Admin;

use App\Entity\Travel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
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
        IdField::new('id', 'N°'),
        TextField::new('place', 'Lieu'),
        CountryField::new('country', 'Pays'),
        TextareaField::new('description', 'Description'),
        MoneyField::new('price', 'Prix')->setCurrency('EUR'),
        DateTimeField::new('start_date', 'Date de début'),
        DateTimeField::new('end_date', 'Date de fin'),
        AssociationField::new('style', 'Style de voyage'),
        AssociationField::new('activity', 'Activité'),
        AssociationField::new('numberOfPeople', 'Avec qui partir ?'),
        AssociationField::new('user', 'Proposé par'),
        ImageField::new('image', 'Image carousel')
        ->setBasePath('uploads/')
        ->setUploadDir('public/uploads/')
        ->setUploadedFileNamePattern('[randomhash].[extension]')
        ];
       
    }
    
}
