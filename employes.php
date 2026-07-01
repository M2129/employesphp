<?php

function initialiserEmployes(): array {
    return [
        0 => [
            'nom' => 'Dieye',
            'prenom' => 'Momo',
            'matricule' => 'M001',
            'departement' => ['code' => 'C001', 'nom' => 'Biologie'],
            'subordonnes' => [1, 2]
        ],
        1 => [
            'nom' => 'Seck',
            'prenom' => 'Mamad',
            'matricule' => 'M002',
            'departement' => ['code' => 'C002', 'nom' => 'Sciences'],
            'subordonnes' => [2]
        ],
        2 => [
            'nom' => 'nom2',
            'prenom' => 'prenom2',
            'matricule' => '1236SN',
            'departement' => ['code' => 'C001', 'nom' => 'Biologie'],
            'subordonnes' => []
        ]
    ];
}
function recupererDepartement(array $employes): array {
    $departements = [];
    foreach ($employes as $employe) {
        $code = $employe['departement']['code'];

        if (!isset($departements[$code])) {
            $departements[$code] = $employe['departement'];
        }
    }
    return array_values($departements);
}

$employes = initialiserEmployes();
$departements = recupererDepartement($employes);