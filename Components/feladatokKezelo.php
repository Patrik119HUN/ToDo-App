<?php
include 'feladatok.php';


class feladatokKezelo
{
    private $feladatok = array();
    public function __construct()
    {
        //array_push($this->feladatok,$feladat);
        $files = array_diff(scandir("users/" . $_SESSION['user']['id'] . "/"), array('.', '..'));
        foreach ($files as $file) {
            $path = "users/" . $_SESSION['user']['id'] . "/" . $file;
            array_push($this->feladatok, new feladatok($path, substr($file, 0, -4)));
        }
    }
    private function add()
    {
        array_push($this->feladatok, new feladatok("", uniqid("tasks"), "name"));
        header("Location: /teendok");
    }
    private function delete($id)
    {
        $path = "users/" . $_SESSION['user']['id'] . "/" . $id . ".txt";
        unlink($path);
        header("Location: /teendok");
    }
    public function render()
    {
        if (array_key_exists("add", $_GET) && $_GET["add"] == "tasklist") $this->add();
        if (array_key_exists("delete", $_GET) && array_key_exists("taskListId", $_GET)) $this->delete($_GET["taskListId"]);
        echo "<div style='display:flex; flex-direction:row; width:min-content; margin-top: 2rem;gap:1.25rem;'>";

        foreach ($this->feladatok as $feladat) {
            $feladat->render();
        }
        echo "
        
                <form method=get>
                    <button type=submit name=add value=tasklist class=add>Hozzá adás</button>
                </form>
            </div>";
    }
}
