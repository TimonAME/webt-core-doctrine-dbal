<?php
/*
require_once __DIR__ . '/../vendor/autoload.php';
require_once 'bootstrap.php';

use entities\GameRound;

$player1 = $argv[1];
$player2 = $argv[2];
$date = new \DateTime($argv[3]);
$time = new \DateTime($argv[4]);

$gameRound = new GameRound($player1, $player2, $date, $time);

$entityManager->persist($gameRound);
$entityManager->flush();

echo "Created Game Round with ID " . $gameRound->getId() . "\n";
*/