<?php

namespace App\Controller\Admin;

use App\Entity\NumberOfPeople;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NumberOfPeopleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NumberOfPeople::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', 'N°'),
            TextField::new('name', 'Nom')
        ];
    }
    
}
