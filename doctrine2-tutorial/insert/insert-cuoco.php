<?php

use App\Entity\ECuoco;
use Doctrine\ORM\EntityManager;

$entityManager = require_once 'bootstrap.php';

// Dati del cuoco
$nome = "Luigi";
$cognome = "Verdi";
$email = "luigi.verdi@example.com";
$password = password_hash("cuocoPass789", PASSWORD_BCRYPT);
$codiceCuoco = "CUO45678";

// Crea una nuova istanza di ECuoco
$cuoco = new ECuoco($nome, $cognome, $email, $password, $codiceCuoco);

try {
    $entityManager->persist($cuoco);
    $entityManager->flush();

    echo "Cuoco inserito con ID: " . $cuoco->getId() . PHP_EOL;
} catch (\Exception $e) {
    echo "Errore durante l'inserimento del cuoco: " . $e->getMessage() . PHP_EOL;
}
