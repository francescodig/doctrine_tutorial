<?php
// insert-prodotti.php

use App\Entity\EProdotto;
use App\Entity\ECategoria;


$entityManager = 
require_once "bootstrap.php";  // o come si chiama la tua funzione per l'EntityManager

// Imposta i dati del prodotto da inserire
$nomeProdotto = "Bruschetta";
$descrizioneProdotto = "Pane tostato con pomodoro, aglio e basilico";
$costoProdotto = 4.50;

// ID della categoria esistente a cui associare il prodotto
$categoriaId = 1;

// Recupera la categoria dal DB
$categoria = $entityManager->find(ECategoria::class, $categoriaId);

if (!$categoria) {
    echo "Categoria con id $categoriaId non trovata.\n";
    exit(1);
}

// Crea il prodotto associandolo alla categoria
$prodotto1 = new EProdotto($nomeProdotto, $descrizioneProdotto, $costoProdotto, $categoria);

$nomeProdotto = "Focaccia italiana";
$descrizioneProdotto = "Focaccia con pomodoro, aglio e basilico";
$costoProdotto = 4.50;

$prodotto2 = new EProdotto($nomeProdotto, $descrizioneProdotto, $costoProdotto, $categoria);



// Persiste e salva nel database
$entityManager->persist($prodotto1);
$entityManager->persist($prodotto2);
$entityManager->flush();

echo "Prodotto inserito con ID " . $prodotto1->getId() . "\n";
echo "Prodotto inserito con ID " . $prodotto2->getId() . "\n";
