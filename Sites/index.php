<?php
include 'Components/Card/Card.php';
include 'Components/Hero/Hero.php';

$kartya = new Card("../pics/bike.jpg", "Átlátható heti naptár", "Kerékpár");
$kartya1 = new Card("../pics/coffee-gc0ac3039f_1920.jpg", "Jegyzeteket írhatsz a teendők mellé", "Kávé");
$kartya2 = new Card("../pics/guggolas.jpg", "Személyre szabhatod a megjelenítést", "Guggolás");

$hero_path = "../pics/kavezok.jpg";
$hero_alt = "Két kávézó beszélget";
$hero_title = "Szeretnéd könnybben és átláthatóbban rendezni a teendőidet?";
$hero_desc = "A ToDo app segítségével ezt egyszerűen teheted meg.";

$hero = new Hero($hero_path, $hero_alt, $hero_title, $hero_desc);
$hero->render();
?>
<h2 class="card-title">Főbb feladatai</h2>
<div id="cards">
    <?php
    $kartya->render();
    $kartya1->render();
    $kartya2->render();
    ?>
</div>

<div style="position: relative">
    <img src="../pics/futas2.jpg" style="opacity: 0.7; height: 100vh; width: 100%; object-fit: cover" alt="futás" />
    <div class="text-container">
        <h2>
            Hiszünk abban, hogy ezzel az applikációval motiválni tudunk téged,
            hogy produktív napod legyen.
        </h2>
        <p>
            Regisztrálj még ma és használd <span id="ingyen">INGYEN</span> a
            ToDo-t!
        </p>
    </div>
</div>