<?php

namespace App\Controller\Admin;

use App\Entity\Game;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class GameCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Game::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('season'),
            NumberField::new('round'),
            AssociationField::new('playerHome'),
            NumberField::new('PlayerHomeGoals'),
            AssociationField::new('playerAway'),
            NumberField::new('PlayerAwayGoals')
        ];
    }
}
