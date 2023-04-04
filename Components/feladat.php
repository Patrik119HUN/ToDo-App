
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
    private tipusok $allapot;
    private $hatarIdo;
    private $id;

    public function __construct(string $neve = "", string $leirasa = "",  tipusok $allapot = tipusok::Nincs, $hatarIdo)
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
        $valasz = "";
        match ($this->allapot) {
            tipusok::Kesz => $valasz = "kesz",
            tipusok::Nincs => $valasz = "nincs",
            tipusok::Folyamatban => $valasz = "folyamatban",
        };
        return $valasz;
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
        if ($state == "Kész") {
            $this->allapot = tipusok::Kesz;
        } elseif ($state == "Folyamatban") {
            $this->allapot = tipusok::Folyamatban;
        } elseif ($state == "Nincs") {
            $this->allapot = tipusok::Nincs;
        }
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
            $tipusok .= "<option value=$i>$i</option>";
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
                <button type=submit name=change>Mentés</button>
                </div>
                </div>
                </form>
            </div>";
        //teszt
        $state = $this->getAllapot();
        if ($state == "Kész") {
            echo "kész";
        } elseif ($state == "Folyamatban") {
            echo "folyamatban";
        } elseif ($state == "Nincs") {
            echo "nincs";
        }
    }
}
?>