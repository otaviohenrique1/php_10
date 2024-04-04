<?php

use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$prepareStatement = $pdo->prepare('DELETE FROM students WHERE id = ?;');
$prepareStatement->bindValue(1, 5, PDO::PARAM_INT);
var_dump($prepareStatement->execute());
