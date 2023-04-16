<?php
include 'TaskList/TaskList.php';


class TaskManager
{
    static $taskList = array();
    private $path = "";
    static $TaskNames = array();
    public function __construct()
    {
        $files = array_diff(scandir("users/" . $_SESSION['user']['id'] . "/"), array('.', '..', 'tasks.txt'));
        $this->path =  "users/" . $_SESSION['user']['id'] . "/tasks.txt";
        TaskManager::$TaskNames = loadFile($this->path);
        foreach ($files as $file) {
            $folderPath = "users/" . $_SESSION['user']['id'] . "/" . $file;
            $name = "name";
            if ($this->searchInTasksByKey(substr($file, 0, -4)) != -1) {
                $name = TaskManager::$TaskNames[$this->searchInTasksByKey(substr($file, 0, -4))][1];
            }
            array_push(TaskManager::$taskList, new TaskList($folderPath, substr($file, 0, -4), $name));
        }
    }
    public function searchInTasksByKey($val)
    {
        return TaskManager::searchInTasks(0, $val);
    }
    public static function searchInTasksByValue($val)
    {
        return TaskManager::searchInTasks(1, $val);
    }
    private static function searchInTasks($index, $val)
    {
        foreach (TaskManager::$TaskNames as $key => $task) {
            if ($task[$index] == $val) {
                return $key;
            }
        }
        return -1;
    }
    public function add()
    {
        $id = uniqid("tasks");
        $name = "";
        array_push(TaskManager::$taskList, new TaskList("", $id, $name));
        array_push(TaskManager::$TaskNames, array($id, $name));
        saveToFile($this->path, TaskManager::$TaskNames);
        header("Location: /teendok.php");
    }
    public function delete($id)
    {
        $path = "users/" . $_SESSION['user']['id'] . "/" . $id . ".txt";
        unlink($path);
        $key = $this->searchInTasksByKey($id);
        unset(TaskManager::$TaskNames[$key]);
        saveToFile($this->path, TaskManager::$TaskNames);
        header("Location: /teendok.php");
    }
    private function change($id)
    {
        TaskManager::$TaskNames[$this->searchInTasksByKey($id)][1] = $_GET["taskName"];
        saveToFile($this->path, TaskManager::$TaskNames);
        header("Location: /teendok.php");
    }
    public function render()
    {
        if (array_key_exists("add", $_GET) && $_GET["add"] == "tasklist") $this->add();
        if (array_key_exists("delete", $_GET) && array_key_exists("taskListId", $_GET)) $this->delete($_GET["taskListId"]);
        if (array_key_exists("change", $_GET) && array_key_exists("taskListId", $_GET)) $this->change($_GET["taskListId"]);

        include('Components/TaskManager/TaskManagerTemplate.php');
    }
}
