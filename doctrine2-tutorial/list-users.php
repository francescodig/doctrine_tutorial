<?php
// list-users.php
require_once 'bootstrap.php';
$entityManager = require 'bootstrap.php';

$utentiRepository = $entityManager->getRepository(\App\Entity\EUtente::class);
$utenti = $utentiRepository->findAll();

foreach ($utenti as $utente) {
    echo sprintf("- %s (%s)\n", $utente->getNome(), $utente->getEmail());
}