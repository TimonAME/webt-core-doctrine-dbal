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

$queryBuilder = $conn->createQueryBuilder();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $player1 = $_POST['player1'];
    $player2 = $_POST['player2'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $queryBuilder
        ->insert('game_rounds')
        ->values([
            'player1' => '?',
            'player2' => '?',
            'date' => '?',
            'time' => '?',
        ])
        ->setParameter(0, $player1)
        ->setParameter(1, $player2)
        ->setParameter(2, $date)
        ->setParameter(3, $time);

    try {
        $queryBuilder->executeStatement();
    } catch (\Doctrine\DBAL\Exception $e) {
    }

    header('Location: index.php?page=home');
    exit;
}