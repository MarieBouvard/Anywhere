<?php

namespace App\Controller\Admin;

use App\Entity\Agency;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
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
            TextField::new('role', 'Rôle'),
            ImageField::new('picture', "Photo de profil")
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads/')
                ->setUploadedFileNamePattern('[randomhash].[extension]'),
            EmailField::new('email', 'Email'),
            TextField::new('city', 'Ville'),
            CountryField::new('country', 'Pays'),
            TextareaField::new('description')
        ];
    }
    
} 
