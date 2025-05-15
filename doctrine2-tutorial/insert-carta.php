<?php

use App\Entity\ECarta_credito;
use App\Entity\EUtente;

// Recupero EntityManager da bootstrap.php
$entityManager = require_once "bootstrap.php";

// Recupero un utente esistente dal database (sostituisci con un ID valido)
$utente = $entityManager->find(EUtente::class, 1); // Sostituisci con un ID valido
if (!$utente) {
    die("Utente con ID 1 non trovato.\n");
}

// Dati delle carte da generare
$carteDati = [
    ["1234567890123456", "Visa", "2026-12-31", "123", "John Doe"],
    ["2345678901234567", "MasterCard", "2027-05-31", "456", "John Doe"],
    ["3456789012345678", "American Express", "2025-09-30", "789", "John Doe"],
    ["4567890123456789", "Maestro", "2028-03-31", "012", "John Doe"],
];

foreach ($carteDati as [$numero, $nome, $scadenza, $cvv, $intestatario]) {
    $carta = new ECarta_credito(
        $numero,
        $nome,
        new DateTime($scadenza),
        $cvv,
        $intestatario,
        $utente
    );
    $entityManager->persist($carta);
}

$entityManager->flush();

echo "4 carte di credito inserite con successo per l'utente con ID " . $utente->getId() . "\n";
