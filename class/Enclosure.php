<?php

class Enclosure
{
    private $id;
    private $name;
    private $max_animals;
    private $animal_types;
    private $isDirty;
    private $salinity;
    private $temperature;
    private $animals = [];
    protected $db;

    public function __construct(PDO $db, array $data)
    {
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }
        if (isset($data['name'])) {
            $this->setName($data['name']);
        }
        if (isset($data['max_animals'])) {
            $this->setMax_animals($data['max_animals']);
        }
        if (isset($data['animal_types'])) {
            $this->setAnimal_types($data['animal_types']);
        }
        // $this->modifyEnclosureState();
        $this->db = $db;
    }


    public function addAnimal(Animal $animal)
    {
        $this->animals[] = $animal;
    }

    public function getAnimals(): array
    {
        return $this->animals;
    }


    // public function modifyEnclosureState()
    // {
    //     $rand = rand(1, 3);
    //     switch ($rand) {
    //         case 1:
    //             $this->setIsDirty(true);
    //             break;
    //         case 2:
    //             $this->setSalinity(rand(1, 100));
    //             break;
    //         case 3:
    //             $this->setTemperature(rand(-10, 40));
    //             break;
    //     }
    // }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getMax_animals()
    {
        return $this->max_animals;
    }

    public function setMax_animals($max_animals)
    {
        $this->max_animals = $max_animals;
    }

    public function getAnimal_types()
    {
        return $this->animal_types;
    }

    public function setAnimal_types($animal_types)
    {
        $this->animal_types = $animal_types;
    }

    public function getIsDirty()
    {
        return $this->isDirty;
    }

    public function setIsDirty($isDirty)
    {
        $this->isDirty = $isDirty;
    }

    public function getSalinity()
    {
        return $this->salinity;
    }

    public function setSalinity($salinity)
    {
        $this->salinity = $salinity;
    }

    public function getTemperature()
    {
        return $this->temperature;
    }

    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;
    }

}
?>