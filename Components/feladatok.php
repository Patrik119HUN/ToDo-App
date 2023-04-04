<?php
include './common.php';
include 'feladat.php';
class feladatok
{
    public $feladatok = array();
    public static $name = array();
    private $thisName = "";
    public $path = "";
    private $id;
    public function __construct($path = "", $id, $name = "name", $feladatok = null)
    {
        $this->thisName = $name;
        array_push(feladatok::$name, $name);
        if (strlen($path) > 0) {
            $this->path = $path;
        } else {
            $this->path = "users/" . $_SESSION['user']['id'] . "/" . $id . ".txt";
        }
        $this->feladatok = loadUsers($this->path);
        $this->id = $id;
    }
    private function delete(string $id)
    {
        foreach ($this->feladatok as $key => $feladat) {
            if ($feladat->getID() == $id) array_splice($this->feladatok, $key, 1);
        }
        saveUsers($this->path, $this->feladatok);
        header("Location: /teendok");
    }
    private function add()
    {
        //$this->feladatok = loadUsers($this->path);
        array_push($this->feladatok, new feladat("", "", tipusok::Nincs, "2003-01-11"));
        saveUsers($this->path, $this->feladatok);
        //header("Location: /teendok");
    }
    private function change(string $id, $name, $description, $date)
    {
        foreach ($this->feladatok as $key => $feladat) {
            if ($feladat->getID() == $id) {
                $feladat->setNev($name);
                $feladat->setLeirasa($description);
                $feladat->setHatarido($date);
            }
            saveUsers($this->path, $this->feladatok);
        }
        header("Location: /teendok");
    }
    public function render()
    {

        if (array_key_exists("add", $_GET) && $_GET["add"] == $this->id) $this->add();
        if (array_key_exists("delete", $_GET) && array_key_exists("taskId", $_GET)) $this->delete($_GET["taskId"]);
        if (array_key_exists("change", $_GET) && array_key_exists("taskId", $_GET)) $this->change($_GET["taskId"], $_GET["name"], $_GET["description"], $_GET["date"]);
        echo
        "<div class=container>
            <form method=get style='margin-top:auto;'>
            <button type=submit name=delete value=$this->id class=delete_button>X</button>
            <input type=hidden name=taskListId value=$this->id></input>
            <h1>$this->thisName</h1>
            </form>";
        if ($this->feladatok == null) {
            echo "<h1>Nincs elem</h1>";
        } else {
            foreach ($this->feladatok as $feladat) {
                $feladat->render();
            }
        }
        echo "
            <form method=get style='margin-top:auto;'>
                    <button type=submit name=add value=$this->id class=add>Hozzá adás</button>
                </form>
            </div>";
    }
}
