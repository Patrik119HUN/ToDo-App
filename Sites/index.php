<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Szegedi Bence, Tukacs Patrik" />
    <link rel="icon" type="image/x-icon" href="../pics/pipa%20favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>ToDo App</title>
    <link rel="stylesheet" href="../Styles/style.css" />
    <link rel="stylesheet" href="../Styles/nav.css" />
    <link rel="stylesheet" href="../Styles/cards.css" />
    <link rel="stylesheet" href="../Styles/hero.css" />
    <link rel="stylesheet" href="../Styles/footer.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>

    <?php
    include 'Components/nav.php';
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
    <?php include 'Components/Footer/footer.php' ?>
</body>

</html>