<?php
class Zoo {
    private $db;
    private $enclosures = [];

    public function __construct($db) {
        $this->db = $db;

        // Récupérer les enclos de la base de données
        $enclosuresData = $this->db->query('SELECT * FROM enclosures')->fetchAll();

        // Créer les objets Enclosure pour chaque enclos récupéré de la base de données
        foreach ($enclosuresData as $enclosureData) {
            $enclosure = new Enclosure($db, $enclosureData);

            // Ajouter l'enclos à la liste des enclos du zoo
            $this->enclosures[] = $enclosure;
        }
    }

    public function getEnclosures() {
        return $this->enclosures;
    }

    public function getEnclosureById($id) {
        // Chercher l'enclos avec l'ID correspondant
        foreach ($this->enclosures as $enclosure) {
            if ($enclosure->getId() == $id) {
                return $enclosure;
            }
        }

        return null;
    }



    //     public function removeAnimal(Animal $animalToRemove)
    // {
    //     foreach ($this->animal as $key => $animal) {
    //         if ($animal === $animalToRemove) {
    //             unset($this->animal[$key]);
    //         }
    //     }
    // }

    // public function getAnimals(): array
    // {
    //     return $this->animals;
    // }
    
    
    // Méthodes pour gérer les enclos dans le zoo
    public function addEnclosure(Enclosure $enclosure)
    {
        $this->enclosures[] = $enclosure;
    }
    
    public function removeEnclosure(Enclosure $enclosureToRemove)
    {
        foreach ($this->enclosures as $key => $enclosure) {
            if ($enclosure === $enclosureToRemove) {
                unset($this->enclosures[$key]);
            }
        }
    }
}
?>
