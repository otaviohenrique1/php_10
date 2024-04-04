<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$statement = $pdo->query('SELECT * FROM students');

// $statement = $pdo->query('SELECT * FROM students WHERE id = 1');
// var_dump($statement->fetchColumn(1)); // Pega dado de aluno por coluna

// $statement = $pdo->query('SELECT * FROM students WHERE id = 1');
// Pega um aluno
// while ($studentData = $statement->fetch(PDO::FETCH_ASSOC)) {
//   $student = new Student(
//     $studentData['id'],
//     $studentData['name'],
//     new DateTimeImmutable($studentData['birth_date']),
//   );
//   echo $student->age() . PHP_EOL;
// }

$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC); // Pega todos os alunos

$studentList = [];

foreach ($studentDataList as $studentData) {
  $studentList[] = new Student(
    $studentData['id'],
    $studentData['name'],
    new DateTimeImmutable($studentData['birth_date']),
  );
}

var_dump($studentList);

// echo $studentDataList[0]['name'];
