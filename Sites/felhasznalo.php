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
    <link rel="stylesheet" href="Styles/style.css" />
    <link rel="stylesheet" href="Styles/felhasznalo.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>

    <?php include '../Modules/nav.php' ?>
    <?php
    include "./common.php";
    $fiokok =  loadUsers("users.txt");
    $hibak = [];
    if (isset($_GET["register"])) {   // csak azután dolgozzuk fel az űrlapot, miután az el lett küldve

        if (!isset($_GET["id"]) && trim($_GET["id"]) === "")
            $hibak[] = "A felhasználó név megadása kötelező!";

        if (!isset($_GET["surename"]) && trim($_GET["surename"]) === "")
            $hibak[] = "A vezetéknév megadása kötelező!";

        if (!isset($_GET["forename"]) && trim($_GET["forename"]) === "")
            $hibak[] = "A keresztnév megadása kötelező!";

        if (!isset($_GET["email"]) && trim($_GET["email"]) === "")
            $hibak[] = "A e-mail cím megadása kötelező!";

        if (!isset($_GET["birthday"]) || trim($_GET["birthday"]) === "")
            $hibak[] = "Az életkor megadása kötelező!";
    }
    ?>
    <div class="container">
        <ul class="input_row">
            <li>Felhasználó neved:</li>
            <input type="text" value='<?php echo $_SESSION["user"]["id"] ?>' />
        </ul>
        <div class="name">
            <ul class="input_row">
                <li>Kereszt neved:</li>
                <input type="text" value='<?php echo $_SESSION["user"]["keresztnev"] ?>'>
            </ul>
            <ul class="input_row">
                <li>Vezeték neved:</li>
                <input type="text" value='<?php echo $_SESSION["user"]["vezeteknev"] ?>' />
            </ul>
        </div>
        <ul class="input_row">
            <li>E-mail címed:</li>
            <input type="text" value='<?php echo $_SESSION["user"]["email"] ?>' />
        </ul>
        <ul class="input_row">
            <li>Születési dátumod:</li>
            <input type="date" value='<?php echo $_SESSION["user"]["eletkor"] ?>' />
        </ul>
    </div>
    <?php include 'Modules/footer.php' ?>
</body>

</html>