<?php

use php5\Doctrine\Entity\Aluno;
use php5\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$classeAluno = Aluno::class;
$dql = "SELECT COUNT(a) FROM $classeAluno a";
$query = $entityManager->createQuery($dql);
$totalAlunos = $query->getSingleScalarResult();

echo "Total de alunos: " . $totalAlunos;
