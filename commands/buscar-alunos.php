<?php

use php5\Doctrine\Entity\Aluno;
use php5\Doctrine\Entity\Telefone;
use php5\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$dql = "SELECT aluno FROM php5\\Doctrine\\Entity\\Aluno aluno";
$query = $entityManager->createQuery($dql);
$alunoList = $query->getResult();

foreach ($alunoList as $aluno) {
    $telefones = $aluno
        ->getTelefones()
        ->map(function (Telefone $telefone) {
            return $telefone->getNumero();
        })
        ->toArray();
    echo "ID: {$aluno->getId()}\nNome: {$aluno->getNome()}\n";
    echo "Telefones: " . implode(', ', $telefones);

    echo "\n\n";
}
