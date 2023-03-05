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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <?php include 'Modules/nav.php' ?>
    <?php include 'Modules/footer.php' ?>

    <div style="background-color: yellow;">
        <?php
        include 'Modules/feladat.php';
        $feladat = new feladat("Sétálni", "ma", "nincs kész", 2003);

        ?>
        <div>
            <ul>
                <li><?php echo $feladat->getNev(); ?></li>
                <li><?php echo $feladat->getStatusz(); ?></li>
                <li><?php echo $feladat->getLeiras(); ?></li>
                <li><?php echo $feladat->getIdo(); ?></li>
            </ul>
        </div>
    </div>
</body>

</html>