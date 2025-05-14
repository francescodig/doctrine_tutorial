<?php



use App\Entity\EOrdine;
use App\Entity\EUtente;
use App\Entity\EProdotto;

use Doctrine\Common\Collections\ArrayCollection;

// Recupero EntityManager da bootstrap.php
$entityManager = require_once "bootstrap.php";

// Recupero un utente esistente dal database (sostituisci con un ID valido)
$utente = $entityManager->find(EUtente::class, 1);
if (!$utente) {
    die("Utente con ID 1 non trovato.\n");
}

// Recupero uno o più prodotti dal database (sostituisci con ID validi)
$prodotto1 = $entityManager->find(EProdotto::class, 1);
$prodotto2 = $entityManager->find(EProdotto::class, 2);

if (!$prodotto1 || !$prodotto2) {
    die("Prodotti con ID 1 o 2 non trovati.\n");
}

$prodotti = new ArrayCollection();
$prodotti->add($prodotto1);
$prodotti->add($prodotto2);

// Crea un nuovo ordine
$ordine = new EOrdine(
    null,
    $prodotti,
    "Consegna veloce, grazie!",
    new DateTime("now"),
    new DateTime("+2 days"),
    39.99
);

// Imposta anche l'utente (manca nel costruttore!)
$ordine->setUtente($utente);

// Aggiungi i prodotti alla collection dell’ordine
$ordine->setProdotti($prodotti);

// Salva l'ordine nel database
$entityManager->persist($ordine);
$entityManager->flush();

echo "Ordine inserito con successo con ID " . $ordine->getId() . "\n";
