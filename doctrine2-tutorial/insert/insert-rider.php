<?php

use App\Entity\ERider;


$entityManager = require_once "bootstrap.php";


// Dati del rider
$nome = "Mario";
$cognome = "Bianchi";
$email = "mario.bianchi@example.com";
$password = password_hash("riderPass456", PASSWORD_BCRYPT);
$codiceRider = "RID12345";

// Istanzia un nuovo rider
$rider = new ERider($nome, $cognome, $email, $password, $codiceRider);

try {
    $entityManager->persist($rider);
    $entityManager->flush();

    echo "Rider inserito con ID: " . $rider->getId() . PHP_EOL;
} catch (\Exception $e) {
    echo "Errore durante l'inserimento del rider: " . $e->getMessage() . PHP_EOL;
}
