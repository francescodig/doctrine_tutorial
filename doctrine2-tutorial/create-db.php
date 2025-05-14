<?php
$entityManager = require_once "bootstrap.php"; // ⬅️ ora assegniamo ciò che bootstrap.php ritorna

use Doctrine\ORM\Tools\SchemaTool;
use App\Entity\EUtente;


$schemaTool = new SchemaTool($entityManager);
$classes = [
    $entityManager->getClassMetadata(EUtente::class),
];

$schemaTool->dropDatabase();
$schemaTool->createSchema($classes);

echo "Database creato con successo.\n";
