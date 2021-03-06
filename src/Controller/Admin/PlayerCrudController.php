<?php

namespace App\Controller\Admin;

use App\Entity\Player;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PlayerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Player::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setFormTypeOption('disabled','disabled'),
            TextField::new('name'),
            AssociationField::new('league'),
            AssociationField::new('gamesHome'),
            AssociationField::new('gamesAway')
        ];
    }
}
