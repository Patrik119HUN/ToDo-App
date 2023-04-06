
<?php

enum tipusok
{
    case Kesz;
    case Folyamatban;
    case Nincs;
}
class feladat
{
    private string $neve;
    private string $leirasa;
    private string $allapot;
    private $hatarIdo;
    private $id;

    public function __construct(string $neve = "", string $leirasa = "",  string $allapot = "", $hatarIdo)
    {     // konstruktor
        $this->neve = $neve;      // adattagok inicializálása a konstruktor paraméterei alapján
        $this->leirasa = $leirasa;
        $this->allapot = $allapot;
        $this->hatarIdo = $hatarIdo;
        $this->id = uniqid();
    }
    //getterek
    public function getNev()
    {
        return $this->neve;
    }
    public function getLeiras()
    {
        return $this->leirasa;
    }
    public function getAllapot()
    {
        return $this->allapot;
    }
    public function getIdo()
    {
        return $this->hatarIdo;
    }
    // setterek
    public function setNev($ertek)
    {
        $this->neve = $ertek;
    }
    public function setHatarIdo($ertek)
    {
        $this->hatarIdo = $ertek;
    }
    public function setLeirasa($ertek)
    {
        $this->leirasa = $ertek;
    }
    public function setAllapot($state)
    {
        $this->allapot = $state;
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
        foreach (feladatok::$name as $i) {
            if ($i == $this->allapot) {
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
                    <input type=text placeholder='Feladat neve' name=name value='$this->neve'></input>
                    <input type=text placeholder='Leírása' id=leiras name=description value='$this->leirasa'></input>                
                    <input type=date name=date value='$this->hatarIdo'></input>                
                </div>
                <div style='display: flex; flex-direction: row;justify-content: space-between; '>
                    <select name=allapot id=allapot'>
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