<?php

try{

    $db = new PDO('mysql:host=localhost;dbname=plantifarm', 'root', '');
    // On émet une alerte à chaque fois qu'une requête a échoué.
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
    echo 'Connexion réussie';
} catch(PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

 return $db;
?>