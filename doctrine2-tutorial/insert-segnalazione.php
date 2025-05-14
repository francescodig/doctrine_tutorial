<?php


use App\Entity\ESegnalazione;
use App\Entity\EUtente;
use App\Entity\EOrdine;
use Doctrine\Common\Collections\ArrayCollection;


// Recupero EntityManager da bootstrap.php
$entityManager = require_once "bootstrap.php";

// Recupero un utente esistente dal database (sostituisci con un ID valido)
$utente = $entityManager->find(EUtente::class, 1); // Sostituisci con un ID valido
if (!$utente) {
    die("Utente con ID 1 non trovato.\n");
}

$ordine = $entityManager->find(EOrdine::class, 1); // Sostituisci con un ID valido
if (!$ordine) {
    die("Ordine con ID 1 non trovato.\n");
}

// Crea una nuova segnalazione
$data = new DateTime("now");
$descrizione = "Segnalazione di esempio";
$testo = "Questo è un testo di esempio per la segnalazione.";

$segnalazione = new ESegnalazione(null, $data, $descrizione, $testo, $utente, $ordine);

// Salva la segnalazione nel database
$entityManager->persist($segnalazione);
$entityManager->flush();

echo "Segnalazione inserita con successo con ID " . $segnalazione->getId() . "\n";

