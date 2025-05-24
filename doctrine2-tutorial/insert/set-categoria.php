<?php
use App\Entity\ECategoria;
use App\Entity\EElenco_prodotti;


$entityManager = require_once "bootstrap.php";

// ID categoria esistente da associare
$categoriaId = 1;
// ID elenco prodotti esistente a cui associare la categoria
$elencoProdottiId = 1;

// Recupera la categoria
$categoria = $entityManager->find(ECategoria::class, $categoriaId);
if (!$categoria) {
    echo "Categoria con id $categoriaId non trovata.\n";
    exit(1);
}

// Recupera l'elenco prodotti
$elencoProdotti = $entityManager->find(EElenco_prodotti::class, $elencoProdottiId);
if (!$elencoProdotti) {
    echo "Elenco prodotti con id $elencoProdottiId non trovato.\n";
    exit(1);
}

// Associa la categoria all'elenco prodotti
$categoria->setElencoProdotti($elencoProdotti);

// (Opzionale ma consigliato) aggiorna la collezione categorie dell'elenco prodotti
// controlla se la categoria non è già presente per evitare duplicati
if (!$elencoProdotti->getCategorie()->contains($categoria)) {
    $elencoProdotti->addCategoria($categoria);
}

// Salva le modifiche
$entityManager->persist($categoria);
$entityManager->persist($elencoProdotti);
$entityManager->flush();

echo "Categoria con ID " . $categoria->getId() . " associata all'elenco prodotti con ID " . $elencoProdotti->getId() . "\n";
