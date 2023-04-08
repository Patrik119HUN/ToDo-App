<?php
class NavBar
{
  private $links = array();
  public function __construct($links)
  {
    $this->links = $links;
  }
  private function NavItem(string $path, string $name)
  {
    $activePage = basename($_SERVER['PHP_SELF'], ".php");
    $class = ($activePage == $path) ? 'active' : '';
    echo "<li class=$class ><a href=$path>$name</a></li>";
  }

  private function loggedIn()
  {
    $bejelentkezve = $this->links[0];
    foreach ($bejelentkezve as $linkek) {
      echo "<ul class='menu'>";
      foreach ($linkek as $url => $nev) {
        $this->NavItem($url, $nev);
      }
      echo "</ul>";
    }
  }
  private function base()
  {
    $bejelentkezve = $this->links[1];
    foreach ($bejelentkezve as $linkek) {
      echo "<ul class='menu'>";
      foreach ($linkek as $url => $nev) {
        $this->NavItem($url, $nev);
      }
      echo "</ul>";
    }
  }
  public function render()
  {
    echo "<nav class=topnav>
          <div>
            <a href='Sites/index.php' class='logo'>ToDo APP</a>
            <button class='ham' id='myBtn'>
              <img src='../SVG/menu.svg' alt= style='width: 2rem' />
            </button>
          </div>";
    isset($_SESSION["user"]) ? $this->loggedIn() : $this->base();
    echo "</nav>
            <script src='../JS/nav.js'></script>";
  }
}
