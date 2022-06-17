<?php

namespace App\Controller\Admin;

use App\Entity\ServiceIncluded;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ServiceIncludedCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ServiceIncluded::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
