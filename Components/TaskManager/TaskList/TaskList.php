<?php
include './common.php';
include 'Components/TaskManager/Task/Task.php';
class TaskList
{
    public $TaskList = array();
    public static $name = array();
    private $thisName = "";
    public $path = "";
    private $id;
    public function __construct($path = "", $id, $name = "name")
    {
        $this->thisName = $name;
        array_push(TaskList::$name, $name);
        $this->path = (strlen($path) > 0) ? $path : "users/" . $_SESSION['user']['id'] . "/" . $id . ".txt";
        $this->TaskList = loadFile($this->path);
        foreach ($this->TaskList as $feladat) {
            $feladat->setState($this->thisName);
        }
        $this->id = $id;
    }
    private function delete(string $id)
    {
        foreach ($this->TaskList as $key => $feladat) {
            if ($feladat->getID() == $id) array_splice($this->TaskList, $key, 1);
        }
        saveToFile($this->path, $this->TaskList);
    }
    public function add($name = "", $desc = "", $date = "")
    {
        array_push($this->TaskList, new Task($name, $desc, $this->thisName, $date));
        saveToFile($this->path, $this->TaskList);
    }
    private function change(string $id, $name, $description, $date, $state)
    {
        foreach ($this->TaskList as $Task) {
            if ($Task->getID() == $id) {
                $Task->setName($name);
                $Task->setDescription($description);
                $Task->setTime($date);
                $Task->setState($state);
                if ($Task->getState() != $this->thisName) {
                    $index = TaskManager::searchInTasksByValue($state);
                    TaskManager::$taskList[$index]->add($name, $description, $date);
                    $this->delete($id);
                }
            }
            saveToFile($this->path, $this->TaskList);
        }
        header("Location: /teendok");
    }
    public function render()
    {
        if (array_key_exists("add", $_GET) && $_GET["add"] == $this->id) $this->add();
        if (array_key_exists("delete", $_GET) && array_key_exists("taskId", $_GET)) $this->delete($_GET["taskId"]);
        if (array_key_exists("change", $_GET) && array_key_exists("taskId", $_GET)) $this->change($_GET["taskId"], $_GET["name"], $_GET["description"], $_GET["date"], $_GET["state"]);
        include('Components/TaskManager/TaskList/TaskListTemplate.php');
    }
}
