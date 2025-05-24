<?php
// insert-elenco.php

use App\Entity\EElenco_prodotti;
use App\Entity\ECategoria;

 

$entityManager = require_once "bootstrap.php";

// Crea un nuovo elenco prodotti
$elencoProdotti = new EElenco_prodotti([]);




// Persiste e salva tutto nel database (grazie a cascade persist anche le categorie verranno salvate)
$entityManager->persist($elencoProdotti);
$entityManager->flush();



echo "Elenco prodotti inserito con ID " . $elencoProdotti->getId() . "\n";

