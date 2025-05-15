<?php

use App\Entity\EIndirizzo;
use App\Entity\ECliente;

$entityManager = require_once 'bootstrap.php';

// Recupera un cliente esistente (sostituisci con ID valido)
$cliente = $entityManager->find(ECliente::class, 1); // cambia ID se necessario
if (!$cliente) {
    die("Cliente con ID 1 non trovato.\n");
}

// Dati dei 4 indirizzi da inserire
$indirizziDati = [
    ["Via Roma", "10", "00100", "Roma"],
    ["Via Milano", "22", "20100", "Milano"],
    ["Corso Torino", "15", "10100", "Torino"],
    ["Via Napoli", "5", "80100", "Napoli"]
];

foreach ($indirizziDati as [$via, $civico, $cap, $citta]) {
    $indirizzo = new EIndirizzo();
    $indirizzo->setVia($via);
    $indirizzo->setCivico($civico);
    $indirizzo->setCap($cap);
    $indirizzo->setCitta($citta);

    // Associa l'indirizzo al cliente
    $cliente->getIndirizziConsegna()->add($indirizzo);
    $entityManager->persist($indirizzo);
}

// Salva tutto
$entityManager->flush();

echo "4 indirizzi inseriti e associati al cliente con ID " . $cliente->getId() . PHP_EOL;
