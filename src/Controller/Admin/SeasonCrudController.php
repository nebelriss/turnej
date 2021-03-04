<?php

namespace App\Controller\Admin;

use App\Entity\Season;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SeasonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Season::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            DateField::new('event_date'),
            TextField::new('location'),
            BooleanField::new('completed'),
            BooleanField::new('locked')
        ];
    }
}
