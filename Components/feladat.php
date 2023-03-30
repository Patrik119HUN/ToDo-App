
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
        echo '<div id="Hello">'. $this->neve .'</div>';
        $t="2023-05-04";
        echo date("Y-m-d", $t);
    }
}
?>