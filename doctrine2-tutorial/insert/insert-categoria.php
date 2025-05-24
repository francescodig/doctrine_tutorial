<?php
// insert-categoria.php

use App\Entity\ECategoria;
use App\Entity\EElenco_prodotti;


// Recupera l'EntityManager
$entityManager = require_once "bootstrap.php"; 

// Creazione di una nuova categoria
$categoria1 = new ECategoria();
$categoria1->setNome('Antipasti');

// Creazione di una nuova categoria
$categoria2 = new ECategoria();
$categoria2->setNome('Primi Piatti');

// Per impostare l'elenco prodotti associato, supponiamo di recuperarlo prima
// Sostituisci con l'id reale dell'elenco prodotti a cui vuoi associare la categoria
$elencoProdottiId = 1;
$elencoProdotti = $entityManager->find(EElenco_prodotti::class, $elencoProdottiId);

if (!$elencoProdotti) {
    echo "Elenco prodotti con id $elencoProdottiId non trovato.\n";
    exit(1);
}

$categoria1->setElencoProdotti($elencoProdotti);
$categoria2->setElencoProdotti($elencoProdotti);

// Salvataggio nel database
$entityManager->persist($categoria1);
$entityManager->persist($categoria2);
$entityManager->flush();

echo "Categoria inserita con ID " . $categoria1->getId() . "\n";
echo "Categoria inserita con ID " . $categoria2->getId() . "\n";
