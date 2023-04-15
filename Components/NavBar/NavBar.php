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
    $profilkep = "pics/ProfilPics/morgandefault.png";      // alapértelmezett kép, amit akkor jelenítünk meg, ha valakinek nincs feltöltött profilképe
    $utvonal = "pics/ProfilPics/" . $_SESSION["user"]["id"]; // a kép neve a felhasználó nevével egyezik meg

    $kiterjesztesek = ["png", "jpg", "jpeg"];     // a lehetséges kiterjesztések, amivel egy profilkép rendelkezhet
    foreach ($kiterjesztesek as $kiterjesztes) {  // minden kiterjesztésre megnézzük, hogy létezik-e adott kiterjesztéssel profilképe a felhasználónak
      if (file_exists($utvonal . "." . $kiterjesztes)) {
        $profilkep = $utvonal . "." . $kiterjesztes;  // ha megtaláltuk a felhasználó profilképét, eltároljuk annak az elérési útvonalát egy változóban
      }
    }
    foreach ($bejelentkezve as $linkek) {
      echo "<ul class='menu'>";
      foreach ($linkek as $url => $nev) {
        if ($url == "felhasznalo") {
          echo "<a href='/felhasznalo' style='height:3.5rem;padding:0.25rem;'><img src='$profilkep' alt='Hamburger' style='height:3.5rem;padding:0.25rem;border-radius:50%; aspect-ration:1/1;object-fit: cover'/></a>";
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
