<?php 
//insert-user.php
$entityManager = require 'bootstrap.php';

$utente = new \App\Entity\EUtente("Mario", "Rossi", "mario@gmail.com", "password123");
$utente->setNome("Mario Rossi");
$utente->setEmail("mario@gmail.com");

$entityManager->persist($utente);
$entityManager->flush();

echo  "Utente creato con ID: " . $utente->getId() . "\n";