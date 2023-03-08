<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Szegedi Bence, Tukacs Patrik" />
    <link rel="icon" type="image/x-icon" href="./képek/pipa favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rólunk</title>
    <link rel="stylesheet" href="../Styles/style.css" />
    <link rel="stylesheet" href="../Styles/feladatok.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <?php include 'Modules/nav.php' ?>
    <?php include 'Modules/footer.php' ?>

    <div style="background-color: yellow; padding:1rem;">
        <?php
        include 'Modules/feladat.php';
        $feladat = new feladat("Sétálni", "ma", tipusok::Kesz, 2023 - 03 - 05);

        ?>
        <div class="task">
            <h3><?php echo $feladat->getNev(); ?></h3>
            <p><?php echo $feladat->getLeiras(); ?></ő>
            <div>
                <select name="cars" id="cars">
                    <option value="kesz">Kész</option>
                    <option value="folyamatban">Folyamatban</option>
                    <option value="vege">Vége</option>
                </select>
                <input type="date" value='<?php echo $feladat->getIdo(); ?>'></input>
            </div>
        </div>
    </div>

</body>

</html>