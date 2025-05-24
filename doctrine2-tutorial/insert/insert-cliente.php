<?php

use App\Entity\ECliente;
use Doctrine\ORM\EntityManager;


$entityManager = require_once "bootstrap.php";

// Dati dell'utente cliente
$nome = "Mario";
$cognome = "Balotelli";
$email = "mario.balotelli@example.com";
$password = password_hash("password123", PASSWORD_BCRYPT); // consiglio sempre di salvare hash

// Crea una nuova istanza di ECliente
$cliente = new ECliente($nome, $cognome, $email, $password);

// Inserimento nel database
try {
    $entityManager->persist($cliente);
    $entityManager->flush();

    echo "Cliente inserito con ID " . $cliente->getId() . "\n";
} catch (\Exception $e) {
    echo "Errore durante l'inserimento: " . $e->getMessage() . "\n";
}
