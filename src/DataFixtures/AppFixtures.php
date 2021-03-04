<?php

namespace App\DataFixtures;

use App\Entity\Game;
use App\Entity\League;
use App\Entity\Player;
use App\Entity\Season;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class AppFixtures extends Fixture
{
    private EncoderFactoryInterface $encoderFactory;

    public function __construct(EncoderFactoryInterface $encoderFactory)
    {
        $this->encoderFactory = $encoderFactory;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setRoles(['ROLE_ADMIN', 'ROLE_USER']);
        $user->setPassword($this->encoderFactory->getEncoder(User::class)->encodePassword('admin', null));
        $manager->persist($user);

        $season = new Season();
        $season->setName('season_01');
        $season->setLocation('Smuk');
        $season->setEventDate(new \DateTime());
        $manager->persist($season);

        $player = new Player();
        $player->setName('Max');
        $manager->persist($player);

        $player2 = new Player();
        $player2->setName('Moriz');
        $manager->persist($player2);

        $league = new League();
        $league->setName('league 1');
        $league->addSeason($season);
        $league->addUser($user);
        $league->addPlayer($player);
        $league->addPlayer($player2);
        $manager->persist($league);

        $game1 = new Game();
        $game1->setRound(1);
        $game1->setSeason($season);
        $game1->setPlayerHome($player);
        $game1->setPlayerHomeGoals(0);
        $game1->setPlayerAway($player2);
        $game1->setPlayerAwayGoals(2);
        $manager->persist($game1);

        $game1 = new Game();
        $game1->setRound(1);
        $game1->setSeason($season);
        $game1->setPlayerHome($player2);
        $game1->setPlayerHomeGoals(1);
        $game1->setPlayerAway($player);
        $game1->setPlayerAwayGoals(1);
        $manager->persist($game1);

        $manager->flush();
    }
}
