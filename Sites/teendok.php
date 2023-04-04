<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Szegedi Bence, Tukacs Patrik" />
    <link rel="icon" type="image/x-icon" href="../pics/pipa%20favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teendők</title>
    <link rel="stylesheet" href="../Styles/style.css" />
    <link rel="stylesheet" href="../Styles/feladatok.css" />
    <link rel="stylesheet" href="../Styles/feladat.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <?php include 'Components/nav.php' ?>

    <div style="min-height:100vh;max-height:fit-content; background-color: yellow; padding: 1rem;padding-bottom: 5rem; display:flex;flex-direction: row; gap:1rem;justify-content: space-between;">
        <?php
        include 'Components/feladatokKezelo.php';

        //mkdir($_SESSION['user']['id'],0777,true);
        $feladatok = new feladatokKezelo();
        $feladatok->render();

        ?>
    </div>
    <!-- <div class="newTask">
        <h2>Új feladat létrehozása</h2>

        <form action="" method="POST">
            <label for="neve">Feladat neve: </label>
            <input type="text" id="fnev" name="neve" value=""><br>
            <label for="leiras">Feladat leírása: </label>
            <input type="text" id="fnev" name="leiras" value=""><br>
            <label for="hatarIdo">Feladat határideje: </label>
            <input type="date" id="fnev" name="hatarIdo" value="">
            <br>
            <input type="submit" id="submit" value="Létrehozás">
        </form>
    </div> -->

    <?php include 'Components/Footer/footer.php' ?>
</body>

</html>