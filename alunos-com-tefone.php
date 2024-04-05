<?php

use Alura\Pdo\Domain\Repository\PdoStudentRepository;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';
require_once 'src/infratructure/Persistance/ConnectionCreator.php';
require_once 'src/infratructure/Repository/PdoStudentRepository.php';

$connection = ConnectionCreator::createConnection();
$repository = new PdoStudentRepository($connection);
$studentList = $repository->studentsWithPhone();
var_dump($studentList);
