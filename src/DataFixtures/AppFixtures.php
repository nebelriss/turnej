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
        $user->setRoles(['ROLE_SUADMIN','ROLE_ADMIN', 'ROLE_USER']);
        $user->setEmail('test@email.com');
        $user->setPassword($this->encoderFactory->getEncoder(User::class)->encodePassword('admin', null));
        $user->setIsVerified(true);
        $manager->persist($user);

        $season = new Season();
        $season->setName('season_01');
        $season->setLocation('Smuk');
        $season->setEventDate(new \DateTime());
        $manager->persist($season);

        $season2 = new Season();
        $season2->setName('season_02');
        $season2->setLocation('Smuk');
        $season2->setEventDate(new \DateTime());
        $manager->persist($season2);

        $players = [];
        for ($i = 1; $i <= 4; $i++) {
            $player = new Player();
            $player->setName('Player' . $i);
            $manager->persist($player);
            array_push($players, $player);
        }

        $playersReverse = array_reverse($players);

        $league = new League();
        $league->setName('league 1');
        $league->addSeason($season);
        $league->addUser($user);
        foreach ($players as $player) {
            $league->addPlayer($player);
        }
        $manager->persist($league);

        $league2 = new League();
        $league2->setName('league 2');
        $league2->addSeason($season2);
        $league2->addUser($user);
        foreach ($players as $player) {
            $league2->addPlayer($player);
        }
        $manager->persist($league2);

        $gameCounter = 1;
        foreach ($players as $player) {
            foreach($playersReverse as $rPlayer) {
                if ($player !== $rPlayer) {
                    $game = new Game();
                    $game->setRound($gameCounter++);
                    $game->setSeason($season);
                    $game->setPlayerHome($player);
                    $game->setPlayerHomeGoals(rand(1,12));
                    $game->setPlayerAway($rPlayer);
                    $game->setPlayerAwayGoals(rand(1,12));
                    $manager->persist($game);
                }
            }
        }
        $manager->flush();
    }
}
