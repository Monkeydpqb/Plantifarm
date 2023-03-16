<?php
require_once("./config/autoload.php");
$db = require_once("./config/db.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Zoo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="./css/index.css" rel="stylesheet">
</head>
<body>


<!-- Tableau Du Zoo -->
<div class="container">
        <?php $zoo = new Zoo($db); ?>
        <h2>Liste des enclos et des animaux</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Enclos</th>
                    <th>Animal</th>
                    <th>Espèce</th>
                    <th>Poids</th>
                    <th>Taille</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($zoo->getEnclosures() as $enclosure) : ?>
                    <?php foreach ($enclosure->getAnimals() as $animal) : ?>
                        <tr>
                            <td><?= $enclosure->getName() ?></td>
                            <td><?= $animal->getName() ?></td>
                            <td><?= $animal->getSpecies() ?></td>
                            <td><?= $animal->getWeight() ?></td>
                            <td><?= $animal->getSize() ?></td>
                            <td><a href="delete.php?enclosure_id=<?= $enclosure->getId() ?>&animal_id=<?= $animal->getId() ?>">Supprimer</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Fin Tableau Du Zoo -->

</body>
</html>