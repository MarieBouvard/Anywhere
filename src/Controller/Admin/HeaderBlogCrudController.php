<?php

namespace App\Controller\Admin;

use App\Entity\HeaderBlog;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
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
            TextField::new('title'),
            TextField::new('description'),
            TextField::new('btn_url'),
            ImageField::new('image')
            ->setBasePath('uploads/')
            ->setUploadDir('public/uploads/')
            ->setUploadedFileNamePattern('[randomhash].[extension]'),
            TextField::new('btn_name'),
        ];
    }

}
