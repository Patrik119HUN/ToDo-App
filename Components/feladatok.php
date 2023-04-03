<?php
include './common.php';

class feladatok
{
    public $feladatok = array();
    public static $name = array();
    private $thisName = "";
    public $path = "";
    public function __construct($name = "name", $feladatok = null)
    {
        $this->thisName = $name;
        array_push(feladatok::$name, $name);
        $this->path = $_SESSION['user']['id'] . "/" . $name . ".txt";
        $this->feladatok = loadUsers($this->path);
    }
    public function render()
    {
        if (array_key_exists($this->thisName, $_GET)) {
            //$this->feladatok = loadUsers($this->path);
            array_push($this->feladatok, new feladat("kutya", "", tipusok::Nincs, "2003-01-11"));
            saveUsers($this->path, $this->feladatok);
            header("Location: /teendok");
        }
        if (array_key_exists("delete", $_GET)) {
            foreach ($this->feladatok as $key => $feladat) {
                if ($feladat->getID() == $_GET["id"]) {
                    array_splice($this->feladatok, $key, 1);
                }
            }
            saveUsers($this->path, $this->feladatok);
            // header("Location: /teendok");
        }
        if (array_key_exists("change", $_GET)) {
            foreach ($this->feladatok as $key => $feladat) {
                if ($feladat->getID() == $_GET["id"]) {
                    $feladat->setNev($_GET["name"]);
                    $feladat->setLeirasa($_GET["description"]);
                    $feladat->setHatarido($_GET["date"]);
                }
                saveUsers($this->path, $this->feladatok);
            }
        }
        echo "<div class=container>
                <h1>$this->thisName</h1>";
        if ($this->feladatok == null) {
            echo "<h1>Nincs elem</h1>";
        } else {
            foreach ($this->feladatok as $feladat) {
                $feladat->render();
            }
        }

        echo "
            <form method=get style='margin-top:auto;'>
                <input type=submit name=$this->thisName value='Hozzá adás' class=add></input>
            </form>";
        echo "</div>";
    }
}
