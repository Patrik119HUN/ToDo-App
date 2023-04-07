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
        $tipusok = "";
        foreach (TaskList::$name as $i) {
            if ($i == $this->state) {
                $tipusok .= "<option value='$i' selected>$i</option>";
            } else {
                $tipusok .= "<option value='$i'>$i</option>";
            }
        }
        echo "<div class=task>
                <form action=/teendok method=get>
                <button type=submit name=delete value=$this->id class=delete_button>X</button>
                <input type=hidden name=taskId value=$this->id></input>
                <div class=inputs>
                    <input type=text placeholder='Feladat neve' name=name value='$this->name'></input>
                    <input type=text placeholder='Leírása' id=leiras name=description value='$this->description'></input>                
                    <input type=date name=date value='$this->hatarIdo'></input>                
                </div>
                <div style='display: flex; flex-direction: row;justify-content: space-between; '>
                    <select name=state id=state'>
                        $tipusok
                    </select>
                <div style='display:flex; flex-direction:row;gap:5px;'>
                <button type=submit name=change class='save_button'>Mentés</button>
                </div>
                </div>
                </form>
            </div>";
    }
}
?>