<?php

class Employee
{
    private $name;
    private $age;
    private $salary;
    private $job_title;
    private $takecareofzoo;
    protected $db;

    public function __construct( PDO $db, array $data)
    {
        if (isset($data['name'])) {
            $this->setName($data['name']);
        }
        if (isset($data['age'])) {
            $this->setAge($data['age']);
        }
        if (isset($data['salary'])) {
            $this->setSalary($data['salary']);
        }
        if (isset($data['job_title'])) {
            $this->setJob_title($data['job_title']);
        }
        if (isset($data['takecareofzoo'])) {
            $this->setTakecareofzoo($data['takecareofzoo']);
        }
        $this->db = $db;
    }


    public function addAnimal(Animal $animal)
    {
        $query = $this->db->prepare("INSERT INTO animals (species, weight , size) VALUES (:species, :weight , :size)");
        $query->execute(array(
            'species' => $animal->getSpecies(),
            'weight' => $animal->getWeight(),
            'size' => $animal->getSize(),
        ));
    }


    public function addEnclosure(Enclosure $enclosure)
    {
        $query = $this->db->prepare("INSERT INTO enclosures (name, max_animals, animal_types) VALUES (:name, :max_animals, :animal_types)");
        $query->execute([
            'name' => $enclosure->getName(),
            'max_animals' => $enclosure->getMax_animals(),
            'animal_types' => $enclosure->getAnimal_types()
        ]);
    }
    
    

    public function addAnimalToEnclosure($animalId, $enclosureId)
    {
        $query = $this->db->prepare("INSERT INTO enclosures_animals (enclosure_id, animal_id) VALUES (:enclosure_id, :animal_id)");
        $query->execute(array(
            ':enclosure_id' => $enclosureId,
            ':animal_id' => $animalId
        ));
    }
    


    // public function takeCareOfZoo(Zoo $zoo)
    // {
    //     // Nourrir les animaux
    //     foreach ($zoo->getAnimals() as $animal) {
    //         $animal->eat();
    //     }

    //     // Nettoyer les enclos
    //     foreach ($zoo->getEnclosures() as $enclosure) {
    //         $enclosure->clean();
    //     }

    //     // Vérifier la santé des animaux
    //     foreach ($zoo->getAnimals() as $animal) {
    //         if (!$animal->isHealthy()) {
    //             // Appeler le vétérinaire ou prendre une autre action appropriée
    //         }
    //     }
    // }


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function getJob_title()
    {
        return $this->job_title;
    }

    public function setJob_title($job_title)
    {
        $this->job_title = $job_title;
    }

    public function getTakecareofzoo()
    {
        return $this->takecareofzoo;
    }

    public function setTakecareofzoo($takecareofzoo)
    {
        $this->takecareofzoo = $takecareofzoo;
    }

   
}
