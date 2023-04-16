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
    $profilPicture = "pics/ProfilPics/default.png";
    $path = "pics/ProfilPics/" . $_SESSION["user"]["id"];

    $allowed_extensions = ["png", "jpg", "jpeg"];

    foreach ($allowed_extensions as $ext) {
      if (file_exists($path . "." . $ext)) {
        $profilPicture = $path . "." . $ext;
      }
    }
    foreach ($bejelentkezve as $linkek) {
      echo "<ul class='menu'>";
      foreach ($linkek as $url => $nev) {
        if ($url == "felhasznalo") {
          echo "<a href='/felhasznalo.php' style='height:3.5rem;padding:0.25rem;'><img src='$profilPicture' alt='Hamburger' style='height:3.5rem;padding:0.25rem;border-radius:50%; aspect-ration:1/1;object-fit: cover'/></a>";
        }
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
    include('Components/NavBar/NavBarTemplate.php');
  }
}
