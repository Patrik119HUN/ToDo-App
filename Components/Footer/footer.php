

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
        echo  "<li>
                <a href=$path style='text-decoration: none; color:yellow;'> $name</a>
            </li>";
    }
    public function render()
    {
        echo "<footer class='footer'>
                <div class='name' style='margin-right:auto'>
                    <p>Made by Tukacs Patrik, Szegedi Bence</p>
                    <ul style='list-style-type: none; color:yellow'>";
        foreach ($this->links as $links) {
            echo "<ul class='menu'>";
            foreach ($links as $url => $nev) {
                $this->FooterLink($url, $nev);
            }
            echo "</ul>";
        }
        echo "</ul>
    </div>
</footer>";
    }
}
