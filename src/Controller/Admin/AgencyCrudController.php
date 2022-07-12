<?php

namespace App\Controller\Admin;

use App\Entity\Agency;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AgencyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Agency::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('responsable', 'Prénom du responsable'),
            BooleanField::new('isTop', 'Top'),
            TextField::new('role', 'Rôle'),
            ImageField::new('picture', "Photo de profil")
                ->setBasePath('uploads/') 
                ->setUploadDir('public/uploads/')
                ->setUploadedFileNamePattern('[randomhash].[extension]'),
            EmailField::new('email', 'Email'),
            TextField::new('city', 'Ville'),
            CountryField::new('country', 'Pays'),
            TextareaField::new('description')->hideOnIndex(), 
            AssociationField::new('activity', 'Activité'),
            AssociationField::new('style', 'Style de voyage')->hideOnIndex(),
            AssociationField::new('numberOfPeople', 'Nb de personnes')->hideOnIndex(),
            TextField::new('SecondPerson', "Seconde personne de l'agence")->hideOnIndex(),
            TextField::new('ThirdPerson', "Troisième personne de l'agence")->hideOnIndex(),
            TextField::new('FourthPerson', "Quatrième personne de l'agence")->hideOnIndex(),

            ImageField::new('pictureSecondPerson', "Photo de profil personne 2")
            ->setBasePath('uploads/') 
            ->setUploadDir('public/uploads/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')->hideOnIndex(),

            ImageField::new('pictureThirdPerson', "Photo de profil personne 3")
            ->setBasePath('uploads/') 
            ->setUploadDir('public/uploads/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')->hideOnIndex(),

            ImageField::new('pictureFourthPerson', "Photo de profil personne 4")
            ->setBasePath('uploads/') 
            ->setUploadDir('public/uploads/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')->hideOnIndex(),

            ImageField::new('headerBanner', "Bannière")
            ->setBasePath('uploads/') 
            ->setUploadDir('public/uploads/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')->hideOnIndex(),

            IntegerField::new('experience', "Nb années d'expérience")->hideOnIndex(),
            TextField::new('spokenLanguages', "Langues parlées")->hideOnIndex(),

            ImageField::new('discoveryPicture', "Bannière découverte")
            ->setBasePath('uploads/') 
            ->setUploadDir('public/uploads/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')->hideOnIndex(),

            TextField::new('discoveryQuote', "Citation bannière")->hideOnIndex(),

            ImageField::new('firstCarouselPic', "Image 1 carousel")
            ->setBasePath('uploads/') 
            ->setUploadDir('public/uploads/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')->hideOnIndex(),

            ImageField::new('secondCarouselPic', "Image 2 carousel")
            ->setBasePath('uploads/') 
            ->setUploadDir('public/uploads/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')->hideOnIndex(),

            ImageField::new('thirdCarouselPic', "Image 3 carousel")
            ->setBasePath('uploads/') 
            ->setUploadDir('public/uploads/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')->hideOnIndex(),

        ];
    }
    
} 
