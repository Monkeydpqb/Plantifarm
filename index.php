<?php
require_once("./config/autoload.php");
$db = require_once("./config/db.php");
$employee = null; // Initialisation de la variable
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

    <h1>Mon Zoo</h1>
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

    <!-- Créer un animal -->
    <h2>Créer un animal</h2>
    <?php
    if (isset($_POST['species']) && isset($_POST['weight']) && isset($_POST['size'])) {
        $data = [
            'species' => $_POST['species'],
            'weight' => $_POST['weight'],
            'size' => $_POST['size']
        ];

        $animal = new Animal($db, $data);

        $employee = new Employee($db, $data);
        $employee->addAnimal($animal);
    }
    ?>

    <div class="container">
        <form method="POST">
            <div class="mb-3">
                <label for="species" class="form-label">Espèce</label>
                <input type="text" class="form-control" id="species" name="species">
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Poids (en kg)</label>
                <input type="number" class="form-control" id="weight" name="weight">
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Taille (en m)</label>
                <input type="number" class="form-control" id="size" name="size">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
    <!-- Fin Créer un animal -->


    <!-- Créer un enclos -->
    <h2>Créer un enclos</h2>

    <?php
    if (isset($_POST['name']) && isset($_POST['max_animals']) && isset($_POST['animal_types'])) {
        $data = [
            'name' => $_POST['name'],
            'max_animals' => $_POST['max_animals'],
            'animal_types' => $_POST['animal_types']
        ];

        $enclosure = new Enclosure($db, $data);

        $employee = new Employee($db, $data);
        $employee->addEnclosure($enclosure);
    }
    ?>

    <div class="container">
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="maxAnimals" class="form-label">Nombre maximal d'animaux</label>
                <input type="number" class="form-control" id="max_animals" name="max_animals">
            </div>
            <div class="mb-3">
                <label for="animalTypes" class="form-label">Types d'animaux autorisés</label>
                <input type="text" class="form-control" id="animal_types" name="animal_types">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
    <!-- Fin Créer un enclos -->


    <!-- Ajout Animal à un Enclos -->
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $employee = new Employee($db, $data);
        $employee->addAnimalToEnclosure($_POST['animal_id'], $_POST['enclosure_id']);
    } ?>
    
    <form method="post">
        <div class="form-group">
            <label for="animal_id">Animal:</label>
            <select class="form-control" id="animal_id" name="animal_id">
                <?php foreach ($animal->getAnimals() as $animal) : ?>
                    <option value="<?php echo $animal->getId(); ?>"><?php echo $animal->getName(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="enclosure_id">Enclosure:</label>
            <select class="form-control" id="enclosure_id" name="enclosure_id">
                <?php foreach ($zoo->getEnclosures() as $enclosure) : ?>
                    <option value="<?php echo $enclosure->getId(); ?>"><?php echo $enclosure->getName(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>

    <!-- Fin Ajout Animal à un Enclos -->
</body>

</html>