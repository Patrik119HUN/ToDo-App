<?php
class Hero
{
    private $path_to_pic;
    private $alt_pic;
    private $description;
    private $header;


    public function __construct($path, $alt = "kép", $head = "Cím", $desc = "leírás")
    {
        $this->path_to_pic = $path;
        $this->description = $desc;
        $this->alt_pic = $alt;
        $this->header = $head;
    }

    public function render()
    {
        echo
        "<div class=hero>
            <img class=hero-image src=$this->path_to_pic alt=$this->alt_pic />
            <div class=hero-text>
                <h1>$this->header</h1>
                <p>$this->description</p>
            </div>
        </div>";
    }
}
