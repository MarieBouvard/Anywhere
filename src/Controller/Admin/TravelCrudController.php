<?php

namespace App\Controller\Admin;

use App\Entity\Travel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
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
        yield TextField::new('place');
        yield TextareaField::new('description');
        yield MoneyField::new('price')->setCurrency('EUR');
        yield DateTimeField::new('start_date');
        yield DateTimeField::new('end_date');
        yield AssociationField::new('category');
    }
    
}