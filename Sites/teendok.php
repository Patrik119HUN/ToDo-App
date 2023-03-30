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
    <link rel="stylesheet" href="../Styles2/feladatok.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <?php include 'Components/nav.php' ?>
    <?php include 'Components/footer.php' ?>
    

    <div>
        <?php
        include 'Components/feladat.php';
        $feladat = new feladat("Séta", "Levinni a blökit", tipusok::Kesz, "2023-03-05");
        $feladat->render();
        
        
        ?>

    </div>
    
    
</body>

</html>