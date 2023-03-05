
<?php
class feladat
{
    private $neve;
    private $leirasa;
    private $statusza;
    private $ideje;

    public function __construct($neve, $leirasa, $statusza, $ideje)
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
        return $this->statusza;
    }
    public function getIdo()
    {
        return $this->ideje;
    }
    public function setNev($ertek)
    {  // setter
        $this->neve = $ertek;
    }

}
?>