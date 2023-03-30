
<?php

enum tipusok
{
    case Kesz;
    case Folyamatban;
    case Nincs;
}
class feladat
{
    private $neve;
    private $leirasa;
    private $allapot;
    private $hatarIdo;
    

    public function __construct($neve, $leirasa = " ",  tipusok $allapot = tipusok::Nincs, $hatarIdo)
    {     // konstruktor
        $this->neve = $neve;      // adattagok inicializálása a konstruktor paraméterei alapján
        $this->leirasa = $leirasa;
        $this->allapot = $allapot;
        $this->hatarIdo = $hatarIdo;
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
        if($state == "Kész"){
            $this->allapot = tipusok::Kesz;
        }elseif($state == "Folyamatban"){
            $this->allapot = tipusok::Folyamatban;
        }elseif($state == "Nincs"){
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
        $t=time();
        if($this->getIdo() - date("Y-m-d",$t) < 3){
            echo "Márcsak 3 napod van hátra a határidő végéig!<br>";
        }
    }
    
    public function render()
    {
        echo "<div class=task>
                <h2>$this->neve</h2>
                <p id=felso>Leírás : <br></p>
                <p id=leiras>$this->leirasa</p>                
                <form action=feladat.php method=POST>
                    <p>Állapot: </p>
                    <select name=cars id=cars>
                        <option value=kesz>Kész</option>
                        <option value=folyamatban>Folyamatban</option>
                        <option value=vege>Vége</option>
                    </select>
                    <div class=button>
                        <button type=submit name=allapot>Jóváhagy</button>
                    </div>
                </form>
                <p>Határidő: $this->hatarIdo</p>                
            </div>";
    }
}
?>