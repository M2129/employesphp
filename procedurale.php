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


/**
 * Recherche une catégorie par une clé donnée (ex: "code" ou "nom").
 * Retourne l'index trouvé, ou false si aucune correspondance.
 */
function rechercheCategorieParCle(array $categories, string $key, string $value): int|bool
{
    foreach ($categories as $index => $categorie) {
        if ($categorie[$key] === $value) {
            return $index;
        }
    }
    return false;
}

/**
 * Demande une saisie obligatoire ET unique (vérifiée parmi les catégories existantes).
 * Redemande tant que la valeur est vide ou déjà utilisée.
 */
function saisieChampObligatoireEtUnique(array $categories, string $smsSaisie, string $smsError, string $key): string
{
    $valueIsValid = false;

    do {
        $value = saisieChaine($smsSaisie);
        $valueIsValid = champObligatoire($value, $smsError);

        if ($valueIsValid) {
            $existe = rechercheCategorieParCle($categories, $key, $value);
            $valueIsValid = ($existe === false);

            if (!$valueIsValid) {
                echo "Cette valeur existe déjà, veuillez en choisir une autre.\n";
            }
        }
    } while (!$valueIsValid);

    return $value;
}

/**
 * Enregistre une nouvelle catégorie après saisie du code et du nom.
 */
function enregistrerCategorie(): void
{
    global $categories;

    $code = saisieChampObligatoireEtUnique($categories, "Entrez le code : ", "Champ obligatoire : ", "code");
    $nom  = saisieChampObligatoireEtUnique($categories, "Entrez le nom : ", "Champ obligatoire : ", "nom");

    $categorie = [
        "code" => $code,
        "nom" => $nom,
        "produits" => []
    ];

    $categories[] = $categorie;

    echo "Catégorie enregistrée avec succès.\n";
}

enregistrerCategorie();
