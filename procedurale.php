<?php

$categories = [
    0 => [
        "code" => "coo0",
        "nom" => "categorie0",
        "produits" => [
            0 => [
                "nom" => "produit1",
                "reference" => "ref1",
                "prix" => 3000,
                "quantite" => 5
            ],
            1 => [
                "nom" => "produit2",
                "reference" => "ref2",
                "prix" => 2000,
                "quantite" => 3
            ]
        ]
    ],
    1 => [
        "code" => "coo1",
        "nom" => "categorie1",
        "produits" => []
    ]
];

/**
 * Affiche le nom des catégories qui n'ont aucun produit.
 */
function afficheCategorieSansProduit(array $categories): void
{
    foreach ($categories as $categorie) {
        if (empty($categorie["produits"])) {
            echo $categorie["nom"] . "\n";
        }
    }
}

afficheCategorieSansProduit($categories);

/**
 * Demande une saisie utilisateur via un message donné.
 */
function saisieChaine(string $message): string
{
    return trim(readline($message));
}

/**
 * Vérifie qu'une valeur n'est pas vide.
 * Affiche un message d'erreur si elle l'est.
 */
function champObligatoire(string $value, string $message): bool
{
    if (empty($value)) {
        echo $message . "\n";
        return false;
    }
    return true;
}