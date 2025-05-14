<?php



use App\Entity\EProdotto;

// Recupero EntityManager
$entityManager = require_once "bootstrap.php";

// Crea una lista di prodotti da inserire
$prodotti = [
    new EProdotto(null, "Pizza Margherita", "Pizza classica con pomodoro e mozzarella", 7.50),
    new EProdotto(null, "Pasta Carbonara", "Pasta con guanciale, uova e pecorino", 8.00),
    new EProdotto(null, "Tiramisù", "Dolce al cucchiaio con caffè e mascarpone", 4.50),
    new EProdotto(null, "Acqua Naturale", "Bottiglia da 0.5L", 1.00)
];

// Salva ogni prodotto nel database
foreach ($prodotti as $prodotto) {
    $entityManager->persist($prodotto);
}

$entityManager->flush();

echo "Prodotti inseriti con successo.\n";
