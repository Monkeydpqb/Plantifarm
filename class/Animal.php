<?php

class Animal
{
    private $id;
    private $species;
    private $weight;
    private $size;
    private $isSick;
    private $isAsleep;
    private $isHungry;
    protected $db;

    public function __construct(PDO $db,array $data)
    {
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }
        if (isset($data['species'])) {
            $this->setSpecies($data['species']);
        }
        if (isset($data['weight'])) {
            $this->setWeight($data['weight']);
        }
        if (isset($data['size'])) {
            $this->setSize($data['size']);
        }
        $this->modifyanimalinstance();
        $this->db = $db;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getSpecies()
    {
        return $this->species;
    }

    public function setSpecies($species)
    {
        $this->species = $species;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }
    public function getIsSick()
    {
        return $this->isSick;
    }

    public function setIsSick($isSick)
    {
        $this->isSick = $isSick;
    }

    public function getIsAsleep()
    {
        return $this->isAsleep;
    }

    public function setIsAsleep($isAsleep)
    {
        $this->isAsleep = $isAsleep;
    }

    public function getIsHungry()
    {
        return $this->isHungry;
    }

    public function setIsHungry($isHungry)
    {
        $this->isHungry = $isHungry;
    }

    public function modifyanimalinstance()
    {
        $rand = rand(1, 3);
        switch ($rand) {
            case 1:
                $this->setIsSick(true);
                break;
            case 2:
                $this->setIsAsleep(true);
                break;
            case 3:
                $this->setIsHungry(true);
                break;
        }
    }
}
?>