<?php
include 'feladatok.php';


class feladatokKezelo
{
    static $taskList = array();
    private $path = "";
    static $asd = array();
    public function __construct()
    {
        //array_push($this->feladatok,$feladat);
        $files = array_diff(scandir("users/" . $_SESSION['user']['id'] . "/"), array('.', '..', 'tasks.txt'));
        $this->path =  "users/" . $_SESSION['user']['id'] . "/tasks.txt";
        feladatokKezelo::$asd = loadUsers($this->path);
        foreach ($files as $file) {
            $folderPath = "users/" . $_SESSION['user']['id'] . "/" . $file;
            $name = "name";
            if ($this->searchInTasksByKey(substr($file, 0, -4)) != -1) {
                $name = feladatokKezelo::$asd[$this->searchInTasksByKey(substr($file, 0, -4))][1];
            }
            array_push(feladatokKezelo::$taskList, new feladatok($folderPath, substr($file, 0, -4), $name));
        }
    }
    public function searchInTasksByKey($id)
    {
        foreach (feladatokKezelo::$asd as $key => $task) {
            if ($task[0] == $id) {
                return $key;
            }
        }
        return -1;
    }
    public static function searchInTasksByValue($val)
    {
        foreach (feladatokKezelo::$asd as $key => $task) {
            if ($task[1] == $val) {
                return $key;
            }
        }
        return -1;
    }
    public function add()
    {
        $id = uniqid("tasks");
        $name = "";
        array_push(feladatokKezelo::$taskList, new feladatok("", $id, $name));
        array_push(feladatokKezelo::$asd, array($id, $name));
        saveUsers($this->path, feladatokKezelo::$asd);
        header("Location: /teendok");
    }
    public function delete($id)
    {
        $path = "users/" . $_SESSION['user']['id'] . "/" . $id . ".txt";
        unlink($path);
        $key = $this->searchInTasksByKey($id);
        unset(feladatokKezelo::$asd[$key]);
        saveUsers($this->path, feladatokKezelo::$asd);
        header("Location: /teendok");
    }
    private function change($id)
    {
        feladatokKezelo::$asd[$this->searchInTasksByKey($id)][1] = $_GET["taskName"];
        saveUsers($this->path, feladatokKezelo::$asd);
        header("Location: /teendok");
    }
    public function render()
    {
        if (array_key_exists("add", $_GET) && $_GET["add"] == "tasklist") $this->add();
        if (array_key_exists("delete", $_GET) && array_key_exists("taskListId", $_GET)) $this->delete($_GET["taskListId"]);
        if (array_key_exists("change", $_GET) && array_key_exists("taskListId", $_GET)) $this->change($_GET["taskListId"]);
        echo "<div style='display:flex; flex-direction:row; width:min-content; margin-top: 2rem;gap:1.25rem;'>";

        foreach (feladatokKezelo::$taskList as $feladat) {
            $feladat->render();
        }
        echo "
        
                <form method=get>
                    <button type=submit name=add value=tasklist class=add>Hozzá adás</button>
                </form>
            </div>";
    }
}
