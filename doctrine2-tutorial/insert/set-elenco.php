<?php

use App\Entity\EElenco_prodotti;
use App\Entity\ECategoria;

// recupera $entityManager

$entityManager = require_once "bootstrap.php";  // se bootstrap restituisce l'EntityManager



// Recupera un elenco prodotti esistente (menù) tramite ID
$elencoProdottiId = 1;
$elencoProdotti = $entityManager->find(EElenco_prodotti::class, $elencoProdottiId);

if (!$elencoProdotti) {
    echo "Elenco prodotti con ID" . $elencoProdottiId . " non trovato. \n";
    exit(1);
}

// Creazione di nuove categorie
$categoria1 = new ECategoria();
$categoria1->setNome("Antipasti");
$categoria1->setElencoProdotti($elencoProdotti); // imposta il lato "molti a uno"

$categoria2 = new ECategoria();
$categoria2->setNome("Primi Piatti");
$categoria2->setElencoProdotti($elencoProdotti);


// Aggiunta delle categorie all'elenco (lato "uno a molti")
$elencoProdotti->addCategoria($categoria1);
$elencoProdotti->addCategoria($categoria2);

// Persisti il tutto (grazie a cascade={"persist"} sull'elenco)
$entityManager->persist($elencoProdotti);
$entityManager->flush();

// Output degli ID
echo "Categorie associate inserite con ID: ";
foreach ($elencoProdotti->getCategorie() as $categoria) {
    echo $categoria->getId() . " ";
}
echo "\n";
