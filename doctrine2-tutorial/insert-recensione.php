<?php


use App\Entity\ERecensione;
use App\Entity\EUtente;
use Doctrine\Common\Collections\ArrayCollection;

// Recupero EntityManager da bootstrap.php
$entityManager = require_once "bootstrap.php";

// Recupero un utente esistente dal database (sostituisci con un ID valido)
$utente = $entityManager->find(EUtente::class, 1); // Sostituisci con un ID valido
if (!$utente) {
    die("Utente con ID 1 non trovato.\n");
}

// Crea una nuova recensione
$descrizione = "Recensione di esempio";
$voto = 4; // Puoi adattarlo al range di voti che desideri (es. 1-5)
$data = new DateTime("now");
$recensione = new ERecensione(null, $descrizione, $voto, $data, $utente);

// Salva la recensione nel database
$entityManager->persist($recensione);
$entityManager->flush();

echo "Recensione inserita con successo con ID " . $recensione->getId() . "\n";

