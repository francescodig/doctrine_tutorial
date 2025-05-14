<?php



use App\Entity\ECarta_credito;
use App\Entity\EUtente;
use Doctrine\Common\Collections\ArrayCollection;

// Recupero EntityManager da bootstrap.php
$entityManager = require_once "bootstrap.php";

// Recupero un utente esistente dal database (sostituisci con un ID valido)
$utente = $entityManager->find(EUtente::class, 1); // Sostituisci con un ID valido
if (!$utente) {
    die("Utente con ID 1 non trovato.\n");
}

// Crea una nuova carta di credito
$numeroCarta = "1234567890123456"; // Modifica con il numero della carta
$nomeCarta = "Visa";
$dataScadenza = new DateTime("2026-12-31"); // Modifica con la data di scadenza
$cvv = "123"; // Modifica con il CVV
$nomeIntestatario = "John Doe"; // Modifica con il nome dell'intestatario

$cartaCredito = new ECarta_credito(
    $numeroCarta,
    $nomeCarta,
    $dataScadenza,
    $cvv,
    $nomeIntestatario,
    $utente
);

// Salva la carta di credito nel database
$entityManager->persist($cartaCredito);
$entityManager->flush();

echo "Carta di credito inserita con successo con numero " . $cartaCredito->getNumeroCarta() . "\n";
?>
