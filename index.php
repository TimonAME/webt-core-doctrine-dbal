<?php
require_once 'vendor/autoload.php';

use Doctrine\DBAL\DriverManager;

// ..
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

// Get the page from the URL parameters
$page = $_GET['page'] ?? 'home';

// Map the page to a template
$templateMap = [
    'insert' => 'insert.twig',
    'delete' => 'delete.twig',
    'home' => 'rounds.twig',
];

// Get the template name, default to 'home.twig' if the page is not found in the map
$templateName = $templateMap[$page] ?? $templateMap['home'];

// Render the template using Twig
try {
    echo $twig->render('index.twig', ['templateName' => $templateName, 'data' => $result]);
} catch (\Twig\Error\LoaderError|\Twig\Error\SyntaxError|\Twig\Error\RuntimeError $e) {
    // Handle the error
}