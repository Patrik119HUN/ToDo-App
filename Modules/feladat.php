
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
    private $statusza;
    private $ideje;

    public function __construct($neve, $leirasa,  tipusok $statusza, $ideje)
    {     // konstruktor
        $this->neve = $neve;      // adattagok inicializálása a konstruktor paraméterei alapján
        $this->leirasa = $leirasa;
        $this->statusza = $statusza;
        $this->ideje = $ideje;
    }

    public function getNev()
    {
        return $this->neve;
    }
    public function getLeiras()
    {
        return $this->leirasa;
    }
    public function getStatusz()
    {
        $valasz = "";
        match ($this->statusza) {
            tipusok::Kesz => $valasz = "kesz",
            tipusok::Nincs => $valasz = "nincs",
            tipusok::Folyamatban => $valasz = "folyamatban",
        };
        return $valasz;
    }
    public function getIdo()
    {
        return $this->ideje;
    }
    public function setNev($ertek)
    {  // setter
        $this->neve = $ertek;
    }
    public function render()
    {
        echo '<div id="Hello">'. $this->neve .'</div>';
    }
}
?>