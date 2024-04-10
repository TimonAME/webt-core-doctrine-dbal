<?php
require_once 'vendor/autoload.php';

use Doctrine\DBAL\DriverManager;

//..
$connectionParams = [
    'dbname' => 'tournament_db',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
];
$conn = DriverManager::getConnection($connectionParams);

$queryBuilder = $conn->createQueryBuilder();

$queryBuilder
    ->select('*')
    ->from('game_rounds')
;

$result = $queryBuilder->fetchAllAssociative();

/*** Twig ***
 * composer require "twig/twig"
 */
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader('templates');
$twig = new Environment($loader);

// Render the template using Twig
try {
    echo $twig->render('rounds.twig', ['data' => $result]);
} catch (\Twig\Error\LoaderError|\Twig\Error\SyntaxError|\Twig\Error\RuntimeError $e) {
}