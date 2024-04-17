<?php
require_once 'vendor/autoload.php';

use Doctrine\DBAL\DriverManager;

$connectionParams = [
    'dbname' => 'tournament_db',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
];
$conn = DriverManager::getConnection($connectionParams);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roundId = $_POST['roundId'];

    $queryBuilder = $conn->createQueryBuilder();

    $queryBuilder
        ->delete('game_rounds')
        ->where('round = ?')
        ->setParameter(0, $roundId)
    ;

    try {
        $queryBuilder->executeStatement();
    } catch (\Doctrine\DBAL\Exception $e) {
    }

    header('Location: index.php?page=home');
    exit;
}