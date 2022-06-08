<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title');
        yield TextField::new('subtitle');
        yield AssociationField::new('Type');
        yield TextareaField::new('description');
        yield DateTimeField::new('date');
        yield TextField::new('tags');
        yield ImageField::new('image')
        ->setBasePath('uploads/')
        ->setUploadDir('public/uploads/')
        ->setUploadedFileNamePattern('[randomhash].[extension]');
    }
    
}
