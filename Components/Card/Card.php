<?php
class Card
{
    private $path_to_pic;
    private $alt_pic;
    private $description;

    public function __construct($path, $desc, $alt)
    {
        $this->path_to_pic = $path;
        $this->description = $desc;
        $this->alt_pic = $alt;
    }

    public function render()
    {
        include('Components/Card/CardTemplate.php');
    }
}
