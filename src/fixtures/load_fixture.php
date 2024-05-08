<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once 'bootstrap.php';

use Doctrine\Common\DataFixtures\Loader;
use DataFixtures\GameRoundFixtures;

$loader = new Loader();
$loader->addFixture(new GameRoundFixtures());

//TODO: composer dump-autoload -> error Code