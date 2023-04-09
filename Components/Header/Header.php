<?php
class Header
{
    private string $lang;
    private string $title;
    private ?array $cssFiles = array();

    public function __construct($lang = "en", $title = "title")
    {
        $this->lang = $lang;
        $this->title = $title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function addCss(string $path)
    {
        array_push($this->cssFiles, $path);
    }
    public function render()
    {
        include('Components/Header/HeaderTemplate.php');
    }
}
