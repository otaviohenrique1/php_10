<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

// $statement = $pdo->query('SELECT * FROM students');
$statement = $pdo->query('SELECT * FROM students WHERE id = 1');

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
