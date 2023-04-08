<?php
include 'Components/Header/Header.php';
include 'Components/NavBar/NavBar.php';
include 'Components/Footer/Footer.php';

class PageBuilder
{
    private $header;
    private $navbar;
    private $footer;
    private $var;
    public function __construct($links)
    {
        $this->header = new Header();
        $this->navbar = new NavBar($links);
        $this->footer = new Footer($links[1]);
        $this->header->addCss("../Styles/style.css");
        $this->header->addCss("../Components/Footer/Footer.css");
        $this->header->addCss("Components/NavBar/nav.css");
    }
    public function getHeader(){
        return $this->header;
    }

    public function pageContent($var)
    {
        $this->var = $var;
    }
    public function render()
    {
        $this->header->render();
        echo "<body>";
        $this->navbar->render();
        include($this->var);
        $this->footer->render();
        echo "</body>
        </html>";
    }
}
