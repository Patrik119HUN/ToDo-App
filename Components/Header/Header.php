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
    public function setTitle($title){
        $this->title = $title;
    }
    public function addCss(string $path)
    {
        array_push($this->cssFiles, $path);
    }
    public function render()
    {
        $css = "";
        foreach ($this->cssFiles as $path) {
            $css .= " <link rel='stylesheet' href=$path />";
        }
        echo
        "
<!DOCTYPE html>
<html lang='$this->lang'>

<head>
    <meta charset='UTF-8' />
    <meta name='author' content='Szegedi Bence, Tukacs Patrik' />
    <link rel='icon' type='image/x-icon' href='../pics/pipa%20favicon.ico' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <title>$this->title</title>
    $css
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js'></script>
</head>";
    }
}
