<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . "/vendor/autoload.php";

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(
    [__DIR__ . "/App/Entity"],
    $isDevMode,
    null,
    null,
    false // 👈 imposta a false per evitare l'uso di SimpleAnnotationReader
);


$conn = [
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/db.sqlite',
];

$entityManager = EntityManager::create($conn, $config);

return EntityManager::create($conn, $config);