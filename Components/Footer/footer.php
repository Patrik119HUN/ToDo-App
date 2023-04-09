<?php
class Footer
{
    private $links = array();
    public function __construct($links)
    {
        $this->links = $links;
    }
    private function FooterLink(string $path, string $name)
    {
        include('Components/Footer/FooterLinkTemplate.php');
    }
    public function render()
    {
        include('Components/Footer/FooterTemplate.php');
    }
}
