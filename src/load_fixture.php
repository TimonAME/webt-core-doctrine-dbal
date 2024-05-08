<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once 'bootstrap.php';

use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use DataFixtures\GameRoundFixtures;

$loader = new Loader();
//$loader->addFixture(new GameRoundFixtures());
//$loader->loadFromFile('fixtures/DataFixture.php');

$loader->loadFromDirectory(__DIR__ . '/fixtures');

$executor = new ORMExecutor($entityManager, new ORMPurger());
$executor->execute($loader->getFixtures());

// to load the fixtures, run the following command in the terminal:
// php .\src\load_fixture.php

// code aus create_round.php und print_game_rounds.php muss auskommentiert werden ?!?!