<?php

class Task
{
    private string $name;
    private string $description;
    private string $state;
    private $hatarIdo;
    private $id;

    public function __construct(string $name = "", string $description = "",  string $state = "", $hatarIdo)
    {
        $this->name = $name;
        $this->description = $description;
        $this->state = $state;
        $this->hatarIdo = $hatarIdo;
        $this->id = uniqid();
    }
    //getterek
    public function getNev()
    {
        return $this->name;
    }
    public function getLeiras()
    {
        return $this->description;
    }
    public function getState()
    {
        return $this->state;
    }
    public function getIdo()
    {
        return $this->hatarIdo;
    }
    // setterek
    public function setName($ertek)
    {
        $this->name = $ertek;
    }
    public function setTime($ertek)
    {
        $this->hatarIdo = $ertek;
    }
    public function setDescription($ertek)
    {
        $this->description = $ertek;
    }
    public function setState($state)
    {
        $this->state = $state;
    }
    //fuggvenyek
    public function kesz()
    {
        echo "<h2>Szuper, ezzel a feladattal megvagy!</h2><br>";
    }
    public function figyelmeztet()
    {
        $t = time();
        if ($this->getIdo() - date("Y-m-d", $t) < 3) {
            echo "Márcsak 3 napod van hátra a határidő végéig!<br>";
        }
    }
    public function getID()
    {
        return $this->id;
    }
    public function render()
    {
        include('Components/TaskManager/Task/TaskTemplate.php');
    }
}
