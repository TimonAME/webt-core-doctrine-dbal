<?php
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;

$executor = new ORMExecutor($entityManager, new ORMPurger());
$executor->execute($loader->getFixtures());