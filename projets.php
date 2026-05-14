<?php
require 'fonctions.php';

$projets = [
    [
        'titre' => 'Projet Eclipse (Conversion / Exercices)',
        'description' => 'Ce projet réalisé sur Eclipse consistait à effectuer des exercices de programmation, notamment des conversions et
        manipulations de données. L’objectif était de mettre en pratique les notions de base en programmation, comme les
        variables, les opérations et l’affichage des résultats. Ce travail m’a permis de renforcer ma logique et de mieux
        comprendre le fonctionnement d’un programme simple.',
        'image' => 'images/projet1.png',
        'technologies' => ['Java', 'Eclipse']
    ],
    [
        'titre' => 'Projet MySQL (Création de table)',
        'description' => ' Ce projet consiste à créer et manipuler une base de données avec MySQL, notamment à travers la création d’une table.
        J’ai utilisé des requêtes SQL comme CREATE TABLE pour définir la structure des données. Ce projet m’a permis de
        comprendre les bases de la gestion de données et l’organisation d’une base de données relationnelle.',
        'image' => 'images/projet3.jpeg',
        'technologies' => ['MySQL', 'SQL']
    ],
    [
        'titre' => 'Projet Arduino (Allumage de lampes)',
        'description' => 'Ce projet consiste à programmer un système avec Arduino permettant d’allumer et d’éteindre des lampes. Il repose sur
        l’utilisation de composants électroniques et la programmation du microcontrôleur pour contrôler les sorties selon des
        conditions définies. Ce projet m’a permis de découvrir le fonctionnement des systèmes embarqués et d’interagir avec du
        matériel électronique de manière concrète..',
        'image' => 'images/projet4.png',
        'technologies' => ['Arduino']
    ]
];

$mot_cle = nettoyer($_GET['recherche'] ?? '');
$resultats = [];

if ($mot_cle !== '') {
    foreach ($projets as $projet) {
        if (stripos($projet['titre'], $mot_cle) !== false ||
            stripos($projet['description'], $mot_cle) !== false) {
            $resultats[] = $projet;
        }
    }
} else {
    $resultats = $projets;
}
?>

<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projets</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require 'composants/navigation.php'; ?>

<main>

<h2>Rechercher un projet</h2>

<form method="GET" action="projets.php" class="search-form">
    <input type="text" name="recherche" placeholder="Rechercher par mot-clé..."
           value="<?= htmlspecialchars($mot_cle) ?>">
    <button type="submit">Rechercher</button>
</form>

<?php if (empty($resultats)) : ?>
    <p>Aucun projet ne correspond à ta recherche.</p>
<?php else : ?>
    <section class="grid">
        <?php foreach ($resultats as $projet) : ?>
            <div class="carte-projet">
                <img src="<?= htmlspecialchars($projet['image']) ?>"
                     alt="<?= htmlspecialchars($projet['titre']) ?>">
                <h3><?= htmlspecialchars($projet['titre']) ?></h3>
                <p><?= htmlspecialchars($projet['description']) ?></p>
                <div class="technologies">
                    <?php foreach ($projet['technologies'] as $tech) : ?>
                        <span class="badge"><?= htmlspecialchars($tech) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php endif; ?>

</main>

<?php require 'composants/pied-de-page.php'; ?>

</body>
</html>