<?php

namespace App\Controller\Admin;

use App\Entity\League;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LeagueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return League::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            AssociationField::new('users'),
            AssociationField::new('seasons'),
            AssociationField::new('players')
        ];
    }
}
