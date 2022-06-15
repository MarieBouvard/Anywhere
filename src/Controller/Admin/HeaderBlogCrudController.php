<?php

namespace App\Controller\Admin;

use App\Entity\HeaderBlog;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HeaderBlogCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HeaderBlog::class;
    }


    public function configureFields(string $pageName): iterable
    {
       return [
            IdField::new('id', 'N°'),
            TextField::new('title', 'Titre de la bannière'),
            TextField::new('description', 'Description'),
            TextField::new('btn_url', 'URL du bouton'),
            ImageField::new('image', 'Image de la bannière')
            ->setBasePath('uploads/')
            ->setUploadDir('public/uploads/')
            ->setUploadedFileNamePattern('[randomhash].[extension]'),
            TextField::new('btn_name', 'Nom du bouton'),
        ];
    }

}
