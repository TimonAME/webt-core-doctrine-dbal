<?php
// bootstrap.php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Attributes
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: array(__DIR__."/src"),
    isDevMode: true,
);
// or if you prefer XML
// $config = ORMSetup::createXMLMetadataConfiguration(
//    paths: array(__DIR__."/config/xml"),
//    isDevMode: true,
//);

// configuring the database connection
$connection = DriverManager::getConnection([
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/db.sqlite',
], $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);



// ###### fixtures ######

require_once __DIR__ . '/../../vendor/autoload.php';
require_once 'bootstrap.php';

use Doctrine\Common\DataFixtures\Loader;
use DataFixtures\GameRoundFixtures;

$loader = new Loader();
$loader->addFixture(new GameRoundFixtures());

//TODO: composer dump-autoload -> error Code

use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;

$executor = new ORMExecutor($entityManager, new ORMPurger());
$executor->execute($loader->getFixtures());