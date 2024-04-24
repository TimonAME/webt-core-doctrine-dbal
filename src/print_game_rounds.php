<?php

require_once 'bootstrap.php';

$gameRoundRepository = $entityManager->getRepository(GameRound::class);
$gameRounds = $gameRoundRepository->findAll();

foreach ($gameRounds as $gameRound) {
    echo sprintf(
        "ID: %s, Player 1: %s, Player 2: %s, Date: %s, Time: %s\n",
        $gameRound->getId(),
        $gameRound->getPlayer1(),
        $gameRound->getPlayer2(),
        $gameRound->getDate()->format('Y-m-d'),
        $gameRound->getTime()->format('H:i:s')
    );
}