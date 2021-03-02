<?php

namespace App\DataFixtures;

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
        $season->addUser($user);
        $manager->persist($season);

        $manager->flush();
    }
}
