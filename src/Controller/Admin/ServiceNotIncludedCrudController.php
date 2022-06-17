<?php

namespace App\Controller\Admin;

use App\Entity\ServiceNotIncluded;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ServiceNotIncludedCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ServiceNotIncluded::class;
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
