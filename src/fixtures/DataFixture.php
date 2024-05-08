<?php
namespace DataFixtures;

require_once __DIR__ . '/../../vendor/autoload.php';

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use entities\GameRound;

class GameRoundFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $gameRound = new GameRound(
            'Player 1',
            'Player 2',
            new \DateTime('2022-01-01'),
            new \DateTime('12:00:00')
        );

        $manager->persist($gameRound);
        $manager->flush();
    }
}